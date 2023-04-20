<?php 
// namespace interview_list;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory; 
// use $engine;


class export_report {  
	private $engine;
	private $sql;
	private $sheet;
	private $PageMargins;
	private $Style;
	private $objDrawing;
	private $spreadsheet;
	
	
	
	
	function  __construct(){
		
		global $sql,$excel,$engine;
		$this->sql= $sql;
		$this->engine= $engine;
		
		$this->spreadsheet = new Spreadsheet();
		$this->sheet = $this->spreadsheet->getActiveSheet(); 
		$sheet = $this->sheet;
		$spreadsheet = $this->spreadsheet;
	}
	




	
		public function GetRegionName($regioncode){
		$stmt = $this->sql->Prepare("SELECT REG_NAME FROM ges_region_tb WHERE REG_ID = ".$this->sql->Param('a'));
		$stmt = $this->sql->Execute($stmt,array($regioncode));
		return $stmt->FetchNextObject()->REG_NAME;


		}// end getRegionname


		public function GetDistrictnName($districtcode){
		$stmt = $this->sql->Prepare("SELECT DIST_NAME FROM ges_district_tb WHERE DIST_CODE = ".$this->sql->Param('a'));
		$stmt = $this->sql->Execute($stmt,array($districtcode));
		return $stmt->FetchNextObject()->DIST_NAME;

        
      }// end GetDistrictnName
	
















	function ReportHeader($header)
	{
		$sheet  = $this->sheet;
		$spreadsheet = $this->spreadsheet;
		// Set properties
		$spreadsheet->getProperties()
		->setCreator("Maarten Balliauw")
		->setLastModifiedBy("Maarten Balliauw")
		->setTitle("Office 2007 XLSX Test Document")
		->setSubject("Office 2007 XLSX Test Document")
		->setDescription("Export Report XLSX, generated using PHP classes.")
		->setKeywords("office 2007 openxml php")
		->setCategory("Export Report file");	
		
		
		
		$spreadsheet->getActiveSheet()
		->getHeaderFooter()
		->setOddHeader("&L&G&R&H".$header[0]."\n".$header[1]."\n".$header[2]."\n".$header[3]."\n".$header[4]."\n\n".$header[5]."\n".$header[6]."\n".$header[7]." ");
		
		$spreadsheet->getActiveSheet()
		->getHeaderFooter()
		->setOddFooter('&L&B' . $spreadsheet->getProperties()->getTitle() . '&RPage &P of &N');		
	}
	
