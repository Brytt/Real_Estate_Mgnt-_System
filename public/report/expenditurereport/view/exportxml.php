<?php
// INCLUDE LIBRARIES
include("../../../../config.php");

include("../model/export_report.php");

// $pdf = new pdfReport();
$excel = new export_report();

// $datefrom =$engine->getDateFormat($datefrom);
// $dateto =$engine->getDateFormat($dateto);


// $actor_id = $session->get("actorid");
// $startdate = date("Y-m-d H:m:s");
// $actorid = $session->get("userid");
// $clientkey_code = $session->get("clientkey_code");
// $client_fullname = $session->get("client_fullname");
// $excel = new export_report();




					$data=$sql->GETALL($sql->Prepare("SELECT * FROM expenditure_tb WHERE (EXP_CREATED_DATE BETWEEN ? AND ?) "),array($datefrom,$dateto));
					
				
				//   }
				 
		// exit();
		

		$actorname='';
		// $excel->ReportHeader($header);
		// ob_end_clean(); 
		$excel->tilloprations($data,$actorname); 
	

//   