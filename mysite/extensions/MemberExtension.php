<?php

class MemberExtension extends DataExtension {

    private static $has_one = array(
        'Companies' => 'Companies'
    );

    public function updateCMSFields(FieldList $currentFields) {

        $currentFields->renameField("FirstName", "Username");
        $currentFields->removeByName("Surname");

        $currentFields->insertBefore("Email",
            DropdownField::create('CompaniesID', 'Company',
                Companies::get()->map('ID', 'Title'))
                ->setEmptyString('(Select One)')
        );
    }
}