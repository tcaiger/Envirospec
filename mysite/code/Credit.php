<?php

class Credit extends DataObject{

	private static $db = array (
		'ContributionSymbol' => 'Varchar',
		'ContributionPotential' => 'Varchar',
		'Description' => 'Text'
	);

	private static $has_one = array (
		'Product' => 'Product',
		'AvailableCredit' => 'AvailableCredit'
	);

	private static $summary_fields = array (
		'AvailableCredit.Parent.Parent.Title' => '
		Rating Tool',
		'AvailableCredit.Parent.Title' => '
		Impact Category',
		'AvailableCredit.Title' => 'Credit Name',
		'AvailableCredit.Points' => 'Points Available',
		'ContributionSymbol' => 'Contribution Symbol',
		'ContributionPotential' => 'Contribution Potential'
	);

	public function getCMSFields(){

		$fields = FieldList::create(
			TreeDropdownField::create("AvailableCreditID", "Credit Type:", "SiteTree")->SetTreeBaseID(259),
			DropdownField::create(
			  'ContributionSymbol',
			  'Contribution Symbol',
			  array(
			    'Tick' => 'Tick',
			    'Dot' => 'Dot',
			    'Cirlce' => 'Circle'
			  )
			)->setEmptyString('(Select One)'),
			TextField::create('ContributionPotential'),
			TextAreaField::create('Description')
		);
		return $fields;

	}

}
