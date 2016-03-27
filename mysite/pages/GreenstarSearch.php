<?php

class GreenstarSearch extends Page
{

    private static $has_many = array(
        'CompanyLogos' => 'Image'
    );


    public function getCMSFields($member = null)
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab('Root.Main', array(
            $upload = UploadField::create('CompanyLogos', 'Company Logos')
        ));

        $upload->getValidator()->setAllowedExtensions(array(
            'png', 'jpeg', 'jpg', 'gif'
        ));
        $upload->setFolderName('company-logos');
        $upload->setAllowedMaxFileNumber(8);
        $sizeMB = 2; // 2 MB
        $size = $sizeMB * 1024 * 1024; // 2 MB in bytes
        $upload->getValidator()->setAllowedMaxFileSize($size);


        return $fields;
    }
}

class GreenstarSearch_Controller extends Page_Controller
{
    public function index(SS_HTTPRequest $request)
    {
        if ($request->isAjax()) {
            if ($reportNo = $request->getVar('report')) {
                $Report = Certificate::Get()->filter(array(
                    'Number' => $reportNo
                ))->first();

                return $this->customise(array(
                    'Report' => $Report
                ))->renderWith('ReportResults');

            } else {
                return $this->customise(array(
                    'Tool'      => $request->getVar('tool'),
                    'Category'  => $request->getVar('category'),
                    'Credit'    => $request->getVar('credit'),
                    'SubCredit' => $request->getVar('subCredit')
                ))->renderWith('SearchOptions');
            }
        }

        return array(
            'Tool'      => null,
            'Category'  => null,
            'Credit'    => null,
            'SubCredit' => null
        );
    }

    // ========================================
    // Credit Dropdown Form
    // ========================================
    public function CreditSearchForm($tool, $category, $credit, $subCredit)
    {
        $form = BootstrapForm::create(
            $this,
            __Function__,
            Fieldlist::create(
                DropDownField::create(
                    'Tool',
                    'Tool',
                    RatingTool::get()->map('ID', 'Title'), $tool)
                    ->setEmptyString('Select-One'),
                $categoryField = DropDownField::create(
                    'Category',
                    'Category',
                    ImpactCategory::get()->filter('ParentID', $tool)
                        ->map('ID', 'Title'), $category)
                        ->setEmptyString('Select-One'),
                $creditField = DropDownField::create(
                    'Credit',
                    'Credit',
                    AvailableCredit::get()->filter('ParentID', $category)
                        ->map('ID', 'Title'), $credit)
                        ->setEmptyString('Select-One'),
                $subCreditField = DropDownField::create(
                    'SubCredit',
                    'SubCredit (optional)',
                    AvailableCredit::get()->filter('ParentID', $credit)
                        ->map('ID', 'Title'), $subCredit)
                        ->setEmptyString('Select-One')
            ),
            Fieldlist::create(
                FormAction::create('Go', 'Go')
                    ->addExtraClass('btn-lg btn-theme-bg')
            )
        );

        $required = new RequiredFields(array(
            'Tool', 'Category', 'Credit'
        ));


        $form->setFormMethod('GET')
            ->setValidator($required)
            ->setFormAction('product-search/greenstar-results')
            ->disableSecurityToken()
            ->loadDataFrom($this->request->getVars());

        if ( ! $tool) {
            $categoryField->setAttribute('disabled', 'disabled');
        }
        if ( ! $category) {
            $creditField->setAttribute('disabled', 'disabled');
        }
        if ( ! $credit || ! AvailableCredit::get()->filter('ParentID', $credit)->exists()) {
            $subCreditField->setAttribute('disabled', 'disabled');
        }

        return $form;
    }
}