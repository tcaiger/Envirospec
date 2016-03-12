<?php
class Page extends SiteTree {

	

}


class Page_Controller extends ContentController {


	public function init() {
		parent::init();

		//////////////////////////////////////////////////////////// 
		// CSS Includes 
		//////////////////////////////////////////////////////////// 

		// Custom CSS
		Requirements::css("{$this->ThemeDir()}/css/main.min.css");
		// Font Awesome For Icons
		Requirements::css("{$this->ThemeDir()}/font-awesome/css/font-awesome.min.css");
		// Animated CSS
		Requirements::css("{$this->ThemeDir()}/css/animate.css");
		// Popups Css
		Requirements::css("{$this->ThemeDir()}/css/magnific-popup.css");


		//////////////////////////////////////////////////////////// 
		// JS Includes 
		//////////////////////////////////////////////////////////// 
		Requirements::combine_files(
		    'main.js',
		    array(
		        "{$this->ThemeDir()}/js/jquery.min.js",
		        "{$this->ThemeDir()}/bootstrap/js/bootstrap.min.js",
		        "{$this->ThemeDir()}/js/jquery.easing.min.js",
		        "{$this->ThemeDir()}/js/wow.min.js",
		        "{$this->ThemeDir()}/js/imagesloaded.min.js",
		        "{$this->ThemeDir()}/js/jquery.magnific-popup.min.js",
		        "{$this->ThemeDir()}/js/custom.js"

		    )
		);
	}

	// ========================================
	// Top Bar Search Form
	// ========================================
	public function SearchForm() {

	    $fields = new FieldList(
	        
	    );

	    $actions = new FieldList(
	        FormAction::create('doSearch', 'Search')
	    );

	    $form = new Form($this, 'SearchForm', $fields, $actions);
	    $form->setTemplate('SearchForm');

	    return $form;
	}

	public function GetProdCats(){
		return ProductCategory::get();
	}

	public function GetNews(){
		return SidebarPage::get()
				->limit(4)
				->filter(array(
					'ParentID' => 107
				));
	}

}
