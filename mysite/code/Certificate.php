<?php

class Certificate extends DataObject{

	public function canView($member = null)
	{
        return Permission::check('CMS_ACCESS_MyInfoAdmin', 'any', $member);
    }

	public function canEdit($member = null)
	{
        return Permission::check('CMS_ACCESS_MyInfoAdmin', 'any', $member);
    }

	private static $db = array (
		'Name' => 'Varchar',
		'Type' => 'Varchar',
		'Status' => 'Varchar',
		'Number' => 'Varchar',
		'IsSummary' => 'Boolean',
		'NoExpiry' => 'Boolean',
		'Display' => 'Boolean(1)',
		'Compile' => 'Boolean',
		'ValidUntil' => 'Date',
		'MonthWarning' => 'Boolean',
		'ExpiredWarning' => 'Boolean',
		'FinalWarning' => 'Boolean'
	);
	private static $has_one = array (
		'Certificate' => 'File',
		'FullReport' => 'File',
		'Product' => 'Product',
		'Companies' => 'Companies'
	);

	private static $summary_fields = array (
		'Name' => 'Name',
		'Status' => 'Status',
		'Type' => 'Type',
		'Display' => 'Displaying On Website'
	);

	public function getCMSFields(){

		$fields = FieldList::create(

			TextField::create('Name'),

			DropdownField::create(
			  'Status',
			  'Status',
			  array(
			    'Active' => 'Active',
			    'Awaiting Review' => 'Awaiting Review',
			    'Disable' => 'Disable'
			  )
			)->setEmptyString('(Select One)'),

			DropdownField::create(
			  'Type',
			  'Type',
			  array(
			    'Green Building Rating Compatibility' => 'Green Building Rating Compatibility',
			    'Indoor Air Quality Certification' => 'Indoor Air Quality Certification',
			     'Energy Efficiency Rating' => 'Energy Efficiency Rating',
			    'Lifecyle Based Ecolabel' => 'Lifecyle Based Ecolabel',
			    'Environmental Managemenet System' => 'Environmental Managemenet System',
			    'Quality Management Systems' => 'Quality Management Systems',
			    'Full Building Product Appraisal' => 'Full Building Product Appraisal',
			    'Product Techincal Performance' => 'Product Techincal Performance',
			    'Carbon Offset' => 'Carbon Offset',
			    'Green Building Rating Compatibility' => 'Green Building Rating Compatibility',
			     'Responsible Sourcing' => 'Responsible Sourcing'
			  )
			)->setEmptyString('(Select One)'),

			FieldGroup::create(
				
				CheckboxField::create('Is Summary', 'Summary Certificate'),
				CheckboxField::create('NoExpiry', 'Ignore Valid Date'),
				CheckboxField::create('Display', 'Display On Website'),
				CheckboxField::create('Compile', 'Include In Submission Pack')
			)->setTitle('Details'),

			
			TextField::create('Number'),
			
			
			DateField::create('ValidUntil', 'Valid Until')->setConfig('showcalendar', true),
			
			FieldGroup::create(
				CheckboxField::create('MonthWarning', 'Month Warning Email Sent'),
				CheckboxField::create('ExpiredWarning', 'Expired Email Sent'),
				CheckboxField::create('FinalWarning', 'Final Email Sent')
			)->setTitle('Email Warnings'),

			$CertLoader = UploadField::create('Certificate'),
			$ReportLoader = UploadField::create('FullReport', 'Full Report')
		);

		$CertLoader->setFolderName('certificates');
		$ReportLoader->setFolderName('certificates');
		$CertLoader->setAllowedFileCategories('image', 'doc');
		$ReportLoader->setAllowedFileCategories('image', 'doc');

		return $fields;
	}

}
