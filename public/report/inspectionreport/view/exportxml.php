<?php
// INCLUDE LIBRARIES
include("../../../../config.php");

include("../model/export_report.php");


$excel = new export_report();

include SPATH_LIBRARIES.DS."engine.Class.php"; 
$engine = new engineClass();



 $client_fullname = $session->get("userfullname");
 

				if (!empty($staff_id) ) {

					$data=$sql->GETALL($sql->Prepare("SELECT * FROM inspection_tb WHERE (INS_CREATED_DATE BETWEEN ? AND ?) AND GAT_GST_CODE=? "),array($datefrom,$dateto,$staff_id));
			
				  }
				  
				 else if (!empty($region) && !empty($district) ) {

					$data=$sql->GETALL($sql->Prepare("SELECT * FROM inspection_tb WHERE (INS_CREATED_DATE BETWEEN ? AND ?) AND GAT_REGION_ID=? AND GAT_DISTRICT_ID=? "),array($datefrom,$dateto,$region,$district));
			
				  } elseif (!empty($region) && empty($district)) {
			
					$data=$sql->GETALL($sql->Prepare("SELECT * FROM inspection_tb WHERE (INS_CREATED_DATE BETWEEN ? AND ?) AND GAT_REGION_ID=?"),array($datefrom,$dateto,$region));
					
				
				  }else{
					$data=$sql->GETALL($sql->Prepare("SELECT * FROM inspection_tb WHERE (INS_CREATED_DATE BETWEEN ? AND ?) "),array($datefrom,$dateto));
					
				
				  }
			   

		// exit();
		

		// $actorname='';
		// $excel->ReportHeader($header);
		// ob_end_clean(); 
		// $excel->tilloprations($data,$actorname); 

		$engine->setEventLog($event_type='004',$activity = "[Staff Attrition Report Has Been Viewed And Exported With Datefrom : ".$datefrom."  And Dateto : ".$dateto."]");	

		$excel->tilloprations($data); 
	

//   