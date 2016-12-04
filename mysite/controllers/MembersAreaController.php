<?php


class MembersArea_Controller extends Page_Controller implements PermissionProvider {

    static $allowed_actions = array(
        'index',
        'MembersAreaForm',
        'MemberLogoForm',
        'product',
        'ProductForm',
        'ProductImagesForm',
        'certificate',
        'CertificateForm',
        'DeclarationForm'
    );

    private $product;
    private $certificate;
    private $company;

    public function init() {
        parent::init();
    }



    // ===========================================================
    // STRUCTURAL FUNCTIONS
    // ===========================================================
    /**
     * @return string
     */
    function URLSegment() {
        return 'membersarea';
    }


    /**
     * @param null $action
     * @return string
     */
    function Link($action = null) {
        return 'membersarea';
    }


    /**
     * @return array
     */
    public function providePermissions() {
        return array(
            "VIEW_MEMBERSAREA" => "Access the members area",
        );
    }


    /**
     * @return bool|SS_HTTPResponse
     */
    public function checkUser() {
        // May need to also check the permission type
        if (Member::currentUserID()) {
            return true;
        } else {
            return $this->redirect(Director::absoluteBaseURL());
        }
    }

    // ===========================================================
    // RENDERING
    // ===========================================================

    /**
     * @return string
     */
    public function index() {
        $this->checkUser();
        $this->getCompany();

        return $this->render();
    }

    /**
     * @return mixed
     */
    public function product() {
        $this->getProduct();

        return $this->customise($this->product)->render();
    }


    /**
     * @return mixed
     */
    public function certificate() {
        $this->getCertificate();

        return $this->customise($this->certificate)->render();
    }




    // ===========================================================
    // GETTERS
    // ===========================================================

    /**
     * @return mixed
     */
    public function getCompany() {
        $this->company = Member::currentUser()->Companies();

        return $this->company;
    }


    /**
     * @return DataObject
     */
    public function getProduct() {
        $ID = $this->request->param('ID');
        $this->product = Product::get()->byID($ID);

        return $this->product;
    }


    /**
     * @return bool
     */
    public function getCertificate() {
        $ID = $this->request->param('ID');
        $this->certificate = Certificate::get()->byID($ID);

        return true;
    }

    public function getBackLink() {
        if (isset($_SERVER['HTTP_REFERER'])) {
            return $_SERVER['HTTP_REFERER'];
        } else {
            return 'membersarea';
        }

    }


    /**
     * @return string
     */
    public function PrintAction() {
        return $this->getAction();
    }


    /**
     * @return string
     */
    public function PrintID() {
        return $this->request->param('ID');
    }


    /**
     * @return DataList
     */
    public function MemberProducts() {
        $ID = Member::currentUser()->Companies()->ID;
        $products = Product::get()->filterAny(array(
            'ManufacturerID' => $ID,
            'SupplierID'     => $ID
        ));

        return $products;
    }


    /**
     * @return mixed
     */
    public function MemberCertificates() {
        return Member::currentUser()->Companies()->Certificates();
    }


    /**
     * @return bool
     */
    public function MemberDeclaration() {
        $declaration = Member::currentUser()->Companies()->Declarations()->Sort('Created', 'DESC')->first();
        if ($declaration && ! $declaration->Confirmed) {
            return true;
        } else {
            return false;
        }
    }


    // ===========================================================
    // FORMS
    // ===========================================================

    /**
     * @return BootstrapForm
     */
    public function MembersAreaForm() {

        $fields = new FieldList(
            HiddenField::create('ID'),
            CompositeField::create(
                TextField::create('Phone'),
                TextField::create('Website')
            ),
            CompositeField::create(
                TextField::create('Email'),
                TextField::create('Fax')
            )
        );

        $actions = new FieldList(
            FormAction::create('membersareaformaction', 'Save Changes')->addExtraClass('btn btn-theme-bg')
        );

        $form = new BootstrapForm($this, __FUNCTION__, $fields, $actions);
        if ($this->company) {
            $form->loadDataFrom($this->company);
        }

        return $form;
    }


    /**
     * @param $data
     * @param $form
     * @return bool|SS_HTTPResponse
     */
    public function membersareaformaction($data, $form) {
        $this->company = Companies::get()->byID($data['ID']);
        $form->saveInto($this->company);

        if ($this->company->write()) {
            $form->sessionMessage("Company details saved.", 'good');
        } else {
            $form->sessionMessage("There has been a problem with the form.", 'bad');
        }

        return $this->redirectBack();
    }

    /**
     * @return Form
     */
    public function MemberLogoForm() {


        $fields = FieldList::create(
            HiddenField::create('ID'),
            FileAttachmentField::create('Logo')->setTemplate('CustomUploadField')
        )->bootstrapIgnore('Logo');


        $actions = FieldList::create(
            FormAction::create('memberlogoformaction', 'Save Changes')->addExtraClass('btn btn-theme-bg')
        );

        $form = new BootstrapForm($this, __FUNCTION__, $fields, $actions);
        $form->setTemplate('MembersAreaForm');

        if ($this->company) {
            $form->loadDataFrom($this->company);
        }

        return $form;
    }


    /**
     * @param $data
     * @param $form
     * @return bool|SS_HTTPResponse
     */
    public function memberlogoformaction($data, $form) {
        $this->company = Companies::get()->byID($data['ID']);
        $form->saveInto($this->company);

        if ($this->company->write()) {
            $form->sessionMessage("Company details saved.", 'good');
        } else {
            $form->sessionMessage("There has been a problem with the form.", 'bad');
        }

        return $this->redirectBack();
    }


