<?php

$stmtlist;

  switch($viewpage){

   case 'add':


        $qut_code = $engine->getQuotationCode($sql);

        $stmt =$sql->Execute($sql->Prepare("INSERT INTO quotation_tb (QUT_CODE, QUT_NAME, QUT_EMAIL, QUT_CONTACT, QUT_COMMENT) 
        VALUES(".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('d').",".$sql->Param('e').")"),
        array($qut_code, $qut_name, $qut_email, $qut_contact, trim($qut_comment)));
        print $sql->ErrorMsg();

        if($stmt){
          $msg = "Quotation added successfully.";
          $status = "success";
          $view ='list';
          }
          else{
              $msg = "Oops failed to add Quotation.";
              $status = "error";
              $view ='list';
          }
    
    break;

    case 'details':

      $stmtlist = $sql->Execute($sql->Prepare("SELECT QUT_CODE, QUT_NAME, QUT_EMAIL, QUT_CONTACT, QUT_COMMENT, QUT_STATUS FROM quotation_tb 
     WHERE  QUT_CODE = ".$sql->Param('a')." AND QUT_STATUS IN ('1','2')  LIMIT 1"),array($keys));
      print $sql->ErrorMsg();		

     break;
    

     case 'update':

      $stmt = $sql->Execute($sql->Prepare("UPDATE quotation_tb SET QUT_NAME = ".$sql->Param('1').", QUT_EMAIL = ".$sql->Param('2').",
      QUT_CONTACT = ".$sql->Param('3').", QUT_COMMENT=".$sql->Param('4'). " WHERE QUT_CODE =".$sql->Param('5')." AND 
      QUT_STATUS IN ('1','0')"),array( $qut_name, $qut_email, $qut_contact, $qut_comment, $qut_code ));
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

        $stmt = $sql->Execute($sql->Prepare("UPDATE quotation_tb SET QUT_STATUS = '1''0' WHERE QUT_CODE = ".$sql->Param('a')." LIMIT 1"),array($keys));
        print $sql->ErrorMsg();
  
        if($stmt){
          $msg = "quotation successfully.";
          $status = "success";
          $view ='list';
          }
          else{
              $msg = "Oops failed to quotation.";
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

      $query = "SELECT QUT_CODE, QUT_NAME, QUT_EMAIL, QUT_CONTACT, QUT_COMMENT, QUT_STATUS FROM quotation_tb  WHERE  
      QUT_STATUS IN  ('1','0') AND QUT_CODE = ".$sql->Param('a')." OR QUT_NAME LIKE ".$sql->Param('b')." OR QUT_CONTACT LIKE ".$sql->Param('c')."  ORDER BY QUT_ID DESC";
       $input =array($fdsearch, "%".$fdsearch."%", "%".$fdsearch."%");  

    }else{ 
      $query = "SELECT QUT_CODE, QUT_NAME, QUT_EMAIL, QUT_CONTACT, QUT_COMMENT, QUT_STATUS FROM quotation_tb  WHERE  QUT_STATUS IN ('1','0') ORDER BY QUT_ID DESC";
      $input =array();
    }
  }
  else{ 
    $query = "SELECT QUT_CODE, QUT_NAME, QUT_EMAIL, QUT_CONTACT, QUT_COMMENT, QUT_STATUS FROM quotation_tb  WHERE  QUT_STATUS IN ('1','0') ORDER BY QUT_ID DESC";
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
  