<?php

class InteractiveHouse extends Page
{

    public function getCMSFields()
    {

        $fields = parent::getCMSFields();
        $fields->removeByName('Content');

        return $fields;
    }

    public function GetCategories($Parent)
    {
        return ProductCategory::get()->filter('ParentID', $Parent);
    }
}

class InteractiveHouse_Controller extends Page_Controller
{

    public function init()
    {
        parent::init();

        Requirements::javascript("{$this->ThemeDir()}/js/interactive-house.js");

    }

}