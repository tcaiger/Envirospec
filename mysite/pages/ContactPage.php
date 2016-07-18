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

        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'caigertom@gmail.com';
        $mail->Password = 'quetza1!';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->From = 'admin@envirospec.com';
        $mail->FromName = "Envirospec Admin";

        $mail->addAddress('caigertom@gmail.com');
        $mail->addReplyTo('reply@envirospec.com');
        $mail->addCC('tom@weareonfire.co.nz');

        $mail->isHTML(true);

        $mail->Subject ='Envirospec Contact Form';
        $mail->Body = '<h1>Envirospec Contact Form Message.</h1><p>This is the body text</p>';
        $mail->AltBody = 'This is the plain text version of the email body';

        if(!$mail->send()){
            echo 'Mailer Error:'. $mail->ErrorInfo;
            //$form->sessionMessage("There has been a problem with the form.", 'bad');
        }else{
            //echo 'Message has been sent successfully';
            $form->sessionMessage("Your enquiry has been sent. You will receive a response from the Envirospec team as soon as possible.", 'good');
            return $this->redirectback();
        }

    }
}
