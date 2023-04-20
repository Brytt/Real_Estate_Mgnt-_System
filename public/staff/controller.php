<?php

$session->set("attrition_STAFF_code", "");
$stmtlist; 
$stmt;

switch($viewpage){
  
  //The api call for add submit buttion clicked
  case 'add':
    $STAFF_code = $engine->generateCode('rk_staff_tb','STAFF_CODE','STF');
    
    $img_path = '';

    if(!empty ($_FILES['pic'])){
      
      
      $filename = $_FILES['pic']['name'];  
      if(! file_exists("media/uploads/".$STAFF_code)){
        mkdir("media/uploads/".$STAFF_code);          
      }
      
      $tempname   = $_FILES['pic']['tmp_name'];
      
              
      $file       = time().'_'.$filename;
      
      if(move_uploaded_file($tempname,"media/uploads/".$STAFF_code."/".$file)){
        $img_path ="media/uploads/".$STAFF_code."/".$file;
         
          }

        }    
         $stmt =$sql->Execute($sql->Prepare("INSERT INTO rk_staff_tb (
          STAFF_CODE,STAFF_TITLE, STAFF_FIRSTNAME,  STAFF_OTHERNAME, 
          STAFF_LASTNAME,   STAFF_DOB,  STAFF_GENDER, STAFF_NATIONALITY, STAFF_HOMETOWN,
          STAFF_PLACE_OF_BIRTH, STAFF_QUALIFICATION, STAFF_COURSE_STUDIED, STAFF_TYPE,  
          STAFF_CONTACT_1, STAFF_CONTACT_2,  STAFF_EMAIL, STAFF_ADDRESS, 
          STAFF_DIGITAL_ADDRESS, STAFF_PICTURE,  STAFF_DATE_CREATED, STAFF_CREATED_BY
          ) 
          VALUES
          (".$sql->Param('1').",".$sql->Param('2').",".$sql->Param('3').",".$sql->Param('4').",".$sql->Param('5').", ".$sql->Param('6').",".$sql->Param('7').",".$sql->Param('8').",".$sql->Param('9').",".$sql->Param('10').",".$sql->Param('11').",".$sql->Param('12').",".$sql->Param('13').",".$sql->Param('14').",".$sql->Param('15').",".$sql->Param('16').",".$sql->Param('17').",".$sql->Param('18').",".$sql->Param('19').",".$sql->Param('20').",".$sql->Param('21').")"),
          [
            $STAFF_code, $rk_title, $rk_fname, $rk_mname,  $rk_lname, 
            date('Y-m-d', strtotime($rk_dob)), $rk_gender, $rk_nationality, 
            $rk_hometown, $rk_placeofbirth,$rk_qualification,$rk_course,$staff_type,
            $rk_contact1, $rk_contact2, $rk_mail, $rk_address, $rk_dig_address,
            $img_path, date('Y-m-d H:i:s', strtotime('now')),$session->get('actorcode') 
            ]
          );

          print $sql->ErrorMsg();		


          
        
        if($stmt){
          $msg = "Staff added successfully.";
          $status = "success";
          $view ='list';
          
        }
        else{
          $msg = "Oops failed to add Staff.";
          $status = "error";
          $view ='list';
        }
        
        
        break;
        
        case 'details':
          
          
          $stmtlist = $sql->Execute($sql->Prepare("SELECT  * FROM rk_staff_tb WHERE STAFF_CODE = ".$sql->Param('1')."  LIMIT 1"),array($keys));
          print $sql->ErrorMsg();		
          
          
          $stmtkin = $sql->Execute($sql->Prepare("SELECT  * FROM rk_staff_next_of_kin_tb WHERE STAFF_CODE = ".$sql->Param('1')."  LIMIT 1"),array($keys));
          print $sql->ErrorMsg();		
          
          break;
          
          case 'update':

            
            $img_path = '';
      
            if($_FILES['pic']['name']!= ''){
              
              
              $filename = $_FILES['pic']['name'];  
              if(! file_exists("media/uploads/".$keys)){
                mkdir("media/uploads/".$keys);          
              }
              
              $tempname   = $_FILES['pic']['tmp_name'];
      
              
              $file       = time().'_'.$filename;
              
              if(move_uploaded_file($tempname,"media/uploads/".$keys."/".$file)){
                $pic ="media/uploads/".$keys."/".$file;
                 
                  }
            }
             

          $stmt =$sql->Execute($sql->Prepare("UPDATE rk_staff_tb SET STAFF_TITLE =".$sql->Param('1').", STAFF_FIRSTNAME =".$sql->Param('2').", STAFF_OTHERNAME =".$sql->Param('3').", STAFF_LASTNAME =".$sql->Param('4').",STAFF_DOB =".$sql->Param('5').", STAFF_GENDER =".$sql->Param('6').",   STAFF_NATIONALITY =".$sql->Param('7').", STAFF_PLACE_OF_BIRTH=".$sql->Param('8').", STAFF_HOMETOWN=".$sql->Param('9').", STAFF_QUALIFICATION=".$sql->Param('10').",STAFF_COURSE_STUDIED=".$sql->Param('11').",STAFF_CONTACT_1 =".$sql->Param('12').", STAFF_CONTACT_2 =".$sql->Param('13').",STAFF_EMAIL =".$sql->Param('14').", STAFF_ADDRESS =".$sql->Param('15').",STAFF_DIGITAL_ADDRESS =".$sql->Param('16').",STAFF_PICTURE =".$sql->Param('17')."   WHERE STAFF_CODE =".$sql->Param('18'). "  "), [$rk_title, $rk_fname,$rk_mname, $rk_lname, 
          date('Y-m-d', strtotime($rk_dob)), 
          $rk_gender, 
          $rk_nationality,$rk_placeofbirth,   $rk_hometown, 
          $rk_qualification,
          $rk_course, $rk_contact1, 
          $rk_contact2, $rk_mail, $rk_address, 
          $rk_dig_address, $pic,
          $keys]);
        print $sql->ErrorMsg();


            
            if($stmt){
              $msg = "Staff details updated successfully.";
              $status = "success";
              $view ='list';
            }
            else{
              $msg = "Oops failed to update Staff details.";
              $status = "error";
              $view ='list';
            }
            
            
            
            break;
            
            case 'deletestaff':              
              $stmt = $sql->Execute($sql->Prepare("UPDATE rk_staff_tb SET STAFF_STATUS = '1''0'   WHERE STAFF_CODE=".$sql->Param('5').""), [$keys]);
              if($stmt){
                $msg = "Staff removed successfully.";
                $status = "success";
                $view ='list';
              }
              else{
                $msg = "Oops failed to remove Staff.";
                $status = "error";
                $view ='list';
              }
              
              break;       
              
              case 'reset':
                $limit = 10;
                $fdsearch = "";
                
                break;
                
                
              }
              
              
              //This is the staff method that is always called to fetch paginated items
              
              if($viewpage == "search"){
                if(isset($fdsearch) && $fdsearch != ""){
                  
                  $query = "SELECT  STAFF_CODE, STAFF_TITLE, STAFF_FIRSTNAME, STAFF_OTHERNAME, STAFF_LASTNAME, STAFF_DOB,STAFF_GENDER, STAFF_NATIONALITY, STAFF_PLACE_OF_BIRTH, STAFF_HOMETOWN, STAFF_QUALIFICATION, STAFF_COURSE_STUDIED,STAFF_CONTACT_1, STAFF_CONTACT_2, STAFF_EMAIL, STAFF_ADDRESS, STAFF_DIGITAL_ADDRESS, STAFF_TYPE, STAFF_OCCUPATION, STAFF_STATUS, STAFF_DATE_CREATED, STAFF_CREATED_BY 
                   FROM rk_staff_tb   WHERE  STAFF_STATUS IN  ('1','0') AND STAFF_CODE = ".$sql->Param('a')." OR STAFF_FIRSTNAME LIKE ".$sql->Param('b')." OR STAFF_LASTNAME LIKE ".$sql->Param('b')." OR STAFF_OTHERNAME LIKE ".$sql->Param('b')."  ORDER BY STAFF_ID DESC";
                  $input =array($fdsearch, "%".$fdsearch."%", "%".$fdsearch."%", "%".$fdsearch."%"); 
                  

                }else{ 
                  $query = "SELECT STAFF_CODE, STAFF_TITLE, STAFF_FIRSTNAME, STAFF_OTHERNAME, STAFF_LASTNAME, STAFF_DOB,STAFF_GENDER, STAFF_NATIONALITY,STAFF_PLACE_OF_BIRTH, STAFF_HOMETOWN, STAFF_QUALIFICATION, STAFF_COURSE_STUDIED, STAFF_CONTACT_1, STAFF_CONTACT_2, STAFF_EMAIL, STAFF_ADDRESS, STAFF_DIGITAL_ADDRESS, STAFF_TYPE, STAFF_OCCUPATION, STAFF_STATUS, STAFF_DATE_CREATED, STAFF_CREATED_BY 
                  FROM rk_staff_tb   WHERE  STAFF_STATUS='1'  ORDER BY STAFF_ID DESC";
                  $input =array();
                }
              }
              else{ 
                $query = "SELECT STAFF_CODE, STAFF_TITLE, STAFF_FIRSTNAME, STAFF_OTHERNAME, STAFF_LASTNAME, STAFF_DOB,STAFF_GENDER, STAFF_NATIONALITY, STAFF_PLACE_OF_BIRTH, STAFF_HOMETOWN, STAFF_QUALIFICATION, STAFF_COURSE_STUDIED,STAFF_CONTACT_1, STAFF_CONTACT_2, STAFF_EMAIL, STAFF_ADDRESS, STAFF_DIGITAL_ADDRESS, STAFF_TYPE, STAFF_OCCUPATION, STAFF_STATUS, STAFF_DATE_CREATED, STAFF_CREATED_BY 
                FROM rk_staff_tb  WHERE  STAFF_STATUS IN  ('1','0') ORDER BY STAFF_ID DESC";
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
              