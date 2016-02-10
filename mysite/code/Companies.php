<?php

class Companies extends DataObject {

	public function canView($member = null) {
        return Permission::check('CMS_ACCESS_MyInfoAdmin', 'any', $member);
    }

    public function canEdit($member = null) {
        return Permission::check('CMS_ACCESS_MyInfoAdmin', 'any', $member);
    }

	private static $db = array (
		'Name' => 'Varchar',
		'Description' => 'HTMLText',
		'Phone' => 'Varchar',
		'Email' => 'Varchar',
		'Fax' => 'Varchar',
		'Website' => 'Varchar',
		'Address' => 'HTMLText',
		'Post' => 'HTMLText'
	);

	private static $has_one = array (
		'Logo' => 'Image'
	);

	private static $has_many = array (
		'Products' => 'Product'
	);

	private static $summary_fields = array (
		'Name' => 'Company Name'
	);

	public function getCMSFields() {

		// ============== Main Tab =====================
		$fields = FieldList::create(TabSet::create('Root'));

		$fields->addFieldsToTab('Root.Main', array (
			TextField::create('Name', 'Comapny Name'),
			$upload = UploadField::create('Logo'),
			HTMLEditorField::create('Description', 'Company Description')
		));
		$upload->getValidator()->setAllowedExtensions(array (
			'png', 'jpeg', 'jpg', 'gif'
		));
		$upload->setFolderName('logos');

		// ======== Contact Tab ============== 
		$fields->addFieldsToTab('Root.Contact', array (
			TextField::create('Phone'),
			TextField::create('Email'),
			TextField::create('Fax'),
			TextField::create('Website'),
			HTMLEditorField::create('Address'),
			HTMLEditorField::create('Post', 'Postal Address')
		));

		// ======== Certificates Tab ============== 
		$fields->addFieldsToTab('Root.Certificates', array (
			TextField::create('Certificates')
		));

		return $fields;

	}
}