<?php


class AdminInfoPage extends Page {
    static $icon = 'mysite/icons/Admin';
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