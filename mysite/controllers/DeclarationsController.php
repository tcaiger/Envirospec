<?php


class DeclarationTask extends BuildTask {

    protected $title = 'Declarations Task';
    protected $description = 'Emails all Manufacturers and Suppliers requesting them to review their content and sets up a declaration form in their members area. <br> Declarations are also recorded in the Declarations tab of the admin area.';

    protected $enabled = true;

    function run($request) {
        echo "-------------------------<br>Declaration Emails <br>-------------------------<br>";

        $this->sendEmails();
    }


    /**
     * @return bool
     */
    public function sendEmails() {

        $mail = new MailController;

        $sent = 0;

        $members = $this->getMembers();

        foreach ($members as $member) {

            $email = $mail->DeclarationEmails($member);

            if ($email) {
                $this->writeDeclaration($member);
                $sent++;
            }
        }

        $this->displayResults($sent);

        return true;

    }


    /**
     * @param $member
     * @return Declaration
     */
    private function writeDeclaration($member) {

        $declaration = new Declaration();
        $declaration->Year = '2016';
        $declaration->Confirmed = false;
        $declaration->CompaniesID = $member->Companies()->ID;
        $declaration->write();

        return $declaration;
    }

    /**
     * Gets member list for sending emails to and creating declarations for
     *
     * @return DataList
     */
    private function getMembers() {
        //$members = Member::get()->filterByCallback(function ($item) {
        //    if ($item->inGroup('Members') || $item->inGroup('Manufacturers & Suppliers')) {
        //        return $item;
        //    }
        //});

        $members = Member::get()->filter('FirstName', 'Test supplier');
        return $members;
    }

    /**
     * @param $sent
     * @return bool
     */
    private function displayResults($sent) {

        echo count($sent) . " declaration emails were sent. <br>";
        return true;
    }

}