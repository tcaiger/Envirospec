<?php


class AssessorAdminPage extends Page implements PermissionProvider {

    static $icon = 'mysite/icons/Admin';

    public function providePermissions() {
        return array(
            "VIEW_ASSESSOR_ADMIN" => "View Assessor Admin Page",
        );
    }

    public function canView($member = null) {
        return Permission::check('VIEW_ASSESSOR_ADMIN', 'any', $member);
    }

    private static $db = array(
        'Subheading'   => 'Varchar(100)',
        'Caption'      => 'Text',
        'Instructions' => 'HTMLText',
        'Disclaimer'   => 'HTMLText'
    );

    private static $has_one = array(
        'CoverImage' => 'Image'
    );

    public function getCMSFields() {

        $fields = parent::getCMSFields();
        $fields->removeByName('Content');

        $fields->addFieldsToTab('Root.Main', array(
            TextField::create('Subheading', 'Sub Heading'),
            TextareaField::create('Caption'),
            HTMLEditorField::create('Instructions'),
            HTMLEditorField::create('Disclaimer'),
            HeaderField::create('PDF', 'PDF Cover Page', 4),
            $upload = UploadField::create('CoverImage', 'Cover Page')->setDescription('Must be a PDF')
        ), 'Metadata');

        $upload->setFolderName('submission-packs');

        return $fields;
    }
}

use iio\libmergepdf\Merger;
use iio\libmergepdf\Pages;

class AssessorAdminPage_Controller extends Page_Controller {


    public function index(SS_HTTPRequest $request) {

        if ($request->isAjax()) {

            if ($request->getVar('checkbox') == 1) {
                // Get the summary certificate
                if ($reportNo = $request->getVar('report')) {
                    $summary = Certificate::Get()->filter(array(
                        'Number' => $reportNo
                    ))->first();
                }

                // Generate PDF (if the certificate is a summary document)
                if ($summary && $summary->IsSummary == 1) {
                    $Results = $this->GeneratePDF($reportNo, $summary);
                    $Message = 'good';
                } else {
                    $Results = null;
                    $Message = 'invalid number';
                }
            } else {
                $Results = null;
                $Message = 'not declared';
            }


            return $this->customise(array(
                'Message' => $Message,
                'Report'  => $Results
            ))->renderWith('ReportResults');
        }

        return array(
            'Report' => null,
        );
    }

    /**
     * Makes the pdf and returns a link to it
     *
     * @return string
     */
    public function GeneratePDF($reportNo, $summary) {

        // Set Up
        $summaryPath = '../' . $summary->Certificate()->Filename;
        $product = $summary->Product();


        if ($product->ManufacturerID == $product->SupplierID) {
            $companyIDs = $product->ManufacturerID;
        } else {
            $companyIDs = array();
            array_push($companyIDs, $product->ManufacturerID, $product->SupplierID);
        }


        $certificates = Certificate::get()
            ->filterAny([
                'ProductID'   => $product->ID,
                'CompaniesID' => $companyIDs
            ])
            ->filter([
                'Compile' => 1,
                'Active' => 1
            ])
            ->exclude('ID', $summary->ID);
        Debug::Dump($certificates->count());

        $date = date("j F Y");
        $dateStamp = date("d.m.Y");

        // Cover Page
        $id = $this->CoverImageID;
        $cover = Image::get()->byID($id);
        $coverPath = '../' . $cover->Filename;


        // Build Contents Page
        $pdf = new PDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 32);
        $pdf->setTextColor(45, 45, 45);

        $pdf->setXY(30, 60);
        $pdf->SetFontSize(20);
        $pdf->cell(0, 10, 'Submission Pack Details', 0, 2);
        $pdf->ln(4);
        $pdf->SetFontSize(14);
        $pdf->setX(30);
        $pdf->cell(0, 10, 'Product: ' . $product->Title, 0, 2);
        $pdf->cell(0, 10, 'Report No: ' . $reportNo, 0, 2);
        $pdf->cell(0, 10, 'Date: ' . $date, 0, 2);
        $pdf->ln(15);

        $pdf->SetFontSize(20);
        $pdf->setX(30);
        $pdf->cell(0, 10, 'Table of Contents', 0, 2);
        $pdf->ln(8);
        $pdf->SetFontSize(14);

        $i = 1;
        $pdf->setX(30);
        $pdf->cell(0, 0, $i . '. ' . $summary->Name, 0, 2);
        $pdf->Ln(10);
        $i++;

        foreach ($certificates as $certificate) {
            $pdf->setX(30);
            if (substr($certificate->Certificate()->Filename, -3) == 'pdf') {
                $pdf->cell(0, 0, $i . '. ' . $certificate->Name, 0, 2);
            } else {
                $pdf->setTextColor(231, 76, 60);
                $pdf->cell(0, 0, $i . '. ' . $certificate->Name, 0, 2);
                $pdf->Ln(8);
                $pdf->setX(35);
                $pdf->SetFontSize(10);
                $pdf->cell(0, 0, 'This file is not a valid pdf and cannot be included.', 0, 2);
                $pdf->Ln(4);
                $pdf->setX(35);
                $pdf->cell(0, 0, 'Please contact Envirospec directly for the file.', 0, 2);
                $pdf->setTextColor(45, 45, 45);
                $pdf->SetFontSize(16);
            }
            $pdf->Ln(10);
            $i++;
        }

        $contentsPath = '../assets/submission-packs/header.pdf';
        $pdf->Output('F', $contentsPath);

        //----------------------------------------------------
        // Merge Files
        //----------------------------------------------------
        $m = new Merger();
        $m->addFromFile($coverPath);
        $m->addFromFile($contentsPath);
        $m->addFromFile($summaryPath);


        foreach ($certificates as $certificate) {

            if (substr($certificate->Certificate()->Filename, -3) == 'pdf') {
                //$m->addFromFile('../assets/submission-packs/templates/blank-page.pdf');
                $file = '../' . $certificate->Certificate()->Filename;
                $m->addFromFile($file);
            }
        }

        $outputPath = '../assets/submission-packs/SubmissionPack-' . $reportNo . '-' . $dateStamp . '.pdf';

        file_put_contents($outputPath, $m->merge());

        return $outputPath;

    }


}

class PDF extends FPDF {

    function Header() {
        // Logo
        $this->Image('../mysite/templates/submission-packs/es-logo.png', 20, 25, 50);

    }
}
