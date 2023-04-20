<?php
// INCLUDE LIBRARIES
include("../../../../config.php");

include("../model/export_report.php");


$excel = new export_report();
include SPATH_LIBRARIES.DS."engine.Class.php"; 
$engine = new engineClass();


				if (!empty($region) && !empty($district) && !empty($school) ) {

					$data =$sql->GETALL($sql->Prepare("SELECT * FROM rk_staff_tb WHERE (STAFF_DATE_CREATED BETWEEN ? AND ?) AND STAFF_REGION_CODE=?   "),array($datefrom,$dateto, $region ));
				   
			 
				  
				  }else {
					$data =$sql->GETALL($sql->Prepare("SELECT * FROM rk_staff_tb WHERE (STAFF_DATE_CREATED BETWEEN ? AND ?) "),array($datefrom,$dateto));
				  }
			    










		// exit();
		

		// $actorname='';
		// $excel->ReportHeader($header);
		// ob_end_clean(); 
		$engine->setEventLog($event_type='004',$activity = "[ Staff Report Has Been Viewed And Exported  Datefrom : ".$datefrom." And Dateto : ".$dateto."]");
	
		$excel->tilloprations($data,$actorname); 
	

//   