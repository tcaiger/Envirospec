<?php

class DeclarationPage extends Page{




}




class DeclarationPage_Controller extends Page_Controller{

    private static $allowed_actions = array(
        'DeclarationForm'
    );

    // ========================================
    // Declaration Form
    // ========================================
    public function DeclarationForm() {

        $form = BootstrapForm::create(
            $this,
            __Function__,
            FieldList::create(
                CheckboxField::create('Name', 'Name')
            ),
            Fieldlist::create(
                FormAction::create('SubmitDeclarationForm', 'Submit Declaration')
                    ->addExtraClass('btn btn-theme-bg btn-lg')
            )
        );

        //$required = new RequiredFields(array(
        //    'Name'
        //));

        //$form->setValidator($required);

        return $form;
    }

}