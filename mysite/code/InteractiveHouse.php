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

	public function index(SS_HTTPRequest $request)
	{
	    if($request->isAjax())
	    {
	    	if($category = $request->getVar('category'))
	    	{
	    		$Results = ProductCategory::get()->filter('ParentID', $category);

	    		return $this->customise(array(
		        		'Results' => $Results
					))->renderWith('ProductCategories');
	    	}
	    }

	     return array(
			'Results' => null
		);
	}
}