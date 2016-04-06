<?php

class Product extends Page
{
    public function canEdit($member = null)
    {
        return Permission::check('CMS_ACCESS_MyInfoAdmin', 'any', $member);
    }

    static $defaults = array(
        'ShowInMenus'  => false,
        'ShowInSearch' => false
    );

    private static $can_be_root = false;

    private static $has_one = array(
        'Supplier'        => 'Companies',
        'Manufacturer'    => 'Companies',
        'ProductCategory' => 'ProductCategory'
    );

    private static $has_many = array(
        'ProductImages' => 'Image',
        'Certificates'  => 'Certificate',
        'Credits'       => 'Credit'
    );

    static $icon = 'mysite/icons/BlueFile';

    private static $db = array(

        'Subheading'                    => 'Varchar',
        'Status'                        => 'Varchar',
        'ParentID'                      => 'Int',
        'ManufacturerID'                => 'Int',
        'SupplierID'                    => 'Int',
        'GeneralDescription'            => 'HTMLText',
        'BenefitsAdvantages'            => 'HTMLText',
        'ApplicationAndPurpose'         => 'HTMLText',
        'InstallationAndMaintainance'   => 'HTMLText',
        'KeyProperties'                 => 'HTMLText',
        'ProductSpecificWebsite'        => 'Varchar(255)',
        'ProductDistributor'            => 'Varchar(255)',
        'ProductApplicators'            => 'Varchar(255)',
        'InstallationManual'            => 'Varchar(255)',
        'MaintainanceManual'            => 'Varchar(255)',
        'ProductBrochure'               => 'Varchar(255)',
        'CAD'                           => 'Varchar(255)',
        'MaterialSafetyDataSheet'       => 'Varchar(255)',
        'TechnicalAppraisalDocument'    => 'Varchar(255)',
        'ProductSpecification'          => 'Varchar(255)',
        'SpecialAchievement'            => 'Varchar(255)',
        'AdditionalInformation'         => 'HTMLText',
        'EnvironmentalManagementSystem' => 'Boolean',
        'CarbonOffset'                  => 'Boolean',
        'PerformanceItemEcolabel'       => 'Boolean',
        'LifeCycleBasedEcolabel'        => 'Boolean',
        'NaturalProduct'                => 'Boolean',
        'NewZealandMadeAccreditations'  => 'Boolean',
        'GreenStarCompatible'           => 'Varchar',
        'LivingBuildingChallenge'       => 'Boolean',
        'CircularEconomyModelOffice'    => 'Boolean',
        'SearchLabels'                  => 'Varchar(100)'
    );


    public function getCMSFields($member = null)
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('Content');


        // =====================================================
        //                  Main Tab
        // =====================================================
        $fields->addFieldsToTab('Root.Main', array(

            TextField::create('Subheading'),
            TextField::create('SearchLabels')->setDescription('These are the tags the navigation search will look at.'),

            ToggleCompositeField::create('pa', 'Product Attributes', array(
                CheckboxField::create('EnvironmentalManagementSystem', 'Environmental Management System'),
                CheckboxField::create('CarbonOffset', 'Carbon Offset'),
                CheckboxField::create('PerformanceItemEcolabel', 'PerformanceItemEcolabel'),
                CheckboxField::create('LifeCycleBasedEcolabel', 'LifeCycleBasedEcolabel'),
                CheckboxField::create('NaturalProduct', 'Natural Product'),
                CheckboxField::create('NewZealandMadeAccreditations', 'NewZealand Made Accreditations'),
                CheckboxField::create('GreenStarCompatible', 'Green Star Compatible'),
                CheckboxField::create('LivingBuildingChallenge', 'Living Building Challenge'),
                CheckboxField::create('CircularEconomyModelOffice', 'Circular Economy Model Office')
            )),
        ), 'Metadata');


        // =====================================================
        //                Descriptions Tab
        // =====================================================
        $fields->addFieldsToTab('Root.Descriptions', array(

            ToggleCompositeField::create('gd', 'General Description', array(
                HTMLEditorField::create('GeneralDescription', '')
            )),
            ToggleCompositeField::create('ba', 'Benefits & Advantages', array(
                HTMLEditorField::create('BenefitsAdvantages', '')
            )),
            ToggleCompositeField::create('ap', 'Application & Purpose', array(
                HTMLEditorField::create('ApplicationAndPurpose', '')
            )),
            ToggleCompositeField::create('im', 'Installation & Maintainance', array(
                HTMLEditorField::create('InstallationAndMaintainance', '')
            )),
            ToggleCompositeField::create('kp', 'Key Properties', array(
                HTMLEditorField::create('KeyProperties', '')
            )),
            ToggleCompositeField::create('ap', 'Additional Information', array(
                HTMLEditorField::create('AdditionalInformation', '')
            ))
        ));

