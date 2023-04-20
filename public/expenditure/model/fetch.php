<?php

include '../../../config.php';
include SPATH_LIBRARIES.DS."engine.Class.php";

if(isset($_POST['regioncode'])){
$regioncode=$_POST['regioncode'];

// echo $regioncode;exit;

$districts = $sql->Execute($sql->Prepare("SELECT DIST_CODE, DIST_NAME FROM ges_district_tb WHERE DIST_REG_CODE =".$sql->Param('1')." AND DIST_STATUS={$sql->Param('a')} "),array($regioncode,'1'));
  

if($districts->RecordCount()>0){?>
   <option value="">--Select District--</option>
  <?php  while($obj=$districts->FetchNextObject()){
      $districtName = $obj->DIST_NAME;
?>  
    <option value ="<?php echo $obj->DIST_CODE."@@@".$districtName ; ?>"><?php echo strtoupper($districtName);?></option>
    
 <?php    }
    }else{
echo false ;
    }
}
else if(isset($_POST['districtcode'])){
    $districtcode=$_POST['districtcode'];

    // echo $regioncode;exit;
        $schools = $sql->Execute($sql->Prepare("SELECT GSH_CODE, GSH_NAME, GSH_SCHOOL_CODE, GSH_CIRCUIT, GSH_LOCATION_TYPE, 
        GSH_LOCATION, GSH_DIGITAL_ADDRESS, GSH_DISTRICT, GSH_REGION, GSH_STATUS FROM ges_school_tb   WHERE  GSH_DISTRICT_CODE =".$sql->Param('1')." AND GSH_STATUS IN  ('1','0')"),array($districtcode));
        print $sql->ErrorMsg();	
      
    
    if($schools->RecordCount()>0){?>
       <option value="">--Select School--</option>
      <?php  while($obj=$schools->FetchNextObject()){
          $schoolName = $obj->GSH_NAME ;
    ?>  
        <option value ="<?php echo $obj->GSH_CODE."@@@".$schoolName."@@@".$obj->GSH_SCHOOL_CODE ?>"><?php echo strtoupper($schoolName);?></option>
        
     <?php    }
        }else{
    echo false ;
        }
}
