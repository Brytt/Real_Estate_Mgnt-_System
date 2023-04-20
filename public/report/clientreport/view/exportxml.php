<?php
// INCLUDE LIBRARIES
include("../../../../config.php");

include("../model/export_report.php");


$excel = new export_report();
include SPATH_LIBRARIES.DS."engine.Class.php"; 
$engine = new engineClass();


$data=$sql->GETALL($sql->Prepare("SELECT * FROM rk_clients_tb WHERE (CLIENT_DATE_CREATED BETWEEN ? AND ?) "),array($datefrom,$dateto));
			
 
$engine->setEventLog($event_type='004',$activity = "[ Client Report Has Been Viewed And Exported  Datefrom : ".$datefrom." And Dateto : ".$dateto."]");
	
$excel->tilloprations($data,$actorname); 