<?php

class InteractiveHouse extends Page{

	public function GetCategories(){
		return ProductCategory::get()->filter('ParentID', '8');
	}
}

class InteractiveHouse_Controller extends Page_Controller{


}