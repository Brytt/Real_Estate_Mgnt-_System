<?php

$stmtlist;

switch($viewpage){


    //The api call for add submit buttion clicked
    case 'add':
      



      $ins_code = $engine->getInspectionCode($sql);

      $stmt =$sql->Execute($sql->Prepare("INSERT INTO inspection_tb (INS_CODE , INS_FIRST_NAME, INS_MIDDLE_NAME, INS_LAST_NAME, INS_EMAIL, INS_ADDRESS, INS_CONTACT, INS_INSPECTION_DATE) 
      VALUES(".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('d').",
      ".$sql->Param('e').", ".$sql->Param('f').", ".$sql->Param('g').", ".$sql->Param('h').")"),array($ins_code, $ins_first_name, $ins_middle_name, $ins_last_name, $ins_email, $ins_address, $ins_contact, $ins_inspection_date));
      print $sql->ErrorMsg();

        


      if($stmt){
        $msg = "Inspection added successfully.";
        $status = "success";
        $view ='list';
        }
        else{
            $msg = "Oops failed to add Inspection.";
            $status = "error";
            $view ='list';
        }

        
    break;
      

  

    case 'details':


      $stmtlist = $sql->Execute($sql->Prepare("SELECT INS_CODE , INS_FIRST_NAME, INS_MIDDLE_NAME, INS_LAST_NAME, INS_EMAIL, INS_ADDRESS, INS_CONTACT, INS_INSPECTION_DATE, INS_STATUS FROM inspection_tb WHERE  INS_CODE = ".$sql->Param('a')." AND INS_STATUS IN ('1','2', '3')  LIMIT 1"),array($keys));
      print $sql->ErrorMsg();		

     break;

     case 'update':

      $stmt = $sql->Execute($sql->Prepare("UPDATE inspection_tb SET INS_FIRST_NAME = ".$sql->Param('1').",  INS_MIDDLE_NAME =".$sql->Param('2').", INS_LAST_NAME=".$sql->Param('3').", INS_EMAIL=".$sql->Param('4').", INS_ADDRESS=".$sql->Param('5').", INS_CONTACT=".$sql->Param('6').", INS_INSPECTION_DATE=".$sql->Param('7')."  WHERE INS_CODE =".$sql->Param('8')." AND INS_STATUS IN ('1','2')"),array($ins_first_name, $ins_middle_name, $ins_last_name, $ins_email, $ins_address, $ins_contact, $ins_inspection_date, $ins_code));
      print $sql->ErrorMsg();	

      if($stmt){
        $msg = "Inspection updated successfully.";
        $status = "success";
        $view ='list';
        }
        else{
            $msg = "Oops failed to update Inspection.";
            $status = "error";
            $view ='list';
        }
      
    break;

    case 'approve':
      $stmt = $sql->Execute($sql->Prepare("UPDATE inspection_tb SET INS_STATUS = '1' WHERE  INS_CODE = ".$sql->Param('a')." AND  INS_STATUS = '2'"),array($keys));
      print $sql->ErrorMsg();

      if($stmt){
        $msg = "Inspected successfully.";
        $status = "success";
        $view ='list';
        }
        else{
            $msg = "Oops failed to Inspect.";
            $status = "error";
            $view ='list';
        }

      break;

      case 'reject':

        $stmt = $sql->Execute($sql->Prepare("UPDATE inspection_tb SET INS_STATUS = '0' WHERE  INS_CODE = ".$sql->Param('a')." AND  INS_STATUS = '2'"),array($keys));
        print $sql->ErrorMsg();
  
        if($stmt){
          $msg = "Inspected successfully.";
          $status = "success";
          $view ='list';
          }
          else{
              $msg = "Oops failed to Inspect.";
              $status = "error";
              $view ='list';
          }
  
        break;

        case 'delete':

          $stmt = $sql->Execute($sql->Prepare("UPDATE inspection_tb SET INS_STATUS = '0' WHERE  INS_CODE = ".$sql->Param('a')." LIMIT 1"),array($keys));
          print $sql->ErrorMsg();
    
          if($stmt){
            $msg = "Inspected successfully.";
            $status = "success";
            $view ='list';
            }
            else{
                $msg = "Oops failed to Inspect.";
                $status = "error";
                $view ='list';
            }
    
          break;

    case 'reset':
      $limit = 10;
      $fdsearch = "";

    break;


    }


   
  
  
      


//This is the inspection method that is always called to fetch paginated items using the user group

      
if($viewpage == "search"){
  if(isset($fdsearch) && $fdsearch != ""){

    $query = "SELECT INS_CODE, INS_FIRST_NAME, INS_MIDDLE_NAME, INS_LAST_NAME, INS_EMAIL, INS_ADDRESS, INS_CONTACT, INS_INSPECTION_DATE, INS_STATUS FROM inspection_tb    WHERE  INS_STATUS IN ('1','2') AND INS_FIRST_NAME = ".$sql->Param('a')." OR INS_CONTACT LIKE ".$sql->Param('d')." ORDER BY INS_ID DESC";
    $input =array( $fdsearch,"%".$fdsearch."%");

  }else{ 
    $query = "SELECT INS_CODE, INS_FIRST_NAME, INS_MIDDLE_NAME, INS_LAST_NAME, INS_EMAIL, INS_ADDRESS, INS_CONTACT, INS_INSPECTION_DATE, INS_STATUS FROM inspection_tb  WHERE  INS_STATUS IN  ('1','2') ORDER BY INS_ID DESC";
    $input =array();
  }
}
else{ 
  $query = "SELECT INS_CODE, INS_FIRST_NAME, INS_MIDDLE_NAME, INS_LAST_NAME, INS_EMAIL, INS_ADDRESS, INS_CONTACT, INS_INSPECTION_DATE, INS_STATUS FROM inspection_tb  WHERE  INS_STATUS IN  ('1','2') ORDER BY INS_ID DESC";
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
  

