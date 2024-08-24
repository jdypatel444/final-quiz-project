<?php 
	require('fpdf182/fpdf.php');
	include 'include/config.php';
	
	class myPDF extends FPDF{
		function header(){
			$this->SetFont('Arial','B',14);
			$this->Cell(200,5,"Vendor Detail",0,0,'C');
			$this->Ln();
			
		}
		
		function vendorTable() {
			include 'include/config.php';	
			$vid = $_POST['vid'];
            $pdf_content = $_POST['pdfContent'];
            $result = mysqli_query($conn,"SELECT * FROM purchase_vendor_master WHERE vid = $vid");
            $row = mysqli_fetch_array($result);

			
			$this->setFont('Times','B',12);			

			if (strpos($_POST['pdfContent'],"v-name-row") !== false){ 
				$this->Cell(50,15,'Vendor Name');
				$this->Cell(0,15,$row['vname']);	
				$this->Ln();
			}
			if (strpos($_POST['pdfContent'],"v-email-row") !== false){ 
				$this->Cell(50,10,'Email ID');
				$this->Cell(60,10,$row['vemail']);	
				// $this->Cell(0,10,$row['email_2']);	
				$this->Ln();
			}
			if (strpos($_POST['pdfContent'],"v-mobile-row") !== false){ 
				$this->Cell(50,10,'Mobile No.');
				$this->Cell(60,10,$row['vmobileno']);					
				// $this->Cell(0,10,$row['contact_2']);					
				$this->Ln();
			}
			
			if (strpos($_POST['pdfContent'],"v-courier-add-row") !== false){  
				$this->Cell(50,10,'Courier Address');
				$this->Cell(60,10,$row['vcourier_address']);
				$this->Ln();	
				// $this->Ln();
				// $this->Cell(50,10,'');
				// $this->Cell(0,10,$row_oadd['add_line2']);
				// $this->Ln();		
				// $this->Cell(50,10,'');				
				// $this->Cell(40,10,$row_oadd['city']);	
				// $this->Ln();				
				// $this->Cell(50,10,'');
				// $this->Cell(40,10,$row_oadd['pincode']);
				// $this->Ln();
				// $this->Cell(50,10,'');				
				// $this->Cell(40,10,$row_oadd['state']);	
				// $this->Ln();
			}
			if (strpos($_POST['pdfContent'],"v-fact-add-row") !== false){  
				$this->Cell(50,10,'Factory Address');
				$this->Cell(60,10,$row['vfactory_address']);
				$this->Ln();		
				// $this->Ln();
				// $this->Cell(50,10,'');
				// $this->Cell(0,10,$row_fadd['add_line2']);
				// $this->Ln();		
				// $this->Cell(50,10,'');				
				// $this->Cell(40,10,$row_fadd['city']);	
				// $this->Ln();				
				// $this->Cell(50,10,'');
				// $this->Cell(40,10,$row_fadd['pincode']);
				// $this->Ln();
				// $this->Cell(50,10,'');				
				// $this->Cell(40,10,$row_fadd['state']);	
				// $this->Ln();
			}
			if (strpos($_POST['pdfContent'],"v-bank-detail-row") !== false){  
				$this->Cell(50,10,'Bank Details ');
				$this->Ln();
				$this->Cell(50,10,'');				
				$this->Cell(50,10,'Bank holder Name');
				$this->Cell(0,10,$row['bank_holder_name']);
				$this->Ln();
				$this->Cell(50,10,'');				
				$this->Cell(50,10,'Account Number');
				$this->Cell(0,10,$row['bank_acc_no']);
				$this->Ln();
				$this->Cell(50,10,'');				
				$this->Cell(50,10,'Branch Name');
				$this->Cell(0,10,$row['branch_name']);
				$this->Ln();
				$this->Cell(50,10,'');				
				$this->Cell(50,10,'IFSC Code');
				$this->Cell(0,10,$row['bank_ifsc_code']);
				$this->Ln();
				// $this->Cell(50,10,'');					
				// $this->Cell(50,10,'IFSC Code');
				// $this->Cell(0,10,$row['ifsc_code']);	
				// $this->Ln();
			}
			// if (strpos($_POST['pdfContent'],"mr-bank2-detail-row") !== false){  
			// 	$this->Cell(50,10,'Bank 2 Details');
			// 	$this->Ln();
			// 	$this->Cell(50,10,'');				
			// 	$this->Cell(50,10,'Account holder Name');
			// 	$this->Cell(0,10,$row_b1['account_holder_name']);
			// 	$this->Ln();
			// 	$this->Cell(50,10,'');				
			// 	$this->Cell(50,10,'Account Number');
			// 	$this->Cell(0,10,$row_b1['account_number']);
			// 	$this->Ln();
			// 	$this->Cell(50,10,'');
			// 	$this->Cell(50,10,'Bank Name');
			// 	$this->Cell(0,10,$row_b1['bank_name']);
			// 	$this->Ln();
			// 	$this->Cell(50,10,'');
			// 	$this->Cell(50,10,'Branch Name');
			// 	$this->Cell(0,10,$row_b1['branch_name']);
			// 	$this->Ln();
			// 	$this->Cell(50,10,'');
			// 	$this->Cell(50,10,'IFSC Code');
			// 	$this->Cell(0,10,$row_b1['ifsc_code']);	
			// 	$this->Ln();
			// }
			if (strpos($_POST['pdfContent'],"v-pan-row") !== false){  
				$this->Cell(50,10,'PAN');
				$this->Cell(0,10,$row['vpanno']);	
				$this->Ln();
			}
			if (strpos($_POST['pdfContent'],"v-gst-row") !== false){  
				$this->Cell(50,20,'GST');
				$this->Cell(0,20,$row['vgstno']);	
				$this->Ln();
			}			
		}
	}
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->vendorTable();
$pdf->Output();
?>
