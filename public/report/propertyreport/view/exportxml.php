<?php


//   <?php
// INCLUDE LIBRARIES
include("../../../../config.php");

include("../model/export_report.php");


$excel = new export_report();

include SPATH_LIBRARIES.DS."engine.Class.php"; 
$engine = new engineClass();

// echo $datefrom ;
 $client_fullname = $session->get("userfullname");
 

			         	#GETTING ALL REGISTERED CLIENTS
				if (!empty($region) && !empty($district) ) {

					$data=$sql->GETALL($sql->Prepare("SELECT * FROM rk_properties_tb WHERE (PROPERTY_ADDED_DATE BETWEEN ? AND ?) AND PROPERTY_REG=? AND PROPERTY_DIST=? "),array($datefrom,$dateto,$region,$district));
				   
				
				  }elseif (!empty($region) && empty($district)) {
		  
					$data=$sql->GETALL($sql->Prepare("SELECT * FROM rk_properties_tb WHERE (PROPERTY_ADDED_DATE BETWEEN ? AND ?) AND PROPERTY_REG=?"),array($datefrom,$dateto,$region));
				
				   
				  }else{
					$data=$sql->GETALL($sql->Prepare("SELECT * FROM rk_properties_tb WHERE (PROPERTY_ADDED_DATE BETWEEN ? AND ?) "),array($datefrom,$dateto));			
				
				  }
			

		// exit();
		

		// $actorname='';
		// $excel->ReportHeader($header);
		// ob_end_clean(); 
		// $excel->tilloprations($data,$actorname); 

		$engine->setEventLog($event_type='005',$activity = "[ Property Report Has Been Viewed And Exported By : ".$client_fullname." With Date from : ".date('d/m/Y',strtotime($datefrom))." And Date to : ".date('d/m/Y',strtotime($dateto))."]");
	
		$excel->tilloprations($data, $actorname); 
	

//   