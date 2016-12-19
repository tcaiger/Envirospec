<?php


class DeclarationTask extends BuildTask {

    protected $title = 'Declarations Task';
    protected $description = 'Sends an email to all users which content asking them to review their product content.';
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

        $sent = new ArrayList;
        $notSent = new ArrayList;

        $members = $this->getMembers();

        foreach ($members as $member) {
            $email = $mail->DeclarationEmails($member);

            $data = new ArrayData(array(
                'Member' => $member
            ));

            if ($email) {
                $this->writeDeclaration($member);
                $sent->push($data);
            } else {
                $notSent->push($data);
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

    private function getMembers() {
        //$members = Member::get()->filterByCallback(function ($item) {
        //    if ($item->inGroup('Members') || $item->inGroup('Manufacturers & Suppliers')) {
        //        return $item;
        //    }
        //});

        $members = Member::get()->filter('FirstName', 'Test Member');
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