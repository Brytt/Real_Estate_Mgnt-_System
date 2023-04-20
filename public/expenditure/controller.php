<?php

$stmtlist;

  switch($viewpage){

    //The api call for add submit buttion clicked
    case 'add':
      



      $exp_code = $engine->getExpenditureCode($sql);

      $stmt =$sql->Execute($sql->Prepare("INSERT INTO expenditure_tb (EXP_CODE, EXP_TITLE, EXP_AMOUNT, EXP_RECIEPT_DATE, EXP_PAYER_NAME, EXP_PAYER_CONTACT, EXP_PAYMENT_PURPOSE) 
      VALUES(".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('d').",
      ".$sql->Param('e')." ,".$sql->Param('g').", ".$sql->Param('h').")"),array($exp_code, $ex_title, $ex_amount,$ex_rec_date, $ex_name, $ex_contact, $ex_purpose));
      print $sql->ErrorMsg();

        


      if($stmt){
        $msg = "Expenditure added successfully.";
        $status = "success";
        $view ='list';
        }
        else{
            $msg = "Oops failed to add Expenditure.";
            $status = "error";
            $view ='list';
        }

        
    break;
      




  

    case 'details':

      $stmtlist = $sql->Execute($sql->Prepare("SELECT EXP_CODE, EXP_ID, EXP_TITLE, EXP_AMOUNT, EXP_RECIEPT_NUM, EXP_RECIEPT_DATE, EXP_PAYER_NAME, EXP_PAYER_CONTACT, EXP_PAYMENT_PURPOSE, EXP_STATUS FROM expenditure_tb WHERE  EXP_CODE = ".$sql->Param('a')." AND EXP_STATUS IN ('1','0')  LIMIT 1"),array($keys));
      print $sql->ErrorMsg();		


     break;

     case 'update':

      $stmt = $sql->Execute($sql->Prepare("UPDATE expenditure_tb SET EXP_TITLE = ".$sql->Param('1').",  EXP_AMOUNT =".$sql->Param('2').", EXP_RECIEPT_DATE=".$sql->Param('4').", EXP_PAYER_NAME=".$sql->Param('5').", EXP_PAYER_CONTACT=".$sql->Param('6').", EXP_PAYMENT_PURPOSE=".$sql->Param('7')."  WHERE EXP_CODE =".$sql->Param('9')." AND EXP_STATUS IN ('1','0')"),array($ex_title, $ex_amount, $ex_rec_date, $ex_name, $ex_contact, $ex_purpose, $exp_code));
      print $sql->ErrorMsg();	

      if($stmt){
        $msg = "Expenditure updated successfully.";
        $status = "success";
        $view ='list';
        }
        else{
            $msg = "Oops failed to update Expenditure.";
            $status = "error";
            $view ='list';
        }
      
    break;

    case 'delete':

      $stmt = $sql->Execute($sql->Prepare("UPDATE expenditure_tb SET EXP_STATUS = '0' WHERE EXP_CODE = ".$sql->Param('a')),array($keys));
      print $sql->ErrorMsg();

      if($stmt){
        $msg = "expenditure successfully.";
        $status = "success";
        $view ='list';
        }
        else{
            $msg = "Oops failed to expenditure.";
            $status = "error";
            $view ='list';
        }

      break;

    case 'reset':
      $limit = 10;
      $fdsearch = "";

    break;


    }




    //This is the a method that is always called to fetch paginated items using the user group

      //This is the expenditure method that is always called to fetch paginated items using the user group

      
      if($viewpage == "search"){
        if(isset($fdsearch) && $fdsearch != ""){

          $query = "SELECT EXP_CODE, EXP_TITLE, EXP_AMOUNT, EXP_RECIEPT_NUM, EXP_RECIEPT_DATE, EXP_PAYER_NAME, EXP_PAYER_CONTACT, EXP_PAYMENT_PURPOSE, EXP_STATUS FROM expenditure_tb WHERE   EXP_STATUS IN  ('1','2','3') AND EXP_TITLE = ".$sql->Param('a')." OR EXP_TITLE LIKE ".$sql->Param('b')." OR EXP_PAYER_CONTACT LIKE ".$sql->Param('c')." OR EXP_PAYER_NAME LIKE ".$sql->Param('d')." ORDER BY EXP_ID DESC";
          $input = array($fdsearch, "%".$fdsearch."%","%".$fdsearch."%","%".$fdsearch."%"); 

        }else{ 
          $query = "SELECT EXP_CODE, EXP_TITLE, EXP_AMOUNT, EXP_RECIEPT_NUM, EXP_RECIEPT_DATE, EXP_PAYER_NAME, EXP_PAYER_CONTACT, EXP_PAYMENT_PURPOSE, EXP_STATUS FROM expenditure_tb  WHERE  EXP_STATUS IN  ('1','2','3') ORDER BY EXP_ID DESC";
          $input =array();
        }
      }
      else{ 
        $query = "SELECT  EXP_CODE, EXP_TITLE, EXP_AMOUNT, EXP_RECIEPT_NUM, EXP_RECIEPT_DATE, EXP_PAYER_NAME, EXP_PAYER_CONTACT, EXP_PAYMENT_PURPOSE, EXP_STATUS FROM expenditure_tb  WHERE  EXP_STATUS IN  ('1','2','3') ORDER BY EXP_ID DESC";
        $input =array();
      }

    
    if(!isset($limit)){
      $limit = $session->get("limited");
    }else if(empty($limit)){
      $limit =20;
    }
    
    $session->set("limited",$limit);
    $lenght = 10;
    $paging = new OS_Pagination($sql,$query,$limit,$lenght,"pg=".$pg."&option=".$option, isset($input) ?$input:  []);
  

