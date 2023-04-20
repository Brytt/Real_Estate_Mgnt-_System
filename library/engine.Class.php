<?php
class engineClass{
	public  $sql;
	public $session;
	public $phpmailer;
	function  __construct() {
		global $sql,$session,$phpmailer;
		$this->session = $session;
		$this->sql = $sql;
		$this->phpmailer = $phpmailer;
		$this->actor_id = $session->get("actorid");
	}
	public function concatmoney($num){
		if($num>1000000000000) {
			return round(($num/1000000000000),1).' tri';
			}else if($num>1000000000){ return round(($num/1000000000),1).' bil';
			}else if($num>1000000) {return round(($num/1000000),1).' mil';
			}else if($num>1000){ return round(($num/1000),1).' k';
		}
		return number_format($num);
	}
	public function getActorDetails($tablename){
		$actor_id = $this->session->get("actorid");
		$stmt = $this->sql->Prepare("SELECT * FROM  ".$this->sql->Param('a')."  WHERE USR_ID = ".$this->sql->Param('b')." ");
		$stmt = $this->sql->Execute($stmt,array($tablename,$actor_id));
		if($stmt && ($stmt->RecordCount() > 0)){
		 	return $stmt->FetchNextObject();
		}else{
			return false;
		}
	}//end of getActorsDetails

	public function msgBox($msg,$status){
		if(!empty($status)){
			if($status == "success"){
				echo '<script>document.querySelector(swal("Success", "'.$msg.'", "success"));</script>';
			}elseif($status == "info"){
				echo '<script>document.querySelector(swal("Info!", "'.$msg.'", "info"));</script>';
			}else{
				echo '<script>document.querySelector(swal("Ooops!", "'.$msg.'", "error"));</script>';
			}
		}
	}



	
	public function msg($error_code='0',$msg_text=''){
		if(!empty($msg_text)){
			switch($error_code){
				case "error":
						$point = "alert-danger";
				break;
				case "success":
						$point = "alert-success";
				break;
				case "warning":
					$point = "alert-warning";
				break;
				case "info":
					$point = "alert-info";
				break;
				case "dark":
					$point = "alert-dark";
				break;
				default:
						$point = "alert-light";
				break;
			}
		// echo '<div class="alert '. $point.'" role="alert">' . $msg_text . '</div>';
		echo '<script>document.querySelector(swal("'.$point.'", "'.$msg_text.'", "success"));</script>';
		}
		return '';
	   }

	      //Method to fetch all the revenue type
		 public function getPropertyCat(){
			return $comnds=$this->sql->GETALL($this->sql->Prepare("SELECT RC_CODE, RC_TITLE FROM revenue_category_tb WHERE RC_STATUS='1' ORDER BY RC_TITLE ASC "),array());
			print $this->sql->ErrorMsg();
		   }

	   public function getregions(){
		return $comnds=$this->sql->GETALL($this->sql->Prepare("SELECT REG_ID,REG_NAME FROM ges_region_tb WHERE REG_STATUS='1' ORDER BY REG_NAME ASC "),array());
		print $this->sql->ErrorMsg();
	   }

	   //Method to fetch all the attrition type
	   public function getAttritionType(){
		return $comnds=$this->sql->GETALL($this->sql->Prepare("SELECT ATR_CODE, ATR_NAME FROM ges_attrition_type_tb WHERE ATR_STATUS='1' ORDER BY ATR_NAME ASC "),array());
		print $this->sql->ErrorMsg();
	   }


	   //Method to fetch the academic setting
	   public function getAcademicDate(){
		return $comnds=$this->sql->GETALL($this->sql->Prepare("SELECT 	GAS_YEAR, GAS_TERM FROM ges_academic_setting_tb WHERE GAS_STATUS='1' LIMIT 1"),array());
		print $this->sql->ErrorMsg();
	   }

//Method to fetch all the revenue type
public function getProperty(){
	return $comnds=$this->sql->GETALL($this->sql->Prepare("SELECT PROPERTY_CODE, PROPERTY_NAME FROM rk_properties_tb WHERE PROPERTY_STATUS='1' ORDER BY PROPERTY_NAME ASC "),array());
	print $this->sql->ErrorMsg();
   }

   
//Method to fetch all the revenue type
public function getPropertyLand(){
	return $comnds=$this->sql->GETALL($this->sql->Prepare("SELECT PROPERTY_CODE, PROPERTY_NAME FROM rk_properties_tb WHERE PROPERTY_STATUS='1' AND PROPERTY_TYPE =".$this->sql->Param('a')." ORDER BY PROPERTY_NAME ASC "),array("Land"));
	print $this->sql->ErrorMsg();
   }

   
//Method to fetch all the revenue type
public function getPropertyApartment(){
	return $comnds=$this->sql->GETALL($this->sql->Prepare("SELECT PROPERTY_CODE, PROPERTY_NAME FROM rk_properties_tb WHERE PROPERTY_STATUS='1' AND PROPERTY_TYPE =".$this->sql->Param('a')." ORDER BY PROPERTY_NAME ASC "),array("Apartment"));
	print $this->sql->ErrorMsg();
   }

	   //Method to fetch all the grade category
	   public function getGradeCategory(){
		return $comnds=$this->sql->GETALL($this->sql->Prepare("SELECT GGC_ID, GGC_CODE, GGC_NAME FROM ges_grade_category_tb WHERE GGC_STATUS='1' ORDER BY GGC_NAME ASC "),array());
		print $this->sql->ErrorMsg();
	   }


	   //Method to fetch all grades by category
	   public function getGradeByCategoryID($grade_cate){
	
        $stmt = $this->sql->Prepare("SELECT GRA_CODE, GRA_NAME FROM ges_grade_tb WHERE GGC_CODE  = ".$this->sql->Param('a')." ORDER BY GRA_NAME ASC ");
        $stmt = $this->sql->Execute($stmt,array($grade_cate));
		print $this->sql->ErrorMsg();
		return $stmt;
		
	   }

	      //Method to fetch all grades by category
		  public function getUserById($user_code){
		
			$stmt = $this->sql->Prepare("SELECT * FROM ges_staff_tb   WHERE  GST_CODE  = ".$this->sql->Param('a'));
			$stmt = $this->sql->Execute($stmt,array($user_code));
			print $this->sql->ErrorMsg();
			return $stmt;
			
		   }


