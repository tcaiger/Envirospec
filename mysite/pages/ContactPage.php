<?php

//require_once 'vendor/autoload.php';

class ContactPage extends Page {
    public function getCMSFields() {

        $fields = parent::getCMSFields();
        $fields->removeByName('Content');

        return $fields;
    }

}


class ContactPage_Controller extends Page_Controller {


    private static $allowed_actions = array(
        'ContactForm'
    );



    // ========================================
    // Contact Form
    // ========================================
    public function ContactForm() {

        $form = BootstrapForm::create(
            $this,
            __Function__,
            FieldList::create(
                TextField::create('Name', 'Name')
                    ->setAttribute('placeholder', 'Name'),
                EmailField::create('Email', 'Email Address')
                    ->setAttribute('placeholder', 'Email Address'),
                TextField::create('Phone', 'Phone Number')
                    ->setAttribute('placeholder', 'Phone Number'),
                TextAreaField::create('Message', 'Message')
                    ->setAttribute('placeholder', 'Message')
            ),
            Fieldlist::create(
                FormAction::create('sendContactForm', 'Send Message')
                    ->addExtraClass('btn btn-theme-bg btn-lg')
            )
        );

        $required = new RequiredFields(array(
            'Name', 'Email', 'Phone', 'Message'
        ));

        $form->setValidator($required);

        return $form;
    }



    // ========================================
    // Send Contact Form
    // ========================================
    public function sendContactForm($data, $form) {

        $mail = new MailController;

        if($mail->ContactFormEmail($data)){
            $form->sessionMessage("Your enquiry has been sent. You will receive a response from the Envirospec team as soon as possible.", 'good');
        }else{
            $form->sessionMessage("There was a problem with the form. Please try again.", 'bad');
        }
        return $this->redirectback();
    }

}
