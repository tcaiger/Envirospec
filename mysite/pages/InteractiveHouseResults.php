<?php

class InteractiveHouseResults extends Page
{

    public function getCMSFields()
    {

        $fields = parent::getCMSFields();
        $fields->removeByName('Content');

        return $fields;
    }
}

class InteractiveHouseResults_Controller extends Page_Controller
{

    private static $allowed_actions = array(
        'category'
    );

    protected $articleList;

    public function init()
    {
        parent::init();

        $this->articleList = Product::get();
    }

    public function index(SS_HTTPRequest $request)
    {


    }

    // ========================================
    // Category Filter
    // =======================================
    public function category(SS_HTTPRequest $r)
    {
        $category = ProductCategory::get()->byID(
            $r->param('ID')
        );

        if ( ! $category) {
            return $this->httpError(404, 'That category was not found');
        }

        $this->articleList = $this->articleList
            ->filter(array(
                'ParentID' => $category->ID
            ))->sort('Title', 'ASC');


        // ========================================
        // Ajax Rendering
        // ========================================
        if ($r->isAjax()) {

            $sortID = $this->getRequest()->getVar('sort');

            if ($sortID == 0) {
                $results = $this->articleList->sort('Title', 'ASC');
            } else {
                $results = $this->articleList->sort('ManufacturerID', 'ASC');
            }


            return $this->customise(array(
                'Results' => $results
            ))->renderWith('ComparisonTable');

        }


        return array(
            'SelectedCategory' => $category
        );
    }

    public function Results()
    {

        return PaginatedList::create(
            $this->articleList,
            $this->getRequest()
        );
    }

    // ========================================
    // Get Search Paramaters
    // ========================================
    public function GetCategory()
    {

        $categoryNumber = $this->getRequest()->param('ID');
        $category = dataObject::get_by_id('ProductCategory', $categoryNumber);

        return ' ... / ' . $category->Parent->Title . ' / ' . $category->Title;

    }
}