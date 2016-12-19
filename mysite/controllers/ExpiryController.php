<?php

class ExpirySystemTask extends BuildTask {

    protected $title = 'Expiry System Task';
    protected $description = 'Checks certificates for expiry. Run daily by cron job.';
    protected $enabled = true;

    function run($request) {

        echo "-------------------------<br>Expiry Controller <br>-------------------------<br>";

        $certificates = $this->getCertificates();
        $companyCertificates = $this->getCompanyCertificates();
        $this->CheckExpiry($certificates, 'general');
        $this->CheckExpiry($companyCertificates, 'company');
    }


    /**
     * Check al certificates against expiry dates
     *
     * @param $certificates
     * @return bool
     */
    public function CheckExpiry($certificates, $type) {

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

        if ($type == 'company') {
            echo '<p><strong>Company Certificate Results</strong></p>';
        } else {
            echo '<p><strong>Product Certificates Results</strong></p>';
        }

        echo $WarningList->count() . ' first warning emails sent, ' . $ExpiredList->count() . ' expired emails sent and ' . $FinalList->count() . ' final warning emails sent';

        return true;
    }


    /**
     * @return DataList
     */
    public function getCompanyCertificates() {

        $certificates = Certificate::get()
            ->filter([
                'Companies.Name' => 'Test Company',
            ])
            ->exclude(['NoExpiry' => true])
            ->exclude(['Type' => 'Green Building Rating Compatibility'])
            ->exclude(['ValidUntil' => '']);


        echo "There are " . count($certificates) . " company certificates being checked. <br>";

        return $certificates;
    }


    /**
     * @return DataList
     */
    public function getCertificates() {

        $products = Product::get()->filter([
            'Manufacturer.Name' => 'Test Company',
            'Supplier.Name'     => 'Test Company'
        ]);


        $productIDs = [];

        foreach ($products as $product) {
            array_push($productIDs, $product->ID);
        }


        $certificates = Certificate::get()
            ->filterAny([
                'Product.ID'     => $productIDs
            ])
            ->exclude(['NoExpiry' => true])
            ->exclude(['Type' => 'Green Building Rating Compatibility'])
            ->exclude(['ValidUntil' => '']);

        echo "There are " . count($certificates) . " product certificates being checked. <br>";

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