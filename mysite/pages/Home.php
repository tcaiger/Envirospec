<?php

class Home extends Page{

	static $icon = 'mysite/icons/Home';

	private static $db = array (
		'Subheading' => 'Varchar(100)',
		'WelcomeHeading' => 'Varchar(100)',
		'WelcomeText' => 'Text',
		'SummaryHeading' => 'Varchar(100)',
		'SummaryText' => 'Text',
		'Btn1Heading' => 'Varchar(40)',
		'Btn1Text' => 'Varchar(40)',
		'Btn2Heading' => 'Varchar(40)',
		'Btn2Text' => 'Varchar(40)',
		'Btn3Heading' => 'Varchar(40)',
		'Btn3Text' => 'Varchar(40)',
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

	private static $has_one = array(
		'CoverImage' => 'Image',
		'Btn1Image' => 'Image',
		'Btn2Image' => 'Image',
		'Btn3Image' => 'Image',
		'VideoImage' => 'Image',
	);


	public function getCMSFields() {

		$fields = parent::getCMSFields();
		$fields->removeByName('Content');
		$fields->addFieldsToTab('Root.Main', array (
			TextField::create('Subheading'),
			UploadField::create('CoverImage', 'Cover Image'),
			TextField::create('WelcomeHeading'),
			TextAreaField::create('WelcomeText'),
			TextField::create('SummaryHeading', 'Envirospec Summary Heading'),
			TextAreaField::create('SummaryText', 'Envirospec Summary Text'),
			UploadField::create('VideoImage', 'Video Image')


		), 'Metadata');


		$fields->addFieldsToTab('Root.Buttons', array(
			TextField::create('Btn1Heading', 'Left Button Heading'),
			TextField::create('Btn1Text', 'Left Button Text'),
			UploadField::create('Btn1Image', 'Left Button Image'),
			TextField::create('Btn2Heading', 'Center Button Heading'),
			TextField::create('Btn2Text', 'Center Button Text'),
			UploadField::create('Btn2Image', 'Center Button Image'),
			TextField::create('Btn3Heading', 'Right Button Heading'),
			TextField::create('Btn3Text', 'Right Button Text'),
			UploadField::create('Btn3Image', 'Right Button Image')
		));

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


}