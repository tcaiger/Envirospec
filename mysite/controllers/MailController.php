<?php

class MailController extends Controller {

    public $systemEmail;
    public $contactEmail;

    public Function init() {
        parent::init();
        $this->systemEmail =  SiteConfig::current_site_config()->ExpirySystemEmail;
        $this->contactEmail = SiteConfig::current_site_config()->ContactFormEmail;
    }


    // ========================================
    // Setup
    // ========================================
    public function setup() {
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'caigertom@gmail.com';
        $mail->Password = 'quetza1!';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->From = 'admin@envirospec.com';
        $mail->FromName = "Envirospec Admin";

        $mail->isHTML(true);

        return $mail;
    }


    // ========================================
    // Contact Form Email
    // ========================================
    Public Function ContactFormEmail($data) {
        $mail = $this->setup();

        $mail->addAddress($this->contactEmail);
        $mail->addReplyTo('reply@envirospec.com');
        $mail->addCC('tom@weareonfire.co.nz');

        $mail->Subject = 'Envirospec Contact Form';

        $arraydata = new ArrayData(array(
            'Name'    => $data['Name'],
            'Email'   => $data['Email'],
            'Phone'   => $data['Phone'],
            'Message' => $data['Message']
        ));
        $body = $arraydata->renderWith('ContactFormEmail');

        $mail->MsgHTML($body);

        if ( ! $mail->send()) {
            return false;
        } else {
            return true;
        }
    }



    // ========================================
    // Product Form Email
    // ========================================
    Public Function ProductFormEmail($data, $company) {
        $mail = $this->setup();

        $mail->addAddress($company);
        $mail->addReplyTo($company);
        $mail->addCC('tom@weareonfire.co.nz');

        $mail->Subject = 'Envirospec Product Enquiry';

        $arraydata = new ArrayData(array(
            'Name'    => $data['Name'],
            'Email'   => $data['Email'],
            'Message' => $data['Message']
        ));

        $body = $arraydata->renderWith('ProductFormEmail');

        $mail->MsgHTML($body);

        if ( ! $mail->send()) {
            return false;
        } else {
            return true;
        }
    }



    // ========================================
    // Sends Warning Email
    // ========================================
    public function WarningEmail($certificate, $member) {

        $mail = $this->setup();

        $mail->addAddress($this->systemEmail);
        $mail->addReplyTo('caigertom@gmail.com');
        $mail->addCC('tom@weareonfire.co.nz');

        $mail->Subject = 'Envirospec Document Expiry System';

        $arraydata = new ArrayData(array(
            'Certificate' => $certificate,
            'Member'      => $member,
            'Date'        => date("Y-m-d"),
        ));

        $body = $arraydata->renderWith('WarningEmail');

        $mail->MsgHTML($body);

        if ( ! $mail->send()) {
            return false;
        } else {
            return true;
        }
    }




    // ========================================
    // Sends Expired Email
    // ========================================
    public function ExpiredEmail($certificate, $member) {

        $mail = $this->setup();

        $mail->addAddress($this->systemEmail);
        $mail->addReplyTo('caigertom@gmail.com');
        $mail->addCC('tom@weareonfire.co.nz');

        $mail->Subject = 'Envirospec Document Expiry System';

        $arraydata = new ArrayData(array(
            'Certificate' => $certificate,
            'Member'      => $member,
            'Date'        => date("Y-m-d"),
        ));

        $body = $arraydata->renderWith('ExpiredEmail');

        $mail->MsgHTML($body);

        if ( ! $mail->send()) {
            return false;
        } else {
            return true;
        }
    }




    // ========================================
    // Sends Final Email
    // ========================================
    public function FinalEmail($certificate, $member) {

        $mail = $this->setup();

        $mail->addAddress($this->systemEmail);
        $mail->addReplyTo('caigertom@gmail.com');
        $mail->addCC('tom@weareonfire.co.nz');

        $mail->Subject = 'Envirospec Document Expiry System';

        $arraydata = new ArrayData(array(
            'Certificate' => $certificate,
            'Member'      => $member,
            'Date'        => date("Y-m-d"),
        ));

        $body = $arraydata->renderWith('FinalEmail');

        $mail->MsgHTML($body);

        if ( ! $mail->send()) {
            return false;
        } else {
            return true;
        }
    }

}