<?php

class MyInfoAdmin extends ModelAdmin {
	
	private static $menu_title = 'My Info';

	private static $url_segment = 'my-info';

	private static $managed_models = array (
			'Companies',
			'Product'
	);

	private static $menu_icon = 'mysite/icons/man-file.gif';

	public function getList(){
		$list = parent::getList();

		if($this->modelClass == 'Companies'){
			$list = $list->filter( array (
				'ID' => Member::currentUser()->CompaniesID
			));
		return $list;
		}

		if($this->modelClass == 'Product'){
			$list = $list->filter( array (
				'ManufacturerID' => Member::currentUser()->CompaniesID
			));

		return $list;
		}
	}
}