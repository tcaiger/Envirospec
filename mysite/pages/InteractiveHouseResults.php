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

            $sort = $this->getRequest()->getVar('sort');
            $order = $this->getRequest()->getVar('order');


            $this->articleList = $this->articleList->sort($sort, $order);

            $paginatedList = PaginatedList::create(
                $this->articleList,
                $r
            )->setPageLength(25);


            return $this->customise(array(
                'Results' => $paginatedList
            ))->renderWith('ComparisonTable');

        }

        $paginatedList = PaginatedList::create(
            $this->articleList,
            $r
        )->setPageLength(25);

        return array(
            'Results' => $paginatedList
        );
    }


    // ========================================
    // Get Search Paramaters
    // ========================================
    public function GetCategory()
    {

        $categoryNumber = $this->getRequest()->param('ID');
        $category = dataObject::get_by_id('ProductCategory', $categoryNumber);

        return $category->Parent->parent->Title . ' / ' . $category->Parent->Title . ' / ' . $category->Title;

    }
}