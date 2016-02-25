<?php

class Home extends Page{

	private static $db = array (
		'Subheading' => 'Varchar(100)'
	);

	
	private static $has_one = array (
		'Photo' => 'Image'
	);

	public function getCMSFields() {

		$fields = parent::getCMSFields();
		$fields->addFieldsToTab('Root.Main', array (
			TextField::create('Subheading')
		), 'Content');

		$fields->addFieldToTab('Root.Attachments', $photo = UploadField::create('Photo'));

		return $fields;
	}

}

class Home_Controller extends Page_Controller{

	public function init() {
		parent::init();

		Requirements::css("https://fonts.googleapis.com/css?family=Raleway:400,500,900");
		Requirements::css("{$this->ThemeDir()}/css/jquery.flipster.min.css");
	    Requirements::javascript("{$this->ThemeDir()}/js/jquery.flipster.min.js");
	    Requirements::javascript("{$this->ThemeDir()}/js/YTBVideo.js");
	    Requirements::javascript("{$this->ThemeDir()}/js/custom-home.js");

	}

}