<?php

include '../../../config.php';
include SPATH_LIBRARIES.DS."engine.Class.php";

if(isset($_POST['regioncode'])){
$regioncode=$_POST['regioncode'];

// echo $regioncode;exit;

$districts = $sql->Execute($sql->Prepare("SELECT DIST_CODE, DIST_NAME FROM ges_district_tb WHERE DIST_REG_CODE =".$sql->Param('1')." AND DIST_STATUS={$sql->Param('a')} "),array($regioncode,'1'));
  

if($districts->RecordCount()>0){?>
   <option value="" selected disabled>--Select District--</option>
  <?php  while($obj=$districts->FetchNextObject()){
      $districtName = $obj->DIST_NAME;
?>  
    <option value ="<?php echo $obj->DIST_CODE."@@@".$districtName ; ?>"><?php echo strtoupper($districtName);?></option>
    
 <?php    }
    }else{
        ?>
        <option value =" "  selected disabled>--No School available--</option>
    <?php
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
        <option value="" selected disabled>--Select District--</option>
      <?php  while($obj=$schools->FetchNextObject()){
          $schoolName = $obj->GSH_NAME ;
    ?>  
        <option value ="<?php echo $obj->GSH_CODE."@@@".$schoolName ?>"><?php echo strtoupper($schoolName);?></option>
        
     <?php    }
        }else{
    echo false ;
        }
}

else if(isset($_POST['non_teach_grade'])){
    $non_teach_grade=$_POST['non_teach_grade'];

        $grades = $sql->Execute($sql->Prepare("SELECT GRA_CODE, GRA_NAME FROM ges_grade_tb WHERE GGC_CODE = " .$sql->Param('a')." ORDER BY GRA_NAME ASC "),array($non_teach_grade));
        print $sql->ErrorMsg();	

        if($grades->RecordCount()>0){?>
            <option value=""> --Select Grade / Rank -- </option>
           <?php  while($obj=$grades->FetchNextObject()){
               $gradeName = $obj->GRA_NAME ;
         ?>  
             <option value ="<?php echo $obj->GRA_CODE."@@@".$gradeName ?>"><?php echo strtoupper($gradeName);?></option>
             
          <?php    }
             }else{
         echo false ;
             }
    }

    ?>

  