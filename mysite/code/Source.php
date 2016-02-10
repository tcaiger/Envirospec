<?php

class Source extends DataObject{

	private static $db = array (
		'Caption' => 'Varchar(100)',
		'URL' => 'Varchar(100)'
	);

	private static $has_one = array (
		'SidebarPage' => 'SidebarPage'
	);

	private static $summary_fields = array (
		'Caption' => 'Caption',
		'URL' => 'URL'
	);

	public function getCMSFields(){

		$fields = FieldList::create(
			TextField::create('Caption'),
			TextField::create('URL')
		);
		return $fields;
	}
}