<?php

class RatingTool extends Page {

    static $defaults = array(
        'ShowInMenus'  => false,
        'ShowInSearch' => false
    );

    private static $can_be_root = false;

    private static $allowed_children = array(
        'ImpactCategory'
    );

    static $icon = 'mysite/icons/data';

    public function getCMSFields() {

        $fields = parent::getCMSFields();
        $fields->removeByName('Content');
        $fields->removeByName('Metadata');

        return $fields;
    }

    public function GetChildren($ID) {
        return ImpactCategory::get()->filter(array(
            'ParentID' => $ID
        ))->sort('Created', 'ASC');
    }

}

class RatingTool_Controller extends Page_Controller {


}