<?php

include '../../../../config.php';
include SPATH_LIBRARIES.DS."engine.Class.php";
// include SPATH_LIBRARIES.DS."doctors.Class.php";
//$encaes = new encAESClass($saltencrypt,'CBC',$pepperdecrypt);
// $engine = new engineClass();
//$doc = new doctorClass();
// $day = Date("Y-m-d");
// $usrcode = $engine->getActorCode();
// $usrname = $engine->getActorName();
// $actor = $engine->getActorDetails();

if(isset($regioncode)){
$regioncode=$_POST['regioncode'];

// echo $regioncode;exit;

$districts = $sql->Execute($sql->Prepare("SELECT DIST_CODE,DIST_NAME FROM ges_district_tb WHERE DIST_REG_CODE =".$sql->Param('1')." AND DIST_STATUS={$sql->Param('a')} "),array($regioncode,'1'));
  

if($districts->RecordCount()>0){?>
   <option value="">--Select District--</option>
  <?php  while($obj=$districts->FetchNextObject()){
?>  
    <option value ="<?php echo $obj->DIST_CODE?>"><?php echo $obj->DIST_NAME;?></option>
    
 <?php    }
    }else{
echo false ;
    }
    

}
else if(isset($_POST['districtcode'])){
    $districtcode=$_POST['districtcode'];

    // echo $regioncode;exit;
        $schools = $sql->Execute($sql->Prepare("SELECT GSH_CODE, GSH_NAME, GSH_CIRCUIT, GSH_LOCATION_TYPE, 
        GSH_LOCATION, GSH_DIGITAL_ADDRESS, GSH_DISTRICT, GSH_REGION, GSH_STATUS FROM ges_school_tb   WHERE  GSH_DISTRICT_CODE =".$sql->Param('1')." AND GSH_STATUS IN  ('1','0')"),array($districtcode));
        print $sql->ErrorMsg();	
      
    
    if($schools->RecordCount()>0){?>
       <option value=""> All Schools </option>
      <?php  while($obj=$schools->FetchNextObject()){
          $schoolName = $obj->GSH_NAME ;
    ?>  
        <option value ="<?php echo $obj->GSH_CODE; ?>"><?php echo strtoupper($schoolName);?></option>
        
     <?php    }
        }else{
    echo false ;
        }
}