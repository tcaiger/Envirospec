<?php

class ExpiryController extends Controller {

    private static $allowed_actions = array(
        'index'
    );

    function index() {
        echo "\n Expiry Controller \n -------------------------\n\n";

        $certificates = Certificate::get()
            ->exclude(array(
                'NoExpiry' => true
            ))->exclude(array(
                'Type' => 'Green Building Rating Compatibility'
            ))->exclude(array(
                'Product.Title' => ''
            ))->sort('ID','DESC');

        echo 'There are ' . count($certificates) . ' certificates in total' . "\n";

        $todays_date = date("Y-m-d");
        $expired = new ArrayList();

        // Loop through all the certificates and check the expiry date
        foreach ($certificates as $certificate) {

            if ($certificate->ValidUntil <= $todays_date) {
                $expired->push($certificate);
            }
        }

        // If there are expired certifcates, email the results
        if ($expired->Count() > 0) {

            echo 'There are ' . $expired->Count() . ' expired certificates' . "\n\n";

            $email = new Email();
            $recipiants = 'caigertom@gmail.com';
            $email
                ->setFrom('"Envirospec Certificate Expiry System" <envirospec@mail.co.nz>')
                ->setTo($recipiants)
                ->setSubject('Envirospec Certificate Expiry System')
                ->setTemplate('ExpiredCertificates')
                ->populateTemplate(new ArrayData(array(
                    'ExpiredCertificates' => $expired,
                    'Date'                => $todays_date
                )));

            $email->send();

        }
    }


}