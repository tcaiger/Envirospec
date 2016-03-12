<?php

class AvailableCredit extends Page{

	private static $db = array (
		'Points' => 'Varchar',
		'Description' => 'Text'
	);

	private static $can_be_root = false;

	private static $has_many = array (
		'Credits' => 'Credit'
	);

	static $defaults = array (
		'ShowInMenus' => false,
		'ShowInSearch' => false
	);

	private static $allowed_children = array (
		'AvailableCredit'
	);
	
	static $icon = 'mysite/icons/GreenFile';


	public function getCMSFields() {

		$fields = parent::getCMSFields();
		$fields->removeByName('Content');
		$fields->removeByName('Metadata');

		$fields->addFieldsToTab('Root.Main', array (
			TextField::create('Points', 'Points Available'),
			TextAreaField::create('Description', 'Description')
		));

		return $fields;
	}
}

class AvailableCredit_Controller extends Page_Controller{



}