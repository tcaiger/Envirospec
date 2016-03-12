<?php

class ProductCategory extends Page{

	private static $has_many = array (
		'Products' => 'Product'
	);

	private static $has_one = array (
		'ProductSearch' => 'ProductSearch',
		'ProductHolder' => 'ProductHolder',
		'CategoryImage' => 'Image'
	);

	private static $can_be_root = false;

	private static $allowed_children = array (
		'ProductCategory',
		'Product'
	);

	static $icon = 'mysite/icons/BlueCategory';

	public function getCMSFields() {

		$fields = parent::getCMSFields();
		$fields->removeByName('Content');
		$fields->removeByName('Metadata');


		$fields->addFieldToTab('Root.Main', $image = UploadField::create('CategoryImage'));

		$image->setFolderName('category-images');
		$image->setAllowedMaxFileNumber(1);
		$sizeMB = 1; // 1 MB
    	$size = $sizeMB * 1024 * 1024; // 1 MB in bytes
	    $image->getValidator()->setAllowedMaxFileSize($size);

		return $fields;
	}

	public function GetChildren($ID){
		return $this->children();
	}

	public function FilterLink(){
		$page = InteractiveHouseResults::get()->first();

		if($page){
			return $page->Link('category/'.$this->ID);
		}
	}
	public function FilterLink1(){
		$page = ProductCategoriesPage::get()->first();

		if($page){
			return $page->Link('category/'.$this->ID);
		}
	}
	
}

class ProductCategory_Controller extends Page_Controller{



}