<?php


class SiteConfigExtension extends DataExtension {

    private static $allowed_actions = array(
        'sendOneOffEmail'
    );

    private static $has_one = array(
        'Page1' => 'SiteTree',
        'Page2' => 'SiteTree',
        'Page3' => 'SiteTree',
        'Page4' => 'SiteTree'
    );


    private static $db = array(
        'ESSummary'            => 'Text',
        'ContactAddress'       => 'Text',
        'ContactEmail'         => 'Varchar',
        'ContactPhone'         => 'Varchar',
        'ContactFormEmail'     => 'Varchar',
        'ExpirySystemEmail'    => 'Varchar',
        'ReminderEmailContent' => 'HTMLText'
    );

    public function updateCMSFields(Fieldlist $fields) {


        $fields->addFieldsToTab('Root.Main', array(

            // Envirospec Contact Info
            // ----------------------------------------
            HeaderField::create('InfoHeading', 'Envirospec Contact Information', '2'),
            TextAreaField::create('ESSummary', 'Envirospec Summary'),
            TextAreaField::create('ContactAddress', 'Contact Address'),
            TextField::create('ContactEmail', 'Contact Email'),
            TextField::create('ContactPhone', 'Contact Phone'),

            // Envirospec Admin Email Addresses
            // ----------------------------------------
            HeaderField::create('AdminEmailHeading', 'Admin Email Addresses', '2'),
            TextField::create('ContactFormEmail', 'Contact Form Email'),
            TextField::create('ExpirySystemEmail', 'Expiry System Email'),

            // Footer Links
            // ----------------------------------------
            HeaderField::create('FooterHeading', 'Footer Links', '2'),
            LabelField::create('FooterLabel', 'Links to these pages are displayed in the footer'),
            TreeDropdownField::create('Page1ID', 'Useful Page 1', 'SiteTree'),
            TreeDropdownField::create('Page2ID', 'Useful Page 2', 'SiteTree'),
            TreeDropdownField::create('Page3ID', 'Useful Page 3', 'SiteTree'),
            TreeDropdownField::create('Page4ID', 'Useful Page 4', 'SiteTree'),

            // Reminder Emails
            // ----------------------------------------
            HeaderField::create('EmailHeading', 'Reminder Email', '2'),
            LabelField::create('EmailLabel', 'This will send an email to all members to inform them that they need to review and sign off their product information.'),
            HTMLEditorField::create('ReminderEmailContent', 'Email Message')->setDescription('The email will automatically include a link to the sign off page for the member.')
        ));
    }


    // ========================================
    // Send One Month Reminder
    // ========================================
    public function sendMonthReminder() {
        $email = new Email();
        $email
            ->setFrom('"Envirospec One Month Reminder" <envirospec@mail.co.nz>')
            ->setTo('caigertom@gmail.com')
            ->setSubject('Envirospec One Month Reminder')
            ->setTemplate('MonthReminder')
            ->populateTemplate(new ArrayData(array(
                'Name' => 'Bob Jones'
            )));


        $this->MonthReminderDate;

        $email->send();

        return 'Success';
    }
}


