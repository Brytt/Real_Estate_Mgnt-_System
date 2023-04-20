<?php

include "config.php";
include SPATH_LIBRARIES.DS."engine.Class.php";
include SPATH_LIBRARIES.DS."import.Class.php";
include SPATH_LIBRARIES.DS."login.Class.php";




// User Login Route 
if(isset($action) && strtolower($action) == 'login'){
	// $session->set('userdefaultlogin', "0");
	include('public/login/login.php');
	// die();
}


$log = new Login(); 
if(isset($action) && strtolower($action) == 'logout'){
	$log->logout();
}



if(isset($action) && strtolower($action) == 'defaultpassword'){
	// $log->logout();
	$npass = isset($npass)? $npass: "";
	$cpass = isset($cpass)? $cpass: "";
	if(!empty($npass) && $npass == $cpass){
		
		$crypt = new cryptCls();
		$user_name = $session->get("username");
		$newpassword = $crypt->loginPassword($user_name,$cpass)."";
		$usercode = $session->get("actorcode");
		
		$query ="UPDATE rke_users SET USR_PASSWORD = ".$sql->Param('1').", USR_DEFAULT_LOGIN = '0' WHERE USR_CODE=".$sql->Param('2')."";
		
		
		
		$stmt = $sql->Prepare($query);
		// $stmt = $sql->Execute($stmt,array($newpassword,  $session->get("actorcode")));
		$stmt = $sql->Execute($stmt,array($newpassword,  $session->get("actorcode")));
		print $sql->ErrorMsg();
		
		// var_dump($sql->affected_rows() );
		// var_dump($newpassword );
		// var_dump($stmt ); die;
		
		if($sql->affected_rows() > 0 ){
			$session->set('userdefaultlogin', "0");
			
			var_dump($session->get('userdefaultlogin') );
			$msg = "Password successfully changed.";
			$status = "success";
			$view ='list';
		}
		else{
			
			
			$action = "login";
			$msg = "Error, unable to change user password.";
			$status = "error";
			$view ='list';
		}
	}
	else{
		$msg = "Error, Invalid password.";
		$status = "error";
	}
	
}

$useraccessgroup = $session->get('userdefaultlogin');


if( $session->get('userdefaultlogin') == "1"){
	include('public/login/default_password.php');
	$action = 'login';
	echo $action;
	die();
}



if(isset($doLogin) && $doLogin == 'systemPingPass'){
	header('Location: index.php?action=index&pg=dashboard');
	die('Please wait...redirecting page');
}

//INSIDE THE SYSTEMS NOW
$engine = new engineClass();
$importClass = new importClass();


include("public/platform.php");