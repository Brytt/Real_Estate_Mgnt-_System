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

    
        $datefrom =$engine->getDateFormat($datefrom)." 00:00:00";
        $dateto =$engine->getDateFormat($dateto)." 23:59:59";
           
     
          $history_stmt=$sql->GETALL($sql->Prepare("SELECT * FROM rk_clients_tb WHERE (CLIENT_DATE_CREATED BETWEEN ? AND ?) "),array($datefrom,$dateto));
          
          $export_url ="public/report/clientreport/view/exportxml.php?&datefrom=".$datefrom."&dateto=".$dateto;

    
   
break;


    

}//case view ends
 


include('model/js.php')

?>
