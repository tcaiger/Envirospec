<?php

class SidebarPage extends Page {

    private static $db = array(
        'Subheading' => 'Varchar(100)'
    );

    private static $has_one = array(
        'Logo' => 'Image'
    );

    private static $has_many = array(
        'Sources' => 'Source'
    );

    public function getCMSFields() {

        $fields = parent::getCMSFields();
        $fields->addFieldsToTab('Root.Main', array(
            TextField::create('Subheading')
        ), 'Content');

        $fields->addFieldToTab('Root.SideImage', $photo = UploadField::create('Logo', 'Side Image'));
        $fields->addFieldsToTab('Root.Sources', GridField::create(
            'Sources',
            'Sources',
            $this->Sources(),
            GridFieldConfig_RecordEditor::create()
        ));

        return $fields;
    }
}


class SidebarPage_Controller extends Page_Controller {


}