	   public function RegionDetails($regioncode){
        $stmt = $this->sql->Prepare("SELECT * FROM ges_region_tb WHERE REG_ID = ".$this->sql->Param('a'));
        $stmt = $this->sql->Execute($stmt,array($regioncode));

        if($stmt)   {
            return $stmt->FetchNextObject();

        }else{return false ;}
      }// end geAllRegionDetails
	
	 
	  public function DistrictDetails($districtcode){
        $stmt = $this->sql->Prepare("SELECT * FROM ges_district_tb WHERE DIST_CODE = ".$this->sql->Param('a'));
        $stmt = $this->sql->Execute($stmt,array($districtcode));

        if($stmt)   {
            return $stmt->FetchNextObject();

        }else{return false ;}
      }// end geAllDistrictDetails
	

	  
	  public function SchoolDetails($school_code){
        $stmt = $this->sql->Prepare("SELECT * FROM ges_school_tb WHERE GSH_CODE = ".$this->sql->Param('a'));
        $stmt = $this->sql->Execute($stmt,array($school_code));

        if($stmt)   {
            return $stmt->FetchNextObject();

        }else{return false ;}
      }// end geAllSchoolDetails
	

	  //Getting all district by region code
	  public function getDistrictByRegion($region){
		return $comnds=$this->sql->GETALL($this->sql->Prepare("SELECT DIST_CODE, DIST_NAME FROM ges_district_tb WHERE DIST_REG_CODE = ".$this->sql->Param('a')." ORDER BY DIST_NAME ASC "),array($region));
		print $this->sql->ErrorMsg();
	   }


	    //Getting all district by region code
	  public function getSchoolByDistrict($district){
		return $comnds=$this->sql->GETALL($this->sql->Prepare("SELECT GSH_CODE, GSH_NAME FROM ges_school_tb WHERE GSH_DISTRICT_CODE = ".$this->sql->Param('a')." ORDER BY GSH_NAME ASC "),array($district));
		print $this->sql->ErrorMsg();
	   }


	public function validatePostForm($microtime){
     	$postkey = $this->session->get('postkey');
     	if(empty($postkey)){
     		$postkey = 2;
     	}
     	if($postkey != $microtime){
     		if($this->postkey == 2){
     			$this->session->set('postkey',$microtime);
     		}else{
                 $this->session->del('postkey');
                 $this->session->set('postkey',$microtime);
             }
     		return true;
     	}else{
     		return false;
     	}
     }

	 public function readMore($string,$textcount){
		 $string = strip_tags($string);
		if (strlen($string) > $textcount) {
			// truncate string
			$stringCut = substr($string, 0, $textcount);

			// make sure it ends in a word so assassinate doesn't become ass...
			$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
		}
		return $string;
	 }



	 
	 
function getGeneralRevenueCode($sql){
	
    $query = $sql->Execute($sql->Prepare("SELECT GEN_REV_CODE  FROM general_revenue_tb ORDER BY GEN_REV_ID DESC LIMIT 1 "),array());
    print $sql->ErrorMsg();
	$items = "GEN";
	$rowNum = $query->RecordCount();

	if($rowNum > 0)
		{
			$obj = $query->FetchNextObject();
			
			$BRW_ID = $obj->GEN_REV_CODE;
		
				$order = substr($BRW_ID,3,strlen($BRW_ID));
				$order = $order + 1;
				if(strlen($order) == 1){
					$orderno = $items.'000000000'.$order;
				}else if(strlen($order) == 2){
					$orderno = $items.'00000000'.$order;
				}else if(strlen($order) == 3){
					$orderno = $items.'0000000'.$order;
				}else if(strlen($order) == 4){
					$orderno = $items.'000000'.$order;
				}else if(strlen($order) == 5){
					$orderno = $items.'00000'.$order;
				}else if(strlen($order) == 6){
					$orderno = $items.'0000'.$order;
				}else if(strlen($order) == 7){
					$orderno = $items.'000'.$order;
				}else if(strlen($order) == 8){
					$orderno = $items.'00'.$order;
				}else if(strlen($order) == 9){
					$orderno = $items.'0'.$order;
				}else{
					$orderno = $items.$order;
				}

		}
		else{
			$orderno = $items.'0000000001';
			}

		$query->close();
		return $orderno;

}




