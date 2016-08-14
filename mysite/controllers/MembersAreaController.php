<?php


class MembersArea_Controller extends Page_Controller implements PermissionProvider{

    static $allowed_actions = array(
        'index',
        'MembersAreaForm',
        'product',
        'ProductForm',
        'certificate',
        'CertificateForm'
    );

    private $product;
    private $certificate;
    private $company;

    public function init() {
        parent::init();
    }

    function URLSegment() {
        return 'membersarea';
    }

    function Link($action = null) {
        return 'membersarea';
    }

    public function providePermissions() {
        return array(
            "VIEW_MEMBERSAREA" => "Access the members area",
        );
    }

    public function checkUser(){
        // May need to also check the permission type
        if(Member::currentUserID()){
            return true;
        }else{
            return $this->redirect(Director::absoluteBaseURL());
        }
    }

    public function index() {
        $this->checkUser();
        $this->getCompany();
        return $this->render();
    }

    public function getCompany(){
        $this->company = Member::currentUser()->Companies();
        return $this->company;
    }


    public function MembersAreaForm(){

        $fields = new FieldList(
            HiddenField::create('ID'),
            TextField::create('Phone'),
            TextField::create('Email'),
            TextField::create('Fax'),
            TextField::create('Website')
        );

        $actions = new FieldList(
            FormAction::create('membersareaformaction', 'Save Changes')->addExtraClass('btn btn-theme-bg btn-lg')
        );

        $form = new BootstrapForm($this, 'MembersAreaForm', $fields, $actions);
        if($this->company){
            $form->loadDataFrom($this->company);
        }

        return $form;
    }

    public function membersareaformaction($data, $form){
        $this->company = Companies::get()->byID($data['ID']);
        $form->saveInto($this->company);

        if($this->company->write()){
            $form->sessionMessage("Company details saved.", 'good');
        }else{
            $form->sessionMessage("There has been a problem with the form.", 'bad');
        }

        return $this->redirectBack();
    }

    public function product() {
        $this->getProduct();
        return $this->customise($this->product)->render();
    }

    public function getProduct(){
        $ID = $this->request->param('ID');
        $this->product = Product::get()->byID($ID);
        return true;
    }

    public function ProductForm(){

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
            FormAction::create('productformaction', 'Save Changes')->addExtraClass('btn btn-theme-bg btn-lg')
        );

        $form = new BootstrapForm($this, 'ProductForm', $fields, $actions);

        if($this->product){
            $form->loadDataFrom($this->product);
        }

        return $form;
    }

    public function productformaction($data, $form){
        $this->product = Product::get()->byID($data['ID']);
        $form->saveInto($this->product);

        if($this->product->write()){
            $form->sessionMessage("Product update saved.", 'good');
        }else{
            $form->sessionMessage("There has been a problem with the form.", 'bad');
        }

        return $this->redirectBack();
    }


    public function certificate() {
        $this->getCertificate();
        return $this->customise($this->certificate)->render();
    }

    public function getCertificate(){
        $ID = $this->request->param('ID');
        $this->certificate = Certificate::get()->byID($ID);
        return true;
    }

    public function CertificateForm(){

        $fields = new FieldList(
            HiddenField::create('ID'),
            UploadField::create('Certificate')
                ->setDescription('To do. set a description here')
        );

        $actions = new FieldList(
            FormAction::create('certificateformaction', 'Submit For Review')->addExtraClass('btn btn-theme-bg btn-lg')
        );

        $form = new Form($this, 'CertificateForm', $fields, $actions);

        if($this->certificate){
            $form->loadDataFrom($this->certificate);
        }

        return $form;
    }

    public function certificateformaction($data, $form){
        $this->certificate = Certificate::get()->byID($data['ID']);
        $form->saveInto($this->product);

        if($this->certificate->write()){
            $form->sessionMessage("Your certificate has been submitted for review. You will receive a response from the Envirospec team as soon as possible.", 'good');
        }else{
            $form->sessionMessage("There has been a problem with the form.", 'bad');
        }
        return $this->redirectBack();
    }


    public function PrintAction(){
        return $this->getAction();
    }

    public function PrintID(){
        return $this->request->param('ID');
    }

    public function MemberProducts(){
        $ID = Member::currentUser()->Companies()->ID;
        $products = Product::get()->filterAny(array(
            'ManufacturerID' => $ID,
            'SupplierID' => $ID
        ));

        return $products;
    }

    public function MemberCertificates(){
        return Member::currentUser()->Companies()->Certificates();
    }

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