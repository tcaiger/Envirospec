<?php

class Certificate extends DataObject {

    public function canView($member = null) {
        return Permission::check('CMS_ACCESS_MyInfoAdmin', 'any', $member);
    }

    public function canEdit($member = null) {
        return Permission::check('CMS_ACCESS_MyInfoAdmin', 'any', $member);
    }


    private static $has_one = array(
        'Certificate' => 'File',
        'FullReport'  => 'File',
        'Product'     => 'Product',
        'Companies'   => 'Companies'
    );

    private static $summary_fields = array(
        'Name'      => 'Name',
        'Type'      => 'Type',
        'Number'    => 'Number',
        'IsSummary' => 'Summary Sheet',
        'Compile'   => 'Include in Submission Pack',
        'Display'   => 'Display On Site',
        'Status'    => 'Status'
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

    public function IsSummary() {
        return ($this->IsSummary == true ? 'Yes' : 'No');
    }

    public function Compile() {
        return ($this->Compile == true ? 'Yes' : 'No');
    }

    public function Display() {
        return ($this->Display == true ? 'Yes' : 'No');
    }

    public function getCMSFields($member = null) {

        $fields = FieldList::create(

            TextField::create('Name'),

            DropdownField::create(
                'Status',
                'Status',
                array(
                    'Active'          => 'Active',
                    'Awaiting Review' => 'Awaiting Review',
                    'Disabled'        => 'Disabled'
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
                CheckboxField::create('IsSummary', 'Summary Certificate'),
                CheckboxField::create('Compile', 'Include In Submission Pack')
            )->setTitle('Details'),


            FieldGroup::create(
                CheckboxField::create('MonthWarning', 'Month Warning Email Sent'),
                CheckboxField::create('ExpiredWarning', 'Expired Email Sent'),
                CheckboxField::create('FinalWarning', 'Final Email Sent')
            )->setTitle('EmailWarnings'),


            $CertLoader = UploadField::create('Certificate'),
            $ReportLoader = UploadField::create('FullReport', 'Full Report'),

            HeaderField::create('* Press Save Below To Submit The Certificate For Review', '2')
        );

        $CertLoader->setFolderName('certificates');
        $ReportLoader->setFolderName('certificates');
        $CertLoader->setAllowedExtensions(array('pdf'));
        $ReportLoader->setAllowedExtensions(array('pdf'));

        if ( Permission::check('CMS_ACCESS_PAGES', 'any', $member)) {
            $fields->removebyName(array(
                'HeaderField* Press Save Below To Submit The Certificate For Review'
            ));
        }

        if ( ! Permission::check('CMS_ACCESS_PAGES', 'any', $member)) {

            $fields->removebyName(array(
                'Type',
                'Number',
                'Expiry',
                'Details',
                'EmailWarnings'
            ));

        }

        return $fields;

    }


    function onBeforeWrite($member = null) {

        if ( ! Permission::check('CMS_ACCESS_PAGES', 'any', $member)) {
            $this->Status = 'Awaiting Review';

            $mail = new MailController;
            $mail->CertificateUploadEmail();
        }

        parent::onBeforeWrite();
    }

}
