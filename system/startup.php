<?php
// Error Reporting
error_reporting(E_ALL);

// Check Version
if (version_compare(phpversion(), '5.1.0', '<') == true) {
	exit('PHP5.1+ Required');
}

// Register Globals
if (ini_get('register_globals')) {
	ini_set('session.use_cookies', 'On');
	ini_set('session.use_trans_sid', 'Off');
		
	session_set_cookie_params(0, '/');
	session_start();
	
	$globals = array($_REQUEST, $_SESSION, $_SERVER, $_FILES);

	foreach ($globals as $global) {
		foreach(array_keys($global) as $key) {
			unset(${$key}); 
		}
	}
}

// Magic Quotes Fix
if (ini_get('magic_quotes_gpc')) {
	function clean($data) {
   		if (is_array($data)) {
  			foreach ($data as $key => $value) {
    			$data[clean($key)] = clean($value);
  			}
		} else {
  			$data = stripslashes($data);
		}
	
		return $data;
	}			
	
	$_GET = clean($_GET);
	$_POST = clean($_POST);
	$_REQUEST = clean($_REQUEST);
	$_COOKIE = clean($_COOKIE);
}

//Timezone
/*
if (!ini_get('date.timezone')) {
	date_default_timezone_set('America/New_York');
}
*/
date_default_timezone_set('America/New_York');

// Helper
require_once(DIR_SYSTEM . 'helper/utf8.php'); 

// Engine
require_once(DIR_SYSTEM . 'engine/action.php'); 
require_once(DIR_SYSTEM . 'engine/controller.php');
require_once(DIR_SYSTEM . 'engine/front.php');
require_once(DIR_SYSTEM . 'engine/loader.php'); 
require_once(DIR_SYSTEM . 'engine/model.php');
require_once(DIR_SYSTEM . 'engine/registry.php');

// Common
require_once(DIR_SYSTEM . 'library/db.php');
require_once(DIR_SYSTEM . 'library/image.php');
require_once(DIR_SYSTEM . 'library/response.php');
require_once(DIR_SYSTEM . 'library/request.php');
require_once(DIR_SYSTEM . 'library/session.php');
require_once(DIR_SYSTEM . 'library/config.php');
require_once(DIR_SYSTEM . 'library/url.php');
require_once(DIR_SYSTEM . 'library/document.php');
require_once(DIR_SYSTEM . 'library/pagination.php');

//Tools
require_once(DIR_SYSTEM . 'tools/PHPmailer/class.phpmailer.php');


