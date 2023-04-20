<?php 
// namespace interview_list;

use PhpOffice\PhpSpreadsheet\spreadsheet;
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
		
		$this->spreadsheet = new spreadsheet();
		$this->sheet = $this->spreadsheet->getActiveSheet(); 
		$sheet = $this->sheet;
		$spreadsheet = $this->spreadsheet;
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
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(40);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(30);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(20);
		

	 //  GCT_CODE
                                      
	$spreadsheet->setActiveSheetIndex(0);
	$spreadsheet->getActiveSheet()->SetCellValue('A5', 'No.');
	$spreadsheet->getActiveSheet()->SetCellValue('B5', 'ID');
	$spreadsheet->getActiveSheet()->SetCellValue('C5', 'CLIENT NAME');
	$spreadsheet->getActiveSheet()->SetCellValue('D5', 'CLIENT CONTACT');
	$spreadsheet->getActiveSheet()->SetCellValue('E5', 'PROPERTY');
	$spreadsheet->getActiveSheet()->SetCellValue('F5', 'PAYMENT TERM');
	$spreadsheet->getActiveSheet()->SetCellValue('G5', 'PAYMENT PLAN');
	$spreadsheet->getActiveSheet()->SetCellValue('H5', 'NUMBER OF PLOTS');
	$spreadsheet->getActiveSheet()->SetCellValue('I5', 'PLOT NUMBER');
	$spreadsheet->getActiveSheet()->SetCellValue('J5', 'TOTAL COST GHS');
	$spreadsheet->getActiveSheet()->SetCellValue('K5', 'TOTAL PAYMENT GHS;');
	$spreadsheet->getActiveSheet()->SetCellValue('L5', 'BALANCE GHS');
	$spreadsheet->getActiveSheet()->SetCellValue('M5', 'STATUS');
	$spreadsheet->getActiveSheet()->SetCellValue('N5', 'CREATED DATE');
	
	// $finaltot=0;
	// $spreadsheet->getActiveSheet()->mergeCells('A1:AO1'); 
	$spreadsheet->getActiveSheet()->mergeCells('J1:K1')->getStyle('G1')->getFont()->setSize(9);
	// $i = 3;
	// $b = 1;
	$i = 6;
	$ii = 6;
	$iii =6;
	$m = 6;
	$mm = 6;
	$b = 1;
	// $spreadsheet->getActiveSheet()->SetCellValue('A1','LOG-EVENT REPORT'); 


	$spreadsheet->getActiveSheet()->mergeCells('A2:N2')->getStyle('A2')->getFont()->setSize(10);
	$spreadsheet->getActiveSheet()->mergeCells('A3:N3')->getStyle('A3')->getFont()->setSize(10);
	$spreadsheet->getActiveSheet()->mergeCells('A4:N4')->getStyle('A4')->getFont()->setSize(10);
	$spreadsheet->getActiveSheet()->SetCellValue('A2', 'LAND REPORT'); 
	$spreadsheet->getActiveSheet()->SetCellValue('A3', '@ '.date("jS F Y h:i:sa"));
	$spreadsheet->getActiveSheet()->SetCellValue('A4', '');
	
	$status=['0'=>'Deleted','1'=>'Pending Payment','2'=>'Part Payment', '3'=>'Fully Paid'];
	$system_payment_plan = ['7'=>"WEEKLY", '30'=>"MONTHLY", '90'=>"QUATERLY", '180'=>"HALF-YEARLY", '360'=>"ANNUALLY"];

                                   

	if(is_array($result) && count($result) > 0){
		
	foreach($result as $value)	{		
		

			$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("1",$i,$b);
			
			$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("2",$i,($value['LS_CODE']));

			$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("3",$i, strtoupper($value['LS_CLIENT_NAME']));
			
			$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("4",$i, strtoupper($value['LS_CLIENT_CONTACT']));

			$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("5",$i, strtoupper($value['LS_PROPERTY_NAME']));

			$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("6",$i, strtoupper($value['LS_PAYMENT_TERM']));

			$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("7",$i, strtoupper($system_payment_plan[$value['LS_PAYMENT_PLAN']])); 

			$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("8",$i, strtoupper($value['LS_NUM_OF_PLOT'])); 
			
			$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("9",$i,($value['LS_PLOT_NUMBER']));
			
			$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("10",$i, strtoupper($value['LS_TOTAL_COST']));
			
			$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("11",$i,($value['LS_TOTAL_PAYMENT']));
			
			$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("12",$i, strtoupper($value['LS_BALANCE']));
			$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("13",$i, strtoupper($status[$value['LS_STATUS']]));
			$spreadsheet->getActiveSheet()->SetCellValueByColumnAndRow("14",$i,date('d/m/Y',strtotime($value['LS_CREATED_DATE'])));


					
				
				$i++;
				$m++;
				$mm++;
				$ii++;
				$iii++;
				$b++;	
				
	
				}
				
			}
	
	

		$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
		
		$spreadsheet->getActiveSheet()->getStyle('A5:N5')->applyFromArray($styleArray);
	
		$spreadsheet->getActiveSheet()->getStyle('A'.$m++.':N'.$mm++)->applyFromArray($styleArray);
		
		
		
		//Set header first, so the result will be treated as an Xlsx file
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		//Make an attachment so we can define the filename.
		header('Content-Disposition: attachment;filename="Land_report"'.date('Y-m-d-H-i').'".xlsx"');
		header('Cache-Control: max-age=0');
		
		//Create IOFactory object 
		$writer =  IOFactory::createWriter($spreadsheet, 'Xlsx');
		ob_end_clean();
		//Save into php Output
		$writer->save('php://output');
		die;			 
	}

	


}