<?php


class AdminInfoPage extends Page {

}


class AdminInfoPage_Controller extends Page_Controller {

    /*
    * Print Certificates
    * */
    public function printCertificates() {
        $certificates = Certificate::get();

        return $certificates;
    }

}