<?php

class AvailableCredit extends Page
{

    private static $db = array(
        'Points'      => 'Varchar',
        'Description' => 'Text'
    );

    private static $can_be_root = false;

    private static $has_many = array(
        'Credits' => 'Credit'
    );

    static $defaults = array(
        'ShowInMenus'  => false,
        'ShowInSearch' => false
    );

    private static $allowed_children = array(
        'AvailableCredit'
    );

    static $icon = 'mysite/icons/GreenFile';


    public function getCMSFields()
    {

        $fields = parent::getCMSFields();
        $fields->removeByName('Content');
        $fields->removeByName('Metadata');

        $fields->addFieldsToTab('Root.Main', array(
            TextField::create('Points', 'Points Available'),
            TextAreaField::create('Description', 'Description')
        ));

        return $fields;
    }

    /*
     * Gets the rating tool for this credit
     * @Dataobject
     * */
    public function RatingTool()
    {
        return $this->getAncestors()->find('ClassName', 'RatingTool');
    }

    /*
     * Gets the category for this credit
     * @Dataobject
     * */
    public function Category()
    {
        return $this->getAncestors()->find('ClassName', 'ImpactCategory');
    }

    /*
     * Gets the first available credit for this credit
     * @Dataobject
     * */
    public function CheckLevel3()
    {
        $count = $this->getAncestors()->count();
        if ($count == 3) {
            return $this;
        } else {
            return $this->parent();
        }

    }

    public function CheckLevel4()
    {
        $count = $this->getAncestors()->count();
        if ($count == 4) {
            return $this;
        } else {
            return null;
        }

    }


}

class AvailableCredit_Controller extends Page_Controller
{


}