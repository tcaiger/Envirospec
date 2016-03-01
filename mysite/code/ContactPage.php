<?php
class ContactPage extends Page {


}


class ContactPage_Controller extends Page_Controller{

	private static $allowed_actions = array(
		'ContactForm'
	);


	public function init() {
		parent::init();
		// google maps
		Requirements::javascript("http://maps.google.com/maps/api/js");
		// init maps
		Requirements::javascript("{$this->ThemeDir()}/js/map.js");
	}
	// ========================================
	// Contact Form
	// ========================================
	public function ContactForm(){

		$form = BootstrapForm::create(
			$this,
			__Function__,
			FieldList::create(
				TextField::create('Name','Name')
					->setAttribute('placeholder', 'Name'),
				EmailField::create('Email','Email Address')
					->setAttribute('placeholder', 'Email Address'),
				TextField::create('Phone','Phone Number')
					->setAttribute('placeholder', 'Phone Number'),
				TextAreaField::create('Message','Message')
					->setAttribute('placeholder', 'Message')
			),
			Fieldlist::create(
				FormAction::create('sendContactForm', 'Send Message')
						->addExtraClass('btn btn-theme-bg btn-lg')
			)
		);
		return $form;
	}

	// ========================================
	// Send Contact Form
	// ========================================
	public function sendContactForm($data, $form){
		$email = new Email();
		$email
		    ->setFrom('"Envirospec Contact Form" <envirospec@mail.co.nz>')
		    ->setTo($this->SiteConfig()->ContactFormEmail)
		    ->setSubject('Envirosec Contact Form Mesage')
		    ->setTemplate('ContactFormEmail')
		    ->populateTemplate(new ArrayData(array(
		        'Name' => $data['Name'],
		        'Phone' =>  $data['Phone'],
		        'Email' =>  $data['EmailAddress'],
		        'Message' =>  $data['Message'],
		    )));

		$email->send();

		return $this->redirectback();
	}


}