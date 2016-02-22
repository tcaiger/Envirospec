<?php

class Companies extends DataObject
{

	public function canView($member = null)
	{
        return Permission::check('CMS_ACCESS_MyInfoAdmin', 'any', $member);
    }

    public function canEdit($member = null)
    {
        return Permission::check('CMS_ACCESS_MyInfoAdmin', 'any', $member);
    }

	private static $db = array(
		'Name' => 'Varchar',
		'Description' => 'HTMLText',
		'Phone' => 'Varchar',
		'Email' => 'Varchar',
		'Fax' => 'Varchar',
		'Website' => 'Varchar',
		'Address' => 'HTMLText',
		'Post' => 'HTMLText'
	);

	private static $has_one = array(
		'Logo' => 'Image'
	);

	private static $has_many = array(
		'Products' => 'Product',
		'Certificates' => 'Certificate'
	);

	private static $summary_fields = array(
		'Name' => 'Company Name'
	);

	private static $default_sort = "Name ASC";

	public function getCMSFields($member = null)
	{

		// ============== Main Tab =====================
		$fields = FieldList::create(TabSet::create('Root'));
		$fields->addFieldsToTab('Root.Main', array (
			TextField::create('Name', 'Company Name'),
			HTMLEditorField::create('Description', 'Company Description'),
			$upload = UploadField::create('Logo')
		));
	
		$upload->getValidator()->setAllowedExtensions(array(
			'png', 'jpeg', 'jpg', 'gif'
		));

		$upload->setFolderName('logos');

		// ======== Contact Tab ============== 
		$fields->addFieldsToTab('Root.Contact', array(
			TextField::create('Phone'),
			TextField::create('Email'),
			TextField::create('Fax'),
			TextField::create('Website'),
			HTMLEditorField::create('Address'),
			HTMLEditorField::create('Post', 'Postal Address')
		));

		// ======== Certificates Tab ============== 
		$fields->addFieldsToTab('Root.Certificates', GridField::create(
			'Certificates',
			'Certificates for this company',
			$this->Certificates(),
			GridFieldConfig_RecordEditor::create()
		));

		if(!Permission::check('CMS_ACCESS_PAGES', 'any', $member))
		{
			$fields->removebyName(array(
				'Name',
				'Description'
			));
		}

		return $fields;
	}
}