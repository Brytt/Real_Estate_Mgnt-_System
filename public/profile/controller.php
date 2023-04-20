<?php

$stmtlist;

  switch($viewpage){


     
     



     case 'update':

      $stmt = $sql->Execute($sql->Prepare("UPDATE rke_users SET  USR_USERNAME =".$sql->Param('2').", USR_USER_TYPE=".$sql->Param('3').", USR_EMAIL=".$sql->Param('4').", USR_PHONE=".$sql->Param('5')."  WHERE USR_CODE =".$sql->Param('7')." AND USR_STATUS IN ('1','0')"),array( $user_name, $user_type, $user_mail, $user_contact,  $user_code));
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


       

         $actor_id = $session->get("userid");

      $stmtlist = $sql->Execute($sql->Prepare("SELECT USR_CODE, 	USR_STAFF_ID, USR_IMAGE_PATH,
      USR_USERNAME, USR_USER_TYPE, 	USR_EMAIL, USR_PHONE, 	USR_REGION, USR_DISTRICT, 	USR_PASSWORD, USR_STATUS FROM rke_users WHERE  USR_CODE = ".$sql->Param('a')." AND USR_STATUS IN ('1','0')  LIMIT 1"),array($actor_id));
      print $sql->ErrorMsg();		