<?php
		date_default_timezone_set('America/Los_Angeles');
		require_once "../helpers.php";
		require_once('../exportexcel/PHPExcel.php');	
		   
		    $doc = new PHPExcel();		   
		    $doc->setActiveSheetIndex(0);
			$usersData=allusers();			
			$arrayData=array();
			$data=[];
		 	foreach ($usersData[0] as $key => $value) {
		 		

		 		array_push($data,$key);
		 		
		 	}
		
	 		array_push($arrayData, $data);
	 		foreach ($usersData as $key => $value) {
	 			array_push($arrayData, $value);
	 		} 	
	  

	    $doc->getActiveSheet()->fromArray($arrayData,null , 'A1');
	    $doc->getActiveSheet()->getStyle('A1:N1')->getFont()->setBold(true);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="users.xls"');
		header('Cache-Control: max-age=0');

		// Do your stuff here
		$writer = PHPExcel_IOFactory::createWriter($doc, 'Excel5');

		$writer->save('php://output');
?>