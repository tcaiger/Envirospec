<?php

class TestCron implements CronTask {

    /**
     * 
     * @return string
     */
    public function getSchedule() {
        return "*/1 * * * *";
    }

    /**
     * 
     * @return void
     */
    public function process() {

        $email = new Email();
        $email
            ->setFrom('"Envirospec One Month Reminder" <envirospec@mail.co.nz>')
            ->setTo($this->SiteConfig()->ContactFormEmail)
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