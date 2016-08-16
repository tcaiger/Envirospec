<?php

class ProductImageExtension extends DataExtension {
    private static $has_one = array('ProductPhotos' => 'Product');

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