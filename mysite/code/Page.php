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

		// Bootstrap CSS
		// Requirements::css("{$this->ThemeDir()}/bootstrap/css/bootstrap.min.css");
		// Custom CSS
		Requirements::css("{$this->ThemeDir()}/css/main.min.css");
		// Font Awesome For Icons
		Requirements::css("{$this->ThemeDir()}/font-awesome/css/font-awesome.min.css");
		// Animated CSS
		Requirements::css("{$this->ThemeDir()}/css/animate.css");
		// Mega Menu
		Requirements::css("{$this->ThemeDir()}/css/yamm.css");
		// Popups Css
		Requirements::css("{$this->ThemeDir()}/css/magnific-popup.css");

		//////////////////////////////////////////////////////////// 
		// JS Includes 
		//////////////////////////////////////////////////////////// 

		// JQuery
	    Requirements::javascript("{$this->ThemeDir()}/js/jquery.min.js");
	    // Requirements::javascript("{$this->ThemeDir()}/js/jquery-migrate.min.js");
	    // Bootstrap
	    Requirements::javascript("{$this->ThemeDir()}/bootstrap/js/bootstrap.min.js");
	    // Easing Plugin For Smooth Scroll
	    Requirements::javascript("{$this->ThemeDir()}/js/jquery.easing.min.js");
	    // Sticky Header
	    Requirements::javascript("{$this->ThemeDir()}/js/jquery.sticky.js");
	    // Flex Slider Plugin
	    Requirements::javascript("{$this->ThemeDir()}/js/jquery.flexslider-min.js");
	    // Parallax Background Plugin
	    Requirements::javascript("{$this->ThemeDir()}/js/jquery.stellar.min.js");
	    // On Scroll Animation
	    Requirements::javascript("{$this->ThemeDir()}/js/wow.min.js");
	    // Isotope (Not sure what for ??)
	    Requirements::javascript("{$this->ThemeDir()}/js/jquery.isotope.min.js");
	    // image loads plugin
	    Requirements::javascript("{$this->ThemeDir()}/js/imagesloaded.min.js");
	    // magnific pop up
	    Requirements::javascript("{$this->ThemeDir()}/js/jquery.magnific-popup.min.js");
	    // Custom JS
	    Requirements::javascript("{$this->ThemeDir()}/js/custom.js");
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
