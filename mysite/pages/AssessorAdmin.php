<?php



class AssessorAdminPage extends Page implements PermissionProvider {

    public function providePermissions() {
        return array(
            "VIEW_ASSESSOR_ADMIN" => "View Assessor Admin Page",
        );
    }

    public function canView($member = null) {
        return Permission::check('VIEW_ASSESSOR_ADMIN', 'any', $member);
    }
}

use iio\libmergepdf\Merger;
use iio\libmergepdf\Pages;

class AssessorAdminPage_Controller extends Page_Controller {

    public function index(SS_HTTPRequest $request) {

        if ($request->isAjax()) {
            if ($reportNo = $request->getVar('report')) {
                $Report = Certificate::Get()->filter(array(
                    'Number' => $reportNo
                ))->first();
            }


            if($Report){
                $m = new Merger();
                $filename1 = '../'.$Report->Certificate()->Filename;
                $m->addFromFile($filename1);
                $m->addFromFile('../assets/certificates/cial.pdf');
                file_put_contents('../assets/submission-packs/foobar.pdf', $m->merge());
            }

            return $this->customise(array(
                'Report' => '../assets/submission-packs/foobar.pdf'
            ))->renderWith('ReportResults');

        }

        return array(
            'Report' => null,
        );
    }

}