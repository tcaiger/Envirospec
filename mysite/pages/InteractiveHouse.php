<?php

class InteractiveHouse extends Page
{
	public function GetCategories($Parent)
	{
		return ProductCategory::get()->filter('ParentID', $Parent);
	}
}

class InteractiveHouse_Controller extends Page_Controller
{

	public function init()
	{
		parent::init();

	    Requirements::javascript("{$this->ThemeDir()}/js/custom.interactive-house.js");

	}

}