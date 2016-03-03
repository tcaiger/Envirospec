<?php


class SiteConfigExtension extends DataExtension {


	private static $db = array(
		'ESSummary' => 'Text',
		'ContactAddress' => 'Text',
		'ContactEmail' => 'Varchar',
		'ContactFormEmail' => 'Varchar',
		'ContactPhone' => 'Varchar',
		'MonthReminderDate' => 'Date',
		'MonthReminderText' => 'HTMLText',
		'WeekReminderDate' => 'Date',
		'WeekReminderText' => 'HTMLText',
		'FinalReminderDate' => 'Date',
		'FinalReminderText' => 'HTMLText',
		'OneOffEmail' => 'HTMLText'
	);

	public function updateCMSFields(Fieldlist $fields){

		$fields->addFieldsToTab('Root.Main', array(
			TextAreaField::create('ESSummary', 'Envirospec Summary'),
			TextAreaField::create('ContactAddress', 'Contact Address'),
			TextField::create('ContactEmail', 'Contact Email'),
			TextField::create('ContactFormEmail', 'Contact Form Email'),
			TextField::create('ContactPhone', 'Contact Phone')
		));
		
	}
}


