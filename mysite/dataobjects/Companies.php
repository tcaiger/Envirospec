<?php

class Companies extends DataObject {

    private static $db = array(
        'Name'        => 'Varchar',
        'Description' => 'HTMLText',
        'Phone'       => 'Varchar',
        'Email'       => 'Varchar',
        'Fax'         => 'Varchar',
        'Website'     => 'Varchar',
        'Address'     => 'HTMLText',
        'Post'        => 'HTMLText'
    );

    private static $has_one = array(
        'Logo' => 'Image'
    );

    private static $has_many = array(
        'ManufacturerProducts' => 'Product.Manufacturer',
        'SupplierProducts'     => 'Product.Supplier',
        'Certificates'         => 'Certificate',
        'Declarations'         => 'Declaration'
    );

    private static $summary_fields = array(
        'Name' => 'Company Name'
    );

    private static $default_sort = "Name ASC";

    public function getCMSFields($member = null) {

        // ============== Main Tab =====================
        $fields = FieldList::create(TabSet::create('Root'));

        $fields->addFieldsToTab('Root.Main', array(
            TextField::create('Name', 'Company Name'),
            HTMLEditorField::create('Description', 'Company Description'),
            HeaderField::create('LogoHeader', 'Logo', '2'),
            $upload = UploadField::create('Logo', '')->setDescription('Best aspect ratio is 2 x 1'),
            HeaderField::create('ContactHeader', 'Contact Details', '2'),
            TextField::create('Phone'),
            TextField::create('Email'),
            TextField::create('Fax'),
            TextField::create('Website'),
            HTMLEditorField::create('Address'),
            HTMLEditorField::create('Post', 'Postal Address')
        ));

        $upload->getValidator()->setAllowedExtensions(array(
            'png', 'jpeg', 'jpg', 'gif'
        ));

        $upload->setFolderName('logos');


        //======== Products Tab ==============
        $fields->addFieldsToTab('Root.Products', array(

            GridField::create(
                'ManufacturerProducts',
                'Products as Supplier',
                $this->SupplierProducts(),
                GridFieldConfig_RecordEditor::create()
            ),
            GridField::create(
                'SupplierProducts',
                'Products as Manufacturer',
                $this->ManufacturerProducts(),
                GridFieldConfig_RecordEditor::create()
            )
        ));


        // ======== Certificates Tab ==============
        $fields->addFieldsToTab('Root.CompanyCertificates', GridField::create(
            'Certificates',
            'Certificates for this company',
            $this->Certificates(),
            GridFieldConfig_RecordEditor::create()
        ));

        // ======== Declarations Tab ==============
        $fields->addFieldsToTab('Root.Declarations', GridField::create(
            'Declarations',
            'Declarations',
            $this->Declarations(),
            GridFieldConfig_RecordEditor::create()
        ));

        return $fields;
    }

    function canCreate($member = null) {
        return true;
    }

    function canEdit($member = null) {
        return true;
    }

    function canDelete($member = null) {
        return true;
    }

    function canView($member = null) {
        return true;
    }

}