		/*
		* This method will generate a code base on
		* the name of the connection string, table, id column, code column and the INITIALS
		* All you need to do is to pass the connection string,  table name, column name and initials
		*/ 
function getStaffCode($sql){
	
    $query = $sql->Execute($sql->Prepare("SELECT GST_CODE  FROM ges_staff_tb ORDER BY GST_ID DESC LIMIT 1 "),array());
    print $sql->ErrorMsg();
	$items = "STF";
	$rowNum = $query->RecordCount();

	if($rowNum > 0)
		{
			$obj = $query->FetchNextObject();
			
			$BRW_ID = $obj->GST_CODE;
		
				$order = substr($BRW_ID,3,strlen($BRW_ID));
				$order = $order + 1;
				if(strlen($order) == 1){
					$orderno = $items.'000000000'.$order;
				}else if(strlen($order) == 2){
					$orderno = $items.'00000000'.$order;
				}else if(strlen($order) == 3){
					$orderno = $items.'0000000'.$order;
				}else if(strlen($order) == 4){
					$orderno = $items.'000000'.$order;
				}else if(strlen($order) == 5){
					$orderno = $items.'00000'.$order;
				}else if(strlen($order) == 6){
					$orderno = $items.'0000'.$order;
				}else if(strlen($order) == 7){
					$orderno = $items.'000'.$order;
				}else if(strlen($order) == 8){
					$orderno = $items.'00'.$order;
				}else if(strlen($order) == 9){
					$orderno = $items.'0'.$order;
				}else{
					$orderno = $items.$order;
				}

		}
		else{
			$orderno = $items.'0000000001';
			}

		$query->close();
		return $orderno;

}


function getInspectionCode($sql){
	
	$query = $sql->Execute($sql->Prepare("SELECT INS_CODE  FROM inspection_tb ORDER BY INS_ID DESC LIMIT 1 "),array());
print $sql->ErrorMsg();
$items = "INS";
$rowNum = $query->RecordCount();

if($rowNum > 0)
	{
		$obj = $query->FetchNextObject();
		
		$BRW_ID = $obj->INS_CODE;
	
			$order = substr($BRW_ID,3,strlen($BRW_ID));
			$order = $order + 1;
			if(strlen($order) == 1){
				$orderno = $items.'000000000'.$order;
			}else if(strlen($order) == 2){
				$orderno = $items.'00000000'.$order;
			}else if(strlen($order) == 3){
				$orderno = $items.'0000000'.$order;
			}else if(strlen($order) == 4){
				$orderno = $items.'000000'.$order;
			}else if(strlen($order) == 5){
				$orderno = $items.'00000'.$order;
			}else if(strlen($order) == 6){
				$orderno = $items.'0000'.$order;
			}else if(strlen($order) == 7){
				$orderno = $items.'000'.$order;
			}else if(strlen($order) == 8){
				$orderno = $items.'00'.$order;
			}else if(strlen($order) == 9){
				$orderno = $items.'0'.$order;
			}else{
				$orderno = $items.$order;
			}

	}
	else{
		$orderno = $items.'0000000001';
		}

	$query->close();
	return $orderno;

}

function getMsgCode($sql){
	
    $query = $sql->Execute($sql->Prepare("SELECT GST_CODE  FROM ges_staff_tb ORDER BY GST_ID DESC LIMIT 1 "),array());
    print $sql->ErrorMsg();
	$items = "STF";
	$rowNum = $query->RecordCount();

	if($rowNum > 0)
		{
			$obj = $query->FetchNextObject();
			
			$BRW_ID = $obj->GST_CODE;
		
				$order = substr($BRW_ID,3,strlen($BRW_ID));
				$order = $order + 1;
				if(strlen($order) == 1){
					$orderno = $items.'000000000'.$order;
				}else if(strlen($order) == 2){
					$orderno = $items.'00000000'.$order;
				}else if(strlen($order) == 3){
					$orderno = $items.'0000000'.$order;
				}else if(strlen($order) == 4){
					$orderno = $items.'000000'.$order;
				}else if(strlen($order) == 5){
					$orderno = $items.'00000'.$order;
				}else if(strlen($order) == 6){
					$orderno = $items.'0000'.$order;
				}else if(strlen($order) == 7){
					$orderno = $items.'000'.$order;
				}else if(strlen($order) == 8){
					$orderno = $items.'00'.$order;
				}else if(strlen($order) == 9){
					$orderno = $items.'0'.$order;
				}else{
					$orderno = $items.$order;
				}

		}
		else{
			$orderno = $items.'0000000001';
			}

		$query->close();
		return $orderno;

}


function getNoteCode($sql){
	
    $query = $sql->Execute($sql->Prepare("SELECT NOTE_CODE  FROM ges_notifications ORDER BY NOTE_ID DESC LIMIT 1 "),array());
    print $sql->ErrorMsg();
	$items = "STF";
	$rowNum = $query->RecordCount();

	if($rowNum > 0)
		{
			$obj = $query->FetchNextObject();
			
			$BRW_ID = $obj->NOTE_CODE;
		
				$order = substr($BRW_ID,3,strlen($BRW_ID));
				$order = $order + 1;
				if(strlen($order) == 1){
					$orderno = $items.'000000000'.$order;
				}else if(strlen($order) == 2){
					$orderno = $items.'00000000'.$order;
				}else if(strlen($order) == 3){
					$orderno = $items.'0000000'.$order;
				}else if(strlen($order) == 4){
					$orderno = $items.'000000'.$order;
				}else if(strlen($order) == 5){
					$orderno = $items.'00000'.$order;
				}else if(strlen($order) == 6){
					$orderno = $items.'0000'.$order;
				}else if(strlen($order) == 7){
					$orderno = $items.'000'.$order;
				}else if(strlen($order) == 8){
					$orderno = $items.'00'.$order;
				}else if(strlen($order) == 9){
					$orderno = $items.'0'.$order;
				}else{
					$orderno = $items.$order;
				}

		}
		else{
			$orderno = $items.'0000000001';
			}

		$query->close();
		return $orderno;

}


function getSchoolCode($sql){
	
    $query = $sql->Execute($sql->Prepare("SELECT GSH_CODE  FROM ges_school_tb ORDER BY GSH_ID DESC LIMIT 1 "),array());
    print $sql->ErrorMsg();
	$items = "SCH";
	$rowNum = $query->RecordCount();

	if($rowNum > 0)
		{
			$obj = $query->FetchNextObject();
			
			$BRW_ID = $obj->GSH_CODE;
		
				$order = substr($BRW_ID,3,strlen($BRW_ID));
				$order = $order + 1;
				if(strlen($order) == 1){
					$orderno = $items.'000000000'.$order;
				}else if(strlen($order) == 2){
					$orderno = $items.'00000000'.$order;
				}else if(strlen($order) == 3){
					$orderno = $items.'0000000'.$order;
				}else if(strlen($order) == 4){
					$orderno = $items.'000000'.$order;
				}else if(strlen($order) == 5){
					$orderno = $items.'00000'.$order;
				}else if(strlen($order) == 6){
					$orderno = $items.'0000'.$order;
				}else if(strlen($order) == 7){
					$orderno = $items.'000'.$order;
				}else if(strlen($order) == 8){
					$orderno = $items.'00'.$order;
				}else if(strlen($order) == 9){
					$orderno = $items.'0'.$order;
				}else{
					$orderno = $items.$order;
				}

		}
		else{
			$orderno = $items.'0000000001';
			}

		$query->close();
		return $orderno;

}


function getQuotationCode($sql){
	
    $query = $sql->Execute($sql->Prepare("SELECT QUT_CODE  FROM quotation_tb ORDER BY QUT_ID DESC LIMIT 1 "),array());
    print $sql->ErrorMsg();
	$items = "QUT";
	$rowNum = $query->RecordCount();

	if($rowNum > 0)
		{
			$obj = $query->FetchNextObject();
			
			$BRW_ID = $obj->QUT_CODE;
		
				$order = substr($BRW_ID,3,strlen($BRW_ID));
				$order = $order + 1;
				if(strlen($order) == 1){
					$orderno = $items.'000000000'.$order;
				}else if(strlen($order) == 2){
					$orderno = $items.'00000000'.$order;
				}else if(strlen($order) == 3){
					$orderno = $items.'0000000'.$order;
				}else if(strlen($order) == 4){
					$orderno = $items.'000000'.$order;
				}else if(strlen($order) == 5){
					$orderno = $items.'00000'.$order;
				}else if(strlen($order) == 6){
					$orderno = $items.'0000'.$order;
				}else if(strlen($order) == 7){
					$orderno = $items.'000'.$order;
				}else if(strlen($order) == 8){
					$orderno = $items.'00'.$order;
				}else if(strlen($order) == 9){
					$orderno = $items.'0'.$order;
				}else{
					$orderno = $items.$order;
				}

		}
		else{
			$orderno = $items.'0000000001';
			}

		$query->close();
		return $orderno;

}

function getEnrolmentCode($sql){
	
    $query = $sql->Execute($sql->Prepare("SELECT GET_CODE  FROM ges_enrollment_table ORDER BY GET_ID DESC LIMIT 1 "),array());
    print $sql->ErrorMsg();
	$items = "ENR";
	$rowNum = $query->RecordCount();

	if($rowNum > 0)
		{
			$obj = $query->FetchNextObject();
			
			$BRW_ID = $obj->GET_CODE;
		
				$order = substr($BRW_ID,3,strlen($BRW_ID));
				$order = $order + 1;
				if(strlen($order) == 1){
					$orderno = $items.'000000000'.$order;
				}else if(strlen($order) == 2){
					$orderno = $items.'00000000'.$order;
				}else if(strlen($order) == 3){
					$orderno = $items.'0000000'.$order;
				}else if(strlen($order) == 4){
					$orderno = $items.'000000'.$order;
				}else if(strlen($order) == 5){
					$orderno = $items.'00000'.$order;
				}else if(strlen($order) == 6){
					$orderno = $items.'0000'.$order;
				}else if(strlen($order) == 7){
					$orderno = $items.'000'.$order;
				}else if(strlen($order) == 8){
					$orderno = $items.'00'.$order;
				}else if(strlen($order) == 9){
					$orderno = $items.'0'.$order;
				}else{
					$orderno = $items.$order;
				}

		}
		else{
			$orderno = $items.'0000000001';
			}

		$query->close();
		return $orderno;

}


function getTicketCode($sql){
	
    $query = $sql->Execute($sql->Prepare("SELECT TCK_CODE  FROM ticket_tb ORDER BY TCK_ID DESC LIMIT 1 "),array());
    print $sql->ErrorMsg();
	$items = "TCK";
	$rowNum = $query->RecordCount();

	if($rowNum > 0)
		{
			$obj = $query->FetchNextObject();
			
			$BRW_ID = $obj->TCK_CODE;
		
				$order = substr($BRW_ID,3,strlen($BRW_ID));
				$order = $order + 1;
				if(strlen($order) == 1){
					$orderno = $items.'000000000'.$order;
				}else if(strlen($order) == 2){
					$orderno = $items.'00000000'.$order;
				}else if(strlen($order) == 3){
					$orderno = $items.'0000000'.$order;
				}else if(strlen($order) == 4){
					$orderno = $items.'000000'.$order;
				}else if(strlen($order) == 5){
					$orderno = $items.'00000'.$order;
				}else if(strlen($order) == 6){
					$orderno = $items.'0000'.$order;
				}else if(strlen($order) == 7){
					$orderno = $items.'000'.$order;
				}else if(strlen($order) == 8){
					$orderno = $items.'00'.$order;
				}else if(strlen($order) == 9){
					$orderno = $items.'0'.$order;
				}else{
					$orderno = $items.$order;
				}

		}
		else{
			$orderno = $items.'0000000001';
			}

		$query->close();
		return $orderno;

}






function getExpenditureCode($sql){
	
	$query = $sql->Execute($sql->Prepare("SELECT EXP_CODE  FROM expenditure_tb ORDER BY EXP_ID DESC LIMIT 1 "),array());
print $sql->ErrorMsg();
$items = "EXP";
$rowNum = $query->RecordCount();

if($rowNum > 0)
	{
		$obj = $query->FetchNextObject();
		
		$BRW_ID = $obj->EXP_CODE;
	
			$order = substr($BRW_ID,3,strlen($BRW_ID));
			$order = $order + 1;
			if(strlen($order) == 1){
				$orderno = $items.'000000000'.$order;
			}else if(strlen($order) == 2){
				$orderno = $items.'00000000'.$order;
			}else if(strlen($order) == 3){
				$orderno = $items.'0000000'.$order;
			}else if(strlen($order) == 4){
				$orderno = $items.'000000'.$order;
			}else if(strlen($order) == 5){
				$orderno = $items.'00000'.$order;
			}else if(strlen($order) == 6){
				$orderno = $items.'0000'.$order;
			}else if(strlen($order) == 7){
				$orderno = $items.'000'.$order;
			}else if(strlen($order) == 8){
				$orderno = $items.'00'.$order;
			}else if(strlen($order) == 9){
				$orderno = $items.'0'.$order;
			}else{
				$orderno = $items.$order;
			}

	}
	else{
		$orderno = $items.'0000000001';
		}

	$query->close();
	return $orderno;

}


function getClientPaymentCode($sql){
	
	$query = $sql->Execute($sql->Prepare("SELECT CLP_CODE  FROM client_payment_tb ORDER BY CLP_ID DESC LIMIT 1 "),array());
print $sql->ErrorMsg();
$items = "CLP";
$rowNum = $query->RecordCount();

if($rowNum > 0)
	{
		$obj = $query->FetchNextObject();
		
		$BRW_ID = $obj->CLP_CODE;
	
			$order = substr($BRW_ID,3,strlen($BRW_ID));
			$order = $order + 1;
			if(strlen($order) == 1){
				$orderno = $items.'000000000'.$order;
			}else if(strlen($order) == 2){
				$orderno = $items.'00000000'.$order;
			}else if(strlen($order) == 3){
				$orderno = $items.'0000000'.$order;
			}else if(strlen($order) == 4){
				$orderno = $items.'000000'.$order;
			}else if(strlen($order) == 5){
				$orderno = $items.'00000'.$order;
			}else if(strlen($order) == 6){
				$orderno = $items.'0000'.$order;
			}else if(strlen($order) == 7){
				$orderno = $items.'000'.$order;
			}else if(strlen($order) == 8){
				$orderno = $items.'00'.$order;
			}else if(strlen($order) == 9){
				$orderno = $items.'0'.$order;
			}else{
				$orderno = $items.$order;
			}

	}
	else{
		$orderno = $items.'0000000001';
		}

	$query->close();
	return $orderno;

}


function getRevenueCategoryCode($sql){
	
    $query = $sql->Execute($sql->Prepare("SELECT RC_CODE  FROM revenue_category_tb ORDER BY RC_ID DESC LIMIT 1 "),array());
    print $sql->ErrorMsg();
	$items = "RC";
	$rowNum = $query->RecordCount();

	if($rowNum > 0)
		{
			$obj = $query->FetchNextObject();
			
			$BRW_ID = $obj->RC_CODE;
		
				$order = substr($BRW_ID,2,strlen($BRW_ID));
				$order = $order + 1;
				if(strlen($order) == 1){
					$orderno = $items.'000000000'.$order;
				}else if(strlen($order) == 2){
					$orderno = $items.'00000000'.$order;
				}else if(strlen($order) == 3){
					$orderno = $items.'0000000'.$order;
				}else if(strlen($order) == 4){
					$orderno = $items.'000000'.$order;
				}else if(strlen($order) == 5){
					$orderno = $items.'00000'.$order;
				}else if(strlen($order) == 6){
					$orderno = $items.'0000'.$order;
				}else if(strlen($order) == 7){
					$orderno = $items.'000'.$order;
				}else if(strlen($order) == 8){
					$orderno = $items.'00'.$order;
				}else if(strlen($order) == 9){
					$orderno = $items.'0'.$order;
				}else{
					$orderno = $items.$order;
				}

		}
		else{
			$orderno = $items.'0000000001';
			}

		$query->close();
		return $orderno;

}

