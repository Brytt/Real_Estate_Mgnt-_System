<?php
/**
 * Created by Godwins.
 * User: school user
 * Date: 1/11/2018
 * Time: 5:15 PM
 */

// $region="";

// $district="";

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

$region=$region??null;

$district=$district??null;




switch($viewpage){


  case "report":     

  // echo $region; echo $district;

 
        if(empty($datefrom) || empty($dateto)){
              
          $msg = "Failed. Required field(s) cannot be empty.";
          $status = "error";
          $view ='add';

          return;

        }

        // echo $datefrom ; 
        // echo  $dateto ;
    
        $datefrom =$engine->getDateFormat($datefrom)." 00:00:00";
        $dateto =$engine->getDateFormat($dateto)." 23:59:59";
           

          $history_stmt=$sql->GETALL($sql->Prepare("SELECT * FROM general_revenue_tb WHERE (GEN_REV_CREATED_DATE BETWEEN ? AND ?) "),array($datefrom,$dateto));
          
          $export_url ="public/report/incomereport/view/exportxml.php?&datefrom=".$datefrom."&dateto=".$dateto;

     
   
break;

}

    

//case view ends
 


include('model/js.php')

?>
