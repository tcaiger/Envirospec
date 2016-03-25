<?php

class GreenstarSearchResults extends Page
{

    public function getCMSFields()
    {

        $fields = parent::getCMSFields();
        $fields->removeByName('Content');

        return $fields;
    }
}

class GreenstarSearchResults_Controller extends Page_Controller
{


    public function index(SS_HTTPRequest $request)
    {

        $creditID = $request->getVar('Credit');
        $results = $this->GetFilteredProducts($creditID);

        // ========================================
        // Ajax Rendering
        // ========================================
        if ($request->isAjax()) {

            $sortID = $this->getRequest()->getVar('sort');

            if ($sortID == 0) {
                $results = $this->GetFilteredProducts($creditID);
            } else {
                $results = $this->GetFilteredCredits($creditID);
            }

            return $this->customise(array(
                'Results' => $results,
                'Sort'    => $sortID
            ))->renderWith('ResultsTable');
        }

        return array(
            'Results' => $results,
            'Sort'    => 0
        );
    }

    // ========================================
    // Get Filtered Credits
    // ========================================
    public function GetFilteredCredits($creditID)
    {

        //1. Look Up Credits
        $credits = AvailableCredit::get()
            ->byID($creditID)
            ->Credits();

        // 2. Return Paginated Results
        return PaginatedList::create(
            $credits,
            $this->getRequest()
        );
    }

    // ========================================
    // Get Filtered Products
    // ========================================
    public function GetFilteredProducts($creditID)
    {

        //1. Look Up Credits
        $credits = AvailableCredit::get()
            ->byID($creditID)
            ->Credits();

        // 2. Get Filtered Results
        $productIDs = array();
        foreach ($credits as $credit) {
            array_push($productIDs, $credit->ProductID);
        }

        $products = Product::Get()->filter(array(
            'ID' => $productIDs
        ));

        // 3. Return Paginated Results
        return PaginatedList::create(
            $products,
            $this->getRequest()
        );
    }

    // ========================================
    // Get Search Paramaters
    // ========================================
    public function GetSearchParams()
    {

        $tool = $this->getRequest()->getVar('Tool');
        $toolname = dataObject::get_by_id('RatingTool', $tool)->Title;

        $category = $this->getRequest()->getVar('Category');
        $categoryname = dataObject::get_by_id('ImpactCategory', $category)->Title;

        $credit = $this->getRequest()->getVar('Credit');
        $creditname = dataObject::get_by_id('AvailableCredit', $credit)->Title;

        return $toolname . ' / ' . $categoryname . ' / ' . $creditname;

    }

    // ========================================
    // Results Filter
    // ========================================
    public function ResultsFilterForm()
    {

        $form = BootstrapForm::create(
            $this,
            __Function__,
            Fieldlist::create(
                DropDownField::create(
                    'ResultsFilter',
                    '',
                    array(
                        'Product' => 'Product',
                        'Points'  => 'Points'
                    )
                )),
            Fieldlist::create()
        );
        $form->setFormMethod('GET')
            ->setFormAction($this->Link())
            ->disableSecurityToken()
            ->loadDataFrom($this->request->getVars());

        return $form;
    }
}