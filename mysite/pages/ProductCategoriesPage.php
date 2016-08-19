<?php

class ProductCategoriesPage extends Page {
    private static $can_be_root = false;

    public function getCMSFields() {

        $fields = parent::getCMSFields();
        $fields->removeByName('Content');

        return $fields;
    }

}


class ProductCategoriesPage_Controller extends Page_Controller {

    private static $allowed_actions = array(
        'category'
    );

    protected $articleList;

    public function init() {
        parent::init();

        $this->articleList = ProductCategory::get();
    }

    // ========================================
    // Category Filter
    // =======================================
    public function category(SS_HTTPRequest $r) {
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


        return array(
            'SelectedCategory' => $category
        );
    }

    public function Results() {

        return PaginatedList::create(
            $this->articleList,
            $this->getRequest()
        );
    }

}