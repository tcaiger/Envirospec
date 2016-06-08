<?php

class ExpiryController extends Controller {

    public $Admin = null;
    public $TodaysDate = null;

    private static $allowed_actions = array(
        'index'
    );

    function index() {
        echo "\n Expiry Controller \n -------------------------\n\n";

        $this->TodaysDate = date("Y-m-d");
        $this->Admin = SiteConfig::current_site_config()->ContactFormEmail;

        $WarningList = new ArrayList();
        $ExpiredList = new ArrayList();
        $FinalList = new ArrayList();


        // Get certificates
        $certificates = Certificate::get()
            ->exclude(array(
                'NoExpiry' => true
            ))->exclude(array(
                'Type' => 'Green Building Rating Compatibility'
            ))->exclude(array(
                'Product.Title' => ''
            ))
            ->filter(array(
                'Product.Title' => 'Test Product'
            ));

        echo 'There are ' . count($certificates) . ' certificates in total' . "\n";

        // Loop through all the certificates and check the expiry date
        foreach ($certificates as $certificate) {

            if ($certificate->ValidUntil - 28 <= $this->TodaysDate) {

                $WarningList->push($certificate);
                $member = $this->GetMember($certificate);
                $this->WarningEmail($certificate, $member);

            } else if ($certificate->ValidUntil <= $this->TodaysDate) {

                $ExpiredList->push($certificate);
                $member = $this->GetMember($certificate);
                $this->ExpiredEmail($certificate, $member);

            } else if ($certificate->ValidUntil + 31 <= $this->TodaysDate) {

                $FinalList->push($certificate);
                $member = $this->GetMember($certificate);
                $this->FinalEmail($certificate, $member);
            }
        }

        // If there are updates, send a summary to admin
        //if ($WarningList->Count() > 0 || $ExpiredList->Count() > 0 || $FinalList->Count() > 0) {
        //    $this->SummaryEmail($WarningList, $ExpiredList, $FinalList);
        //}
    }

    /*
     * Gets member relating to certifcate
    */
    public function GetMember($certificate) {

        $member = null;
        if ($ID = $certificate->CompaniesID) {
            $member = $member->get()->byID($ID);
        } else {
            if ($ID = $certificate->Product()->ManufacturerID) {
                $member = $member->get()->byID($ID);
            } else if ($ID = $certificate->Product()->SupplierID) {
                $member = $member->get()->byID($ID);
            }
        }

        return $member;
    }

    /*
    *  Sends Warning Email
   */
    public function WarningEmail($certificate, $member) {

        $email = new Email();
        $recipiants = 'caigertom@gmail.com';
        $email
            ->setFrom('"Envirospec Certificate Expiry System" <envirospec@mail.co.nz>')
            ->setTo($recipiants)
            ->setSubject('Envirospec Certificate Almost Expired')
            ->setTemplate('WarningEmail')
            ->populateTemplate(new ArrayData(array(
                'Certificate' => $certificate,
                'Date'        => $this->TodaysDate
            )));

        $email->send();
        echo 'success';
    }

    /*
    * Sends Expired Email
   */
    public function ExpiredEmail($certificate, $member) {

        $email = new Email();
        $recipiants = SiteConfig()->ContactFormEmail . "," . $member->email;
        $email
            ->setFrom('"Envirospec Certificate Expiry System" <envirospec@mail.co.nz>')
            ->setTo($recipiants)
            ->setSubject('Envirospec Certificate Expired')
            ->setTemplate('ExpiredEmail')
            ->populateTemplate(new ArrayData(array(
                'Certificate' => $certificate,
                'Member'      => $member,
                'Date'        => $todays_date
            )));

        $email->send();
    }

    /*
    * Sends Final Email
   */
    public function FinalEmail($certificate, $member) {

        $email = new Email();
        $recipiants = SiteConfig()->ContactFormEmail . "," . $member->email;
        $email
            ->setFrom('"Envirospec Certificate Expiry System" <envirospec@mail.co.nz>')
            ->setTo($recipiants)
            ->setSubject('Envirospec Certificate Expired By 30 Days')
            ->setTemplate('FinalEmail')
            ->populateTemplate(new ArrayData(array(
                'Certificate' => $certificate,
                'Member'      => $member,
                'Date'        => $todays_date
            )));

        $email->send();
    }

    public function SummaryEmail($warning, $expired, $final) {

        echo 'There are ' . $warning->Count() . ' warning certificates' . "\n\n";
        echo 'There are ' . $expired->Count() . ' expired certificates' . "\n\n";
        echo 'There are ' . $final->Count() . ' final cut off certificates' . "\n\n";

        $email = new Email();
        $recipiants = 'caigertom@gmail.com';
        $email
            ->setFrom('"Envirospec Certificate Expiry System" <envirospec@mail.co.nz>')
            ->setTo($recipiants)
            ->setSubject('Envirospec Certificate Expiry System')
            ->setTemplate('ExpiredCertificates')
            ->populateTemplate(new ArrayData(array(
                'Certificate' => $certificate,
                'Member'      => $member,
                'Date'        => $todays_date
            )));

        $email->send();

    }

}