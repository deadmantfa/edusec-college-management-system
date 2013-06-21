<?php
class ExportToPdf {

	public function exporttopdf($title,$filename,$html)
	{
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');

		 ob_clean();
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle($title);
		$pdf->SetSubject($title);
		$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "Student Report", '');
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Example Report by ".Yii::app()->name, "");
		$pdf->setHeaderFont(Array('helvetica', '', 8));
		$pdf->setFooterFont(Array('helvetica', '', 6));
		$pdf->SetMargins(15, 18, 15);
		$pdf->SetHeaderMargin(5);
		$pdf->SetFooterMargin(10);
		$pdf->SetAutoPageBreak(TRUE, 15);
		$pdf->SetFont('dejavusans', '', 7);
		$resolution= array(150, 150);
		$pdf->AddPage('P', $resolution);
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->LastPage();
		$pdf->Output($filename, "I");
	}

}
?>
