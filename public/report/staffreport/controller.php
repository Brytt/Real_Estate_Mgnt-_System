<?php

$region=$region??null;

$district=$district??null;




switch($viewpage){


  case "report":     

     if(empty($datefrom) || empty($dateto)){
              
          $msg = "Failed. Required field(s) cannot be empty.";
          $status = "error";
          $view ='add';

          return;

        }

        // echo $datefrom ; 
        // echo  $dateto ;
    
        $datefrom = $engine->getDateFormat($datefrom)." 00:00:00";
        $dateto   = $engine->getDateFormat($dateto)." 23:59:59";
     
    
          $history_stmt=$sql->GETALL($sql->Prepare("SELECT * FROM rk_staff_tb WHERE (STAFF_DATE_CREATED BETWEEN ? AND ?) "),array($datefrom,$dateto));
          $export_url ="public/report/staffreport/view/exportxml.php?&datefrom=".$datefrom."&dateto=".$dateto;

      
     
   
break;


    

} 
 


include('model/js.php')

?>
