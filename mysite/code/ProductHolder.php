<?php

class ProductHolder extends Page{

	private static $has_many = array (
		'ProductCategories' => 'ProductCategory'
	);

	static $icon = 'mysite/icons/BlueDatabase';

	private static $allowed_children = array (
		'ProductCategory',
		'Product'
	);

	public function getCMSFields() {

		$fields = parent::getCMSFields();
		$fields->removeByName('Content');
		$fields->removeByName('Metadata');

		return $fields;
	}
	
}

class ProductHolder_Controller extends Page_Controller{



}