	function getVacancyCode($sql){
		
		$query = $sql->Execute($sql->Prepare("SELECT GVT_CODE  FROM ges_vacancy_table ORDER BY GVT_ID DESC LIMIT 1 "),array());
		print $sql->ErrorMsg();
		$items = "VAC";
		$rowNum = $query->RecordCount();

		if($rowNum > 0)
			{
				$obj = $query->FetchNextObject();
				
				$BRW_ID = $obj->GVT_CODE;
			
					$order = substr($BRW_ID,3,strlen($BRW_ID));
					$order = $order + 1;
					if(strlen($order) == 1){
						$orderno = $items.'000000000'.$order;
					}else if(strlen($order) == 2){
						$orderno = $items.'00000000'.$order;
					}else if(strlen($order) == 3){
						$orderno = $items.'0000000'.$order;
					}else if(strlen($order) == 4){
						$orderno = $items.'000000'.$order;
					}else if(strlen($order) == 5){
						$orderno = $items.'00000'.$order;
					}else if(strlen($order) == 6){
						$orderno = $items.'0000'.$order;
					}else if(strlen($order) == 7){
						$orderno = $items.'000'.$order;
					}else if(strlen($order) == 8){
						$orderno = $items.'00'.$order;
					}else if(strlen($order) == 9){
						$orderno = $items.'0'.$order;
					}else{
						$orderno = $items.$order;
					}

			}
			else{
				$orderno = $items.'0000000001';
				}

			$query->close();
			return $orderno;

	}

