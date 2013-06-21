<?php
$this->breadcrumbs=array(
	'Date Wise Collection Report',
	
);
?>
<html>
<head>

</head>
<body>
<div id = "go-back-link">
<?php echo CHtml::link('GO BACK',Yii::app()->createUrl('feesPaymentTransaction/date_report')); ?>
</div>
<button style='float:right;' class='submit' onclick="javascript:window.print()" id="printid1" class="submit">Print</button><?php echo "<br>";


$i=1;
$m=1;
$final_total = 0;
if($var1)
{
$pdfimage = CHtml::image('../images/pdf.png', 'No Image', array('height'=>'40','width'=>40));

echo CHtml::link($pdfimage,Yii::app()->createUrl('feesPaymentTransaction/date_report?export=date_repot&start_date='.$_POST['FeesPaymentTransaction']['start_date'].'&end_date='.$_POST['FeesPaymentTransaction']['end_date'].'&period='.$period.'&sem='.$sem.'&branch='.$branch),array('title'=>'Export to PDF','target'=>'_blank')); 

echo "&nbsp;";
$excelimage = CHtml::image('../images/excel.png', 'No Image', array('height'=>'40','width'=>40));
//echo $image;
echo CHtml::link($excelimage,Yii::app()->createUrl('feesPaymentTransaction/date_report?datereportexportexcel=date_repot&start_date='.$_POST['FeesPaymentTransaction']['start_date'].'&end_date='.$_POST['FeesPaymentTransaction']['end_date'].'&period='.$period.'&sem='.$sem.'&branch='.$branch),array('title'=>'Export to Excel','target'=>'_blank')); 

/*$this->menu=array(
	array('label'=>'', 'url'=>array('date_report','export'=>'date_repot','start_date'=>$_POST['FeesPaymentTransaction']['start_date'],'end_date'=>$_POST['FeesPaymentTransaction']['end_date'],'period'=>$period,'sem'=>$sem,'branch'=>$branch),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export to PDF')),
	array('label'=>'', 'url'=>array('date_report','datereportexportexcel'=>'date_repot','start_date'=>$_POST['FeesPaymentTransaction']['start_date'],'end_date'=>$_POST['FeesPaymentTransaction']['end_date'],'period'=>$period,'sem'=>$sem,'branch'=>$branch),'linkOptions'=>array('class'=>'export-excel','title'=>'Export to Excel')),
);
*/

?>
<table class="table_data" style="font-size:12px;">
<th colspan="14"  style="font-size: 18px; color: rgb(255, 255, 255);">
Date Wise Collection Report From <?php echo $_POST['FeesPaymentTransaction']['start_date'].' to '.$_POST['FeesPaymentTransaction']['end_date']; ?>		
        </th>
<tr class="table_header">
<th>SI.No.</th>
<th>Enroll No.</th>
<th>Roll No.</th>
<th>Name</th>
<th>Branch</th>
<th>Semester</th>
<th>Academic Year</th>
<th>Division</th>
<th>Date</th>
<th>Amount Type</th>
<th>Bank Name</th>
<th>Cheque No</th>
<th>Receipt No</th>
<th>Amount</th>
</tr>
<?php
foreach($var1 as $list)
{
   
	if(($m%2) == 0)
	{
	  $class = "odd";
	}
	else
	{
	  $class = "even";
	}
   $stud_data = StudentTransaction::model()->findByPk($list['fees_student_id']);
   print '<tr class='.$class.'><td>'.$i.'</td>';
   print '<td>'.StudentInfo::model()->findByPk($stud_data->student_transaction_student_id)->student_enroll_no.'</td>';
   print '<td>'.StudentInfo::model()->findByPk($stud_data->student_transaction_student_id)->student_roll_no.'</td>';	
   print '<td>'.StudentInfo::model()->findByPk($stud_data->student_transaction_student_id)->student_first_name.' '.StudentInfo::model()->findByPk($stud_data->student_transaction_student_id)->student_middle_name.' '.StudentInfo::model()->findByPk($stud_data->student_transaction_student_id)->student_last_name.'</td>';
   print '<td>'.Branch::model()->findByPk($stud_data->student_transaction_branch_id)->branch_name.'</td>';
   print '<td>'.AcademicTerm::model()->findByPk($list['fees_academic_term_id'])->academic_term_name.'</td>';
   print '<td>'.AcademicTermPeriod::model()->findByPk($list['fees_academic_period_id'])->academic_term_period.'</td>';
   print '<td>'.Division::model()->findByPk($stud_data->student_transaction_division_id)->division_name.'</td>';
   print '<td>'.$list['fees_received_date'].'</td>';
   $rec_no = FeesReceipt::model()->findByPk($list['fees_receipt_id'])->fees_receipt_number;
   if($list['fees_payment_method_id'] == '1')
   {
		$cash_id = $list['fees_payment_cash_cheque_id'];
		$amunt = FeesPaymentCash::model()->findByPk($cash_id)->fees_payment_cash_amount; 
		$final_total += $amunt;
		$type = "Cash";
		print '<td>'.$type.'</td>';
		print '<td>-</td>';
		print '<td>-</td>';
		print '<td>'.$rec_no.'</td>';		
		print '<td>'.$amunt.'</td>';
		

   }
   else
   {
		$cheque_id = $list['fees_payment_cash_cheque_id'];
		$cheque_status = "Return Cheque";
		$amunt1 = FeesPaymentCheque::model()->findByPk($cheque_id)->fees_payment_cheque_amount;
		$status = FeesPaymentCheque::model()->findByPk($cheque_id)->fees_payment_cheque_status; 
		$chno = FeesPaymentCheque::model()->findByPk($cheque_id)->fees_payment_cheque_number; 
		$bank = BankMaster::model()->findByPk(FeesPaymentCheque::model()->findByPk($cheque_id)->fees_payment_cheque_bank)->bank_full_name;
		if($status == 0)
		{
		$final_total += $amunt1;			
		$type = "Cheque";
		print '<td>'.$type.'</td>';
		print '<td>'.$bank.'</td>';
		print '<td>'.$chno.'</td>';
		print '<td>'.$rec_no.'</td>';		
		print '<td>'.$amunt1.'</td>';
		
		}
		else
		{	
			print '<td>'.$cheque_status.'</td>';
			print '<td>'.$bank.'</td>';
			print '<td>'.$chno.'</td>';
			print '<td>'.$rec_no.'</td>';		
			print '<td>'.$amunt1.'</td>';
			
		}
		
   }	
 /*  if($list['fees_payment_method_id'] == '1')	
	{
		$type = "cash";
		print '<td>'.$type.'</td>';
	}
   else
	{
		$type = "cheque";
		print '<td>'.$type.'</td>';

	}*/
$i++;
$m++;
}



?>
		<tr class="report_footer">
			<td colspan=13 style="font-weight:bold;text-align:right;padding-right:15px;">Total</td>
			<td colspan=12 style="font-weight:bold"><?php echo $final_total; ?></td>					
		</tr>
</table>
<?php
}
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";

}?>
</body>
</html>
