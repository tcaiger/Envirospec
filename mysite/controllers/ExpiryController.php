<?php

class ExpirySystemTask extends BuildTask {

    protected $title = 'Expiry System Task';
    protected $description = 'Checks certificates for expiry. Run daily by cron job.';
    protected $enabled = true;

    function run($request) {
        $certificates = $this->GetCertificates();
        $this->CheckExpiry($certificates);
    }


    /**
     * Check al certificates against expiry dates
     *
     * @param $certificates
     * @return bool
     */
    public function CheckExpiry($certificates) {

        $mail = new MailController;

        $WarningList = new ArrayList();
        $ExpiredList = new ArrayList();
        $FinalList = new ArrayList();


        foreach ($certificates as $certificate) {

            if ($certificate->NoExpiry) {
                break;
            }

            $expiry = strtotime($certificate->ValidUntil);

            if ($expiry > strtotime('0 Days') && $expiry < strtotime('30 Days') && ! $certificate->MonthWarning) {

                if ($member = $this->GetMember($certificate)) {
                    $certificate->MonthWarning = 1;
                    $certificate->write();
                    $WarningList->push($certificate);
                    $mail->ExpiryEmail($certificate, $member, 'month warning');
                } else {
                    echo 'For Warning Email. Member Could Not Be Found';
                }

            } else if ($expiry > strtotime('-30 Days') && $expiry <= strtotime('0 Days') && ! $certificate->ExpiredWarning) {

                if ($member = $this->GetMember($certificate)) {
                    $certificate->ExpiredWarning = 1;
                    $certificate->write();
                    $ExpiredList->push($certificate);
                    $mail->ExpiryEmail($certificate, $member, 'expired');
                } else {
                    echo 'For Expired Email. Member Could Not Be Found';
                }

            } else if ($expiry < strtotime('-30 Days') && ! $certificate->FinalWarning) {

                if ($member = $this->GetMember($certificate)) {
                    $certificate->FinalWarning = 1;
                    $certificate->Status = 'Disabled';
                    $certificate->write();
                    $FinalList->push($certificate);
                    $mail->ExpiryEmail($certificate, $member, 'final');
                } else {
                    echo 'For Final Email. Member Could Not Be Found';
                }
            }
        }

        echo $WarningList->count() . ' first warning emails sent, ' . $ExpiredList->count() . ' expired emails sent and ' . $FinalList->count() . ' final warning emails sent';

        return true;
    }


    /**
     * @return DataList
     */
    public function GetCertificates() {


        $products = Product::get()->filter([
            'Manufacturer.Name' => 'Test Company',
            'Supplier.Name' => 'Test Company'
        ]);


        $productIDs = [];

        foreach ($products as $product){
            array_push($productIDs, $product->ID);
        }


        $certificates = Certificate::get()
            ->filterAny([
                'Product.ID'=> $productIDs,
                'Companies.Name' => 'Test Company',
                'Companies.Name' => 'New test company'
            ])
            ->exclude(['NoExpiry' => true])
            ->exclude(['Type' => 'Green Building Rating Compatibility'])
            ->exclude(['Product.Title' => ''])
            ->exclude(['ValidUntil' => '']);



        echo "-------------------------<br>
               Expiry Controller <br>
              -------------------------<br>
                There are " . count($certificates) . " certificates in total. <br>";

        return $certificates;
    }


    /**
     *  Gets member relating to certificate
     *
     * @param $certificate
     * @return null
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
        $member = Member::get()->filter('CompaniesID', $company->ID)->First();

        return $member;
    }


}