        // =====================================================
        //                Companies Tab
        // =====================================================
        $fields->addFieldsToTab('Root.Companies', array(

            DropdownField::create('ManufacturerID', 'Manufacturer',
                Companies::get()->sort('Name', 'ASC')->map('ID', 'Title'))
                ->setEmptyString('(Select One)'
                ),
            DropdownField::create('SupplierID', 'Supplier',
                Companies::get()->sort('Name', 'ASC')->map('ID', 'Title'))
                ->setEmptyString('(Select One)'
                )
        ));


        // =====================================================
        //               Certificates Tab
        // =====================================================
        $fields->addFieldsToTab('Root.Certificates', GridField::create(
            'Certificates',
            'Certificates for this product',
            $this->Certificates(),
            GridFieldConfig_RecordEditor::create()
                ->addComponents(new GridFieldOrderableRows('SortOrder'))
        ));


        // =====================================================
        //                     Credits Tab
        // =====================================================
        $fields->addFieldsToTab('Root.Credits', GridField::create(
            'Credits',
            'Credits for this product',
            $this->Credits(),
            GridFieldConfig_RecordEditor::create()
                ->addComponents(new GridFieldOrderableRows('SortOrder'))
        ));


        // =====================================================
        //                    Images Tab
        // =====================================================
        $fields->addFieldsToTab('Root.Images', array(
            $upload = UploadField::create('ProductImages', 'Product Images')
        ));

        $upload->getValidator()->setAllowedExtensions(array(
            'png', 'jpeg', 'jpg', 'gif'
        ));
        $upload->setFolderName('product-photos');
        $upload->setAllowedMaxFileNumber(5);
        $sizeMB = 2; // 2 MB
        $size = $sizeMB * 1024 * 1024; // 2 MB in bytes
        $upload->getValidator()->setAllowedMaxFileSize($size);

        // =====================================================
        //                   Links Tab
        // =====================================================
        $fields->addFieldsToTab('Root.Links', array(

            TextField::create('ProductSpecificWebsite', 'Product Website'),
            TextField::create('ProductDistributor', 'Product Distributor'),
            TextField::create('ProductApplicators', 'Product Applicators'),
            TextField::create('InstallationManual', 'Installation Manual'),
            TextField::create('MaintainanceManual', 'Maintainance Manual'),
            TextField::create('ProductBrochure', 'Product Brochure'),
            TextField::create('CAD', 'CAD'),
            TextField::create('MaterialSafetyDataSheet', 'Material Safety DataSheet'),
            TextField::create('TechnicalAppraisalDocument', 'Technical Appraisal Document'),
            TextField::create('ProductSpecification', 'Product Specification'),
            TextField::create('SpecialAchievement', 'Special Achievement')
        ));

        if ( ! Permission::check('CMS_ACCESS_PAGES', 'any', $member)) {
            $fields->removebyName(array(
                'Main',
                'Descriptions',
                'Companies',
                'Credits'
            ));
        }

        return $fields;
    }

    // =====================================================
    //       Get The Name Of The Manufacturer
    // =====================================================
    public function getManufacturer($CompanyID)
    {
        return Companies::get()->filter(array(
            'ID' => $CompanyID
        ));
    }

    // =====================================================
    //                  Get Credit Points
    // =====================================================
    public function getPoints()
    {

        if ($_GET['SubCredit']) {
            $creditID = $_GET['SubCredit'];
        } else {
            $creditID = $_GET['Credit'];
        }

        $credits = $this->Credits();
        $sum = null;

        foreach ($credits as $credit) {
            $availableCredit = $credit->AvailableCredit();

            if ($availableCredit->ID == $creditID || $availableCredit->parent()->ID == $creditID) {
                //$sum += $credit->ContributionPotential;
                // How to deal with contribution potential
                $sum = $credit->ContributionPotential;
            }
        }

        return $sum;
    }

    // =====================================================
    //                  Get Compliance
    // =====================================================
    public function getCompliance($compliant)
    {
        if ($compliant) {
            return '<i class="fa fa-check"></i>';
        } else {
            return '';
        }
    }
}


