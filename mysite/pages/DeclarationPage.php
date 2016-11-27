<?php

class DeclarationPage extends Page {
    static $icon = 'mysite/icons/Admin';

}


class DeclarationPage_Controller extends Page_Controller {

    private static $allowed_actions = array(
        'DeclarationEmailForm'
    );

    public function DeclarationEmailForm() {

        $fields = FieldList::create(
            TextareaField::create('EmailContent', 'Declaration Email Content', 'Please login to Envirospec.nz and confirm that all your product information is correct and up to date.')
                ->setRows(10)
        );

        $actions = FieldList::create(
            FormAction::create('declarationemailformaction', 'Submit')
                ->addExtraClass('btn btn-theme-bg btn-lg')
        );

        $required = new RequiredFields(array(
            'EmailContent'
        ));

        $form = new BootstrapForm($this, __FUNCTION__, $fields, $actions, $required);

        $form->addExtraClass('declaration - form');

        return $form;
    }

    public function declarationemailformaction($data, $form) {

        $mail = new MailController;

        $sent = new ArrayList;
        $notSent = new ArrayList;

        $members = Member::get()->filterByCallback(function ($item) {
            if ($item->inGroup('Members') || $item->inGroup('Manufacturers & Suppliers')) {
                return $item;
            }
        });

        foreach ($members as $member) {
            $email = $mail->DeclarationEmails($data, $member);

            $item = new ArrayData(array(
                'FirstName' => $member->FirstName,
                'Email'     => $member->Email
            ));

            if ($email) {
                $declaration = new Declaration();
                $declaration->Year = '2016';
                $declaration->Confirmed = false;
                $declaration->CompaniesID = $member->Companies()->ID;
                $declaration->write();
                $sent->push($item);
            } else {
                $notSent->push($item);
            }
        }

        $form->sessionMessage("Emails have been sent sucessfully to: " . $sent->Count() . ' members', 'good');
        //} else {
        //    $form->sessionMessage("There has been a problem with the form.", 'bad');
        //}

        return $this->redirectback();
    }

    public function GetMembers() {
        return Member::get()->filterByCallback(function ($item) {
            if ($item->inGroup('Manufacturers & Suppliers')) {
                return $item;
            }
        });
    }
}