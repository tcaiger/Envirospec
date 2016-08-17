<?php

class LogoImageExtension extends DataExtension {

    private static $has_one = array('CompanyLogos' => 'GreenstarSearch');

    function canCreate($member = null) {
        return true;
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