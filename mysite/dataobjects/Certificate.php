<?php

class Certificate extends DataObject
{

    public function canView($member = null)
    {
        return Permission::check('CMS_ACCESS_MyInfoAdmin', 'any', $member);
    }

    public function canEdit($member = null)
    {
        return Permission::check('CMS_ACCESS_MyInfoAdmin', 'any', $member);
    }


    private static $has_one = array(
        'Certificate' => 'File',
        'FullReport'  => 'File',
        'Product'     => 'Product',
        'Companies'   => 'Companies'
    );

    private static $summary_fields = array(
        'Name'    => 'Name',
        'Status'  => 'Status',
        'Type'    => 'Type',
        'Display' => 'Displaying On Website'
    );

    private static $db = array(
        'Name'           => 'Varchar',
        'Type'           => 'Varchar',
        'Status'         => 'Varchar',
        'Number'         => 'Varchar',
        'IsSummary'      => 'Boolean',
        'NoExpiry'       => 'Boolean',
        'Display'        => 'Boolean(1)',
        'Compile'        => 'Boolean',
        'ValidUntil'     => 'Date',
        'MonthWarning'   => 'Boolean',
        'ExpiredWarning' => 'Boolean',
        'FinalWarning'   => 'Boolean',
        'SortOrder'      => 'Int'
    );

    public function getCMSFields()
    {

        $fields = FieldList::create(

            TextField::create('Name'),

            DropdownField::create(
                'Status',
                'Status',
                array(
                    'Active'          => 'Active',
                    'Awaiting Review' => 'Awaiting Review',
                    'Disable'         => 'Disable'
                )
            )->setEmptyString('(Select One)'),

            DropdownField::create(
                'Type',
                'Type',
                array(
                    'Green Building Rating Compatibility' => 'Green Building Rating Compatibility',
                    'Indoor Air Quality Certification'    => 'Indoor Air Quality Certification',
                    'Energy Efficiency Rating'            => 'Energy Efficiency Rating',
                    'Lifecycle Based Ecolabel'            => 'Lifecycle Based Ecolabel',
                    'Environmental Management System'     => 'Environmental Management System',
                    'Quality Management Systems'          => 'Quality Management Systems',
                    'Full Building Product Appraisal'     => 'Full Building Product Appraisal',
                    'Product Technical Performance'       => 'Product Technical Performance',
                    'Carbon Offset'                       => 'Carbon Offset',
                    'Responsible Sourcing'                => 'Responsible Sourcing'
                )
            )->setEmptyString('(Select One)'),

            TextField::create('Number'),


            FieldGroup::create(
                DateField::create('ValidUntil', '')->setConfig('showcalendar', true)->setAttribute('style', 'display: inline'),
                CheckboxField::create('NoExpiry', 'Ignore Valid Date')
            )->setTitle('Expiry'),

            FieldGroup::create(
                CheckboxField::create('Display', 'Display On Website'),
                CheckboxField::create('Is Summary', 'Summary Certificate'),
                CheckboxField::create('Compile', 'Include In Submission Pack')
            )->setTitle('Details'),


            FieldGroup::create(
                CheckboxField::create('MonthWarning', 'Month Warning Email Sent')->performDisabledTransformation(),
                CheckboxField::create('ExpiredWarning', 'Expired Email Sent')->performDisabledTransformation(),
                CheckboxField::create('FinalWarning', 'Final Email Sent')->performDisabledTransformation()
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
