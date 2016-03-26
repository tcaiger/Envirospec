<?php

class Credit extends DataObject
{

    private static $db = array(
        'ContributionSymbol'    => 'Varchar',
        'ContributionPotential' => 'Varchar',
        'Description'           => 'Text',
        'SortOrder'             => 'Int'
    );

    private static $has_one = array(
        'Product'         => 'Product',
        'AvailableCredit' => 'AvailableCredit'
    );

    private static $summary_fields = array(
        'AvailableCredit.RatingTool.Title'   => 'Rating Tool',
        'AvailableCredit.Category.Title'     => 'Impact Category',
        'AvailableCredit.CheckLevel3.Title'  => 'Available Credit',
        'AvailableCredit.CheckLevel4.Title'  => 'Sub Credit',
        'AvailableCredit.CheckLevel3.Points' => 'Points Available',
        'ContributionPotential'              => 'Contribution Potential',
        'ContributionSymbol'                 => 'Symbol'

    );

    public function getCMSFields()
    {

        $fields = FieldList::create(
            TreeDropdownField::create("AvailableCreditID", "Credit Type:", "SiteTree")->SetTreeBaseID(259),
            DropdownField::create(
                'ContributionSymbol',
                'Contribution Symbol',
                array(
                    'Tick'   => 'Tick',
                    'Dot'    => 'Dot',
                    'Cirlce' => 'Circle'
                )
            )->setEmptyString('(Select One)'),
            TextField::create('ContributionPotential'),
            TextAreaField::create('Description')
        );

        return $fields;

    }

}
