<?php

class ContactPage extends Page
{
    public function getCMSFields() {

        $fields = parent::getCMSFields();
        $fields->removeByName('Content');

        return $fields;
    }

}


class ContactPage_Controller extends Page_Controller
{

    private static $allowed_actions = array(
        'ContactForm'
    );

    // ========================================
    // Contact Form
    // ========================================
    public function ContactForm()
    {

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
    public function sendContactForm($data, $form)
    {
        $recipiants = $this->SiteConfig()->ContactFormEmail . ",tom@weareonfire.co.nz";

        $email = new Email();
        $email
            ->setFrom('"Envirospec Contact Form" <envirospec@mail.co.nz>')
            ->setTo($recipiants)
            ->setSubject('Envirospec Contact Form Message')
            ->setTemplate('ContactFormEmail')
            ->populateTemplate(new ArrayData(array(
                'Name'    => $data['Name'],
                'Phone'   => $data['Phone'],
                'Email'   => $data['Email'],
                'Message' => $data['Message'],
            )));

        $email->send();

        $form->sessionMessage("Your enquiry has been sent. You will receive a response from the Envirospec team as possible.", 'good');

        return $this->redirectback();
    }
}