	function getUserCode($sql){
		
		$query = $sql->Execute($sql->Prepare("SELECT USR_CODE  FROM rke_users ORDER BY USR_ID DESC LIMIT 1 "),array());
		print $sql->ErrorMsg();
		$items = "USR";
		$rowNum = $query->RecordCount();

		if($rowNum > 0)
			{
				$obj = $query->FetchNextObject();
				
				$BRW_ID = $obj->USR_CODE;
			
					$order = substr($BRW_ID,3,strlen($BRW_ID));
					$order = $order + 1;
					if(strlen($order) == 1){
						$orderno = $items.'000000000'.$order;
					}else if(strlen($order) == 2){
						$orderno = $items.'00000000'.$order;
					}else if(strlen($order) == 3){
						$orderno = $items.'0000000'.$order;
					}else if(strlen($order) == 4){
						$orderno = $items.'000000'.$order;
					}else if(strlen($order) == 5){
						$orderno = $items.'00000'.$order;
					}else if(strlen($order) == 6){
						$orderno = $items.'0000'.$order;
					}else if(strlen($order) == 7){
						$orderno = $items.'000'.$order;
					}else if(strlen($order) == 8){
						$orderno = $items.'00'.$order;
					}else if(strlen($order) == 9){
						$orderno = $items.'0'.$order;
					}else{
						$orderno = $items.$order;
					}

			}
			else{
				$orderno = $items.'0000000001';
				}

			$query->close();
			return $orderno;

	}


	function getAttritionCode($sql){
		
		$query = $sql->Execute($sql->Prepare("SELECT GAT_CODE  FROM ges_attrition_tb ORDER BY GAT_ID DESC LIMIT 1 "),array());
		print $sql->ErrorMsg();
		$items = "GAT";
		$rowNum = $query->RecordCount();

		if($rowNum > 0)
			{
				$obj = $query->FetchNextObject();
				
				$BRW_ID = $obj->GAT_CODE;
			
					$order = substr($BRW_ID,3,strlen($BRW_ID));
					$order = $order + 1;
					if(strlen($order) == 1){
						$orderno = $items.'000000000'.$order;
					}else if(strlen($order) == 2){
						$orderno = $items.'00000000'.$order;
					}else if(strlen($order) == 3){
						$orderno = $items.'0000000'.$order;
					}else if(strlen($order) == 4){
						$orderno = $items.'000000'.$order;
					}else if(strlen($order) == 5){
						$orderno = $items.'00000'.$order;
					}else if(strlen($order) == 6){
						$orderno = $items.'0000'.$order;
					}else if(strlen($order) == 7){
						$orderno = $items.'000'.$order;
					}else if(strlen($order) == 8){
						$orderno = $items.'00'.$order;
					}else if(strlen($order) == 9){
						$orderno = $items.'0'.$order;
					}else{
						$orderno = $items.$order;
					}

			}
			else{
				$orderno = $items.'0000000001';
				}

			$query->close();
			return $orderno;

	}


