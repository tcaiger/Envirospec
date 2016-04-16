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
                $summary = Certificate::Get()->filter(array(
                    'Number' => $reportNo
                ))->first();
            }

            if ($summary && $summary->IsSummary == 1) {


                //----------------------------------------------------
                // Set Up
                //----------------------------------------------------
                $summaryFile = '../' . $summary->Certificate()->Filename;
                $certificates = $summary->Product()->Certificates()->exclude('ID', $summary->ID);

                //----------------------------------------------------
                // Build Header Page
                //----------------------------------------------------
                $pdf = new PDF();
                $pdf->SetLeftMargin(20);
                $pdf->AddPage();
                $pdf->SetFont('Arial','',16);
                $pdf->cell(0, 80, 'Table Of Contents', 0, 2);

                $pdf->SetFontSize(12);

                foreach ($certificates as $certificate) {
                    $pdf->cell(0, 0, '- '.$certificate->Name, 0, 2);
                    $pdf->Ln(1);
                }

                $pdf->Output('F', '../assets/submission-packs/templates/test.pdf');

                //$m->addFromFile('../assets/submission-packs/templates/header.pdf');

                //----------------------------------------------------
                // Merge Files
                //----------------------------------------------------
                $m = new Merger();
                $m->addFromFile($summaryFile);

                foreach ($certificates as $certificate) {
                    $m->addFromFile('../assets/submission-packs/templates/blank-page.pdf');
                    $file = '../' . $certificate->Certificate()->Filename;
                    $m->addFromFile($file);
                }

                $output = '../assets/submission-packs/submission-pack.pdf';

                file_put_contents($output, $m->merge());

                $Results = $output;

            } else {
                $Results = null;
            }

            return $this->customise(array(
                'Report' => $Results
            ))->renderWith('ReportResults');
        }

        return array(
            'Report' => null,
        );
    }

}

class PDF extends FPDF {
// Page header
    function Header() {
        // Logo
        $this->Image('../assets/submission-packs/templates/es-logo.png', 15, 15, 50);
        // Arial bold 15
        $this->SetFont('Arial', '', 28);
        // Title
        $this->text(25, 50, 'Green Star Submission Pack');
        // Line break
        $this->Ln(20);
    }

// Page footer
    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
