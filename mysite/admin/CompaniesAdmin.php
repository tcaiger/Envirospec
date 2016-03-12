<?php

class CompaniesAdmin extends ModelAdmin {
	
	private static $menu_title = 'Companies';

	private static $url_segment = 'companies';

	private static $managed_models = array (
			'Companies'
	);

	private static $menu_icon = 'mysite/icons/man-file.gif';
}