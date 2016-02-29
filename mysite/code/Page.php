<?php
class Page extends SiteTree {

	

}


class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array (
	);

	public function init() {
		parent::init();

		//////////////////////////////////////////////////////////// 
		// CSS Includes 
		//////////////////////////////////////////////////////////// 

		// Custom CSS
		Requirements::css("{$this->ThemeDir()}/css/main.min.css");

		Requirements::combine_files(
		    'main.js',
		    array(
		        "{$this->ThemeDir()}/font-awesome/css/font-awesome.min.css",
		        "{$this->ThemeDir()}/css/animate.css",
		        "{$this->ThemeDir()}/css/magnific-popup.css"

		    )
		);
		// // Font Awesome For Icons
		// Requirements::css("{$this->ThemeDir()}/font-awesome/css/font-awesome.min.css");
		// // Animated CSS
		// Requirements::css("{$this->ThemeDir()}/css/animate.css");
		// // Popups Css
		// Requirements::css("{$this->ThemeDir()}/css/magnific-popup.css");


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
