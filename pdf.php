<?php

	require('fpdf182/fpdf.php');
	include 'include/config.php';
	
	class myPDF extends FPDF{
		function header(){
			$this->SetFont('Arial','',13);
			$this->Cell(276,5,"",0,0,'C');
			$this->Ln();
			
		}
		
		function vendorTable() {
			include 'include/config.php';	
			$logo = $_POST['logo'];
			$env_addr = $_POST['env_addr'];
			$vid = $_POST['vid'];
			$result_env = mysqli_query($conn,"SELECT * FROM envelope_detail WHERE e_id = $logo");
			$row_env = mysqli_fetch_array($result_env);
			// $result = mysqli_query($conn,"SELECT * FROM co_merchant WHERE mr_id = $mr_id");
			// $row = mysqli_fetch_array($result);
			
			// if($env_addr == '1') { 
			// $result_oadd = mysqli_query($conn,"SELECT * FROM co_address WHERE mr_id = $mr_id AND type = '0'");
			// $row_add = mysqli_fetch_array($result_oadd);
			// 	if(!empty($row['contact_2']))
			// {
			//     $contact = $row['contact_2'];
			// }
			// else
			//     {
			//          $contact = $row['contact_1'];
			//     }
			    
			// }
			// else{
			// $result_fadd = mysqli_query($conn,"SELECT * FROM co_address WHERE mr_id = $mr_id AND type = '1' ");
			// $row_add = mysqli_fetch_array($result_fadd);
			// if(!empty($row['contact_2']))
			// {
			//     $contact = $row['contact_2'];
			// }
			// else
			//     {
			//          $contact = $row['contact_1'];
			//     }
			    
			// }
			
			$this->Image('./image/'.$row_env['logo'],20,40,50,30);
			$this->Line(20,89,140,89);
			$this->SetFont('Arial');
		    $this->SetFillColor(255,255,255);
			$this->SetXY(20,90);
			$this->MultiCell(200,6,$row_env['company_name'].",\n".$row_env['address'].",\n".$row_env['city']." - ".$row_env['pincode'].".\nContact no:-".$row_env['contact']."\nEmail:-".$row_env['email'],'FJ',1);
			
		}
	}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->vendorTable();
$pdf->Output();

?>