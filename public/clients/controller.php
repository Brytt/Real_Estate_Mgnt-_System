<?php


$stmtlist= "";

switch($viewpage){

  case 'add':
  
  $client_code = $engine->generateCode('rk_clients_tb','CLIENT_CODE','CL');
  
  $docJson = "";
  $imagePaths = array();
  $profilePicture = "";
  $uploadDir = "media/uploads/$client_code";
 
  if(! file_exists($uploadDir)){
     mkdir($uploadDir, 0744);          
   }
   
 
   if(isset($_FILES['docFile']['name']) && count($_FILES['docFile']['name'])>=1){
  foreach ($_FILES["docFile"]["error"] as $i => $error) {
   if ($error == UPLOAD_ERR_OK) {

 
     $docFileName = strtoupper($_POST["docFileTitle$i"]);
 
     $fileName = time()."_".basename($_FILES['docFile']['name'][$i]);
     $fileItem = "$uploadDir/$fileName";
     $tempFile =  $_FILES['docFile']['tmp_name'][$i];
     
     if (@move_uploaded_file($tempFile, $fileItem)) {
       $imagePaths[] = array("name"=>$docFileName, "path"=>$fileItem);
     } 
 
   }
 
 }
}
 
 $docJson = json_encode($imagePaths);
 

 
 if(isset($_FILES['profile_pic']['name'])){
              
  $filename = $_FILES['profile_pic']['name'];  
  $tempname   = $_FILES['profile_pic']['tmp_name'];
  
  $file = $uploadDir."/PROFILE_PICTURE_".time().'_'.$filename;
  
  if(move_uploaded_file($tempname, $file)){
    $profilePicture = $file;
  }
 
}

         $stmt =$sql->Execute($sql->Prepare("INSERT INTO rk_clients_tb (
           CLIENT_CODE,       CLIENT_TITLE,       CLIENT_FIRSTNAME,       CLIENT_OTHERNAME, 
           CLIENT_LASTNAME,      CLIENT_DOB,        CLIENT_GENDER,       CLIENT_NATIONALITY, 
           CLIENT_CONTACT_1,       CLIENT_CONTACT_2,       CLIENT_EMAIL,       CLIENT_ADDRESS, 
           CLIENT_DIGITAL_ADDRESS,    CLIENT_OCCUPATION,  CLIENT_DOC_PATH,   CLIENT_PICTURE,    CLIENT_CREATED_BY,
           CLIENT_NOK_NAME, CLIENT_NOK_CONTACT, CLIENT_NOK_RELATIONSHIP, CLIENT_NOK_ADDRESS
           ) 
           VALUES
           (".$sql->Param('1').",".$sql->Param('2').",".$sql->Param('3').",".$sql->Param('4').",".$sql->Param('5').",
           ".$sql->Param('6').",".$sql->Param('7').",".$sql->Param('8').",".$sql->Param('9').",".$sql->Param('10').",".$sql->Param('11').",".$sql->Param('12').",".$sql->Param('13').",".$sql->Param('14').",".$sql->Param('15').",".$sql->Param('16').",".$sql->Param('17').",".$sql->Param('18').",".$sql->Param('19').",".$sql->Param('20').",".$sql->Param('21').")"),
           [
             $client_code, $rk_title, $rk_fname, $rk_mname,  $rk_lname, 
             $rk_dob, $rk_gender, $rk_nationality, 
             $rk_contact1, $rk_contact2, $rk_mail, $rk_address, $rk_dig_address, $rk_occupation, $docJson,
             $profilePicture, $session->get('actorcode'), $rk_kin_fname,  $rk_kin_contact1,
             $rk_kinrelation, $rk_kin_address 
             ]
           );
 
           print $sql->ErrorMsg();
           
         
         
         
         if($stmt){
           $msg = "Client added successfully.";
           $status = "success";
           $view ='list';
           
         }
         else{
           $msg = "Oops failed to add Client.";
           $status = "error";
           $view ='list';
         }
         
 
 
 
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
          
    
          $stmt = $sql->Execute($sql->Prepare("UPDATE land_sale_tb SET LS_PROPERTY_NAME = ".$sql->Param('1').", LS_PROPERTY_ID = ".$sql->Param('2').",LS_CLIENT_NAME = ".$sql->Param('3').", LS_CLIENT_ID = ".$sql->Param('4').",  LS_TOTAL_COST = ".$sql->Param('10').",LS_TOTAL_PAYMENT = ".$sql->Param('11').",LS_BALANCE = ".$sql->Param('12').", LS_LAST_PAYMENT = ".$sql->Param('13').", LS_STATUS=".$sql->Param('14'). " WHERE LS_CODE =".$sql->Param('15')),array($ls_prop_name, $ls_prop_id, $ls_client_name, $ls_client_id, $ls_total_cost, $ls_total_payment, $ls_balance, $payment_amt, $status,$ls_code ));
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



          case 'land_pay_details':

            $stmtlist = $sql->Execute($sql->Prepare("SELECT LS_CODE, LS_PROPERTY_NAME, LS_PROPERTY_ID,LS_CLIENT_NAME, LS_CLIENT_ID, LS_CLIENT_CONTACT, LS_CLIENT_EMAIL, LS_NUM_OF_PLOT, LS_PLOT_NUMBER, LS_PAYMENT_TERM, LS_PAYMENT_PLAN, LS_TOTAL_COST,LS_TOTAL_PAYMENT,LS_BALANCE, LS_NEXT_PAY_DATE, LS_STATUS FROM land_sale_tb WHERE  LS_CODE = ".$sql->Param('a')."  LIMIT 1"),array($keys));
             print $sql->ErrorMsg();

            $stmtPayList = $sql->Execute($sql->Prepare("SELECT ALT_CODE, ALT_PAYMENT_ID, ALT_PROPERTY_NAME, ALT_PROPERTY_ID, ALT_CLIENT_NAME, ALT_CLIENT_ID, ALT_PROPERTY_TYPE, ALT_TOTAL_COST, ALT_TOTAL_PAYMENT, ALT_BALANCE, ALT_PAY_DATE, ALT_DATE_ADDED FROM all_transactions_tb WHERE ALT_PAYMENT_ID = ".$sql->Param('1')." AND ALT_STATUS IN ('1', '2', '3') ORDER BY ALT_ID DESC "),array($keys));
           print $sql->ErrorMsg();
             
             break;


             case 'rent_pay_details':

              $stmtlist = $sql->Execute($sql->Prepare("SELECT AR_CODE, AR_PROPERTY_NAME, AR_PROPERTY_ID,AR_CLIENT_NAME, AR_CLIENT_ID, AR_CLIENT_CONTACT, AR_CLIENT_EMAIL, AR_DURATION,AR_CHECKED_IN_DATE, AR_CHECKING_OUT_DATE, AR_APARTMENT_NUMBER, AR_TOTAL_COST,AR_TOTAL_PAYMENT,AR_BALANCE, AR_PAYMENT_DATE, AR_STATUS,	AR_PAY_STATUS FROM rent_tb 
              WHERE  AR_CODE = ".$sql->Param('a')."  LIMIT 1"),array($keys));
               print $sql->ErrorMsg();

              $stmtPayList = $sql->Execute($sql->Prepare("SELECT ALT_CODE, ALT_PAYMENT_ID, ALT_PROPERTY_NAME, ALT_PROPERTY_ID, ALT_CLIENT_NAME, ALT_CLIENT_ID, ALT_PROPERTY_TYPE, ALT_TOTAL_COST, ALT_TOTAL_PAYMENT, ALT_BALANCE,ALT_PAY_DATE, ALT_DATE_ADDED FROM all_transactions_tb WHERE ALT_PAYMENT_ID = ".$sql->Param('1')." AND ALT_STATUS IN ('1', '2', '3') ORDER BY ALT_ID DESC "),array($keys));
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
            
      
            $stmt = $sql->Execute($sql->Prepare("UPDATE land_sale_tb SET LS_PROPERTY_NAME = ".$sql->Param('1').", LS_PROPERTY_ID = ".$sql->Param('2').",LS_CLIENT_NAME = ".$sql->Param('3').", LS_CLIENT_ID = ".$sql->Param('4').",  LS_TOTAL_COST = ".$sql->Param('10').",LS_TOTAL_PAYMENT = ".$sql->Param('11').",LS_BALANCE = ".$sql->Param('12').", LS_LAST_PAYMENT = ".$sql->Param('13').", LS_STATUS=".$sql->Param('14'). " WHERE LS_CODE =".$sql->Param('15')),array($ls_prop_name, $ls_prop_id, $ls_client_name, $ls_client_id, $ls_total_cost, $ls_total_payment, $ls_balance, $payment_amt, $status,$ls_code ));
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



 
            case 'land_paymentupdate':

              $ls_total_payment = $ls_total_payment + $payment_amt;
        
              $ls_balance = $ls_total_cost - $ls_total_payment;
          

              $newPayDate = date("Y-m-d", strtotime(str_replace('/', '-', $payment_date))); 

              $ls_repayDate = date('Y-m-d', strtotime($newPayDate. ' + '.$ls_payment_plan.' days'));


              if($ls_total_payment >= $ls_total_cost && $ls_balance <= 0 ){
                $status = '3';
              }
              else{
                $status = '2';
              }
              
            

      $stmt = $sql->Execute($sql->Prepare("UPDATE land_sale_tb SET LS_PROPERTY_NAME = ".$sql->Param('1').", LS_PROPERTY_ID = ".$sql->Param('2').",LS_CLIENT_NAME = ".$sql->Param('3').", LS_CLIENT_ID = ".$sql->Param('4').",  LS_TOTAL_COST = ".$sql->Param('10').",LS_TOTAL_PAYMENT = ".$sql->Param('11').",LS_BALANCE = ".$sql->Param('12').", LS_LAST_PAYMENT = ".$sql->Param('13').", LS_NEXT_PAY_DATE = ".$sql->Param('14').", LS_PAYMENT_PLAN = ".$sql->Param('13').", LS_PAYMENT_DATE = ".$sql->Param('13').", LS_STATUS=".$sql->Param('14'). " WHERE LS_CODE =".$sql->Param('15')),array($ls_prop_name, $ls_prop_id, $ls_client_name, $ls_client_id, $ls_total_cost, $ls_total_payment, $ls_balance, $payment_amt, $ls_repayDate, $ls_payment_plan, $payment_date, $status,$ls_code ));
      print $sql->ErrorMsg();


        
              $alt_code = $engine->getTransactionCode($sql);
        
              $stmt =$sql->Execute($sql->Prepare("INSERT INTO all_transactions_tb (ALT_CODE, ALT_PAYMENT_ID, ALT_PROPERTY_NAME, ALT_PROPERTY_ID, ALT_CLIENT_NAME, ALT_CLIENT_ID, ALT_PROPERTY_TYPE, ALT_TOTAL_COST, ALT_TOTAL_PAYMENT, ALT_BALANCE, ALT_PAY_DATE, ALT_STATUS) 
              VALUES(".$sql->Param('1').",".$sql->Param('2').",".$sql->Param('3').",".$sql->Param('4').",".$sql->Param('5').",".$sql->Param('6').",".$sql->Param('7').",".$sql->Param('8').",".$sql->Param('9').",".$sql->Param('10').",".$sql->Param('11').",".$sql->Param('12').")"),
              array($alt_code, $ls_code, $ls_prop_name, $ls_prop_id, $ls_client_name, $ls_client_id, "LAND", $ls_total_cost, $ls_total_payment, $ls_balance, $payment_date, $status));
              print $sql->ErrorMsg();
        
                
              $stmtlist = $sql->Execute($sql->Prepare("SELECT  CLIENT_CODE, CLIENT_TITLE, CLIENT_FIRSTNAME, CLIENT_OTHERNAME, 
              CLIENT_LASTNAME, CLIENT_DOB, CLIENT_GENDER, CLIENT_NATIONALITY, CLIENT_CONTACT_1, CLIENT_CONTACT_2, CLIENT_EMAIL,CLIENT_ADDRESS, CLIENT_DIGITAL_ADDRESS, CLIENT_OCCUPATION, CLIENT_DOC_PATH, CLIENT_PICTURE, CLIENT_CREATED_BY FROM rk_clients_tb WHERE CLIENT_CODE = ".$sql->Param('1')."  LIMIT 1"),array($keys));
             print $sql->ErrorMsg();
               
                $stmtLandList = $sql->Execute($sql->Prepare("SELECT LS_CODE, LS_PROPERTY_NAME, LS_PROPERTY_ID,LS_CLIENT_NAME, LS_CLIENT_ID, LS_CLIENT_EMAIL, LS_NUM_OF_PLOT, LS_PLOT_NUMBER, LS_PAYMENT_TERM, LS_PAYMENT_PLAN, LS_TOTAL_COST,LS_TOTAL_PAYMENT,LS_BALANCE, LS_NEXT_PAY_DATE, LS_STATUS FROM land_sale_tb WHERE LS_CLIENT_ID = ".$sql->Param('a')." AND LS_STATUS IN ('1', '2', '3')  ORDER BY LS_ID DESC "),array($keys));
        
        
              if($stmt){
                $msg = "Land payment added successfully.";
                $status = "success";
                $view = "list";
                
                }
                else{
                    $msg = "Oops failed to add Land payment.";
                    $status = "error";
                  $view = "list";
                }
        
        
        
              break;



              case 'rent_paymentupdate':

                $ar_total_payment = $ar_total_payment + $payment_amt;
          
                $ar_balance = $ar_total_cost - $ar_total_payment;
            
                if($ar_total_payment >= $ar_total_cost && $ar_balance <= 0 ){
                  $status = '3';
                }
                else{
                  $status = '2';
                }

                $stmt = $sql->Execute($sql->Prepare("UPDATE rent_tb SET AR_PROPERTY_NAME = ".$sql->Param('1').", AR_PROPERTY_ID = ".$sql->Param('2').",AR_CLIENT_NAME = ".$sql->Param('3').", AR_CLIENT_ID = ".$sql->Param('4').",  AR_TOTAL_COST = ".$sql->Param('10').",AR_TOTAL_PAYMENT = ".$sql->Param('11').",AR_BALANCE = ".$sql->Param('12').", AR_LAST_PAYMENT = ".$sql->Param('13').", AR_PAY_STATUS=".$sql->Param('14'). " WHERE AR_CODE =".$sql->Param('15')),array($ar_prop_name, $ar_prop_id, $ar_client_name, $ar_client_id, $ar_total_cost, $ar_total_payment, $ar_balance, $payment_amt, $status,$ar_code ));
                print $sql->ErrorMsg();
          
          
          
                $alt_code = $engine->getTransactionCode($sql);
          
                $stmt =$sql->Execute($sql->Prepare("INSERT INTO all_transactions_tb (ALT_CODE, ALT_PAYMENT_ID, ALT_PROPERTY_NAME, ALT_PROPERTY_ID, ALT_CLIENT_NAME, ALT_CLIENT_ID, ALT_PROPERTY_TYPE, ALT_TOTAL_COST, ALT_TOTAL_PAYMENT, ALT_BALANCE, ALT_PAY_DATE, ALT_STATUS) 
                VALUES(".$sql->Param('1').",".$sql->Param('2').",".$sql->Param('3').",".$sql->Param('4').",".$sql->Param('5').",".$sql->Param('6').",".$sql->Param('7').",".$sql->Param('8').",".$sql->Param('9').",".$sql->Param('10').",".$sql->Param('11').",".$sql->Param('12').")"),
                array($alt_code, $ar_code, $ar_prop_name, $ar_prop_id, $ar_client_name, $ar_client_id, "RENT", $ar_total_cost, $ar_total_payment, $ar_balance, $payment_date, $status));
                print $sql->ErrorMsg();


                $stmtlist = $sql->Execute($sql->Prepare("SELECT  CLIENT_CODE, CLIENT_TITLE, CLIENT_FIRSTNAME, CLIENT_OTHERNAME, 
                CLIENT_LASTNAME, CLIENT_DOB, CLIENT_GENDER, CLIENT_NATIONALITY, CLIENT_CONTACT_1, CLIENT_CONTACT_2, CLIENT_EMAIL,       CLIENT_ADDRESS, CLIENT_DIGITAL_ADDRESS, CLIENT_OCCUPATION, CLIENT_DOC_PATH, CLIENT_PICTURE, CLIENT_CREATED_BY FROM rk_clients_tb WHERE CLIENT_CODE = ".$sql->Param('1')."  LIMIT 1"),array($ar_client_id));
               print $sql->ErrorMsg();	
               
                $stmtRentList = $sql->Execute($sql->Prepare("SELECT AR_CODE, AR_PROPERTY_NAME, AR_PROPERTY_ID,AR_CLIENT_NAME, AR_CLIENT_ID, AR_CLIENT_CONTACT, AR_CLIENT_EMAIL, AR_DURATION, AR_APARTMENT_NUMBER, AR_CHECKED_IN_DATE, AR_CHECKING_OUT_DATE, AR_TOTAL_COST,AR_TOTAL_PAYMENT,AR_BALANCE, AR_STATUS, AR_PAY_STATUS FROM rent_tb WHERE  AR_CLIENT_ID = ".$sql->Param('a')."  AND 	AR_STATUS IN ('1', '2') ORDER BY AR_ID DESC "),array($ar_client_id));
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



        case 'add_payment':

          $gen_rev_type_arr = explode("@@@", $gen_rev_type);
          $gen_rev_type_id = $gen_rev_type_arr[0];
          $gen_rev_type = $gen_rev_type_arr[1];
      

          $clp_code = $engine->getClientPaymentCode($sql);

          $stmt =$sql->Execute($sql->Prepare("INSERT INTO client_payment_tb (CLP_CODE, CLP_FULLNAME, CLP_PAYER_CONTACT, CLP_PAYMENT_TYPE, CLP_PAYMENT_TYPE_ID, CLP_AMOUNT, CLP_PAYMENT_DATE, CLP_COMMENT ) 
          VALUES(".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('d').",
          ".$sql->Param('e').", ".$sql->Param('g').", " .$sql->Param('h').", ".$sql->Param('i').")"),array($clp_code, $clp_fullname,  $clp_contact, $gen_rev_type, $gen_rev_type_id, $clp_amount, $clp_pay_date, $clp_comment));
          print $sql->ErrorMsg();
    
            
    
    
          if($stmt){
            $msg = "Client payment added successfully.";
            $status = "success";
            
            }
            else{
                $msg = "Oops failed to add Client payment.";
                $status = "error";
                
            }
  


          break;

        case 'details':
          
          
          $stmtlist = $sql->Execute($sql->Prepare("SELECT  * FROM rk_clients_tb WHERE CLIENT_CODE = ".$sql->Param('1')."  LIMIT 1"),array($keys));
          print $sql->ErrorMsg();		
          
          
          $stmtkin = $sql->Execute($sql->Prepare("SELECT  * FROM rk_client_next_of_kin_tb WHERE CLIENT_CODE = ".$sql->Param('1')."  LIMIT 1"),array($keys));
          print $sql->ErrorMsg();		
          
          break;
     
          

          case 'land_edit_details':
        
            $stmtlist = $sql->Execute($sql->Prepare("SELECT LS_CODE, LS_PROPERTY_NAME, LS_PROPERTY_ID,LS_CLIENT_NAME, LS_CLIENT_ID, LS_CLIENT_CONTACT, LS_CLIENT_EMAIL, LS_NUM_OF_PLOT, LS_PLOT_NUMBER, LS_PAYMENT_TERM, LS_PAYMENT_PLAN, LS_TOTAL_COST,LS_TOTAL_PAYMENT,LS_BALANCE, LS_PAYMENT_DATE, LS_STATUS FROM land_sale_tb WHERE  LS_CODE = ".$sql->Param('a')."  LIMIT 1"),array($keys));
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
              $view ='land_details';
            }
            else{
              $msg = "Oops failed to update Land Sale details.";
              $status = "error";
              $view ='land_details';
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
             
            $docJson = "";
            $imagePaths = array();
            $profilePicture = "";


            $uploadDir = "media/uploads/$keys";
            if(! file_exists($uploadDir)){
              mkdir($uploadDir, 0744);          
            }

            //Old Files
            if(isset($old_doc_file)){
              foreach(json_decode($old_doc_file, true) as $fileItem) { 
                $imagePaths[] = array("name"=>$fileItem['name'], "path"=>$fileItem['path']);
              }
            }
            
            //New Files
            if(isset($_FILES['docFile']['name']) && count(($_FILES['docFile']['name']))>=1){
            foreach ($_FILES["docFile"]["error"] as $i => $error) {
              if ($error == UPLOAD_ERR_OK) {
                $docFileName = strtoupper($_POST["docFileTitle$i"]);
                $fileName = time()."_".basename($_FILES['docFile']['name'][$i]);
                $fileItem = "$uploadDir/$fileName";
                $tempFile =  $_FILES['docFile']['tmp_name'][$i];
                if (@move_uploaded_file($tempFile, $fileItem)) {
                  $imagePaths[] = array("name"=>$docFileName, "path"=>$fileItem);
                } 
              }
            }
          }

            $docJson = json_encode($imagePaths);

            $profilePicture = $old_pic; 


            if(isset($_FILES['profile_pic']['name'])){
              
              $filename = $_FILES['profile_pic']['name'];  
              $tempname   = $_FILES['profile_pic']['tmp_name'];
              
              $file = $uploadDir."/PROFILE_PICTURE_".time().'_'.$filename;
              
              if(move_uploaded_file($tempname, $file)){
                $profilePicture = $file;
              }
             
            }
             
          $stmt =$sql->Execute($sql->Prepare("UPDATE rk_clients_tb SET CLIENT_TITLE =".$sql->Param('a').", CLIENT_FIRSTNAME =".$sql->Param('a').", CLIENT_OTHERNAME =".$sql->Param('a').", CLIENT_LASTNAME =".$sql->Param('a').",CLIENT_DOB =".$sql->Param('a').", CLIENT_GENDER =".$sql->Param('a').",   CLIENT_NATIONALITY =".$sql->Param('a').", CLIENT_CONTACT_1 =".$sql->Param('a').", CLIENT_CONTACT_2 =".$sql->Param('a').",CLIENT_EMAIL =".$sql->Param('a').", CLIENT_ADDRESS =".$sql->Param('a').",CLIENT_DIGITAL_ADDRESS =".$sql->Param('a').", CLIENT_OCCUPATION =".$sql->Param('a').", CLIENT_DOC_PATH =".$sql->Param('a').",  CLIENT_NOK_NAME =".$sql->Param('a').", CLIENT_NOK_CONTACT =".$sql->Param('a').", CLIENT_NOK_RELATIONSHIP =".$sql->Param('a').", CLIENT_NOK_ADDRESS =".$sql->Param('a').", CLIENT_PICTURE =".$sql->Param('a')."   WHERE CLIENT_CODE =".$sql->Param('a')." "), [$rk_title, $rk_fname, $rk_mname, $rk_lname, $rk_dob, $rk_gender, $rk_nationality, $rk_contact1, $rk_contact2, $rk_mail, $rk_address, $rk_dig_address, $rk_occupation, $docJson, $rk_kin_fname,  $rk_kin_contact1, $rk_kinrelation, $rk_kin_address, $profilePicture, $keys]);
          print $sql->ErrorMsg();

          
          if($sql->affected_rows() > 0){
              $msg = "Client details updated successfully.";
              $status = "success";
              $view ='list';
            }
            else{
              $msg = "Oops failed to update Client details.";
              $status = "error";
              $view ='list';
            }
            
            
            
            break;


            
            case 'land_details':

            $stmtlist = $sql->Execute($sql->Prepare("SELECT  CLIENT_CODE, CLIENT_TITLE, CLIENT_FIRSTNAME, CLIENT_OTHERNAME, 
            CLIENT_LASTNAME, CLIENT_DOB, CLIENT_GENDER, CLIENT_NATIONALITY, CLIENT_CONTACT_1, CLIENT_CONTACT_2, CLIENT_EMAIL,CLIENT_ADDRESS, CLIENT_DIGITAL_ADDRESS, CLIENT_OCCUPATION, CLIENT_DOC_PATH, CLIENT_PICTURE, CLIENT_CREATED_BY FROM rk_clients_tb WHERE CLIENT_CODE = ".$sql->Param('1')."  LIMIT 1"),array($keys));
           print $sql->ErrorMsg();
             
              $stmtLandList = $sql->Execute($sql->Prepare("SELECT LS_CODE, LS_PROPERTY_NAME, LS_PROPERTY_ID,LS_CLIENT_NAME, LS_CLIENT_ID, LS_CLIENT_EMAIL, LS_NUM_OF_PLOT, LS_PLOT_NUMBER, LS_PAYMENT_TERM, LS_PAYMENT_PLAN, LS_TOTAL_COST,LS_TOTAL_PAYMENT,LS_BALANCE, LS_NEXT_PAY_DATE, LS_STATUS FROM land_sale_tb WHERE LS_CLIENT_ID = ".$sql->Param('a')." AND LS_STATUS IN ('1', '2', '3') ORDER BY LS_ID DESC "),array($keys));
              print $sql->ErrorMsg();		
        
             break;


             case 'rent_details':
              
  
                $stmtlist = $sql->Execute($sql->Prepare("SELECT  CLIENT_CODE, CLIENT_TITLE, CLIENT_FIRSTNAME, CLIENT_OTHERNAME, 
                CLIENT_LASTNAME, CLIENT_DOB, CLIENT_GENDER, CLIENT_NATIONALITY, CLIENT_CONTACT_1, CLIENT_CONTACT_2, CLIENT_EMAIL,       CLIENT_ADDRESS, CLIENT_DIGITAL_ADDRESS, CLIENT_OCCUPATION, CLIENT_DOC_PATH, CLIENT_PICTURE, CLIENT_CREATED_BY FROM rk_clients_tb WHERE CLIENT_CODE = ".$sql->Param('1')."  LIMIT 1"),array($keys));
               print $sql->ErrorMsg();	
               
                $stmtRentList = $sql->Execute($sql->Prepare("SELECT AR_CODE, AR_PROPERTY_NAME, AR_PROPERTY_ID,AR_CLIENT_NAME, AR_CLIENT_ID, AR_CLIENT_CONTACT, AR_CLIENT_EMAIL, AR_DURATION, AR_APARTMENT_NUMBER, AR_CHECKED_IN_DATE, AR_CHECKING_OUT_DATE, AR_TOTAL_COST,AR_TOTAL_PAYMENT,AR_BALANCE, AR_STATUS, AR_PAY_STATUS FROM rent_tb WHERE  AR_CLIENT_ID = ".$sql->Param('a')."  AND 	AR_STATUS IN ('1', '2') ORDER BY AR_ID DESC "),array($keys));
                print $sql->ErrorMsg();		
          
               break;


                 
              case 'land_payment_details':
          
                $stmtlist = $sql->Execute($sql->Prepare("SELECT LS_CODE, LS_PROPERTY_NAME, LS_PROPERTY_ID,LS_CLIENT_NAME, LS_CLIENT_ID, LS_CLIENT_CONTACT, LS_CLIENT_EMAIL, LS_NUM_OF_PLOT, LS_PLOT_NUMBER, LS_PAYMENT_TERM, LS_PAYMENT_PLAN, LS_TOTAL_COST,LS_TOTAL_PAYMENT,LS_BALANCE, LS_NEXT_PAY_DATE, LS_STATUS FROM land_sale_tb  WHERE  LS_CODE = ".$sql->Param('a')." AND LS_STATUS IN ('1','2','3') ORDER BY LS_ID DESC"),array($keys));
                print $sql->ErrorMsg();		
          
          
               break;

               case 'apartment_payment_details':
          
                $stmtlist = $sql->Execute($sql->Prepare("SELECT AR_CODE, AR_PROPERTY_NAME, AR_PROPERTY_ID,AR_CLIENT_NAME, AR_CLIENT_ID, AR_CLIENT_CONTACT, AR_CLIENT_EMAIL, AR_DURATION,AR_CHECKED_IN_DATE, AR_APARTMENT_NUMBER,AR_TOTAL_COST,AR_TOTAL_PAYMENT,AR_BALANCE, AR_STATUS, AR_PAY_STATUS FROM rent_tb WHERE  AR_CODE = ".$sql->Param('a')."  AND AR_STATUS IN ('1', '2') ORDER BY AR_ID DESC "),array($keys));
                print $sql->ErrorMsg();		
          
          
               break;


            case 'deleteclient':               
              $stmt = $sql->Execute($sql->Prepare("DELETE FROM rk_clients_tb   WHERE CLIENT_CODE=".$sql->Param('5').""), [$keys]);
              if($stmt){
                $msg = "Client removed successfully.";
                $status = "success";
                $view ='list';
              }
              else{
                $msg = "Oops failed to remove Client.";
                $status = "error";
                $view ='list';
              }
              
              break;       
              
              case 'reset':
                $limit = 10;
                $fdsearch = "";
                
                break;
                
                
                case 'rentapartment': 
   
              
   
                    $ar_balance = $ar_total_cost - $ar_total_payment;
                
                    if($ar_total_payment >= $ar_total_cost && $ar_balance <= 0 ){
                      $status = '3';
                    }
                    else{
                      $status = '2';
                    }
                
            
                    $ar_prop_id = "";
                      $ar_prop_name = isset($ar_prop_name)?$ar_prop_name : "";
                      if($ar_prop_name != ""){
                        $arr_ar_prop_name =explode("@@@", $ar_prop_name);
                        $ar_prop_id =$arr_ar_prop_name[0];
                        $ar_prop_name =$arr_ar_prop_name[1];
                    }

                  
                  $ar_code = $engine->getRentCode($sql);
              
                  $stmt =$sql->Execute($sql->Prepare("INSERT INTO  rent_tb (AR_CODE, AR_PROPERTY_NAME, AR_PROPERTY_ID, AR_CLIENT_NAME, AR_CLIENT_ID, AR_CLIENT_CONTACT, AR_CLIENT_EMAIL, AR_APARTMENT_NUMBER, AR_DURATION, AR_TOTAL_COST,AR_TOTAL_PAYMENT,AR_CHECKED_IN_DATE,AR_LAST_PAYMENT,AR_CHECKING_OUT_DATE, AR_BALANCE, AR_PAY_STATUS, AR_PAYMENT_DATE)  
                  VALUES(".$sql->Param('1').",".$sql->Param('2').",".$sql->Param('3').",".$sql->Param('4').",".$sql->Param('5').",".$sql->Param('6').",".$sql->Param('7').",".$sql->Param('8').",".$sql->Param('9').",".$sql->Param('10').",".$sql->Param('11').",".$sql->Param('12').",".$sql->Param('13').",".$sql->Param('14').",".$sql->Param('15').",".$sql->Param('16').",".$sql->Param('17').")"),
                  array($ar_code, $ar_prop_name, $ar_prop_id, $ar_client_name, $ar_client_id, $ar_client_contact, $ar_client_email, $ar_apartment_num,  $ar_duration, $ar_total_cost, $ar_total_payment, $ar_checked_in_date,$ar_total_payment, $ar_checking_out_date, $ar_balance, $status, $payment_date));
                  print $sql->ErrorMsg();
                  
                  
                $alt_code = $engine->getTransactionCode($sql);
          
                $stmt =$sql->Execute($sql->Prepare("INSERT INTO all_transactions_tb (ALT_CODE, ALT_PAYMENT_ID, ALT_PROPERTY_NAME, ALT_PROPERTY_ID, ALT_CLIENT_NAME, ALT_CLIENT_ID, ALT_PROPERTY_TYPE, ALT_TOTAL_COST, ALT_TOTAL_PAYMENT, ALT_BALANCE, ALT_PAY_DATE) VALUES(".$sql->Param('1').",".$sql->Param('2').",".$sql->Param('3').",".$sql->Param('4').",".$sql->Param('5').",".$sql->Param('6').",".$sql->Param('7').",".$sql->Param('8').",".$sql->Param('9').",".$sql->Param('10').",".$sql->Param('11').")"),
                array($alt_code, $ar_code, $ar_prop_name, $ar_prop_id, $ar_client_name, $ar_client_id, "RENT", $ar_total_cost, $ar_total_payment, $ar_balance, $payment_date));
                print $sql->ErrorMsg();
          
                
                
                $stmtlist = $sql->Execute($sql->Prepare("SELECT  CLIENT_CODE, CLIENT_TITLE, CLIENT_FIRSTNAME, CLIENT_OTHERNAME, 
                CLIENT_LASTNAME, CLIENT_DOB, CLIENT_GENDER, CLIENT_NATIONALITY, CLIENT_CONTACT_1, CLIENT_CONTACT_2, CLIENT_EMAIL,       CLIENT_ADDRESS, CLIENT_DIGITAL_ADDRESS, CLIENT_OCCUPATION, CLIENT_DOC_PATH, CLIENT_PICTURE, CLIENT_CREATED_BY FROM rk_clients_tb WHERE CLIENT_CODE = ".$sql->Param('1')."  LIMIT 1"),array($ar_client_id));
               print $sql->ErrorMsg();	
               
                $stmtRentList = $sql->Execute($sql->Prepare("SELECT AR_CODE, AR_PROPERTY_NAME, AR_PROPERTY_ID,AR_CLIENT_NAME, AR_CLIENT_ID, AR_CLIENT_CONTACT, AR_CLIENT_EMAIL, AR_DURATION, AR_APARTMENT_NUMBER, AR_CHECKED_IN_DATE, AR_CHECKING_OUT_DATE, AR_TOTAL_COST,AR_TOTAL_PAYMENT,AR_BALANCE, 	AR_PAY_STATUS, AR_STATUS FROM rent_tb WHERE  AR_CLIENT_ID = ".$sql->Param('a')."  AND AR_STATUS IN ('1', '2') ORDER BY AR_ID DESC "),array($ar_client_id));
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


                  

            case 'deleteland':

              $stmt = $sql->Execute($sql->Prepare("UPDATE land_sale_tb SET LS_STATUS = '1''0' WHERE LS_CODE = ".$sql->Param('a')." LIMIT 1"),array($keys));
              print $sql->ErrorMsg();

              $stmtlist = $sql->Execute($sql->Prepare("SELECT  CLIENT_CODE, CLIENT_TITLE, CLIENT_FIRSTNAME, CLIENT_OTHERNAME, 
            CLIENT_LASTNAME, CLIENT_DOB, CLIENT_GENDER, CLIENT_NATIONALITY, CLIENT_CONTACT_1, CLIENT_CONTACT_2, CLIENT_EMAIL,CLIENT_ADDRESS, CLIENT_DIGITAL_ADDRESS, CLIENT_OCCUPATION, CLIENT_DOC_PATH, CLIENT_PICTURE, CLIENT_CREATED_BY FROM rk_clients_tb WHERE CLIENT_CODE = ".$sql->Param('1')."  LIMIT 1"),array($land_client_id));
           print $sql->ErrorMsg();
             
              $stmtLandList = $sql->Execute($sql->Prepare("SELECT LS_CODE, LS_PROPERTY_NAME, LS_PROPERTY_ID,LS_CLIENT_NAME, LS_CLIENT_ID, LS_CLIENT_EMAIL, LS_NUM_OF_PLOT, LS_PLOT_NUMBER, LS_PAYMENT_TERM, LS_PAYMENT_PLAN, LS_TOTAL_COST,LS_TOTAL_PAYMENT,LS_BALANCE, LS_NEXT_PAY_DATE, LS_STATUS FROM land_sale_tb WHERE LS_CLIENT_ID = ".$sql->Param('a')." AND LS_STATUS IN ('1', '2', '3') ORDER BY LS_ID DESC "),array($land_client_id));
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


      case 'checkout_rent':

        $stmt = $sql->Execute($sql->Prepare("UPDATE rent_tb SET AR_STATUS = '3' WHERE AR_CODE = ".$sql->Param('a')." LIMIT 1"),array($keys));
        print $sql->ErrorMsg();

        $stmtlist = $sql->Execute($sql->Prepare("SELECT  CLIENT_CODE, CLIENT_TITLE, CLIENT_FIRSTNAME, CLIENT_OTHERNAME, 
        CLIENT_LASTNAME, CLIENT_DOB, CLIENT_GENDER, CLIENT_NATIONALITY, CLIENT_CONTACT_1, CLIENT_CONTACT_2, CLIENT_EMAIL,       CLIENT_ADDRESS, CLIENT_DIGITAL_ADDRESS, CLIENT_OCCUPATION, CLIENT_DOC_PATH, CLIENT_PICTURE, CLIENT_CREATED_BY FROM rk_clients_tb WHERE CLIENT_CODE = ".$sql->Param('1')."  LIMIT 1"),array($rent_client_code));
       print $sql->ErrorMsg();	
       
        $stmtRentList = $sql->Execute($sql->Prepare("SELECT AR_CODE, AR_PROPERTY_NAME, AR_PROPERTY_ID,AR_CLIENT_NAME, AR_CLIENT_ID, AR_CLIENT_CONTACT, AR_CLIENT_EMAIL, AR_DURATION, AR_APARTMENT_NUMBER, AR_CHECKED_IN_DATE, AR_CHECKING_OUT_DATE, AR_TOTAL_COST,AR_TOTAL_PAYMENT,AR_BALANCE, 	AR_PAY_STATUS, AR_STATUS FROM rent_tb WHERE  AR_CLIENT_ID = ".$sql->Param('a')."  AND AR_STATUS IN ('1', '2') ORDER BY AR_ID DESC "),array($rent_client_code));
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



              
                      



                case 'landpurchase':
            
                
                    $ls_prop_name = isset($ls_prop_name)?$ls_prop_name : "";
                    if($ls_prop_name != ""){
                      $arr_ls_prop_name =explode("@@@", $ls_prop_name);
                      $ls_prop_id =$arr_ls_prop_name[0];
                      $ls_prop_name =$arr_ls_prop_name[1];
                  }
                  
                    $stmtusr = $sql->Execute($sql->Prepare("SELECT LS_CODE FROM land_sale_tb WHERE  LS_PLOT_NUMBER = ".$sql->Param('a')." AND LS_PROPERTY_ID  = ".$sql->Param('b')." LIMIT 1"),array( $ls_plot_number, $ls_prop_id));
                      print $sql->ErrorMsg();	
                
                      if($stmtusr->recordCount() < 1){


                    $ls_balance = $ls_total_cost - $ls_total_payment;

                    if($ls_total_payment >= $ls_total_cost && $ls_balance <= 0 ){
                      $status = '3';
                    }
                    else{
                      $status = '2';
                    }
                
   
                
                  
                    $ls_code = $engine->getLandSaleCode($sql);
                
                    $ls_payment_plan = isset($ls_payment_plan)?$ls_payment_plan : "";

                    $newPayDate = date("Y-m-d", strtotime(str_replace('/', '-', $payment_date)));  

                    $ls_repayDate = date('Y-m-d', strtotime($newPayDate. ' + '.$ls_payment_plan.' days'));


                   
              
                  $stmt =$sql->Execute($sql->Prepare("INSERT INTO land_sale_tb (LS_CODE, LS_PROPERTY_NAME, LS_PROPERTY_ID,LS_CLIENT_NAME, LS_CLIENT_ID, LS_CLIENT_CONTACT, LS_CLIENT_EMAIL, LS_NUM_OF_PLOT, LS_PLOT_NUMBER, LS_PAYMENT_TERM, LS_PAYMENT_PLAN, LS_TOTAL_COST,LS_TOTAL_PAYMENT,LS_BALANCE, LS_LAST_PAYMENT,LS_PAYMENT_DATE, LS_NEXT_PAY_DATE, LS_STATUS) 
                  VALUES(".$sql->Param('1').",".$sql->Param('2').",".$sql->Param('3').",".$sql->Param('4').",".$sql->Param('5').",".$sql->Param('6').",".$sql->Param('7').",".$sql->Param('8').",".$sql->Param('9').",".$sql->Param('10').",".$sql->Param('11').",".$sql->Param('12').",".$sql->Param('13').",".$sql->Param('14').",".$sql->Param('15').",".$sql->Param('14').",".$sql->Param('15').",".$sql->Param('16').")"),
                  array($ls_code, $ls_prop_name, $ls_prop_id, $ls_client_name, $ls_client_id, $ls_client_contact, $ls_client_email, $ls_num_plot,  $ls_plot_number, $ls_payment_term, $ls_payment_plan, $ls_total_cost, $ls_total_payment, $ls_balance, $ls_total_payment, $payment_date, $ls_repayDate, $status));
                  print $sql->ErrorMsg();
                  
                
                    $alt_code = $engine->getTransactionCode($sql);
                
                    $stmt =$sql->Execute($sql->Prepare("INSERT INTO all_transactions_tb (ALT_CODE, ALT_PAYMENT_ID, ALT_PROPERTY_NAME, ALT_PROPERTY_ID, ALT_CLIENT_NAME, ALT_CLIENT_ID, ALT_PROPERTY_TYPE, ALT_TOTAL_COST, ALT_TOTAL_PAYMENT, ALT_BALANCE, ALT_PAY_DATE) 
                    VALUES(".$sql->Param('1').",".$sql->Param('2').",".$sql->Param('3').",".$sql->Param('4').",".$sql->Param('5').",".$sql->Param('6').",".$sql->Param('7').",".$sql->Param('8').",".$sql->Param('9').",".$sql->Param('10').",".$sql->Param('11').")"), array($alt_code, $ls_code, $ls_prop_name, $ls_prop_id, $ls_client_name, $ls_client_id, "LAND", $ls_total_cost, $ls_total_payment, $ls_balance, $payment_date));
                    print $sql->ErrorMsg();
                
                    $stmtlist = $sql->Execute($sql->Prepare("SELECT  CLIENT_CODE, CLIENT_TITLE, CLIENT_FIRSTNAME, CLIENT_OTHERNAME, 
                    CLIENT_LASTNAME, CLIENT_DOB, CLIENT_GENDER, CLIENT_NATIONALITY, CLIENT_CONTACT_1, CLIENT_CONTACT_2, CLIENT_EMAIL,CLIENT_ADDRESS, CLIENT_DIGITAL_ADDRESS, CLIENT_OCCUPATION, CLIENT_DOC_PATH, CLIENT_PICTURE, CLIENT_CREATED_BY FROM rk_clients_tb WHERE CLIENT_CODE = ".$sql->Param('1')."  LIMIT 1"),array($keys));
                   print $sql->ErrorMsg();
                     
                      $stmtLandList = $sql->Execute($sql->Prepare("SELECT LS_CODE, LS_PROPERTY_NAME, LS_PROPERTY_ID,LS_CLIENT_NAME, LS_CLIENT_ID, LS_CLIENT_EMAIL, LS_NUM_OF_PLOT, LS_PLOT_NUMBER, LS_PAYMENT_TERM, LS_PAYMENT_PLAN, LS_TOTAL_COST,LS_TOTAL_PAYMENT,LS_BALANCE, LS_NEXT_PAY_DATE, LS_STATUS FROM land_sale_tb WHERE LS_CLIENT_ID = ".$sql->Param('a')." AND LS_STATUS IN ('1', '2', '3')  ORDER BY LS_ID DESC "),array($keys));
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

          
              }

             //This is the a method for Client that is always called to fetch paginated items
              
             if($viewpage == "search"){
              if(isset($fdsearch) && $fdsearch != ""){
                
                $query = "SELECT  CLIENT_CODE, CLIENT_TITLE, CLIENT_FIRSTNAME, CLIENT_OTHERNAME, CLIENT_LASTNAME, CLIENT_DOB,CLIENT_GENDER, CLIENT_NATIONALITY, CLIENT_CONTACT_1, CLIENT_CONTACT_2, CLIENT_EMAIL, CLIENT_ADDRESS, CLIENT_DIGITAL_ADDRESS, CLIENT_OCCUPATION, CLIENT_STATUS, CLIENT_DATE_CREATED, CLIENT_CREATED_BY 
                FROM rk_clients_tb   WHERE  CLIENT_STATUS IN  ('1','0') AND CLIENT_CODE = ".$sql->Param('a')." OR CLIENT_FIRSTNAME LIKE ".$sql->Param('b')." OR CLIENT_LASTNAME LIKE ".$sql->Param('b')." OR CLIENT_OTHERNAME LIKE ".$sql->Param('b')." ORDER BY CLIENT_ID DESC";
                $input =array($fdsearch, "%".$fdsearch."%", "%".$fdsearch."%", "%".$fdsearch."%"); 
             
                
              }else{ 
                $query = "SELECT CLIENT_CODE, CLIENT_TITLE, CLIENT_FIRSTNAME, CLIENT_OTHERNAME, CLIENT_LASTNAME, CLIENT_DOB,CLIENT_GENDER, CLIENT_NATIONALITY, CLIENT_CONTACT_1, CLIENT_CONTACT_2, CLIENT_EMAIL, CLIENT_ADDRESS, CLIENT_DIGITAL_ADDRESS, CLIENT_OCCUPATION, CLIENT_STATUS, CLIENT_DATE_CREATED, CLIENT_CREATED_BY 
                FROM rk_clients_tb   WHERE  CLIENT_STATUS='1'  ORDER BY CLIENT_ID DESC";
                $input =array();
              }
            }
            else{ 
              $query = "SELECT CLIENT_CODE, CLIENT_TITLE, CLIENT_FIRSTNAME, CLIENT_OTHERNAME, CLIENT_LASTNAME, CLIENT_DOB,CLIENT_GENDER, CLIENT_NATIONALITY, CLIENT_CONTACT_1, CLIENT_CONTACT_2, CLIENT_EMAIL, CLIENT_ADDRESS, CLIENT_DIGITAL_ADDRESS, CLIENT_OCCUPATION, CLIENT_STATUS, CLIENT_DATE_CREATED, CLIENT_CREATED_BY 
              FROM rk_clients_tb  WHERE  CLIENT_STATUS IN  ('1','0') ORDER BY CLIENT_ID DESC";
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