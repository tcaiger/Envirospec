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
		
	}
}


