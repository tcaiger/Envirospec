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


    /**
     * @return DataList
     */
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
            ))->filterAny(array(
                'Product.Title' => 'Test Product',
                'Companies.Name' => 'New Test Company'
            ));

        echo 'There are ' . count($certificates) . ' certificates in total' . "\n <br>";

        return $certificates;
    }


    /**
     * Check al certificates against expiry dates
     *
     * @param $certificates
     * @return bool
     */
    public function CheckExpiry($certificates){

        $mail = new MailController;

        $WarningList = new ArrayList();
        $ExpiredList = new ArrayList();
        $FinalList = new ArrayList();



        foreach ($certificates as $certificate) {

            if($certificate->NoExpiry){
                break;
            }

            $expiry = strtotime($certificate->ValidUntil);

            if ($expiry > strtotime('0 Days') && $expiry < strtotime('30 Days') && !$certificate->MonthWarning) {

                if($member = $this->GetMember($certificate)){
                    $certificate->MonthWarning = 1;
                    $certificate->write();
                    $WarningList->push($certificate);
                    $mail->ExpiryEmail($certificate, $member, 'month warning');
                }else{
                   echo 'For Warning Email. Member Could Not Be Found';
                }

            } else if ($expiry > strtotime('-30 Days') && $expiry <= strtotime('0 Days') && !$certificate->ExpiredWarning) {

                if($member = $this->GetMember($certificate)){
                    $certificate->ExpiredWarning = 1;
                    $certificate->write();
                    $ExpiredList->push($certificate);
                    $mail->ExpiryEmail($certificate, $member, 'expired');
                }else{
                    echo 'For Expired Email. Member Could Not Be Found';
                }

            } else if ($expiry < strtotime('-30 Days') && !$certificate->FinalWarning) {

                if($member = $this->GetMember($certificate)){
                    $certificate->FinalWarning = 1;
                    $certificate->Status = 'Disabled';
                    $certificate->write();
                    $FinalList->push($certificate);
                    $mail->ExpiryEmail($certificate, $member, 'final');
                }else{
                    echo 'For Final Email. Member Could Not Be Found';
                }
            }
        }

        echo $WarningList->count() . ' first warning emails sent, ' . $ExpiredList->count() . ' expired emails sent and ' . $FinalList->count() . ' final warning emails sent';
        return true;
    }


    /**
     * Gets member relating to certificate
     *
     * @param $certificate
     * @return $member
     */
    public function GetMember($certificate) {

        $member = null;
        if ($ID = $certificate->CompaniesID) {
            $company = DataObject::get_by_id('Companies', $ID);
        } else {
            if ($ID = $certificate->Product()->ManufacturerID) {
                $company = DataObject::get_by_id('Companies', $ID);

            } else if ($ID = $certificate->Product()->SupplierID) {
                $company = DataObject::get_by_id('Companies', $ID);
            }
        }
        $member = $company->Member();
        return $member;
    }



}