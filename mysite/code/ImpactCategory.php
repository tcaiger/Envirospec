<?php

class ImpactCategory extends Page{

	static $defaults = array (
		'ShowInMenus' => false,
		'ShowInSearch' => false
	);
	
	private static $can_be_root = false;

	private static $allowed_children = array (
		'ImpactCategory',
		'AvailableCredit'
	);

	static $icon = 'mysite/icons/GreenCategory';

	public function getCMSFields() {

		$fields = parent::getCMSFields();
		$fields->removeByName('Content');
		$fields->removeByName('Metadata');

		return $fields;
	}
	
}

class ImpactCategory_Controller extends Page_Controller{



}