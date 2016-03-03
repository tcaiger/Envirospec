<?php

class TestCron implements CronTask {

    /**
     * 
     * @return string
     */
    public function getSchedule() {
        return "10 23 * * *";
    }

    /**
     * 
     * @return void
     */
    public function process() {

        $email = new Email();
        $email
            ->setFrom('"Envirospec One Month Reminder" <envirospec@mail.co.nz>')
            ->setTo('caigertom@gmail.com')
            ->setSubject('Envirospec One Month Reminder')
            ->setTemplate('MonthReminder')
            ->populateTemplate(new ArrayData(array(
                'Name' => 'Bob Jones'
        )));
    
        $email->send();
 
        return 'Success';
    }
}