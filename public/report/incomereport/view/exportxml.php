<?php
// INCLUDE LIBRARIES
include("../../../../config.php");

include("../model/export_report.php");


$excel = new export_report();
include SPATH_LIBRARIES.DS."engine.Class.php"; 
$engine = new engineClass();


				// if (!empty($region)) {

				// 	$data=$sql->GETALL($sql->Prepare("SELECT * FROM rk_client_tb WHERE (CLIENT_DATE_CREATED BETWEEN ? AND ?) AND CLIENT_REGION_CODE=?   "),array($datefrom,$dateto, $region ));	 
				  
				//   }else {

					$data=$sql->GETALL($sql->Prepare("SELECT * FROM general_revenue_tb WHERE (GEN_REV_CREATED_DATE BETWEEN ? AND ?) "),array($datefrom,$dateto));
			//	  }
			    

 
		$engine->setEventLog($event_type='004',$activity = "[ revenue Report Has Been Viewed And Exported  Datefrom : ".$datefrom." And Dateto : ".$dateto."]");
	
		$excel->tilloprations($data,$actorname); 
	

//   