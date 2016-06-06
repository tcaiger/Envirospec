<?php

class CustomLoginForm extends MemberLoginForm {

    public function __construct($controller = null, $name = null, $fields = null, $actions = null, $checkCurrentUser = true) {
        if(!$controller) $controller = Controller::curr();
        if(!$name) $name = "LoginForm";
        parent::__construct($controller, $name, $fields, $actions, $checkCurrentUser);
        $this->Fields()->bootstrapify();
        $this->Actions()->bootstrapify();
        $this->setTemplate("BootstrapForm");

        $this->invokeWithExtensions('updateCustomLoginForm', $this);
    }

    public function dologin($data) {
        if ($this->performLogin($data)) {
            $this->redirectByGroup($data);
        } else {
            if (array_key_exists('Email', $data)) {
                Session::set('SessionForms.MemberLoginForm.Email', $data['Email']);
                Session::set('SessionForms.MemberLoginForm.Remember', isset($data['Remember']));
            }

            if (isset($_REQUEST['BackURL'])) $backURL = $_REQUEST['BackURL'];
            else $backURL = null;

            if ($backURL) Session::set('BackURL', $backURL);

            // Show the right tab on failed login
            $loginLink = Director::absoluteURL($this->controller->Link('login'));
            if ($backURL) $loginLink .= '?BackURL=' . urlencode($backURL);
            $this->controller->redirect($loginLink . '#' . $this->FormName() . '_tab');
        }
    }

    public function redirectByGroup($data) {
        // gets the current member that is logging in
        $member = Member::currentUser();

        $url = Director::absoluteBaseURL();

        if ($member->inGroup('green-star-assessors')) {
            return $this->controller->redirect($url . 'assessor-admin');
        } else {
            return $this->controller->redirect($url . 'admin');
        }
    }
}