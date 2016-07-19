<?php

class ExpiryController extends Controller {


    private static $allowed_actions = array(
        'index'
    );

    function init() {
        parent::init();

        echo "\n Expiry Controller \n -------------------------\n\n";
    }

    public function index(){
        $certificates = $this->GetCertificates();
        $this->CheckExpiry($certificates);
        return true;
    }



    // =======================================
    // Get Certificates
    // =======================================
    public function GetCertificates(){

        $certificates = Certificate::get()
            ->exclude(array(
                'NoExpiry' => true
            ))->exclude(array(
                'Type' => 'Green Building Rating Compatibility'
            ))->exclude(array(
                'Product.Title' => '',
            ))->exclude(array(
                 'ValidUntil' => ''
            ))->filter(array(
                'Name' => 'Test Certificate'
            ));

        echo 'There are ' . count($certificates) . ' certificates in total' . "\n <br>";

        return $certificates;
    }


    // =======================================
    // Get Certificates
    // =======================================
    public function CheckExpiry($certificates){

        $mail = new MailController;

        $WarningList = new ArrayList();
        $ExpiredList = new ArrayList();
        $FinalList = new ArrayList();



        foreach ($certificates as $certificate) {

            $expiry = strtotime($certificate->ValidUntil);

            if ($expiry > strtotime('0 Days') && $expiry < strtotime('30 Days')) {
                $WarningList->push($certificate);
                if($member = $this->GetMember($certificate)){
                    $mail->WarningEmail($certificate, $member);
                }else{
                   echo 'For Warning Email. Member Could Not Be Found';
                }

            } else if ($expiry > strtotime('-30 Days') && $expiry <= strtotime('0 Days')) {

                $ExpiredList->push($certificate);
                if($member = $this->GetMember($certificate)){
                    $mail->ExpiredEmail($certificate, $member);
                }else{
                    echo 'For Expired Email. Member Could Not Be Found';
                }

            } else if ($expiry < strtotime('-30 Days')) {

                $FinalList->push($certificate);
                if($member = $this->GetMember($certificate)){
                    $mail->FinalEmail($certificate, $member);
                }else{
                    echo 'For Final Email. Member Could Not Be Found';
                }
            }
        }
    }


    // =======================================
    // Gets member relating to certificate
    // =======================================
    public function GetMember($certificate) {

        $member = null;
        if ($ID = $certificate->CompaniesID) {
            $member = DataObject::get_by_id('Companies', $ID);
        } else {
            if ($ID = $certificate->Product()->ManufacturerID) {
                $member = DataObject::get_by_id('Companies', $ID);

            } else if ($ID = $certificate->Product()->SupplierID) {
                $member = DataObject::get_by_id('Companies', $ID);
            }
        }
        return $member;
    }



}