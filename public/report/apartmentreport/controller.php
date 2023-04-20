<?php



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
        
        
     
        if($apartment == ""){

        $history_stmt=$sql->GETALL($sql->Prepare("SELECT * FROM rent_tb WHERE (AR_CREATED_DATE BETWEEN ? AND ?)" ),array($datefrom,$dateto));
        print $sql->ErrorMsg();
        $export_url ="public/report/apartmentreport/view/exportxml.php?&datefrom=".$datefrom."&dateto=".$dateto;

      }else{
        $history_stmt= $sql->GETALL($sql->Prepare("SELECT * FROM rent_tb WHERE AR_PROPERTY_ID = ? AND (AR_CREATED_DATE BETWEEN ? AND ?) " ),array($apartment,$datefrom,$dateto));
        print $sql->ErrorMsg();
        $export_url ="public/report/apartmentreport/view/exportxml.php?&datefrom=".$datefrom."&dateto=".$dateto."&apartment=".$apartment;
      }
    //  var_dump($history_stmt);
          
    //     die();

   
break;


    

}//case view ends
 


include('model/js.php')

?>