    /**
     * @return BootstrapForm
     */
    public function ProductForm() {

        $fields = new FieldList(
            HiddenField::create('ID'),
            TextField::create('ProductSpecificWebsite'),
            TextField::create('ProductDistributor'),
            TextField::create('ProductApplicators'),
            TextField::create('InstallationManual'),
            TextField::create('MaintenanceManual'),
            TextField::create('ProductBrochure'),
            TextField::create('CAD'),
            TextField::create('MaterialSafetyDataSheet'),
            TextField::create('TechnicalAppraisalDocument'),
            TextField::create('ProductSpecification'),
            TextField::create('SpecialAchievement')
        );

        $actions = new FieldList(
            FormAction::create('productformaction', 'Save Changes')->addExtraClass('btn btn-theme-bg')
        );

        $form = new BootstrapForm($this, __FUNCTION__, $fields, $actions);

        if ($this->product) {
            $form->loadDataFrom($this->product);
        }

        return $form;
    }


    /**
     * @param $data
     * @param $form
     * @return bool|SS_HTTPResponse
     */
    public function productformaction($data, $form) {
        $this->product = Product::get()->byID($data['ID']);
        $form->saveInto($this->product);

        if ($this->product->write()) {
            $form->sessionMessage("Product update saved.", 'good');
        } else {
            $form->sessionMessage("There has been a problem with the form.", 'bad');
        }

        return $this->redirectBack();
    }


    /**
     * @return Form
     */
    public function ProductImagesForm() {

        $fields = FieldList::create(
            HiddenField::create('ID'),
            FileAttachmentField::create('ProductImages')->setTemplate('CustomUploadField')
        )->bootstrapIgnore('ProductImages');

        $actions = FieldList::create(
            FormAction::create('productimagesformaction', 'Save Changes')->addExtraClass('btn btn-theme-bg')
        );

        $form = new BootstrapForm($this, __FUNCTION__, $fields, $actions);
        $form->setTemplate('MembersAreaForm');

        if ($this->product) {
            $form->loadDataFrom($this->product);
        }

        return $form;
    }


    /**
     * @param $data
     * @param $form
     * @return bool|SS_HTTPResponse
     */
    public function productimagesformaction($data, $form) {
        $this->product = Product::get()->byID($data['ID']);
        $form->saveInto($this->product);
        if ($this->product->write()) {
            $form->sessionMessage("Product update saved.", 'good');
        } else {
            $form->sessionMessage("There has been a problem with the form.", 'bad');
        }

        return $this->redirectBack();
    }


    /**
     * @return Form
     */
    public function CertificateForm() {

        $fields = FieldList::create(
            HiddenField::create('ID'),
            FileAttachmentField::create('Certificate')->setTemplate('CustomUploadField')
        )->bootstrapIgnore('Certificate');

        $actions = FieldList::create(
            FormAction::create('certificateformaction', 'Submit For Review')->addExtraClass('btn btn-theme-bg')
        );

        $form = new BootstrapForm($this, __FUNCTION__, $fields, $actions);
        $form->setTemplate('MembersAreaForm');

        if ($this->certificate) {
            $form->loadDataFrom($this->certificate);
        }

        return $form;
    }

    public function certificateformaction($data, $form) {
        $this->certificate = Certificate::get()->byID($data['ID']);
        $form->saveInto($this->certificate);

        if ($this->certificate->write()) {
            $form->sessionMessage("Your certificate has been submitted for review. You will receive a response from the Envirospec team as soon as possible.", 'good');
        } else {
            $form->sessionMessage("There has been a problem with the form.", 'bad');
        }

        return $this->redirectBack();
    }


    /**
     * @return BootstrapForm
     */
    public function DeclarationForm() {
        $fields = new FieldList(
            HiddenField::create('ID'),
            CheckboxField::create('Confirmed', 'I confirm all the product information is correct')
        );

        $actions = new FieldList(
            FormAction::create('declarationformaction', 'Submit Declaration')->addExtraClass('btn btn-theme-bg')
        );

        $form = new BootstrapForm($this, __FUNCTION__, $fields, $actions);

        if ($this->company) {
            $form->loadDataFrom($this->company);
        }

        return $form;
    }

    public function declarationformaction($data, $form) {

        $company = Companies::get()->byID($data['ID']);
        $declaration = $company->Declarations()->Sort('Created', 'DESC')->first();

        $form->saveInto($declaration);

        if ($declaration->write()) {
            $form->sessionMessage("Your certificate has been submitted for review. You will receive a response from the Envirospec team as soon as possible.", 'good');
        } else {
            $form->sessionMessage("There has been a problem with the form.", 'bad');
        }

        return $this->redirectBack();
    }



    // ===========================================================
    // OTHER
    // ===========================================================

    /**
     * @param string $action
     * @return SSViewer
     */
    public function getViewer($action) {
        // Manually set templates should be dealt with by Controller::getViewer()
        if (isset($this->templates[$action]) && $this->templates[$action]
            || (isset($this->templates['index']) && $this->templates['index'])
            || $this->template
        ) {
            return parent::getViewer($action);
        }

        // Prepare action for template search
        if ($action == "index") $action = "";
        else $action = '_' . $action;

        $templates = array_merge(
        //Find templates by dataRecord
        //SSViewer::get_templates_by_class(get_class($this->dataRecord), $action, "SiteTree"),
        // Next, we need to add templates for all controllers
            SSViewer::get_templates_by_class(get_class($this), $action, "Controller"),
            // Fail-over to the same for the "index" action
            SSViewer::get_templates_by_class(get_class($this->dataRecord), "", "SiteTree"),
            SSViewer::get_templates_by_class(get_class($this), "", "Controller")
        );

        return new SSViewer($templates);
    }


}