<?php

class CertificateExpiryController extends Controller {

    private static $allowed_actions = array (
        'index'
    );

    function index(){
        $certificates = Certificates::get();
        $todays_date = date("Y-m-d");
        $expired = array();

        // Loop through all the certificates and check the expiry date
        foreach($certificates as $certificate){

            if($certificate->ValidUntil <= $todays_date){
                array_push($expired, $certificate);
            }
        }

        // If there are expired certifcates, email the results
        if(count($expired)){

            $recipiants = $this->SiteConfig()->ContactFormEmail;

            $email = new Email();
            $email
                ->setFrom('"Envirospec Certificate Expiry System" <envirospec@mail.co.nz>')
                ->setTo($recipiants)
                ->setSubject('Envirospec Certificate Expiry System')
                ->setTemplate('ExpiredCertificates')
                ->populateTemplate(new ArrayData(array(
                    'Name'    => 'There are expired Certificates!'
                )));

            $email->send();

        }
    }


}