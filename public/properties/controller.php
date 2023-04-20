<?php

$stmtlist; 

switch($viewpage){ 
  case 'add':    
   $name = $prop_name;
   $location = $prop_location;

    $stmtusr = $sql->Execute($sql->Prepare("SELECT PROPERTY_CODE FROM rk_properties_tb WHERE  PROPERTY_NAME = ".$sql->Param('a')." AND  PROPERTY_LOCATION = ".$sql->Param('b')." LIMIT 1"),array( $name, $location));
    print $sql->ErrorMsg();	
    

    if($stmtusr->recordCount() < 1){

    $l_status = 0;
    $availability = $num_available;

    if ($availability <= 0){
      $prop_status = "0" ;
    }else{
      $prop_status = "1" ;
    }
    
      
      if($prop_region != ""){
        $arr_region =explode("@@@", $prop_region);
        $regionCode =$arr_region[0];
        $regionName =$arr_region[1];
      }
      
      if($prop_district != ""){
        $arr_district =explode("@@@", $prop_district);
        $districtCode =$arr_district[0];
        $districtName =$arr_district[1];
      }

     
      

       $prop_code = $engine->generateCode('rk_properties_tb','PROPERTY_CODE','PRP');
    
      $stmt = $sql->Execute($sql->Prepare("INSERT INTO rk_properties_tb (
        PROPERTY_CODE, PROPERTY_NAME,PROPERTY_REG, PROPERTY_TYPE, PROPERTY_DIST, 
        PROPERTY_LOCATION, PROPERTY_LONGITUDE, PROPERTY_LATITUDE, PROPERTY_NUM_AVAILABLE, 
        PROPERTY_STATUS) 
        VALUES(
          
          ".$sql->Param('1').", ".$sql->Param('2').",".$sql->Param('3').",".$sql->Param('4').","
          .$sql->Param('5').",".$sql->Param('6').",".$sql->Param('7').", ".$sql->Param('8').","
          .$sql->Param('9').",".$sql->Param('10').")"),

         array($prop_code, $prop_name, $regionCode, $prop_type, $districtCode, $prop_location, 
         $longitude, $latitude,$num_available, $prop_status ) );
         echo $sql->ErrorMsg();

          if($stmt){            
            $msg = "Property added successfully.";
            $status = "success";
            $view ='list';
          }
          else{
            $msg = "Oops failed to  property.";
            $status = "error";
            $view ='list';
          }
        }
          else{
            $msg = "Oops property already exists.";
            $status = "error";
            $view ='list';
          }
        
        
        break;
        
        
        case 'details':
          
          $stmtlist = $sql->Execute($sql->Prepare(" SELECT PROPERTY_CODE, PROPERTY_NAME,PROPERTY_REG, PROPERTY_NUM_AVAILABLE,
       PROPERTY_DIST, PROPERTY_TYPE, PROPERTY_LOCATION, PROPERTY_LONGITUDE, PROPERTY_LATITUDE,PROPERTY_STATUS FROM rk_properties_tb   WHERE PROPERTY_CODE = ".$sql->Param('a')."  LIMIT 1"),array($keys));
          print $sql->ErrorMsg();	
          
          break;

          
          case 'update':
            // $geo_loc = $longitude.','.$latitude;
         


            $availability = $num_available;
            if ($availability <= 0){
              $prop_status = "0" ;
            }else{
              $prop_status = "1" ;
            }
            
            
            if($prop_region != ""){
              $arr_sch_region =explode("@@@", $prop_region );
              $regionCode =$arr_sch_region[0];
              $regionName =$arr_sch_region[1];
            }
            
            if($prop_district != ""){
              $arr_sch_district =explode("@@@", $prop_district);
              $districtCode =$arr_sch_district[0];
              $districtName =$arr_sch_district[1];
            }

            $stmt = $sql->Execute($sql->Prepare("UPDATE rk_properties_tb SET 
            PROPERTY_NAME     = ".$sql->Param('1').",  PROPERTY_REG      = ".$sql->Param('2').", 
             PROPERTY_DIST   = ".$sql->Param('3').",   PROPERTY_TYPE   = ".$sql->Param('4').",
            PROPERTY_LATITUDE = ".$sql->Param('5').",  PROPERTY_LONGITUDE     = ".$sql->Param('6').",
            PROPERTY_LOCATION = ".$sql->Param('7').",   PROPERTY_NUM_AVAILABLE     = ".$sql->Param('8').",
            PROPERTY_STATUS = ".$sql->Param('9')."  WHERE PROPERTY_CODE = ".$sql->Param('10')."  AND 
            PROPERTY_STATUS IN ('1','0') "),
            array($prop_name, $regionCode, $districtCode, $prop_type, 
                $latitude, $longitude, $prop_location, $num_available,
              $prop_status, $prop_code));
              print $sql->ErrorMsg();
              
              
              if($stmt){
                $msg = "Property updated successfully.";
                $status = "success";
                $view ='list';
              }
              else{
                $msg = "Oops failed to update property.";
                $status = "error";
                $view ='list';
              } 
      
              
            
            
            break;
            


            case 'delete':
              $stmt = $sql->Execute($sql->Prepare("UPDATE rk_properties_tb SET PROPERTY_STATUS = '2' WHERE PROPERTY_CODE = ".$sql->Param('a')." LIMIT 1"),array($keys));
              print $sql->ErrorMsg();
        
              if($sql->affected_rows() > 0){
                $msg = "property successfully deleted.";
                $status = "success";
                $view ='list';
                }
                else{
                    $msg = "Oops failed to delete property.";
                    $status = "error";
                    $view ='list';
                }
        
              break;
      
      

              
              case 'reset':
                $limit = 10;
                $fdsearch = "";
                
                break;
                
              }
              
              
             //This is the a method that is always called to fetch paginated items
             if($viewpage == "search"){
              if(isset($fdsearch) && $fdsearch != ""){


                $query = "SELECT PROPERTY_ID ,PROPERTY_NAME, PROPERTY_CODE, PROPERTY_LOCATION,PROPERTY_REG,PROPERTY_DIST ,PROPERTY_ADDED_DATE,PROPERTY_UPDATED_DATE, PROPERTY_STATUS, PROPERTY_TYPE, PROPERTY_NUM_AVAILABLE FROM rk_properties_tb WHERE  PROPERTY_STATUS IN  ('1','0') AND PROPERTY_CODE = ".$sql->Param('a')." OR PROPERTY_NAME LIKE ".$sql->Param('b')." ORDER BY PROPERTY_ID DESC";
                $input =array($fdsearch, "%".$fdsearch."%"); 
          
              }else{ 
                $query = "SELECT PROPERTY_ID ,PROPERTY_NAME, PROPERTY_CODE, PROPERTY_LOCATION,PROPERTY_REG,PROPERTY_DIST ,PROPERTY_ADDED_DATE,PROPERTY_UPDATED_DATE, PROPERTY_STATUS, PROPERTY_TYPE, PROPERTY_NUM_AVAILABLE FROM rk_properties_tb   WHERE  PROPERTY_STATUS IN  ('1','0') ORDER BY PROPERTY_ID DESC";
                $input =array();
              }
            }
            else{ 
              $query = "SELECT PROPERTY_ID ,PROPERTY_NAME, PROPERTY_CODE, PROPERTY_LOCATION,PROPERTY_REG,PROPERTY_DIST ,PROPERTY_ADDED_DATE,PROPERTY_UPDATED_DATE, PROPERTY_STATUS, PROPERTY_TYPE, PROPERTY_NUM_AVAILABLE FROM rk_properties_tb  WHERE PROPERTY_STATUS IN ('1','0')ORDER BY PROPERTY_ID DESC";
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
              