<?php

class MailController extends Controller {

    public $systemEmail;
    public $contactEmail;
    public $contactEmailCC;

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

        $this->systemEmail =  SiteConfig::current_site_config()->ExpirySystemEmail;
        $this->contactEmail = SiteConfig::current_site_config()->ContactFormEmail;
        $this->contactEmailCC = SiteConfig::current_site_config()->ContactFormCC;

        $mail->isHTML(true);

        return $mail;
    }


    // ========================================
    // Contact Form Email
    // ========================================
    Public Function ContactFormEmail($data) {
        $mail = $this->setup();

        $mail->addAddress($this->contactEmail);
        $mail->addReplyTo($this->contactEmail);
        $mail->addCC($this->contactEmailCC);

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
    Public Function ProductFormEmail($data, $member) {
        $mail = $this->setup();

        $mail->addAddress($member->Email);
        $mail->addReplyTo($this->systemEmail);
        $mail->addCC($this->systemEmail);

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

        $mail->addAddress($member->Email);
        $mail->addReplyTo($this->systemEmail);
        $mail->addCC($this->systemEmail);

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

        $mail->addAddress($member->Email);
        $mail->addReplyTo($this->systemEmail);
        $mail->addCC($this->systemEmail);

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

        $mail->addAddress($member->Email);
        $mail->addReplyTo($this->systemEmail);
        $mail->addCC($this->systemEmail);

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


    // ========================================
    // Sends Certificate Upload Email
    // ========================================
    public function CertificateUploadEmail($certificate, $member) {

        $mail = $this->setup();

        $mail->addAddress($this->systemEmail);
        $mail->addReplyTo($this->systemEmail);
        $mail->addCC( $this->systemEmail);

        $mail->Subject = 'Envirospec Certificate Upload';

        $arraydata = new ArrayData(array(
            'FirstName' => $member,
            'Certificate' => $certificate
        ));

        $body = $arraydata->renderWith('CertificateUpload');

        $mail->MsgHTML($body);

        if ( ! $mail->send()) {
            return false;
        } else {
            return true;
        }
    }

    // ========================================
    // Sends Declaration Email To All Members
    // ========================================
    public function DeclarationEmails($data, $member) {

        $mail = $this->setup();

        $mail->addAddress($member->Email);
        $mail->addReplyTo($this->systemEmail);
        $mail->addCC($this->systemEmail);

        $mail->Subject = 'Envirospec Declaration Email';

        $arraydata = new ArrayData(array(
            'FirstName' => $member->FirstName,
            'Content' => $data['EmailContent']
        ));

        $body = $arraydata->renderWith('DeclarationEmail');

        $mail->MsgHTML($body);

        if ( $mail->send()) {
            return true;
        } else {
            return false;
        }
    }

}