	function getLandSaleCode($sql){
		
		$query = $sql->Execute($sql->Prepare("SELECT LS_CODE  FROM land_sale_tb ORDER BY LS_ID DESC LIMIT 1 "),array());
		print $sql->ErrorMsg();
		$items = "LS";
		$rowNum = $query->RecordCount();

		if($rowNum > 0)
			{
				$obj = $query->FetchNextObject();
				
				$BRW_ID = $obj->LS_CODE;
			
					$order = substr($BRW_ID,2,strlen($BRW_ID));
					$order = $order + 1;
					if(strlen($order) == 1){
						$orderno = $items.'000000000'.$order;
					}else if(strlen($order) == 2){
						$orderno = $items.'00000000'.$order;
					}else if(strlen($order) == 3){
						$orderno = $items.'0000000'.$order;
					}else if(strlen($order) == 4){
						$orderno = $items.'000000'.$order;
					}else if(strlen($order) == 5){
						$orderno = $items.'00000'.$order;
					}else if(strlen($order) == 6){
						$orderno = $items.'0000'.$order;
					}else if(strlen($order) == 7){
						$orderno = $items.'000'.$order;
					}else if(strlen($order) == 8){
						$orderno = $items.'00'.$order;
					}else if(strlen($order) == 9){
						$orderno = $items.'0'.$order;
					}else{
						$orderno = $items.$order;
					}

			}
			else{
				$orderno = $items.'0000000001';
				}

			$query->close();
			return $orderno;

	}


	function getRentCode($sql){
		
		$query = $sql->Execute($sql->Prepare("SELECT AR_CODE  FROM rent_tb ORDER BY AR_ID DESC LIMIT 1 "),array());
		print $sql->ErrorMsg();
		$items = "AR";
		$rowNum = $query->RecordCount();

		if($rowNum > 0)
			{
				$obj = $query->FetchNextObject();
				
				$BRW_ID = $obj->AR_CODE;
			
					$order = substr($BRW_ID,2,strlen($BRW_ID));
					$order = $order + 1;
					if(strlen($order) == 1){
						$orderno = $items.'000000000'.$order;
					}else if(strlen($order) == 2){
						$orderno = $items.'00000000'.$order;
					}else if(strlen($order) == 3){
						$orderno = $items.'0000000'.$order;
					}else if(strlen($order) == 4){
						$orderno = $items.'000000'.$order;
					}else if(strlen($order) == 5){
						$orderno = $items.'00000'.$order;
					}else if(strlen($order) == 6){
						$orderno = $items.'0000'.$order;
					}else if(strlen($order) == 7){
						$orderno = $items.'000'.$order;
					}else if(strlen($order) == 8){
						$orderno = $items.'00'.$order;
					}else if(strlen($order) == 9){
						$orderno = $items.'0'.$order;
					}else{
						$orderno = $items.$order;
					}

			}
			else{
				$orderno = $items.'0000000001';
				}

			$query->close();
			return $orderno;

	}


	 function getTransactionCode($sql){
      $query = $sql->Execute($sql->Prepare("SELECT ALT_CODE  FROM all_transactions_tb ORDER BY ALT_ID DESC LIMIT 1 "),array());
				print $sql->ErrorMsg();
				$items = "ALT";
				$rowNum = $query->RecordCount();
		
				if($rowNum > 0)
					{
						$obj = $query->FetchNextObject();
						
						$BRW_ID = $obj->ALT_CODE;
					
							$order = substr($BRW_ID,3,strlen($BRW_ID));
							$order = $order + 1;
							if(strlen($order) == 1){
								$orderno = $items.'000000000'.$order;
							}else if(strlen($order) == 2){
								$orderno = $items.'00000000'.$order;
							}else if(strlen($order) == 3){
								$orderno = $items.'0000000'.$order;
							}else if(strlen($order) == 4){
								$orderno = $items.'000000'.$order;
							}else if(strlen($order) == 5){
								$orderno = $items.'00000'.$order;
							}else if(strlen($order) == 6){
								$orderno = $items.'0000'.$order;
							}else if(strlen($order) == 7){
								$orderno = $items.'000'.$order;
							}else if(strlen($order) == 8){
								$orderno = $items.'00'.$order;
							}else if(strlen($order) == 9){
								$orderno = $items.'0'.$order;
							}else{
								$orderno = $items.$order;
							}
		
					}
					else{
						$orderno = $items.'0000000001';
						}
		
					$query->close();
					return $orderno;
		
			}
	
	function getMessages(){
	
		$query = $this->sql->Execute($this->sql->Prepare("SELECT *  FROM ges_messages WHERE MESG_RECEIVER=".$this->sql->Param('a')."  AND MESG_STATUS !='0' ORDER BY MESG_ID DESC LIMIT 5 "),array($this->actor_id));
		print $this->sql->ErrorMsg();

		if($query->RecordCount() > 0){
			$result = $query->GetAll();
		}else{
			$result = [];
		}
		
		return $result;
	}

	function getMessagesCount(){
		
		$query = $this->sql->Execute($this->sql->Prepare("SELECT MESG_CODE  FROM ges_messages WHERE MESG_RECEIVER=".$this->sql->Param('a')." "),array($this->actor_id));
		print $this->sql->ErrorMsg();

		$result = $query->RecordCount();		
		return $result;

	}

	function getNotifications(){
		
		$query = $this->sql->Execute($this->sql->Prepare("SELECT *  FROM ges_notifications WHERE NOTE_USERID=".$this->sql->Param('a')."  AND NOTE_STATUS !='0' ORDER BY NOTE_ID DESC LIMIT 5 "),array($this->actor_id));
		print $this->sql->ErrorMsg();

		if($query->RecordCount() > 0){
			$result = $query->GetAll();
		}else{
			$result = [];
		}
		
		return $result;
	}

	function getNotificationsCount(){
		
		$query = $this->sql->Execute($this->sql->Prepare("SELECT NOTE_CODE  FROM ges_notifications WHERE NOTE_USERID=".$this->sql->Param('a')." "),array($this->actor_id));
		print $this->sql->ErrorMsg();

		$result = $query->RecordCount();
		return $result;

	}

	function getticketsCount(){
		
		$query = $this->sql->Execute($this->sql->Prepare("SELECT TCK_CODE   FROM ticket_tb WHERE TCK_STATUS=".$this->sql->Param('a')." "),array($this->actor_id));
		print $this->sql->ErrorMsg();

		$result ['ticketsCount'] = $query->RecordCount();
		return $result;

	}



	    //Method to fetch all the grade category
		public function getExpenditure(){
			return $comnds=$this->sql->GETALL($this->sql->Preparee("SELECT  Month( EXP_CREATED_DATE ) AS MONTH, SUM( 	EXP_AMOUNT) AS AMOUNT  FROM  expenditure_tb WHERE EXP_STATUS !='0' GROUP BY Month(EXP_CREATED_DATE ) ORDER BY  Month(EXP_CREATED_DATE ) ;"),array());
			print $this->sql->ErrorMsg();
		   }
		   	
		   

