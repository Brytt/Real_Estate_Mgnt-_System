<?php

$stmtlist;

  switch($viewpage){

   case 'add':
        
      $ar_balance = $ar_total_cost - $ar_total_payment;
  
      if($ar_total_payment >= $ar_total_cost && $ar_balance <= 0 ){
        $status = '3';
      }
      else{
        $status = '2';
      }
  
  
        $ar_prop_name = isset($ar_prop_name)?$ar_prop_name : "";
        if($ar_prop_name != ""){
          $arr_ar_prop_name =explode("@@@", $ar_prop_name);
          $ar_prop_id =$arr_ar_prop_name[0];
          $ar_prop_name =$arr_ar_prop_name[1];
      }
    
    $ar_code = $engine->getRentCode($sql);

    $stmt =$sql->Execute($sql->Prepare("INSERT INTO  rent_tb (AR_CODE, AR_PROPERTY_NAME, AR_PROPERTY_ID,AR_CLIENT_NAME, AR_CLIENT_ID, AR_CLIENT_CONTACT, AR_CLIENT_EMAIL, AR_APARTMENT_NUMBER, AR_DURATION, AR_TOTAL_COST,AR_TOTAL_PAYMENT,AR_CHECKED_IN_DATE,AR_LAST_PAYMENT,AR_CHECKING_OUT_DATE, AR_BALANCE, AR_PAY_STATUS, AR_PAYMENT_DATE)  
    VALUES(".$sql->Param('1').",".$sql->Param('2').",".$sql->Param('3').",".$sql->Param('4').",".$sql->Param('5').",".$sql->Param('6').",".$sql->Param('7').",".$sql->Param('8').",".$sql->Param('9').",".$sql->Param('10').",".$sql->Param('11').",".$sql->Param('12').",".$sql->Param('13').",".$sql->Param('14').",".$sql->Param('15').",".$sql->Param('16').",".$sql->Param('17').")"),
    array($ar_code, $ar_prop_name, $ar_prop_id, $ar_client_name, $ar_client_id, $ar_client_contact, $ar_client_email, $ar_apartment_num,  $ar_duration, $ar_total_cost, $ar_total_payment, $ar_checked_in_date,$ar_total_payment, $ar_checking_out_date, $ar_balance, $status, $payment_date));
    print $sql->ErrorMsg();
    
    
  $alt_code = $engine->getTransactionCode($sql);

  $stmt =$sql->Execute($sql->Prepare("INSERT INTO all_transactions_tb (ALT_CODE, ALT_PAYMENT_ID, ALT_PROPERTY_NAME, ALT_PROPERTY_ID, ALT_CLIENT_NAME, ALT_CLIENT_ID, ALT_PROPERTY_TYPE, ALT_TOTAL_COST, ALT_TOTAL_PAYMENT, ALT_BALANCE, ALT_PAY_DATE) VALUES(".$sql->Param('1').",".$sql->Param('2').",".$sql->Param('3').",".$sql->Param('4').",".$sql->Param('5').",".$sql->Param('6').",".$sql->Param('7').",".$sql->Param('8').",".$sql->Param('9').",".$sql->Param('10').",".$sql->Param('11').")"),
  array($alt_code, $ar_code, $ar_prop_name, $ar_prop_id, $ar_client_name, $ar_client_id, "RENT", $ar_total_cost, $ar_total_payment, $ar_balance, $payment_date));
  print $sql->ErrorMsg();

  
  
      if($stmt){
        $msg = "Apartment Rent added  successfully.";
        $status = "success";
        $view ='list';
        }
        else{
            $msg = "Oops failed to add Apartment Rent.";
            $status = "error";
            $view ='list';
        }
  
      
    break;

    case 'details':
     
      $stmtlist = $sql->Execute($sql->Prepare("SELECT AR_CODE, AR_PROPERTY_NAME, AR_PROPERTY_ID,AR_CLIENT_NAME, AR_CLIENT_ID, AR_CLIENT_CONTACT, AR_CLIENT_EMAIL, AR_DURATION,AR_CHECKED_IN_DATE, AR_CHECKING_OUT_DATE, AR_APARTMENT_NUMBER, AR_TOTAL_COST,AR_TOTAL_PAYMENT,AR_BALANCE, AR_PAYMENT_DATE, AR_STATUS,	AR_PAY_STATUS FROM rent_tb 
       WHERE  AR_CODE = ".$sql->Param('a')."  LIMIT 1"),array($keys));
       print $sql->ErrorMsg();
       $stmtPayList = $sql->Execute($sql->Prepare("SELECT ALT_CODE, ALT_PAYMENT_ID, ALT_PROPERTY_NAME, ALT_PROPERTY_ID, ALT_CLIENT_NAME, ALT_CLIENT_ID, ALT_PROPERTY_TYPE, ALT_TOTAL_COST, ALT_TOTAL_PAYMENT, ALT_BALANCE,ALT_PAY_DATE, ALT_DATE_ADDED FROM all_transactions_tb WHERE ALT_PAYMENT_ID = ".$sql->Param('1')." AND ALT_STATUS IN ('1', '2', '3') ORDER BY ALT_ID DESC "),array($keys));
             print $sql->ErrorMsg();
               
     break;



    case 'client_details':
     
      $stmtlist = $sql->Execute($sql->Prepare("SELECT  * FROM rk_clients_tb WHERE CLIENT_CODE = ".$sql->Param('1')."  LIMIT 1"),array($keys));
      print $sql->ErrorMsg();		
     
      break;
    


     case 'add_payment':

      $ar_total_payment = $ar_total_payment + $payment_amt;

      $ar_balance = $ar_total_cost - $ar_total_payment;
  
      if($ar_total_payment >= $ar_total_cost && $ar_balance <= 0 ){
        $status = '3';
      }
      else{
        $status = '2';
      }
      

      $stmt = $sql->Execute($sql->Prepare("UPDATE rent_tb SET AR_PROPERTY_NAME = ".$sql->Param('1').", AR_PROPERTY_ID = ".$sql->Param('2').",AR_CLIENT_NAME = ".$sql->Param('3').", AR_CLIENT_ID = ".$sql->Param('4').",  AR_TOTAL_COST = ".$sql->Param('10').",AR_TOTAL_PAYMENT = ".$sql->Param('11').",AR_BALANCE = ".$sql->Param('12').", AR_LAST_PAYMENT = ".$sql->Param('13').", AR_STATUS=".$sql->Param('14'). " WHERE AR_CODE =".$sql->Param('15')),array($ar_prop_name, $ar_prop_id, $ar_client_name, $ar_client_id, $ar_total_cost, $ar_total_payment, $ar_balance, $payment_amt, $status,$ar_code ));
      print $sql->ErrorMsg();



      $alt_code = $engine->getTransactionCode($sql);

      $stmt =$sql->Execute($sql->Prepare("INSERT INTO all_transactions_tb (ALT_CODE, ALT_PAYMENT_ID, ALT_PROPERTY_NAME, ALT_PROPERTY_ID, ALT_CLIENT_NAME, ALT_CLIENT_ID, ALT_PROPERTY_TYPE, ALT_TOTAL_COST, ALT_TOTAL_PAYMENT, ALT_BALANCE, ALT_PAY_DATE, ALT_STATUS) 
      VALUES(".$sql->Param('1').",".$sql->Param('2').",".$sql->Param('3').",".$sql->Param('4').",".$sql->Param('5').",".$sql->Param('6').",".$sql->Param('7').",".$sql->Param('8').",".$sql->Param('9').",".$sql->Param('10').",".$sql->Param('11').",".$sql->Param('12').")"),
      array($alt_code, $ar_code, $ar_prop_name, $ar_prop_id, $ar_client_name, $ar_client_id, "RENT", $ar_total_cost, $ar_total_payment, $ar_balance, $payment_date, $status));
      print $sql->ErrorMsg();

        


      if($stmt){
        $msg = "Rent payment added successfully.";
        $status = "success";
        
        }
        else{
            $msg = "Oops failed to add Rent payment.";
            $status = "error";
            
        }



      break;

      case 'update_rent_apartment': 
   
        $ar_balance = $ar_total_cost - $ar_total_payment;
    
        if($ar_total_payment >= $ar_total_cost && $ar_balance <= 0 ){
          $status = '3';
        }
        else{
          $status = '2';
        }
    
        
          $ar_prop_id ="";
          $ar_prop_name = isset($ar_prop_name)?$ar_prop_name : "";
          if($ar_prop_name != ""){
            $arr_ar_prop_name =explode("@@@", $ar_prop_name);
            $ar_prop_id =$arr_ar_prop_name[0];
            $ar_prop_name =$arr_ar_prop_name[1];
        }
    
  
      $stmt =$sql->Execute($sql->Prepare("UPDATE rent_tb SET AR_PROPERTY_NAME = ".$sql->Param('1').",  AR_PROPERTY_ID = ".$sql->Param('2').", AR_APARTMENT_NUMBER= ".$sql->Param('3').", AR_DURATION =".$sql->Param('4').", AR_TOTAL_COST = ".$sql->Param('5').", AR_CHECKED_IN_DATE = ".$sql->Param('6').", AR_CHECKING_OUT_DATE = ".$sql->Param('7').", AR_BALANCE = ".$sql->Param('8').", 	AR_PAY_STATUS =  ".$sql->Param('9')."  WHERE AR_CODE = ".$sql->Param('10')),
      array($ar_prop_name, $ar_prop_id, $ar_apartment_num,  $ar_duration, $ar_total_cost, $ar_checked_in_date, $ar_checking_out_date, $ar_balance, $status, $keys));
      print $sql->ErrorMsg();
    


    $stmtlist = $sql->Execute($sql->Prepare("SELECT AR_CODE, AR_PROPERTY_NAME, AR_PROPERTY_ID,AR_CLIENT_NAME, AR_CLIENT_ID, AR_CLIENT_CONTACT, AR_CLIENT_EMAIL, AR_DURATION,AR_CHECKED_IN_DATE, AR_CHECKING_OUT_DATE, AR_APARTMENT_NUMBER, AR_TOTAL_COST,AR_TOTAL_PAYMENT,AR_BALANCE, AR_PAYMENT_DATE, 	AR_PAY_STATUS, AR_STATUS FROM rent_tb 
    WHERE  AR_CODE = ".$sql->Param('a')."  LIMIT 1"),array($keys));
     print $sql->ErrorMsg();

    $stmtPayList = $sql->Execute($sql->Prepare("SELECT ALT_CODE, ALT_PAYMENT_ID, ALT_PROPERTY_NAME, ALT_PROPERTY_ID, ALT_CLIENT_NAME, ALT_CLIENT_ID, ALT_PROPERTY_TYPE, ALT_TOTAL_COST, ALT_TOTAL_PAYMENT, ALT_BALANCE,ALT_PAY_DATE, ALT_DATE_ADDED FROM all_transactions_tb WHERE ALT_PAYMENT_ID = ".$sql->Param('1')." AND ALT_STATUS IN ('1', '2', '3') ORDER BY ALT_ID DESC "),array($keys));
   print $sql->ErrorMsg();
    

       
    if($stmt){
      $msg = "Apartment rental updated successfully.";
      $status = "success";
      $view ='list';
      }
      else{
          $msg = "Oops failed to add Apartment Rent.";
          $status = "error";
          $view ='list';
      }

  
break;



     case 'update':

      $stmt = $sql->Execute($sql->Prepare("UPDATE land_sale_tb SET LS_PROPERTY_NAME = ".$sql->Param('1').", LS_PROPERTY_ID = ".$sql->Param('2').",LS_CLIENT_NAME = ".$sql->Param('3').", LS_CLIENT_ID = ".$sql->Param('4').", LS_CLIENT_CONTACT = ".$sql->Param('5').", LS_CLIENT_EMAIL = ".$sql->Param('6').", LS_NUM_OF_PLOT = ".$sql->Param('7').", LS_PLOT_NUMBER = ".$sql->Param('8').", LS_PAYMENT_TERM = ".$sql->Param('9').",LS_TOTAL_COST = ".$sql->Param('10').",LS_TOTAL_PAYMENT = ".$sql->Param('11').",LS_BALANCE = ".$sql->Param('12').", LS_STATUS=".$sql->Param('13'). " WHERE LS_CODE =".$sql->Param('14')." AND LS_STATUS IN ('1','0')"),array($ls_prop_name, $ls_prop_id, $ls_client_name, $ls_client_id, $ls_client_contact, $ls_client_email, $ls_num_plot, $ls_plot_number, $ls_payment_term, $ls_total_cost, $ls_total_payment, $ls_balance, $ls_code ));
      print $sql->ErrorMsg();

      if($stmt){
        $msg = "Quotation updated successfully.";
        $status = "success";
        $view ='list';
        }
        else{
            $msg = "Oops failed to update Quotation.";
            $status = "error";
            $view ='list';
        }

      break;


      case 'delete':

        $stmt = $sql->Execute($sql->Prepare("UPDATE rent_tb SET AR_STATUS = '1''0' WHERE AR_CODE = ".$sql->Param('a')." LIMIT 1"),array($keys));
        print $sql->ErrorMsg();
  
        if($stmt){
          $msg = "Checked-Out successfully.";
          $status = "success";
          $view ='list';
          }
          else{
              $msg = "Oops failed to Check-out.";
              $status = "error";
              $view ='list';
          }
  
        break;


      case 'reset':
        $limit = 10;
        $fdsearch = "";
  
      break;


    }


  //This is the quotation method that is always called to fetch paginated items

  
if($viewpage == "search"){
    if(isset($fdsearch) && $fdsearch != ""){

      $query = "SELECT AR_CODE, AR_PROPERTY_NAME, AR_PROPERTY_ID,AR_CLIENT_NAME, AR_CLIENT_ID, AR_CLIENT_CONTACT, AR_CLIENT_EMAIL, AR_DURATION, AR_APARTMENT_NUMBER, AR_CHECKED_IN_DATE, AR_CHECKING_OUT_DATE, AR_TOTAL_COST,AR_TOTAL_PAYMENT,AR_BALANCE, 	AR_PAY_STATUS, AR_STATUS FROM rent_tb  WHERE AR_STATUS IN  ('1','2') AND AR_CLIENT_ID = ".$sql->Param('a')." OR AR_CLIENT_NAME LIKE ".$sql->Param('b')." ORDER BY AR_ID DESC";
       $input =array($fdsearch, "%".$fdsearch."%");  

    }else{ 
      $query = "SELECT AR_CODE, AR_PROPERTY_NAME, AR_PROPERTY_ID,AR_CLIENT_NAME, AR_CLIENT_ID, AR_CLIENT_CONTACT, AR_CLIENT_EMAIL, AR_DURATION, AR_APARTMENT_NUMBER, AR_CHECKED_IN_DATE, AR_CHECKING_OUT_DATE, AR_TOTAL_COST,AR_TOTAL_PAYMENT,AR_BALANCE,	AR_PAY_STATUS, AR_STATUS FROM rent_tb   WHERE  AR_STATUS IN ('1','2') ORDER BY AR_ID DESC";
      $input =array();
    }
  }
  else{ 
    $query = "SELECT AR_CODE, AR_PROPERTY_NAME, AR_PROPERTY_ID,AR_CLIENT_NAME, AR_CLIENT_ID, AR_CLIENT_CONTACT, AR_CLIENT_EMAIL, AR_DURATION, AR_APARTMENT_NUMBER, AR_CHECKED_IN_DATE, AR_CHECKING_OUT_DATE, AR_TOTAL_COST,AR_TOTAL_PAYMENT,AR_BALANCE, 	AR_PAY_STATUS, AR_STATUS FROM rent_tb WHERE  AR_STATUS IN ('1', '2') ORDER BY AR_ID  DESC";
    $input = array  ();
  }
    
    if(!isset($limit)){
      $limit = $session->get("limited");
    }else if(empty($limit)){
      $limit =20;
    }
    
    $session->set("limited",$limit);
    $lenght = 10;
    $paging = new OS_Pagination($sql,$query,$limit,$lenght,"pg=".$pg."&option=".$option, isset($input) ?$input:  []);
  