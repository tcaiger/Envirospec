<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
	'type' => 'MySQLDatabase',
	'server' => 'localhost',
	'username' => 'tomcaige_admin',
	'password' => 'admin1234',
	'database' => 'tomcaige_ss_envirospec',
	'path' => ''
);

	
Security::setDefaultAdmin('admin', 'admin1234');

// Set the site locale
i18n::set_locale('en_US');

HtmlEditorConfig::get('cms')->setOptions(array(
	'height' => '280'
));

HtmlEditorConfig::get('cms')->setButtonsForLine(1, 'bold', 'italic', 'underline', 'separator', 'bullist', 'numlist','separator',  'styleselect', 'formatselect', 'link', 'image', 'table');
HtmlEditorConfig::get('cms')->setButtonsForLine(2, '');