class Product_Controller extends Page_Controller
{

    private static $allowed_actions = array(
        'CompanyContactForm'
    );


    // =====================================================
    //         Show Green Star Certificate
    // =====================================================
    public function ShowGreenStarCertificate($PageID)
    {
        return Certificate::get()->filter(array(
            'ProductID' => $PageID,
            'Type'      => 'Green Building Rating Compatibility',
            'Display'   => 1
        ));
    }

    // =====================================================
    //       Show Certificates
    // =====================================================
    public function ShowCertificates($PageID, $ManufacturerID, $SupplierID)
    {

        return Certificate::get()->exclude(
            'Type', 'Green Building Rating Compatibility'
        )
            ->filter(array(
                'Display' => 1
            ))
            ->filterAny(array(
                'ProductID' => $PageID
            ))
            ->sort('SortOrder', 'ASC');


    }

    // =====================================================
    //           Show Credits
    // =====================================================
    public function ShowCredits($PageID)
    {

        return Credit::get()->filter(array(
            'ProductID' => $PageID
        ));
    }


    // =====================================================
    //           Show Credits
    // =====================================================
    public function DisplayLinks()
    {
        $items = array(
            'ProductSpecificWebsite',
            'ProductDistributor',
            'ProductApplicators',
            'InstallationManual',
            'MaintainanceManual',
            'ProductBrochure',
            'CAD',
            'MaterialSafetyDataSheet',
            'TechnicalAppraisalDocument',
            'ProductSpecification',
            'SpecialAchievement'
        );

        $output = new ArrayList();

        foreach ($items as $item) {

            $url = $this->$item;

            //add spaces to the text
            $title = preg_replace('/([a-z])([A-Z])/s', '$1 $2', $item);

            if ($url && $url != 'http://') {

                // If it doesn't have http add it
                if (substr($url, 0, 7) != 'http://' || substr($url, 0, 8) != 'https://') {
                    $url = "http://" . $url;
                }

                $output->push(new ArrayData(array(
                    'Title' => $title,
                    'URL'   => $url
                )));
            }
        }

        return $output;
    }

    // =====================================================
    //                  Get Company
    // =====================================================
    public function Company($CompanyID)
    {
        return dataObject::get_by_id('Companies', $CompanyID);
    }

    // =====================================================
    //           Back To Search Results Link
    // =====================================================
    public function BackLink()
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            return $_SERVER['HTTP_REFERER'];
        } else {
            return '/';
        }

    }

    // =====================================================
    //                   Company Contact Form
    // =====================================================
    public function CompanyContactForm()
    {
        $form = BootstrapForm::create(
            $this,
            __Function__,
            Fieldlist::create(
                TextField::create('Name'),
                EmailField::create('Email', 'Email Address'),
                TextAreaField::create('Message'),
                LiteralField::create('Terms', '<h5>Terms & Conditions</h5>'),
                CheckboxField::create('CheckTerms', 'I agree to the terms '),
                LiteralField::create('TermsText', '<p>By clicking the Submit button, you agree to receive further information from the product supplier.</p>')
            ),
            Fieldlist::create(
                FormAction::create('SubmitContactForm', 'Send')
                    ->addExtraClass('btn-lg btn-theme-bg')
            )
        );

        $required = new RequiredFields(array(
            'Name', 'Email', 'Message', 'CheckTerms'
        ));

        $form->setValidator($required);

        return $form;
    }


    // ========================================
    // Submit  Contact Form
    // ========================================
    public function submitContactForm($data, $form)
    {

        $myCompany = $this->Company($this->ManufacturerID);
        // Update emails to real ones
        $recipiants = $this->SiteConfig()->ContactFormEmail . ",tom@weareonfire.co.nz";

        $email = new Email();
        $email
            ->setFrom('"Envirospec Contact Form" <envirospec@mail.co.nz>')
            ->setTo($recipiants)
            ->setSubject('Envirospec Website Product Enquiry')
            ->setTemplate('ProductFormEmail')
            ->populateTemplate(new ArrayData(array(
                'Name'    => $data['Name'],
                'Email'   => $data['Email'],
                'Message' => $data['Message'],
            )));

        $email->send();

        $form->sessionMessage("Your enquiry has been sent. You will receive a response from the product manufacturer / supplier as soon as possible.", 'good');

        return $this->redirectback();
    }
}