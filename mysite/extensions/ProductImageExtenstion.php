<?php

class ProductImageExtension extends DataExtension {
        private static $has_one = array('ProductPhotos' => 'Product');
}