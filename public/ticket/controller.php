<?php

$stmtlist;

  switch($viewpage){

    //The api call for add submit buttion clicked
    case 'add':

      
      $login_user_id =	$session->get('userid');
      $login_username =	$session->get('userfullname');

      
      $tk_chat = [  [ "message"   => $tk_message,  "date_time" => date('h:iA - d/m/Y ') ]];
      $tk_chat_json = json_encode($tk_chat);
      
     

         $tk_code = $engine->getTicketCode($sql);

        $stmt =$sql->Execute($sql->Prepare("INSERT INTO ticket_tb (TCK_CODE, TCK_CLIENT_NAME, TCK_CLIENT_CONTACT, TCK_USER_NAME, TCK_USER_ID, TCK_SUBJECT, TCK_CURRENT_MESSAGE, TCK_CHAT) 
        VALUES(".$sql->Param('1').",".$sql->Param('2').",".$sql->Param('3').",".$sql->Param('4').",
        ".$sql->Param('5').", ".$sql->Param('6').", ".$sql->Param('7').", ".$sql->Param('8').")"),array($tk_code, $tk_client, $tk_client_contact, $login_username, $login_user_id, $tk_subject, $tk_message, $tk_chat_json));
        print $sql->ErrorMsg();

        if($stmt){
          $msg = "Emergency sent successfully";
          $status = "success";
          $view ='list';
          }
          else{
              $msg = "Oops failed to send Emergency.";
              $status = "error";
              $view ='list';
          }

      
    break;

    case 'details':

      $stmtlist = $sql->Execute($sql->Prepare("SELECT TCK_CODE, TCK_CLIENT_NAME, TCK_CLIENT_CONTACT, TCK_USER_NAME, TCK_USER_ID, TCK_SUBJECT, TCK_CURRENT_MESSAGE, TCK_CHAT, TCK_STATUS FROM ticket_tb    WHERE TCK_CODE = ".$sql->Param('a')." AND TCK_STATUS IN ('1','2')  LIMIT 1"),array($keys));
      print $sql->ErrorMsg();		


     break;

     case 'reply':

      $reply_msg = [ "message"   => $rtk_message,  "date_time" => date('h:iA - d/m/Y ') ];

      $temp_array = json_decode($rtk_chat, true);
      array_push($temp_array, $reply_msg);
      $rtk_chat_json = json_encode($temp_array);

       
      $stmt = $sql->Execute($sql->Prepare("UPDATE ticket_tb SET  TCK_CURRENT_MESSAGE = ".$sql->Param('1').",  TCK_CHAT = ".$sql->Param('2')." WHERE  TCK_CODE = ".$sql->Param('3')),array($rtk_message, $rtk_chat_json, $keys));
      print $sql->ErrorMsg();

      if($stmt){
        $msg = "reply sent successfully.";
        $status = "success";
        $view ='list';
        }
        else{
            $msg = "Oops failed to send reply.";
            $status = "error";
            $view ='list';
        }



        $stmtlist = $sql->Execute($sql->Prepare("SELECT TCK_CODE, TCK_CLIENT_NAME, TCK_CLIENT_CONTACT, TCK_USER_NAME, TCK_USER_ID, TCK_SUBJECT, TCK_CURRENT_MESSAGE, TCK_CHAT, TCK_STATUS FROM ticket_tb    WHERE TCK_CODE = ".$sql->Param('a')." AND TCK_STATUS IN ('1','2')  LIMIT 1"),array($keys));
        print $sql->ErrorMsg();	

        break;
    

      case 'reset':
        $limit = 10;
        $fdsearch = "";
  
      break;


      case 'delete_ticket':
       
        $stmt = $sql->Execute($sql->Prepare("UPDATE ticket_tb SET TCK_STATUS = '0' WHERE  TCK_CODE = ".$sql->Param('a')." LIMIT 1"),array($keys));
        print $sql->ErrorMsg();

        if($stmt){
          $msg = "Ticket deleted successfully.";
          $status = "success";
          $view ='list';
          }
          else{
              $msg = "Oops failed to delete Ticket.";
              $status = "error";
              $view ='list';
          }
          break;

          case 'close_ticket':
       
            $stmt = $sql->Execute($sql->Prepare("UPDATE ticket_tb SET TCK_STATUS = '2' WHERE  TCK_CODE = ".$sql->Param('a')." LIMIT 1"),array($keys));
            print $sql->ErrorMsg();
    
            if($stmt){
              $msg = "Ticket closed successfully.";
              $status = "success";
              $view ='list';
              }
              else{
                  $msg = "Oops failed to close Ticket.";
                  $status = "error";
                  $view ='list';
              }
              break;
    }



    
    //This is the a method that is always called to fetch paginated items

    
          if($viewpage == "search"){
        if(isset($fdsearch) && $fdsearch != ""){
  
          $query = "SELECT TCK_CODE, TCK_CLIENT_NAME, TCK_CLIENT_CONTACT, TCK_USER_NAME, TCK_USER_ID, TCK_SUBJECT, TCK_CURRENT_MESSAGE, TCK_CHAT, TCK_STATUS FROM ticket_tb   WHERE  TCK_STATUS IN ('1','2') LIKE ".$sql->Param('a')." ORDER BY TCK_ID DESC";
          $input =array( "%".$fdsearch."%"); 
    
        }else{ 
          $query = "SELECT TCK_CODE, TCK_CLIENT_NAME, TCK_CLIENT_CONTACT, TCK_USER_NAME, TCK_USER_ID, TCK_SUBJECT, TCK_CURRENT_MESSAGE, TCK_CHAT, TCK_STATUS FROM ticket_tb    WHERE  TCK_STATUS IN ('1','2') ORDER BY TCK_ID DESC";
          $input =array();
        }
      }
      else{ 
        $query = "SELECT TCK_CODE, TCK_CLIENT_NAME, TCK_CLIENT_CONTACT, TCK_USER_NAME, TCK_USER_ID, TCK_SUBJECT, TCK_CURRENT_MESSAGE, TCK_CHAT, TCK_STATUS FROM ticket_tb    WHERE  TCK_STATUS IN ('1','2') ORDER BY TCK_ID DESC";
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
  