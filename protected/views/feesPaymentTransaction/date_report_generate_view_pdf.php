<?php 
$i=1;
$m=1;
$final_total = 0;

if($var)
{


?>
<table border="1">
<tr>
<th>Sr.No.</th>
<th>Student Enroll No.</th>
<th>Student Roll No.</th>
<th>Student Name</th>
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
foreach($var as $list)
{
   $stud_data = StudentTransaction::model()->findByPk($list['fees_student_id']);
   echo '<tr><td>'.$i.'</td>';
   echo '<td>'.StudentInfo::model()->findByPk($stud_data->student_transaction_student_id)->student_enroll_no.'</td>';
   echo '<td>'.StudentInfo::model()->findByPk($stud_data->student_transaction_student_id)->student_roll_no.'</td>';	
   echo '<td>'.StudentInfo::model()->findByPk($stud_data->student_transaction_student_id)->student_first_name.' '.StudentInfo::model()->findByPk($stud_data->student_transaction_student_id)->student_middle_name.' '.StudentInfo::model()->findByPk($stud_data->student_transaction_student_id)->student_last_name.'</td>';
   echo '<td>'.Branch::model()->findByPk($stud_data->student_transaction_branch_id)->branch_name.'</td>';
   echo '<td>'.AcademicTerm::model()->findByPk($stud_data->student_academic_term_name_id)->academic_term_name.'</td>';
   echo '<td>'.AcademicTermPeriod::model()->findByPk($stud_data->student_academic_term_period_tran_id)->academic_term_period.'</td>';
   echo '<td>'.Division::model()->findByPk($stud_data->student_transaction_division_id)->division_name.'</td>';
   echo '<td>'.$list['fees_received_date'].'</td>';
   $rec_no = FeesReceipt::model()->findByPk($list['fees_receipt_id'])->fees_receipt_number;
   if($list['fees_payment_method_id'] == '1')
   {
		$cash_id = $list['fees_payment_cash_cheque_id'];
		$amunt = FeesPaymentCash::model()->findByPk($cash_id)->fees_payment_cash_amount; 
		$final_total += $amunt;
		$type = "Cash";
		echo '<td>'.$type.'</td>';
		echo '<td>-</td>';
		echo '<td>-</td>';
		echo '<td>'.$rec_no.'</td>';
		echo '<td>'.$amunt.'</td>';
		

   }
   else
   {
		$cheque_id = $list['fees_payment_cash_cheque_id'];
		$cheque_status = "Return cheque";
		$amunt1 = FeesPaymentCheque::model()->findByPk($cheque_id)->fees_payment_cheque_amount;
		$status = FeesPaymentCheque::model()->findByPk($cheque_id)->fees_payment_cheque_status; 
		$chno = FeesPaymentCheque::model()->findByPk($cheque_id)->fees_payment_cheque_number; 
		$bank = BankMaster::model()->findByPk(FeesPaymentCheque::model()->findByPk($cheque_id)->fees_payment_cheque_bank)->bank_full_name;
		if($status == 0)
		{
		$final_total += $amunt1;			
		$type = "Cheque";
		echo '<td>'.$type.'</td>';
		echo '<td>'.$bank.'</td>';
		echo '<td>'.$chno.'</td>';
		echo '<td>'.$rec_no.'</td>';
		echo '<td>'.$amunt1.'</td>';
		
		}
		else
		{	
			echo '<td>'.$cheque_status.'</td>';
			echo '<td>'.$bank.'</td>';
			echo '<td>'.$chno.'</td>';
			echo '<td>'.$rec_no.'</td>';
			echo '<td>'.$amunt1.'</td>';
			
		}
		
   }	

$i++;?></tr>
<?php

}



?>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>	
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>						
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>Total</td>
			<td><?php echo $final_total; ?></td>					
		</tr>
</table>
<?php
} ?>
</body>
</html>

