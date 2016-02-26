<?php

class InteractiveHouseResults extends Page{


}

class InteractiveHouseResults_Controller extends Page_Controller{

	private static $allowed_actions = array (
		'category'
	);

	protected $articleList;

	// ========================================
	// Category Filter
	// ========================================
	public function init(){
		parent::init();

		$this->articleList = Product::get();
	}	

	public function category (SS_HTTPRequest $r){
		$category = ProductCategory::get()->byID(
			$r->param('ID')
		);

		if(!$category){
			return $this->httpError(404,'That category was not found');
		}

		$this->articleList = $this->articleList->filter(array(
			'ParentID' => $category->ID
		));

		return array(
			'SelectedCategory' => $category
		);
	}

	public function Results(){

		return PaginatedList::create(
			$this->articleList,
			$this->getRequest()
		);
	}	
}