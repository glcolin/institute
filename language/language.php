<?php

/* 
This file is in grobal level 
Variable Names such as TXT() $LANGUAGE EN CN are reserved.
*/

define('EN',1);
define('CN',2);

$session->data['languages']=array ( 
						'EN' => array ( 'language_id' => 1, 'name' => 'English', 'code' => 'EN', 'image'=>'gb.png'),
						'CN' => array ( 'language_id' => 2, 'name' => 'Chinese', 'code' => 'CN', 'image'=>'cn.png')
						) ;

if(!isset($session->data['language'])){
	//Give it a default value:
	$session->data['language'] = EN;
}


switch($session->data['language']){
	case EN:
		require_once(DIR_HOME . 'language/EN.php');
		break;
	case CN:
		require_once(DIR_HOME . 'language/CN.php');
		break;
	default:
		echo 'Error: failed to load language dictionary!';
		exit();
}

function TXT($key){
	global $LANGUAGE;
	return isset($LANGUAGE[$key])?$LANGUAGE[$key]:'<font style="color:red;">'.$key.'</font>'; 
}