<?php

class Home extends Page{

	private static $db = array (
		'Subheading' => 'Varchar(100)',
		'WelcomeHeading' => 'Varchar(100)',
		'WelcomeText' => 'Text',
		'SummaryHeading' => 'Varchar(100)',
		'SummaryText' => 'Text',
		'KeyPoint1' => 'Varchar',
		'KeyPoint2' => 'Varchar',
		'KeyPoint3' => 'Varchar',
		'KeyPoint4' => 'Varchar',
		'KeyPoint5' => 'Varchar',
		'KeyPoint6' => 'Varchar',
		'KP1Text' => 'Varchar(130)',
		'KP2Text' => 'Varchar(130)',
		'KP3Text' => 'Varchar(130)',
		'KP4Text' => 'Varchar(130)',
		'KP5Text' => 'Varchar(130)',
		'KP6Text' => 'Varchar(130)'
	);


	public function getCMSFields() {

		$fields = parent::getCMSFields();
		$fields->removeByName('Content');
		$fields->addFieldsToTab('Root.Main', array (
			TextField::create('Subheading'),
			TextField::create('WelcomeHeading'),
			TextAreaField::create('WelcomeText'),
			TextField::create('SummaryHeading', 'Envirospec Summary Heading'),
			TextAreaField::create('SummaryText', 'Envirospec Summary Text'),
			

		), 'Metadata');

		$fields->addFieldsToTab('Root.KeyPoints', array(
			TextField::create('KeyPoint1', 'Item 1 Heading'),
			TextAreaField::create('KP1Text', 'Item 1 Text'),
			TextField::create('KeyPoint2', 'Item 2 Heading'),
			TextAreaField::create('KP2Text', 'Item 2 Text'),
			TextField::create('KeyPoint3', 'Item 3 Heading'),
			TextAreaField::create('KP3Text', 'Item 3 Text'),
			TextField::create('KeyPoint4', 'Item 4 Heading'),
			TextAreaField::create('KP4Text', 'Item 4 Text'),
			TextField::create('KeyPoint5', 'Item 5 Heading'),
			TextAreaField::create('KP5Text', 'Item 5 Text'),
			TextField::create('KeyPoint6', 'Item 6 Heading'),
			TextAreaField::create('KP6Text', 'Item 6 Text')

		));

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