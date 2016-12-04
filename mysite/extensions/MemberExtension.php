<?php

class MemberExtension extends DataExtension {

    private static $has_one = array(
        'Companies' => 'Companies'
    );

    private static $summary_fields = [
        'FirstName'      => 'FirstName',
        'Surname'        => 'Surname',
        'Email'          => 'Email',
        'Companies.Name' => 'Company',
        'GroupTitle'   => 'Group'
    ];

    public function GroupTitle(){
        return $this->owner->Groups()->First()->Title;
    }


    public function updateSummaryFields(&$fields) {
        $fields = Config::inst()->get($this->class, 'summary_fields');
    }

    public function updateCMSFields(FieldList $currentFields) {

        $currentFields->insertBefore("Email",
            DropdownField::create('CompaniesID', 'Company',
                Companies::get()->map('ID', 'Title'))
                ->setEmptyString('(Select One)')
        );
    }
}