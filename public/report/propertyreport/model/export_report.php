<?php 
// namespace export_report;

// require_once( SPATH_PLUGINS.DS.'vendor/autoload.php');

require '../../../../plugins/vendor/autoload.php'; 
 
// use \vendor\phpoffice\phpspreadsheet\src\PhpSpreadsheet\Spreadsheet ;
// use \vendor\phpoffice\phpspreadsheet\src\PhpSpreadsheet\Writer\Xlsx ;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory; 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
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


	// Formating date
	function formatDateToRead($dateString){
		$dateString = str_replace('/', '-', $dateString); 
		echo date("jS M Y", strtotime($dateString));  
	}

	
	




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
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(30);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(30);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(30);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		

	

		
		
		
		$spreadsheet->setActiveSheetIndex(0);
		$spreadsheet->getActiveSheet()->SetCellValue('A5', 'No.');
		$spreadsheet->getActiveSheet()->SetCellValue('B5', 'PROPERTY');
        $spreadsheet->getActiveSheet()->SetCellValue('C5', 'TYPE');
        $spreadsheet->getActiveSheet()->SetCellValue('D5', 'LOCATION');
		$spreadsheet->getActiveSheet()->SetCellValue('E5', 'REGION');
		$spreadsheet->getActiveSheet()->SetCellValue('F5', 'DISTRICT');
		$spreadsheet->getActiveSheet()->SetCellValue('G5', 'STATUS');
		$spreadsheet->getActiveSheet()->SetCellValue('H5', 'DATE');
		
		// $finaltot=0;
		// $spreadsheet->getActiveSheet()->mergeCells('A1:AO1'); 
		$spreadsheet->getActiveSheet()->mergeCells('A1:H1')->getStyle('A1')->getFont()->setSize(9);
		// $i = 3;
		// $b = 1;
		$i = 6;
		$ii = 6;
		$iii =6;
		$m = 6;
		$mm = 6;
		$b = 1;
		// $spreadsheet->getActiveSheet()->SetCellValue('A1','LOG-EVENT REPORT'); 


		$spreadsheet->getActiveSheet()->mergeCells('A2:H2')->getStyle('A2')->getFont()->setSize(10);
		$spreadsheet->getActiveSheet()->mergeCells('A3:H3')->getStyle('A3')->getFont()->setSize(10);
		$spreadsheet->getActiveSheet()->mergeCells('A4:H4')->getStyle('A4')->getFont()->setSize(10);
		$spreadsheet->getActiveSheet()->SetCellValue('A2', 'PROPERTY REPORT'); 
		$spreadsheet->getActiveSheet()->SetCellValue('A3', '@ '.date("jS F Y h:i:sa"));
		$spreadsheet->getActiveSheet()->SetCellValue('A4', '');
		

		$status=['0'=>'INACTIVE','1'=>'ACTIVE','2'=>'DELETED'];


		if(is_array($result) && count($result) > 0){
			
	 foreach($result as $value)	{		
		    

				$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("1",$i,$b);
				$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("2",$i, strtoupper($value['PROPERTY_NAME'])); 
				$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("3",$i, strtoupper($value['PROPERTY_TYPE']));
				$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("4",$i, strtoupper($value['PROPERTY_LOCATION']));
				$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("5",$i, strtoupper($this->GetRegionName($value['PROPERTY_REG'])));
				$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("6",$i, strtoupper($this->GetDistrictnName($value['PROPERTY_DIST'])));
				$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("7",$i, strtoupper($status[$value['PROPERTY_STATUS']]));
				$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("8",$i, date("d/m/Y", strtotime(($value['PROPERTY_ADDED_DATE'])))); 
			 
				
				$i++;
				$m++;
				$mm++;
				$ii++;
				$iii++;
				$b++;	
				 
				}
				
			}
	
	
			 

		$spreadsheet->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
		
		$spreadsheet->getActiveSheet()->getStyle('A5:H5')->applyFromArray($styleArray);
	
		$spreadsheet->getActiveSheet()->getStyle('A'.$m++.':H'.$mm++)->applyFromArray($styleArray);
		
		
		
		//Set header first, so the result will be treated as an Xlsx file
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		//Make an attachment so we can define the filename.
		header('Content-Disposition: attachment;filename="property_report"'.date('Y-m-d-H-i').'".xlsx"');
		header('Cache-Control: max-age=0');
		
		//Create IOFactory object 
		$writer =  IOFactory::createWriter($spreadsheet, 'Xlsx');
		ob_end_clean();
		//Save into php Output
		$writer->save('php://output');
		die;			 
	}
	 

}