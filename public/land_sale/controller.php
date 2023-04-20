<?php

$stmtlist;


  switch($viewpage){

   case 'add':
   
    $ls_prop_name = isset($ls_prop_name)?$ls_prop_name : "";
    if($ls_prop_name != ""){
      $arr_ls_prop_name =explode("@@@", $ls_prop_name);
      $ls_prop_id =$arr_ls_prop_name[0];
      $ls_prop_name =$arr_ls_prop_name[1];
    }
  
    $stmtusr = $sql->Execute($sql->Prepare("SELECT LS_CODE FROM land_sale_tb WHERE  LS_PLOT_NUMBER = ".$sql->Param('a')." AND LS_PROPERTY_ID  = ".$sql->Param('b')." LIMIT 1"),array($ls_plot_number, $ls_prop_id));
      print $sql->ErrorMsg();	

      if($stmtusr->recordCount() < 1){

    $ls_balance = str_replace(',', '', $ls_total_cost) - str_replace(',', '', $ls_total_payment);

    
     $ls_balance = number_format($ls_balance, 3)."\n";
    

    if($ls_total_payment >= $ls_total_cost && $ls_balance <= 0 ){
      $status = '3';
    }
    else{
      $status = '2';
    }

    $ls_repayDate = date('Y-m-d', strtotime($payment_date. ' + '.$ls_payment_plan_add.' days'));

   

   
  
    $ls_code = $engine->getLandSaleCode($sql);

    $ls_payment_plan_add = isset($ls_payment_plan_add)?$ls_payment_plan_add : "";


    $stmt =$sql->Execute($sql->Prepare("INSERT INTO land_sale_tb (LS_CODE, LS_PROPERTY_NAME, LS_PROPERTY_ID,LS_CLIENT_NAME, LS_CLIENT_ID, LS_CLIENT_CONTACT, LS_CLIENT_EMAIL, LS_NUM_OF_PLOT, LS_PLOT_NUMBER, LS_PAYMENT_TERM, LS_PAYMENT_PLAN, LS_TOTAL_COST,LS_TOTAL_PAYMENT,LS_BALANCE, LS_LAST_PAYMENT,LS_PAYMENT_DATE, LS_NEXT_PAY_DATE, LS_STATUS) 
    VALUES(".$sql->Param('1').",".$sql->Param('2').",".$sql->Param('3').",".$sql->Param('4').",".$sql->Param('5').",".$sql->Param('6').",".$sql->Param('7').",".$sql->Param('8').",".$sql->Param('9').",".$sql->Param('10').",".$sql->Param('11').",".$sql->Param('12').",".$sql->Param('13').",".$sql->Param('14').",".$sql->Param('15').",".$sql->Param('14').",".$sql->Param('15').",".$sql->Param('16').")"),
    array($ls_code, $ls_prop_name, $ls_prop_id, $ls_client_name, $ls_client_id, $ls_client_contact, $ls_client_email, $ls_num_plot,  $ls_plot_number, $ls_payment_term, $ls_payment_plan_add, $ls_total_cost, $ls_total_payment, $ls_balance, $ls_total_payment, $payment_date, $ls_repayDate, $status));
    print $sql->ErrorMsg();
    

    
    $alt_code = $engine->getTransactionCode($sql);

    $stmt =$sql->Execute($sql->Prepare("INSERT INTO all_transactions_tb (ALT_CODE, ALT_PAYMENT_ID, ALT_PROPERTY_NAME, ALT_PROPERTY_ID, ALT_CLIENT_NAME, ALT_CLIENT_ID, ALT_PROPERTY_TYPE, ALT_TOTAL_COST, ALT_TOTAL_PAYMENT, ALT_PAY_DATE, ALT_BALANCE) 
    VALUES(".$sql->Param('1').",".$sql->Param('2').",".$sql->Param('3').",".$sql->Param('4').",".$sql->Param('5').",".$sql->Param('6').",".$sql->Param('7').",".$sql->Param('8').",".$sql->Param('9').",".$sql->Param('10').",".$sql->Param('11').")"),
    array($alt_code, $ls_code, $ls_prop_name, $ls_prop_id, $ls_client_name, $ls_client_id, "LAND", $ls_total_cost, $ls_total_payment, $payment_date, $ls_balance));
    print $sql->ErrorMsg();


    if($stmt){
      $msg = "land sale added successfully.";
      $status = "success";
      $view ='list';
      }
      else{
          $msg = "Oops failed to add land sale.";
          $status = "error";
          $view ='list';
      }

    }
    
    else{
      $msg = "Sorry! The land with this plot number is already sold.";
      $status = "error";
      $view ='add';
    }

    break;
    

    case 'details':

      $stmtlist = $sql->Execute($sql->Prepare("SELECT LS_CODE, LS_PROPERTY_NAME, LS_PROPERTY_ID,LS_CLIENT_NAME, LS_CLIENT_ID, LS_CLIENT_CONTACT, LS_CLIENT_EMAIL, LS_NUM_OF_PLOT, LS_PLOT_NUMBER, LS_PAYMENT_TERM, LS_PAYMENT_PLAN,LS_TOTAL_COST,LS_TOTAL_PAYMENT,LS_BALANCE,LS_NEXT_PAY_DATE, LS_STATUS FROM land_sale_tb  WHERE  LS_CODE = ".$sql->Param('a')." AND LS_STATUS IN ('1','2','3') LIMIT 1"),array($keys));
      print $sql->ErrorMsg();	
      
      
      $stmtPayList = $sql->Execute($sql->Prepare("SELECT ALT_CODE, ALT_PAYMENT_ID, ALT_PROPERTY_NAME, ALT_PROPERTY_ID, ALT_CLIENT_NAME, ALT_CLIENT_ID, ALT_PROPERTY_TYPE, ALT_TOTAL_COST, ALT_TOTAL_PAYMENT, ALT_BALANCE, ALT_PAY_DATE, ALT_DATE_ADDED FROM all_transactions_tb WHERE ALT_PAYMENT_ID = ".$sql->Param('1')." AND ALT_STATUS IN ('1', '2', '3') ORDER BY ALT_ID DESC "),array($keys));
      print $sql->ErrorMsg();
        
     break;


    case 'client_details':
     
     $stmtlist = $sql->Execute($sql->Prepare("SELECT  * FROM rk_clients_tb WHERE CLIENT_CODE = ".$sql->Param('1')."  LIMIT 1"),array($keys));
     print $sql->ErrorMsg();		
    
     break;


      
     case 'add_payment':

      $ls_total_payment = $ls_total_payment + $payment_amt;

      $ls_balance = $ls_total_cost - $ls_total_payment;
  
      if($ls_total_payment >= $ls_total_cost && $ls_balance <= 0 ){
        $status = '3';
      }
      else{
        $status = '2';
      }
      

      $newPayDate = date("Y-m-d", strtotime(str_replace('/', '-', $payment_date))); 

      $ls_repayDate = date('Y-m-d', strtotime($newPayDate. ' + '.$ls_payment_plan.' days'));

      $stmt = $sql->Execute($sql->Prepare("UPDATE land_sale_tb SET LS_PROPERTY_NAME = ".$sql->Param('1').", LS_PROPERTY_ID = ".$sql->Param('2').",LS_CLIENT_NAME = ".$sql->Param('3').", LS_CLIENT_ID = ".$sql->Param('4').",  LS_TOTAL_COST = ".$sql->Param('10').",LS_TOTAL_PAYMENT = ".$sql->Param('11').",LS_BALANCE = ".$sql->Param('12').", LS_LAST_PAYMENT = ".$sql->Param('13').", LS_NEXT_PAY_DATE = ".$sql->Param('14').", LS_PAYMENT_PLAN = ".$sql->Param('13').", LS_PAYMENT_DATE = ".$sql->Param('13').", LS_STATUS=".$sql->Param('14'). " WHERE LS_CODE =".$sql->Param('15')),array($ls_prop_name, $ls_prop_id, $ls_client_name, $ls_client_id, $ls_total_cost, $ls_total_payment, $ls_balance, $payment_amt, $ls_repayDate, $ls_payment_plan, $payment_date, $status,$ls_code ));
      print $sql->ErrorMsg();



      $alt_code = $engine->getTransactionCode($sql);

      $stmt =$sql->Execute($sql->Prepare("INSERT INTO all_transactions_tb (ALT_CODE, ALT_PAYMENT_ID, ALT_PROPERTY_NAME, ALT_PROPERTY_ID, ALT_CLIENT_NAME, ALT_CLIENT_ID, ALT_PROPERTY_TYPE, ALT_TOTAL_COST, ALT_TOTAL_PAYMENT, ALT_BALANCE, ALT_PAY_DATE, ALT_STATUS) 
      VALUES(".$sql->Param('1').",".$sql->Param('2').",".$sql->Param('3').",".$sql->Param('4').",".$sql->Param('5').",".$sql->Param('6').",".$sql->Param('7').",".$sql->Param('8').",".$sql->Param('9').",".$sql->Param('10').",".$sql->Param('11').",".$sql->Param('12').")"),
      array($alt_code, $ls_code, $ls_prop_name, $ls_prop_id, $ls_client_name, $ls_client_id, "LAND", $ls_total_cost, $ls_total_payment, $ls_balance, $payment_date, $status));
      print $sql->ErrorMsg();

        


      if($stmt){
        $msg = "Land payment added successfully.";
        $status = "success";
        
        }
        else{
            $msg = "Oops failed to add Land payment.";
            $status = "error";
            
        }



      break;

      case 'land_edit_details':
       

        $stmtlist = $sql->Execute($sql->Prepare("SELECT LS_CODE, LS_PROPERTY_NAME, LS_PROPERTY_ID,LS_CLIENT_NAME, LS_CLIENT_ID, LS_CLIENT_CONTACT, LS_CLIENT_EMAIL, LS_NUM_OF_PLOT, LS_PLOT_NUMBER, LS_PAYMENT_TERM, LS_PAYMENT_PLAN, LS_TOTAL_COST,LS_TOTAL_PAYMENT,LS_BALANCE, LS_NEXT_PAY_DATE, LS_PAYMENT_DATE, LS_STATUS FROM land_sale_tb WHERE  LS_CODE = ".$sql->Param('a')."  LIMIT 1"),array($keys));
        print $sql->ErrorMsg();

        break;

        case 'update_land_edit':
              
      
          $ls_prop_name = isset($ls_prop_name)?$ls_prop_name : "";
          if($ls_prop_name != ""){
            $arr_ls_prop_name =explode("@@@", $ls_prop_name);
            $ls_prop_id =$arr_ls_prop_name[0];
            $ls_prop_name =$arr_ls_prop_name[1];
          }

          $stmtusr = $sql->Execute($sql->Prepare("SELECT LS_CODE FROM land_sale_tb WHERE  LS_PLOT_NUMBER = ".$sql->Param('a')." AND LS_PROPERTY_ID  = ".$sql->Param('b')." AND LS_CODE  != ".$sql->Param('c')." LIMIT 1"),array($ls_plot_number, $ls_prop_id, $keys));
            print $sql->ErrorMsg();	   
      
            if($stmtusr->recordCount() < 1){ 

               
          $ls_balance = str_replace(',', '', $ls_balance);
          $ls_total_cost = str_replace(',', '', $ls_total_cost);
          $ls_total_payment = str_replace(',', '', $ls_total_payment);

          $ls_balance = $ls_total_cost - $ls_total_payment;

          if($ls_total_payment >= $ls_total_cost && $ls_balance <= 0 ){
            $status = '3';
          }
          else{
            $status = '2';
        
          }


        $payment_plan = "";
        if($ls_payment_term == "installment"){
          $payment_plan = $ls_payment_plan;
        }

           $stmt =$sql->Execute($sql->Prepare("UPDATE land_sale_tb SET LS_PROPERTY_NAME =".$sql->Param('a').", LS_NUM_OF_PLOT =".$sql->Param('a').", LS_PAYMENT_TERM =".$sql->Param('a').", LS_PAYMENT_PLAN =".$sql->Param('a').",LS_TOTAL_COST =".$sql->Param('a').", LS_PLOT_NUMBER =".$sql->Param('a').",LS_BALANCE =".$sql->Param('a').",LS_TOTAL_PAYMENT =".$sql->Param('a')." WHERE LS_CODE =".$sql->Param('a')." "),
          [$ls_prop_name, $ls_num_plot, $ls_payment_term, $payment_plan, $ls_total_cost, $ls_plot_number,$ls_balance,$ls_total_payment, $keys]);
        print $sql->ErrorMsg();

         
        
      if($sql->affected_rows() > 0 ){
            $msg = "Land Sale details updated successfully.";
            $status = "success";
            $view ='details';
          }
          else{
            $msg = "Oops failed to update Land Sale details.";
            $status = "error";
            $view ='details';
          }
          
        }
    
        else{
          $msg = "Sorry! The land with this plot number is already sold.";
          $status = "error";
          $view ='add';
        }

        
        $stmtlist = $sql->Execute($sql->Prepare("SELECT LS_CODE, LS_PROPERTY_NAME, LS_PROPERTY_ID,LS_CLIENT_NAME, LS_CLIENT_ID, LS_CLIENT_CONTACT, LS_CLIENT_EMAIL, LS_NUM_OF_PLOT, LS_PLOT_NUMBER, LS_PAYMENT_TERM, LS_PAYMENT_PLAN, LS_TOTAL_COST,LS_TOTAL_PAYMENT,LS_BALANCE, LS_NEXT_PAY_DATE, LS_STATUS FROM land_sale_tb WHERE  LS_CODE = ".$sql->Param('a')."  LIMIT 1"),array($keys));
        print $sql->ErrorMsg();

       $stmtPayList = $sql->Execute($sql->Prepare("SELECT ALT_CODE, ALT_PAYMENT_ID, ALT_PROPERTY_NAME, ALT_PROPERTY_ID, ALT_CLIENT_NAME, ALT_CLIENT_ID, ALT_PROPERTY_TYPE, ALT_TOTAL_COST, ALT_TOTAL_PAYMENT, ALT_BALANCE, ALT_PAY_DATE, ALT_DATE_ADDED FROM all_transactions_tb WHERE ALT_PAYMENT_ID = ".$sql->Param('1')." AND ALT_STATUS IN ('1', '2', '3') ORDER BY ALT_ID DESC "),array($keys));
      print $sql->ErrorMsg();
    
        break;
        



     case 'update':

      $stmt = $sql->Execute($sql->Prepare("UPDATE land_sale_tb SET LS_PROPERTY_NAME = ".$sql->Param('1').", LS_PROPERTY_ID = ".$sql->Param('2').",LS_CLIENT_NAME = ".$sql->Param('3').", LS_CLIENT_ID = ".$sql->Param('4').", LS_CLIENT_CONTACT = ".$sql->Param('5').", LS_CLIENT_EMAIL = ".$sql->Param('6').", LS_NUM_OF_PLOT = ".$sql->Param('7').", LS_PLOT_NUMBER = ".$sql->Param('8').", LS_PAYMENT_TERM = ".$sql->Param('9').",LS_TOTAL_COST = ".$sql->Param('10').",LS_TOTAL_PAYMENT = ".$sql->Param('11').",LS_BALANCE = ".$sql->Param('12').", LS_STATUS=".$sql->Param('13'). " WHERE LS_CODE =".$sql->Param('14')." AND 
      LS_STATUS IN ('1','0')"),array($ls_prop_name, $ls_prop_id, $ls_client_name, $ls_client_id, $ls_client_contact, $ls_client_email, $ls_num_plot, $ls_plot_number, $ls_payment_term, $ls_total_cost, $ls_total_payment, $ls_balance, $ls_code ));
      print $sql->ErrorMsg();

      if($stmt){
        $msg = "Land Sale updated successfully.";
        $status = "success";
        $view ='list';
        }
        else{
            $msg = "Oops failed to update Land Sale.";
            $status = "error";
            $view ='list';
        }

      break;


      case 'delete':

        $stmt = $sql->Execute($sql->Prepare("UPDATE land_sale_tb SET LS_STATUS = '1''0' WHERE LS_CODE = ".$sql->Param('a')." LIMIT 1"),array($keys));
        print $sql->ErrorMsg();
  
        if($stmt){
          $msg = "Land deleted successfully.";
          $status = "success";
          $view ='list';
          }
          else{
              $msg = "Oops failed to delete Land.";
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

      $query = "SELECT LS_CODE, LS_PROPERTY_NAME, LS_PROPERTY_ID,LS_CLIENT_NAME, LS_CLIENT_ID, LS_CLIENT_CONTACT, LS_CLIENT_EMAIL, LS_NUM_OF_PLOT, LS_PLOT_NUMBER, LS_PAYMENT_TERM,LS_TOTAL_COST,LS_TOTAL_PAYMENT,LS_BALANCE, LS_NEXT_PAY_DATE, LS_STATUS FROM land_sale_tb  WHERE  
      LS_STATUS IN  ('1','2','3') AND LS_CLIENT_ID= ".$sql->Param('a')." OR LS_PLOT_NUMBER LIKE ".$sql->Param('b')." OR LS_CLIENT_NAME LIKE ".$sql->Param('c')." ORDER BY LS_ID DESC";
         $input =array($fdsearch, "%".$fdsearch, "%".$fdsearch."%");  

    }else{ 
      $query = "SELECT  LS_CODE, LS_PROPERTY_NAME, LS_PROPERTY_ID,LS_CLIENT_NAME, LS_CLIENT_ID, LS_CLIENT_CONTACT, LS_CLIENT_EMAIL, LS_NUM_OF_PLOT, LS_PLOT_NUMBER, LS_PAYMENT_TERM,LS_TOTAL_COST,LS_TOTAL_PAYMENT,LS_BALANCE, LS_NEXT_PAY_DATE, LS_STATUS  FROM land_sale_tb   WHERE  LS_STATUS IN ('1','2','3') ORDER BY LS_ID DESC";
      $input =array();
    }
  }
  else{ 
    $query = "SELECT LS_CODE, LS_PROPERTY_NAME, LS_PROPERTY_ID,LS_CLIENT_NAME, LS_CLIENT_ID, LS_CLIENT_CONTACT, LS_CLIENT_EMAIL, LS_NUM_OF_PLOT, LS_PLOT_NUMBER, LS_PAYMENT_TERM,LS_TOTAL_COST,LS_TOTAL_PAYMENT,LS_BALANCE, LS_NEXT_PAY_DATE, LS_STATUS  FROM land_sale_tb  WHERE  LS_STATUS IN ('1','2','3') ORDER BY LS_ID DESC";
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
  