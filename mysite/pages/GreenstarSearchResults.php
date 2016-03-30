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
    protected $articleList;

    public function index(SS_HTTPRequest $request)
    {
        $this->articleList = Product::get()->sort('ID', 'ASC');



        $this->articleList = $this->articleList->filterByCallback(function($product){

            if($this->getRequest()->getVar('SubCredit')){
                $creditID = $this->getRequest()->getVar('SubCredit');
            }else{
                $creditID = $this->getRequest()->getVar('Credit');
            }

            $credits = $product->Credits();

            $match = null;

            foreach($credits as $credit){
                $availableCredit = $credit->AvailableCredit();
                if($availableCredit->ID == $creditID || $availableCredit->parent()->ID == $creditID){
                    $match = $product;
                }
            }
            return $match;
        });

        // ========================================
        // Ajax Rendering
        // ========================================
        if ($request->isAjax()) {

            $sort = $this->getRequest()->getVar('sort');
            $order = $this->getRequest()->getVar('order');


            $this->articleList = $this->articleList->sort($sort, $order);

            $paginatedList = PaginatedList::create(
                $this->articleList,
                $request
            )->setPageLength(25);


            return $this->customise(array(
                'Results' => $paginatedList
            ))->renderWith('ResultsTable');

        }



        $this->articleList = PaginatedList::create(
            $this->articleList,
            $this->request
        )->setPageLength(25);

        return array(
            'Results' => $this->articleList
        );

    }



    // ========================================
    // Get Search Parameters
    // ========================================
    public function GetSearchParams()
    {

        $tool = $this->getRequest()->getVar('Tool');
        $toolname = dataObject::get_by_id('RatingTool', $tool)->Title;

        $category = $this->getRequest()->getVar('Category');
        $categoryname = dataObject::get_by_id('ImpactCategory', $category)->Title;

        $credit = $this->getRequest()->getVar('Credit');
        $creditname = dataObject::get_by_id('AvailableCredit', $credit)->Title;

        if($this->getRequest()->getVar('SubCredit')){
            $subcredit = $this->getRequest()->getVar('SubCredit');
            $subcreditname = dataObject::get_by_id('AvailableCredit', $subcredit)->Title;
        }else{
            $subcreditname = null;
        }



        return $toolname . ' / ' . $categoryname . ' / ' . $creditname . ' / ' . $subcreditname;

    }
}