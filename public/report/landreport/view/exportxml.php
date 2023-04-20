<?php
// INCLUDE LIBRARIES
include("../../../../config.php");

include("../model/export_report.php");


$excel = new export_report();

// include SPATH_LIBRARIES.DS."engine.Class.php"; 
// $engine = new engineClass();



//  $client_fullname = $session->get("userfullname");
 

				  $data=$sql->GETALL($sql->Prepare("SELECT * FROM land_sale_tb WHERE (LS_CREATED_DATE BETWEEN ? AND ?) "),array($datefrom,$dateto));	  
			   

		// exit();
		
		$actorname='';
		// $excel->ReportHeader($header);
		// ob_end_clean(); 
		$excel->tilloprations($data,$actorname); 
	

//   