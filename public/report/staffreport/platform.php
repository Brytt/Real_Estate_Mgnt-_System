<?php 


include "controller.php";


 
switch($view){
	
	case 'list':		
		include("view/list.php");
	break;

	default:	
		include("view/add.php");
	break;
}	

?>