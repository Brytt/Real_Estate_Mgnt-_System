<?php
/**
 * Created by Godwins.
 * User: school user
 * Date: 1/11/2018
 * Time: 5:15 PM
 */

// $compandetails=$engine->getActorDetails();
// $actor_id = $session->get("actorid");
// $startdate = date("Y-m-d H:m:s");
// $crypt = new cryptCls();
// // $code=new  codesClass();
// $actorid = $session->get("userid");
// $actorname = $engine->getActorName();
// $pgnate = new OS_Paginations();
// $clientkey_code = $session->get("clientkey_code");
// $client_fullname = $session->get("client_fullname");

// $actorgroup = $engine->getUsergroup();

// exit;




switch($viewpage){


  case "report":     

 
   
        if(empty($datefrom) || empty($dateto)){
              
          $msg = "Failed. Required field(s) cannot be empty.";
          $status = "error";
          $view ='add';

          return;

        }
        

        $datefrom =$engine->getDateFormat($datefrom)." 00:00:00";
        $dateto =$engine->getDateFormat($dateto)." 23:59:59";
    
    
        // $history_stmt=$sql->GETALL($sql->Prepare("SELECT * FROM ges_staff_tb WHERE (GST_DATE_CREATED BETWEEN ? AND ?) "),array($datefrom,$dateto));


        if (!empty($region) && !empty($district) ) {

          $history_stmt=$sql->GETALL($sql->Prepare("SELECT * FROM rk_properties_tb WHERE (PROPERTY_ADDED_DATE BETWEEN ? AND ?) AND PROPERTY_REG=? AND PROPERTY_DIST=? "),array($datefrom,$dateto,$region,$district));
         
        $export_url ="public/report/propertyreport/view/exportxml.php?&datefrom=".$datefrom."&dateto=".$dateto."&region=".$region."&district=".$district;

        }elseif (!empty($region) && empty($district)) {

          $history_stmt=$sql->GETALL($sql->Prepare("SELECT * FROM rk_properties_tb WHERE (PROPERTY_ADDED_DATE BETWEEN ? AND ?) AND PROPERTY_REG=?"),array($datefrom,$dateto,$region));
         
          $export_url ="public/report/propertyreport/view/exportxml.php?&datefrom=".$datefrom."&dateto=".$dateto."&region=".$region;

         
        }else{
          $history_stmt=$sql->GETALL($sql->Prepare("SELECT * FROM rk_properties_tb WHERE (PROPERTY_ADDED_DATE BETWEEN ? AND ?) "),array($datefrom,$dateto));
          
          $export_url ="public/report/propertyreport/view/exportxml.php?&datefrom=".$datefrom."&dateto=".$dateto;

        }
     
    

break;


    

}//case view ends
 


include('model/js.php')

?>
