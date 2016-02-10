<?php

class RatingToolHolder extends Page{

	static $defaults = array (
		'ShowInMenus' => false,
		'ShowInSearch' => false
	);

	static $icon = 'mysite/icons/star';

	private static $allowed_children = array (
		'RatingTool'
	);

	public function getCMSFields() {

		$fields = parent::getCMSFields();
		$fields->removeByName('Content');
		$fields->removeByName('Metadata');

		return $fields;
	}

	// function canView($member = null) {
		
	// 	return $member->inGroup('administrators');
	// }
	
}

class RatingToolHolder_Controller extends Page_Controller{



}