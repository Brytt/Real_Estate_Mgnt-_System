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
 


 if ($payment_type == "1" ) {

          $data=$sql->GETALL($sql->Prepare("SELECT * FROM all_transactions_tb WHERE (ALT_DATE_ADDED BETWEEN ? AND ?) AND ALT_PROPERTY_TYPE = 'LAND' "),array($datefrom,$dateto));
         
        

        }
        else if ($payment_type == "2" ) {

          $data=$sql->GETALL($sql->Prepare("SELECT * FROM all_transactions_tb WHERE (ALT_DATE_ADDED BETWEEN ? AND ?) AND ALT_PROPERTY_TYPE = 'APARTMENT' "),array($datefrom,$dateto));
         
         
        }else{
          $data=$sql->GETALL($sql->Prepare("SELECT * FROM all_transactions_tb WHERE (ALT_DATE_ADDED BETWEEN ? AND ?) "),array($datefrom,$dateto));
          
       

        }

	
		$engine->setEventLog($event_type='005',$activity = "[ payment Report Has Been Viewed And Exported By : ".$client_fullname." With Date from : ".date('d/m/Y',strtotime($datefrom))." And Date to : ".date('d/m/Y',strtotime($dateto))."]");
	
		$excel->tilloprations($data, $actorname); 
	

//   