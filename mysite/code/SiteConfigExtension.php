<?php


class SiteConfigExtension extends DataExtension {

	private static $allowed_actions = array (
 		'sendOneOffEmail'
 	);


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

		$fields->addFieldsToTab('Root.Emails', array(
			LabelField::create('Label1', 'Automated Reminder Emails')->addExtraClass('customBold'),
			LabelField::create('Label2', 'Will be sent to all product suppliers to inform them that they need to review and sign off theit products.'),
			ToggleCompositeField::create('Month', 'One Month Reminder Email', array (

				DateField::create('MonthReminderDate', 'Date')->setConfig('showcalendar', true),
				HTMLEditorField::create('MonthReminderText', 'Email Message')
			))->setStartClosed(true),
			ToggleCompositeField::create('Week', 'Two Week Reminder Email', array (

				DateField::create('WeekReminderDate', 'Date')->setConfig('showcalendar', true),
				HTMLEditorField::create('WeekReminderText', 'Email Message')
			)),
			ToggleCompositeField::create('Final', 'Final Reminder Email', array (

				DateField::create('FinalReminderDate', 'Date')->setConfig('showcalendar', true),
				HTMLEditorField::create('FinalReminderText', 'Email Message')
			)),
			LabelField::create('Label3', 'One Off Email')->addExtraClass('customBold'),
			LabelField::create('Label4', 'Will be sent to all product suppliers.'),
			ToggleCompositeField::create('Custom', 'One Off Email', array (
				HTMLEditorField::create('CustomText', 'Email Message'),
				FormAction::create('sendOneOffEmail', 'Send Email')
			))->setStartClosed(true)
		));
	}


	// ========================================
 	// Send Contact Form
 	// ========================================
 	public function sendOneOffEmail($data, $form){
 		$email = new Email();
 		$email
 		    ->setFrom('"Envirospec Contact Form" <envirospec@mail.co.nz>')
 		    ->setTo($this->SiteConfig()->ContactFormEmail)
 		    ->setSubject('Envirospec Contact Form Message')
 		    ->setTemplate('ContactFormEmail')
 		    ->populateTemplate(new ArrayData(array(
 		        'Name' => 'Bob Jones'
 		)));
	
 		$email->send();
 
 		return $this->redirectback();
 	}
}


