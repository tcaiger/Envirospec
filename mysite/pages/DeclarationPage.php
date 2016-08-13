<?php

class DeclarationPage extends Page {


}


class DeclarationPage_Controller extends Page_Controller {

    private static $allowed_actions = array(
        'DeclarationForm',
        'DeclarationEmailForm'
    );

    // ========================================
    // Declaration Form
    // ========================================
    public function DeclarationForm() {

        $form = BootstrapForm::create(
            $this,
            __Function__,
            FieldList::create(
                CheckboxField::create('Confirmation', 'Confirmation')
            ),
            Fieldlist::create(
                FormAction::create('SubmitDeclarationForm', 'Submit Declaration')
                    ->addExtraClass('btn btn-theme-bg btn-lg')
            )
        );

        $required = new RequiredFields(array(
            'Confirmation'
        ));

        $form->setValidator($required);

        return $form;
    }


    // ========================================
    // Declaration Email Form
    // ========================================
    public function DeclarationEmailForm() {

        $form = BootstrapForm::create(
            $this,
            __Function__,
            FieldList::create(
                TextareaField::create('EmailContent', 'Declaration Email Content')
            ),
            Fieldlist::create(
                FormAction::create('SubmitEmail', 'Submit')
                    ->addExtraClass('btn btn-theme-bg btn-lg')
            )
        );

        $required = new RequiredFields(array(
            'Email Content'
        ));

        $form->setValidator($required);

        return $form;
    }

    public function MemberTest($member = null){

        if(Permission::check('CMS_ACCESS_PAGES', 'any', $member)){
            return true;
        }else{
            return false;
        }
    }

}