		   public function getIncome(){
			return $comnds=$this->sql->GETALL($this->sql->Preparee("SELECT  Month( GEN_REV_CREATED_DATE ) AS MONTH, SUM( 	GEN_REV_AMOUNT) AS AMOUNT  FROM  general_revenue_tb WHERE GEN_REV_STATUS !='0' GROUP BY Month(GEN_REV_CREATED_DATE ) ORDER BY  Month(GEN_REV_CREATED_DATE ) ;"),array());
			print $this->sql->ErrorMsg();
		   }

	
	function getInsight(){

		$regionCode  = "REGION";
        $regionName =  "REGION";

        $districtCode ="DISTRICT";
        $districtName ="DISTRICT";
        
        $schoolCode ="SCHOOL";
        $schoolName ="SCHOOL";


		$query = $this->sql->Execute($this->sql->Prepare("SELECT  SUM(EXP_AMOUNT) AS EXP_AMOUNT  FROM expenditure_tb WHERE EXP_STATUS !='0' "),array());
        print $this->sql->ErrorMsg();

        $result ['exp_count'] = $query->GetAll();
		

		$query = $this->sql->Execute($this->sql->Prepare("SELECT  SUM(GEN_REV_AMOUNT) AS GEN_REV_AMOUNT  FROM general_revenue_tb WHERE GEN_REV_STATUS !='0' "),array());
        print $this->sql->ErrorMsg();

        $result ['rev_count'] = $query->GetAll();


		$query = $this->sql->Execute($this->sql->Prepare("SELECT TCK_CODE  FROM ticket_tb WHERE TCK_STATUS IN ('1') "),array());
		print $this->sql->ErrorMsg();
		
		$result ['ticketsCount'] = $query->RecordCount();


		
		 $query = $this->sql->Execute($this->sql->Prepare("SELECT PROPERTY_CODE  FROM rk_properties_tb WHERE PROPERTY_STATUS IN ('1') "),array());
		 print $this->sql->ErrorMsg();
 
		 $result ['propertycount']= $query->RecordCount();
 
 		
 		$query = $this->sql->Execute($this->sql->Prepare("SELECT CLIENT_CODE  FROM rk_clients_tb WHERE CLIENT_STATUS IN ('1') "),array());
		print $this->sql->ErrorMsg();

		$result ['clientcount']= $query->RecordCount();


		$query = $this->sql->Execute($this->sql->Prepare("SELECT INS_CODE  FROM inspection_tb WHERE INS_STATUS IN ('1') "),array());
		print $this->sql->ErrorMsg();

		$result ['inspectioncount']= $query->RecordCount();

		$query = $this->sql->Execute($this->sql->Prepare("SELECT  Month( ALT_DATE_ADDED ) AS month, SUM(ALT_TOTAL_PAYMENT) AS ALT_TOTAL_PAYMENT  FROM all_transactions_tb WHERE ALT_STATUS !='0' GROUP BY Month(ALT_DATE_ADDED ) ORDER BY  Month(ALT_DATE_ADDED ) ;"),array());
    	print $this->sql->ErrorMsg();

        $result ['income_count'] = $query->GetAll();
		



		return $result;
		}
		
	

	//Save Notification
	public function savenotification($userid,$message,$type){
		global $sql;
		$notifydate = date('Y-m-d H:i:s');
		$notifycode = $this->generateCode('ges_notifications','NFY','NOTE_CODE');

		$stmt = $sql->Execute($sql->Prepare("INSERT INTO ges_notifications (NOTE_CODE,NOTE_USERID,NOTE_MESSAGE,NOTE_TYPE,NOTE_DATEADDED) VALUES(".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('d').",".$sql->Param('e').") "),[$notifycode,$userid,$message,$type,$notifydate]);
		print $sql->ErrorMsg();
		if($stmt==true){
			$notify = array('code'=>$notifycode,'status'=>'done');
		}else{
			$notify = array('code'=>'null','status'=>'done');
		}
		return $notify ;

	}


	// //Event log
	// public function setEventLog($event_type,$activity){
	// 	$actor_id = $this->session->get("userid");
	// 	$companycode = $this->session->get("companycode");
	// 	$fullname = $this->session->get('userfullname');
	// 	$remoteip = $_SERVER['REMOTE_ADDR'];
	// 	$useragent = empty($_SERVER['HTTP_USER_AGENT'])? '': $_SERVER['HTTP_USER_AGENT'] ;
	// 	$sessionid = $this->session->getSessionID();

	// 	$stmt = $this->sql->Prepare("INSERT INTO ".$this->prefix."eventlog (EVL_EVTCODE,EVL_USERID,EVL_FULLNAME,EVL_ACTIVITIES,EVL_SESSION_ID,EVL_BROWSER,EVL_COMPCODE) VALUES (".$this->sql->Param('1').",".$this->sql->Param('2').",".$this->sql->Param('3').",".$this->sql->Param('4').",".$this->sql->Param('5').",".$this->sql->Param('6').",".$this->sql->Param('7').")");
	// 	$stmt = $this->sql->Execute($stmt,array($event_type,$actor_id,$fullname,$activity,$sessionid,$useragent,$companycode));
	// 	print $this->sql->ErrorMsg();
	// }//end


	//Event log
	public function setEventLog($event_type,$activity){
		 
		$actor_id = $this->session->get("userid");
		$fullname = $this->session->get('userfullname');
		$acortlevel = $this->session->get('useraccesslevel');
		$remoteip = $_SERVER['REMOTE_ADDR'];
		$useragent = empty($_SERVER['HTTP_USER_AGENT']) ? '': $_SERVER['HTTP_USER_AGENT'] ;
		$sessionid = $this->session->getSessionID();                 

	    $stmt = $this->sql->Prepare("INSERT INTO tc_eventlog (EVL_EVTCODE,EVL_USERID,EVL_MON_NAME,EVL_ACTIVITIES,EVL_SESSION_ID,EVL_BROWSER,EVL_IP) VALUES (".$this->sql->Param('1').",".$this->sql->Param('2').",".$this->sql->Param('3').",".$this->sql->Param('4').",".$this->sql->Param('5').",".$this->sql->Param('6').",".$this->sql->Param('7').",".$this->sql->Param('8').")");
	  	$stmt = $this->sql->Execute($stmt,array($event_type,$actor_id,$fullname,$activity,$sessionid,$useragent,$acortlevel,$remoteip));
		print $this->sql->ErrorMsg();

	}//end

	
	
