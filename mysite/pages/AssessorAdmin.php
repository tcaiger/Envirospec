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

            // Get the summary certificate
            //----------------------------------------------------
            if ($reportNo = $request->getVar('report')) {
                $summary = Certificate::Get()->filter(array(
                    'Number' => $reportNo
                ))->first();
            }

            // Generate PDF (if the certificate is a summary document)
            //----------------------------------------------------
            if ($summary && $summary->IsSummary == 1) {

                // Set Up
                //----------------------------------------------------
                $summaryFile = '../' . $summary->Certificate()->Filename;
                $certificates = $summary->Product()->Certificates()->exclude('ID', $summary->ID);
                $date = date("j F Y");
                $dateStamp = date("d.m.Y");

                // Build Header Page
                //----------------------------------------------------
                $pdf = new PDF();
                $pdf->AddPage();
                $pdf->SetFont('Arial','',32);
                $pdf->setY(70);
                $pdf->cell(0, 15, 'Green Star', 0, 1, 'C');
                $pdf->cell(0, 15, 'Submission Pack', 0, 2, 'C');
                $pdf->ln(20);
                $pdf->Image('../assets/submission-packs/templates/cover-img.png', 25, null, 160);
                $pdf->SetFontSize(16);
                $pdf->ln(20);
                $pdf->cell(0, 10, 'Created by: Envirospec.nz', 0, 2, 'C');
                $pdf->cell(0, 10, 'Report No: '.$reportNo, 0, 2, 'C');
                $pdf->cell(0, 10, 'Date: '.$date, 0, 2, 'C');

                // Build Table Of Contents
                //----------------------------------------------------
                $pdf->AddPage();
                $pdf->setXY(30 ,50);
                $pdf->SetFontSize(24);
                $pdf->cell(0, 40, 'Table of Contents', 0, 2);
                $pdf->SetFontSize(16);

                $i = 1;
                foreach ($certificates as $certificate) {
                    $pdf->setX(30);
                    $pdf->cell(0, 0, $i.'. '.$certificate->Name, 0, 2);
                    $pdf->Ln(10);
                    $i++;
                }

                $headerPath = '../assets/submission-packs/templates/header.pdf';
                $pdf->Output('F', $headerPath);

                //----------------------------------------------------
                // Merge Files
                //----------------------------------------------------
                $m = new Merger();
                $m->addFromFile($headerPath);
                $m->addFromFile($summaryFile);


                foreach ($certificates as $certificate) {
                    //$m->addFromFile('../assets/submission-packs/templates/blank-page.pdf');
                    $file = '../' . $certificate->Certificate()->Filename;
                    $m->addFromFile($file);
                }

                $outputPath = '../assets/submission-packs/generated-pdfs/SubmissionPack-'.$reportNo.'-'.$dateStamp.'.pdf';

                file_put_contents($outputPath, $m->merge());

                $Results = $outputPath;

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

    function Header() {
        // Logo
        $this->Image('../assets/submission-packs/templates/es-logo.png', 20, 25, 50);

    }
}
