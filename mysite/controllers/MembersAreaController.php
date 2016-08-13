<?php


class MembersArea_Controller extends Page_Controller implements PermissionProvider{

    static $allowed_actions = array(
        'index',
        'product',
        'certificate'
    );

    public function init() {
        parent::init();
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
        return $this->render();
    }

    public function product($request) {
        $ID = $request->param('ID');
        $product = Product::get()->byID($ID);
        return $this->customise($product)->render();
    }

    public function certificate($request) {
        $ID = $request->param('ID');
        $certificate = Certificate::get()->byID($ID);
        return $this->customise($certificate)->render();
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