	//Getting the search date format
	public function getDateFormat($inputdate,$format="Y-m-j"){
        // echo '. '.$inputdate."<br/>";
        $input = explode("/",$inputdate);
        $mk = $input[2].'-'.$input[1].'-'.$input[0];
        if($format=="j/m/Y"){
            $input = explode("-",$inputdate);
            $mk =$input[2].'/'.$input[1].'/'.$input[0];
        }
        return $mk;
    }

	
	
        

	   public function GetRegionName($regioncode){
        $stmt = $this->sql->Prepare("SELECT REG_NAME FROM ges_region_tb WHERE REG_ID = ".$this->sql->Param('a'));
        $stmt = $this->sql->Execute($stmt,array($regioncode));

        if($stmt)   {
            return $stmt->FetchNextObject()->REG_NAME;

        }else{return false ;}
      }// end getRegionname
	
	 
	   public function GetDistrictnName($districtcode){
        $stmt = $this->sql->Prepare("SELECT DIST_NAME FROM ges_district_tb WHERE DIST_CODE = ".$this->sql->Param('a'));
        $stmt = $this->sql->Execute($stmt,array($districtcode));

        if($stmt)   {
            return $stmt->FetchNextObject()->DIST_NAME;

        }else{return false ;}
      }// end GetDistrictnName
	
	   public function GetPropertyDocs($code){
        $stmt = $this->sql->Prepare("SELECT * FROM rk_properties_media_tb WHERE PROPERTY_CODE = ".$this->sql->Param('a'));
        $stmt = $this->sql->Execute($stmt,array($code));

        if($stmt)   {
            return $stmt->getAll();

        }else{return false ;}
      } 


	  
	 function generateCode(String $collection, String $base_col, String $prefix){
		$no_prec = 10; 
		$query = $this->sql->Execute($this->sql->Prepare("SELECT {$base_col} FROM {$collection} ORDER BY {$base_col} DESC LIMIT 1 "), array());
        print   $this->sql->ErrorMsg();
		 
		if($query){
			$obj = $query->FetchObject();
			$rawcount = substr($obj->$base_col,strlen($prefix),100);
			$rawcount = (int)$rawcount + 1;
			$multiplier = $no_prec - strlen($rawcount);
			$multiplier = $multiplier <= 0 ? 0 : $multiplier ;
			$code = str_repeat("0",$multiplier). $rawcount;
		}else{
			$code = str_repeat("0",$no_prec - 1) . 1;
		}
		$query->close();
	 
		return $prefix.$code;
	}

	
	//Checking for Rent checkout date
	function checkExpiring($checkoutDate){

		$checkoutDate = str_replace('/', '-', $checkoutDate);  
		$newDate = date("Y-m-d", strtotime($checkoutDate));  
		$timeDiff = round((strtotime($newDate) - strtotime(date('Y-m-d')))/ 86400);
		
		if($timeDiff >= 5)
		   echo '<span class="badge badge-success checkoutBadge">'.date("jS M Y", strtotime($checkoutDate)).'</span>';
		else if($timeDiff >= 3)
		echo '<span class="badge badge-warning text-dark checkoutBadge">'.$timeDiff.' Days more</span>';
		else if($timeDiff == 2)
		echo '<span class="badge badge-warning checkoutBadge">'.$timeDiff.' Days more</span>';
		else if($timeDiff == 1)
		echo '<span class="badge badge-warning checkoutBadge">'.$timeDiff.' Day more</span>';
		else if($timeDiff == 0)
		echo '<span class="badge badge-warning checkoutBadge">Expires Today</span>';
		else echo '<span class="badge badge-danger checkoutBadge">'.date("jS M Y", strtotime($checkoutDate)).'</span>';
	
	}

	function checkNextPayDate($paydate){

		$paydate = str_replace('/', '-', $paydate);  
		$timeDiff = round((strtotime($paydate) - strtotime(date('Y-m-d')))/ 86400);
		
		if($timeDiff >= 5)
		   echo '<span class="badge badge-success checkoutBadge">'.date("jS M Y", strtotime($paydate)).'</span>';
		else if($timeDiff >= 3)
		echo '<span class="badge badge-warning text-dark checkoutBadge">'.$timeDiff.' Days more</span>';
		else if($timeDiff == 2)
		echo '<span class="badge badge-warning checkoutBadge">'.$timeDiff.' Days more</span>';
		else if($timeDiff == 1)
		echo '<span class="badge badge-warning checkoutBadge">'.$timeDiff.' Day more</span>';
		else if($timeDiff == 0)
		echo '<span class="badge badge-warning checkoutBadge">Today</span>';
		else echo '<span class="badge badge-danger checkoutBadge">'.date("jS M Y", strtotime($paydate)).'</span>';
	 
	
	}
	

	function checkNextInspection($inspectDate){

		$inspectDate = str_replace('/', '-', $inspectDate);  
		$newDate = date("Y-m-d", strtotime($inspectDate));  
		$timeDiff = round((strtotime($newDate) - strtotime(date('Y-m-d')))/ 86400);
	
		
		if($timeDiff >= 5)
		   echo '<span class="badge badge-success checkoutBadge">'.date("jS M Y", strtotime($newDate)).'</span>';
		else if($timeDiff >= 3)
		echo '<span class="badge badge-success text-dark checkoutBadge">'.$timeDiff.' Days more</span>';
		else if($timeDiff == 2)
		echo '<span class="badge badge-warning checkoutBadge">'.$timeDiff.' Days more</span>';
		else if($timeDiff == 1)
		echo '<span class="badge badge-warning checkoutBadge">'.$timeDiff.' Day more</span>';
		else if($timeDiff == 0)
		echo '<span class="badge badge-warning checkoutBadge">Today</span>';
		else echo '<span class="badge badge-danger checkoutBadge">'.date("jS M Y", strtotime($newDate)).'</span>';
	 
	
	}
	

	function strToCapitalize($title){
		echo ucwords(strtolower($title));
	}


	//Checking for Rent checkout date
	function formatDateToRead($dateString){
		$dateString = str_replace('/', '-', $dateString); 
		echo date("jS M Y", strtotime($dateString));  
	}

	// format amount
	function formatAmount($amnt){
		$amnt = str_replace(',', '', $amnt);
		echo ($amnt);

	}

}