	function tilloprations($result,$compname)
	{	   
		$limitcadre = count($result) + 1;
		$sheet = $this->sheet;
		$spreadsheet = $this->spreadsheet;
		$spreadsheet->getDefaultStyle()
		->getFont()
		->setName('Arial') 
		->setSize(10);

		$styleArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FFA0A0A0',
                ],
                'endColor' => [
                    'argb' => 'FFFFFFFF',
                ],
            ],
		];


		$spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

		

		$spreadsheet->setActiveSheetIndex(0);
		//setting column width
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(30);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(15); 
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		


		
		
		$spreadsheet->setActiveSheetIndex(0);
		$spreadsheet->getActiveSheet()->SetCellValue('A5', 'No.');
		$spreadsheet->getActiveSheet()->SetCellValue('B5', 'GEN_REV_TYPE'); 
        $spreadsheet->getActiveSheet()->SetCellValue('C5', 'GEN_REV_AMOUNT');
		$spreadsheet->getActiveSheet()->SetCellValue('D5', 'GEN_REV_RECEIVE');
		$spreadsheet->getActiveSheet()->SetCellValue('E5', 'GEN_REV_COMMENT');
		$spreadsheet->getActiveSheet()->SetCellValue('F5', 'GEN_REV_PAY_DATE');	
	
		
		
		
		// $finaltot=0;
		// $spreadsheet->getActiveSheet()->mergeCells('A1:AO1'); 
		$spreadsheet->getActiveSheet()->mergeCells('J1:K1')->getStyle('E1')->getFont()->setSize(9);
		// $i = 3;
		// $b = 1;
		$i = 6;
		$ii = 6;
		$iii =6;
		$m = 6;
		$mm = 6;
		$b = 1;
		// $spreadsheet->getActiveSheet()->SetCellValue('A1','LOG-EVENT REPORT'); 


		$spreadsheet->getActiveSheet()->mergeCells('A2:AO2')->getStyle('A2')->getFont()->setSize(10);
		$spreadsheet->getActiveSheet()->mergeCells('A3:AO3')->getStyle('A3')->getFont()->setSize(10);
		$spreadsheet->getActiveSheet()->mergeCells('A4:AO4')->getStyle('A4')->getFont()->setSize(10);
		$spreadsheet->getActiveSheet()->SetCellValue('A2', 'ICOME REPORT'); 
		$spreadsheet->getActiveSheet()->SetCellValue('A3',  '@ '.date("jS F Y h:i:sa"));
		$spreadsheet->getActiveSheet()->SetCellValue('A4',  '');
		

		                            //  <th>REQUESTOR NAME</th>
        //                                     <th>RECIEPIENT NAME</th>
        //                                     <th>REQUESTOR NUMBER</th>
        //                                     <th>RECIEPIENT NUMBER</th>
        //                                     <th width="30%">ITEM DESCRIPTION</th>
        //                                     <th>AMOUNT</th>
        //                                     <th>STATUS</th>
		$status=['0'=>'INACTIVE','1'=>'ACTIVE','2'=>'ACCEPTED','3'=>'DECLINED'];
		$cat_status=['1'=>'Teaching ','2'=>'Non-Teaching','3'=>'Unregistered'];
		$request_type=['1'=>'Buying','2'=>'Selling'];

		if(is_array($result) && count($result) > 0){
			
			//	var_dump( count($result)); die;
			foreach ($result as $value)
			{		
				
			
			
				//	$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("0",$i,$b);$this->getclientname($value['TSD_CLNT_CODE']) RegionDetails DistrictDetails
				$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("1",$i,$b);
				// $spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("2",$i,);
				$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("2",$i, strtoupper(($value['GEN_REV_TYPE'])));
				$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("3",$i, strtoupper($value['GEN_REV_AMOUN']));
				$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("4",$i,  strtoupper($value['GEN_REV_RECEIVE']));
				$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("5",$i,  strtoupper($value['GEN_REV_COMMENT'])); 	 
			 
				$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("6",$i,date('d/m/Y',strtotime($value['GEN_REV_PAY_DATE']))); 
				 
				
				$i++;
				$m++;
				$mm++;
				$ii++;
				$iii++;
				$b++;	
				// $TSD_AMOUNT_TOTAL+= $value['RSQT_AMOUNT'];
				// $TSD_CAPPED_AMOUNT_TOTAL+=$value['TSD_CAPPED_AMOUNT'];
	
				}
				
			}
	
	
			
			// $spreadsheet->getActiveSheet()->SetCellValue('A'.$i, 'Total');
			// $spreadsheet->getActiveSheet()->SetCellValue('C'.$i,$mytotaltrans);
			// $spreadsheet->getActiveSheet()->SetCellValue('H'.$i, number_format($TSD_AMOUNT_TOTAL,2));
			// $spreadsheet->getActiveSheet()->SetCellValue('E'.$i, number_format($TSD_CAPPED_AMOUNT_TOTAL,2));
		//$i++; 
		
		/*  $spreadsheet->getActiveSheet()->getStyle('A1:AO1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
		$spreadsheet->getActiveSheet()->getPageSetup()->setOrientation(\PhpSpreadsheet_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$spreadsheet->getActiveSheet()->getPageSetup()->setPaperSize(\PhpSpreadsheet_Worksheet_PageSetup::PAPERSIZE_A4);
		
		*/

		$spreadsheet->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
		
		$spreadsheet->getActiveSheet()->getStyle('A5:AO5')->applyFromArray($styleArray);
	
		$spreadsheet->getActiveSheet()->getStyle('A'.$m++.':AO'.$mm++)->applyFromArray($styleArray);
		
		
		
		//Set header first, so the result will be treated as an Xlsx file
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		//Make an attachment so we can define the filename.
		header('Content-Disposition: attachment;filename="REVENUE_REPORT"'.date('Y-m-d-H-i').'".xlsx"');
		header('Cache-Control: max-age=0');
		
		//Create IOFactory object 
		$writer =  IOFactory::createWriter($spreadsheet, 'Xlsx');
		ob_end_clean();
		//Save into php Output
		$writer->save('php://output');
		die;			 
	}

 


}