<?php

$stmtlist;

  switch($viewpage){

    //The api call for add submit buttion clicked
    case 'add':

      $stmtusr = $sql->Execute($sql->Prepare("SELECT USR_CODE  FROM rke_users WHERE  USR_USERNAME = ".$sql->Param('a')." OR  USR_STAFF_ID = ".$sql->Param('b')." LIMIT 1"),array( $rk_username, $user_staff_id));
      print $sql->ErrorMsg();	

      if($stmtusr->recordCount() < 1){

        $stmtlist = $sql->Execute($sql->Prepare("SELECT STAFF_CODE, STAFF_TITLE, STAFF_FIRSTNAME, STAFF_OTHERNAME, STAFF_LASTNAME, STAFF_DOB,STAFF_GENDER, STAFF_NATIONALITY, STAFF_PLACE_OF_BIRTH, STAFF_HOMETOWN, STAFF_QUALIFICATION, STAFF_COURSE_STUDIED,STAFF_CONTACT_1, STAFF_CONTACT_2, STAFF_EMAIL, STAFF_ADDRESS, STAFF_DIGITAL_ADDRESS, STAFF_OCCUPATION, STAFF_STATUS, STAFF_PICTURE, STAFF_GENDER 
        FROM rk_staff_tb   WHERE  STAFF_STATUS IN  ('1','0') AND STAFF_CODE = ".$sql->Param('a')." LIMIT 1"),array( $user_staff_id));
        print $sql->ErrorMsg();	

        if($stmtlist){
          while($obj = $stmtlist->FetchNextObject()){
  
          $fname = $obj->STAFF_FIRSTNAME;
          $lname =  $obj->STAFF_LASTNAME;
          $mname =  $obj->STAFF_OTHERNAME;
          $user_contact = $obj->STAFF_CONTACT_1;
          $user_mail = $obj->STAFF_EMAIL;
          $user_image = $obj->STAFF_PICTURE;

        $crypt = new cryptCls();
        $password = $crypt->loginPassword($rk_username,$system_default_password);

        $user_code = $engine->getUserCode($sql);

var_dump($rk_username,);
die;
        $stmt =$sql->Execute($sql->Prepare("INSERT INTO rke_users (USR_CODE, USR_STAFF_ID, USR_IMAGE_PATH, USR_FIRSTNAME, USR_LASTNAME, USR_MIDDLE_NAME, USR_USER_TYPE, USR_USERNAME, USR_EMAIL, USR_PHONE, USR_GENDER, USR_PASSWORD, USR_ACCESS_LEVEL, USR_DEFAULT_LOGIN) 
        VALUES(".$sql->Param('1').",".$sql->Param('2').",".$sql->Param('3').",".$sql->Param('4').",".$sql->Param('5').",".$sql->Param('6').",".$sql->Param('7').",  ".$sql->Param('8').", ".$sql->Param('9').",".$sql->Param('10').",".$sql->Param('11'). ",".$sql->Param('12'). ",".$sql->Param('13'). ",".$sql->Param('14'). ")"),array($user_code, $user_staff_id, $user_image, $fname, $lname, $mname, $user_type, $rk_username, $user_mail, $user_contact, $obj->STAFF_GENDER, $password, $user_type, '1'));

        print $sql->ErrorMsg();

        if($stmt){
          $msg = "User added successfully with username : ".$rk_username;
          $status = "success";
          $view ='list';
          }
          else{
              $msg = "Oops failed to add user.";
              $status = "error";
              $view ='add';
          }
        }
      } else{
          $msg = "Error, Invalid staff ID.";
          $status = "error";
          $view ='add';
        }
        }
        else{
          $msg = "User already exits, try another username.";
          $status = "error";
          $view ='add';
      }
         
    break;


   

     

    case 'resetpassword':

      $crypt = new cryptCls();
      $rs_username = isset($rs_username)?$rs_username:"";
      $password = $crypt->loginPassword($rs_username,$system_default_password);
      $rs_usercode = isset($rs_usercode)?$rs_usercode:"";


      $query ="UPDATE rke_users SET USR_PASSWORD = ".$sql->Param('1').", USR_DEFAULT_LOGIN  = ".$sql->Param('2')." WHERE USR_CODE=".$sql->Param('a')." AND USR_USERNAME=".$sql->Param('b')."";


          $stmt = $sql->Prepare($query);
          $stmt = $sql->Execute($stmt,array($password, '1', $rs_usercode, $rs_username));
          print $sql->ErrorMsg();

    
        if($sql->affected_rows() > 0 ){
          $msg = "Password reset successful.";
          $status = "success";
          $view ='list';
          }
          else{
              $msg = "Error, Password reset already initiated";
              $status = "error";
              $view ='list';
          }


      break;
  

    case 'details':

      $stmtlist = $sql->Execute($sql->Prepare("SELECT USR_CODE, 	USR_STAFF_ID, USR_IMAGE_PATH,
      USR_USERNAME, USR_USER_TYPE, 	USR_EMAIL, USR_PHONE, USR_FIRSTNAME, USR_LASTNAME,	USR_REGION, USR_PASSWORD, USR_STATUS FROM rke_users WHERE  USR_CODE = ".$sql->Param('a')." AND USR_STATUS IN ('1','0')  LIMIT 1"),array($keys));
      print $sql->ErrorMsg();		
     break;



     case 'update':

      $stmt = $sql->Execute($sql->Prepare("UPDATE rke_users SET USR_USERNAME =".$sql->Param('2').", USR_USER_TYPE=".$sql->Param('3').", USR_EMAIL=".$sql->Param('4').", USR_PHONE=".$sql->Param('5')."  WHERE USR_CODE =".$sql->Param('7')." AND USR_STATUS IN ('1','0')"),array( $user_name, $user_type, $user_mail, $user_contact,  $user_code));
      print $sql->ErrorMsg();	

      if($stmt){
        $msg = "User details updated successfully.";
        $status = "success";
        $view ='list';
        }
        else{
            $msg = "Oops failed to update user details.";
            $status = "error";
            $view ='list';
        }
      
    break;

    case 'delete':

        $current_time = date("Y-m-d_H:m:s");
        
    
        $rk_username = $rs_username."_".$current_time."_DELETE";
          $stmt = $sql->Execute($sql->Prepare("UPDATE rke_users SET USR_STATUS = ".$sql->Param('1').", USR_USERNAME = ".$sql->Param('2')." WHERE USR_CODE=".$sql->Param('a')),array('2', $rk_username , $keys));
          print $sql->ErrorMsg();
    

      if($sql->affected_rows() > 0 ){
        $msg = "User deleted successfully.";
        $status = "success";
        $view ='list';
        }
        else{
            $msg = "Oops failed to delete user.";
            $status = "error";
            $view ='list';
        }
      
    break;

    case 'changepassword':
      
      $crypt = new cryptCls();
      $user_name = strval($actorusername);
      $oldpassword = $crypt->loginPassword($user_name,$old_password)."";
      $newpassword = $crypt->loginPassword($user_name,$new_password)."";
      $confirmpassword = $crypt->loginPassword($user_name,$confirm_password)."";
      $usercode = $session->get("actorcode");

      

          $query ="UPDATE rke_users SET USR_PASSWORD = ".$sql->Param('1')." WHERE USR_CODE=".$sql->Param('a')." AND USR_PASSWORD=".$sql->Param('b')."";


          $stmt = $sql->Prepare($query);
          $stmt = $sql->Execute($stmt,array($newpassword,  $session->get("actorcode"), $oldpassword));
          print $sql->ErrorMsg();
          
    
        if($sql->affected_rows() > 0 ){
          $msg = "Password successfully changed.";
          $status = "success";
          $view ='list';
          }
          else{
              $msg = "Error, unable to change user password.";
              $status = "error";
              $view ='list';
          }
    break;


    case 'reset':
      $limit = 10;
      $fdsearch = "";

    break;

}


       
    if($viewpage == "search"){
      if(isset($fdsearch) && $fdsearch != ""){

        $query = "SELECT USR_CODE, USR_FIRSTNAME, USR_LASTNAME, 	USR_STAFF_ID, USR_USERNAME, USR_USER_TYPE, USR_EMAIL, USR_PHONE, 	USR_REGION,  USR_STATUS FROM rke_users   WHERE  USR_STATUS IN  ('1','0') AND USR_STAFF_ID = ".$sql->Param('a');
        $input =array($fdsearch); 
  
      }else{ 
        $query = "SELECT USR_CODE, USR_FIRSTNAME, USR_LASTNAME, 	USR_STAFF_ID, USR_USERNAME, USR_USER_TYPE, USR_EMAIL, USR_PHONE, 	USR_REGION, USR_STATUS FROM rke_users   WHERE  USR_STATUS IN  ('1','0') ORDER BY USR_ID DESC";
        $input =array();
      }
    }
    else{ 
      $query = "SELECT USR_CODE,  USR_FIRSTNAME, USR_LASTNAME, 	USR_STAFF_ID, USR_USERNAME, USR_USER_TYPE, USR_EMAIL, USR_PHONE, 	USR_REGION, USR_STATUS FROM rke_users   WHERE  USR_STATUS IN  ('1','0') ORDER BY USR_ID DESC";
      $input =array();
    }
    
  
    
    if(!isset($limit)){
      $limit = $session->get("limited");
    }else if(empty($limit)){
      $limit =20;
    }
    
    $session->set("limited",$limit);
    $length = 10;
    $paging = new OS_Pagination($sql,$query,$limit,$length,"pg=".$pg."&option=".$option, isset($input) ?$input:  []);