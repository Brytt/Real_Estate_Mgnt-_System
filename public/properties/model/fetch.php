<?php

include '../../../config.php';
include SPATH_LIBRARIES.DS."engine.Class.php";

$regioncode=$_POST['regioncode'];

$regioncode; 
$districts = $sql->Execute($sql->Prepare("SELECT DIST_CODE,DIST_NAME FROM ges_district_tb WHERE DIST_REG_CODE =".$sql->Param('1')." AND DIST_STATUS= '1' "),array($regioncode));
print $sql->ErrorMsg();
 


if($districts->RecordCount()>0){?>
   <option value="">--Select District--</option>
  <?php  while($obj=$districts->FetchNextObject()){
      $dist_name = $obj->DIST_NAME;
?>  
    <option value ="<?php echo $obj->DIST_CODE."@@@".$dist_name; ?>"><?php echo strtoupper($dist_name);?></option>
    
 <?php    }
    }else{
?><option diasbled >No no District available</option>
<?php     }
    ?>
