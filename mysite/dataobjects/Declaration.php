<?php

class Declaration extends DataObject {

    public static $db = array(
        'Year'          => 'Varchar',
        'ConfirmedDate' => 'Date',
        'Confirmed'     => 'Boolean'
    );

    public function Confirmed() {
        return ($this->Confirmed == true ? 'Yes' : 'No');
    }

    private static $has_one = array(
        'Companies' => 'Companies'
    );

    private static $summary_fields = array(
        'Companies.Name' => 'Company',
        'Year'           => 'Year',
        'Created.Nice'   => 'Created',
        'Confirmed'      => 'Confirmed'
    );

    private static $default_sort = 'Created DESC';


    function onBeforeWrite($member = null) {

        if ( $this->Confirmed) {
            $this->ConfirmedDate = date("Y-m-d");
        }

        parent::onBeforeWrite();
    }


    function canEdit($member = null) {
        return true;
    }

    function canDelete($member = null) {
        return true;
    }

    function canView($member = null) {
        return true;
    }
}