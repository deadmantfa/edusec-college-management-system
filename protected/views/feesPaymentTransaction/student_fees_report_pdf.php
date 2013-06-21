<style>
table, th, td {
  vertical-align: middle;
}
th, td, caption {
  padding: 4px 0 10px;
  text-align: center;
}

</style>
<?php
	

	$org_id=Yii::app()->user->getState('org_id');
	
	$fees=FeesPaymentTransaction::model()->findAll('fees_student_id='.$info_model[0]['student_transaction_id'].' and  	fees_payment_transaction_organization_id = '.$org_id);
	
	if(empty($fees))
	{
		echo "<div class=\"block-error\">";
		echo "No fees record available for this student.";
		echo "</div>";
	}
	else
	{

	$i=1;
	echo "<h5>Student Roll Number : ".$info_model[0]['student_roll_no']."</h5>";
	echo "<h5>Student Enrollment Number : ".$info_model[0]['student_enroll_no']."</h5>";
	echo "<h5>Student Name : ".$info_model[0]['student_first_name'].' '.$info_model[0]['student_middle_name'].' '.$info_model[0]['student_last_name']."</h5>";
	echo "<h5>Branch: ".Branch::model()->findByPk($info_model[0]['student_transaction_branch_id'])->branch_name."</h5>";
	echo "<h5>Current Semester: ".AcademicTerm::model()->findByPk($info_model[0]['student_academic_term_name_id'])->academic_term_name."</h5>";
?>

	<table border="1">
		<tr class="table_header">
			<th>
				Sr No.
			</th>
			<th>
				Academic Year
			</th>
			<th>
				Semester
			</th>
			<th>
				Payment Method
			</th>
			<th>
				Payable Amount
			</th>
			<th>
				Paid Amount
			</th>
			<th>
				Date
			</th>
			<th>
				Bank Name
			</th>
			<th>
				Bank Branch
			</th>
			<th>
				Cheque Number
			</th>
			<th>
				Receipt Number
			</th>
			<th>
				OutStanding Amount
			</th>
		</tr>
<?php 
$m=1;
$var = 0;
$out = 0;
$payable = 0;
$payable1 = 0;
$term_id = 0;
$ch_num = "";
$temp=0;


		foreach($fees as $f)
		{
			$flag=0;
			if(($m%2) == 0)
			{
			  $class = "odd";
			}
			else
			{
			  $class = "even";
			}
						
			if($f->fees_payment_method_id==1)
			{
				if($m ==  1)
				$term_id = $f->fees_academic_term_id;
				if($term_id == $f->fees_academic_term_id)
				{
					$var += FeesPaymentCash::model()->findByPk($f->fees_payment_cash_cheque_id)->fees_payment_cash_amount;
					$total = 0;
					$student_fees = StudentFeesMaster::model()->findAll('fees_master_table_id = :fees_master_id AND student_fees_master_student_transaction_id = :student_id', array(':fees_master_id'=>$f->fees_payment_master_id,':student_id'=>$f->fees_student_id));
		
		//print_r($student_fees);  exit;
				foreach($student_fees as $fees_data)
					$total += $fees_data->fees_details_amount;
					$payable = $total;
					//$payable = FeesMaster::model()->findByPk($f->fees_payment_master_id)->fees_master_total;			
					if($i == 1)
					{
						$payable1 = $payable;
						
					}
					else
						$payable1 = '-';
					
				}
				
				else{
					
					$term_id = $f->fees_academic_term_id;
					$var = FeesPaymentCash::model()->findByPk($f->fees_payment_cash_cheque_id)->fees_payment_cash_amount;
					//$payable = FeesMaster::model()->findByPk($f->fees_payment_master_id)->fees_master_total;
					$total = 0;
					$student_fees = StudentFeesMaster::model()->findAll('fees_master_table_id = :fees_master_id AND student_fees_master_student_transaction_id = :student_id', array(':fees_master_id'=>$f->fees_payment_master_id,':student_id'=>$f->fees_student_id));
		
		//print_r($student_fees);  exit;
				foreach($student_fees as $fees_data)
					$total += $fees_data->fees_details_amount;
					$payable = $total;
					$payable1 = $payable;
					
					
				}
				
				$out = $payable - $var;
				$ch_num = '-';
				echo "<tr class=".$class.">";
				echo "<td>".$i."</td>";
				echo "<td>".AcademicTermPeriod::model()->findByPk($f->fees_academic_period_id)-> academic_term_period."</td>";
				echo "<td>".AcademicTerm::model()->findByPk($f->fees_academic_term_id)->academic_term_name."</td>";
				echo "<td>".FeesPaymentMethod::model()->findByPk($f->fees_payment_method_id)->fees_payment_method_name."</td>";
				//echo "<td>".FeesMaster::model()->findByPk($f->fees_payment_master_id)->fees_master_total."</td>";
				echo "<td>".$payable1."</td>";
				//$var += FeesPaymentCash::model()->findByPk($f->fees_payment_cash_cheque_id)->fees_payment_cash_amount;

				echo "<td>".FeesPaymentCash::model()->findByPk($f->fees_payment_cash_cheque_id)->fees_payment_cash_amount."</td>";
				$date = $f->fees_received_date;
				$new_date = date("d-m-Y", strtotime($date));
				echo "<td>".$new_date."</td>";
				echo "<td>-</td>";
				echo "<td>-</td>";
				echo "<td>".$ch_num."</td>";
				echo "<td>".FeesReceipt::model()->findByPk($f->fees_receipt_id)->fees_receipt_number."</td>";
				++$temp;
				$flag=1;
				$i += 1;
			}
			else
			{
				$status = FeesPaymentCheque::model()->findByPk($f->fees_payment_cash_cheque_id)->fees_payment_cheque_status;
				if($status == 0)
				{
				if($m ==  1)
				$term_id = $f->fees_academic_term_id;
				if($term_id == $f->fees_academic_term_id)
				{
					$var += FeesPaymentCheque::model()->findByPk($f->fees_payment_cash_cheque_id)->fees_payment_cheque_amount;
					$total = 0;
					$student_fees = StudentFeesMaster::model()->findAll('fees_master_table_id = :fees_master_id AND student_fees_master_student_transaction_id = :student_id', array(':fees_master_id'=>$f->fees_payment_master_id,':student_id'=>$f->fees_student_id));
		
		//print_r($student_fees);  exit;
				foreach($student_fees as $fees_data)
					$total += $fees_data->fees_details_amount;
					$payable = $total;
					//$payable = FeesMaster::model()->findByPk($f->fees_payment_master_id)->fees_master_total;
					if($i == 1)
					{
						$payable1 = $payable;
						++$k;
					}
					else
						$payable1 = '-';
					
				}
				else{
					//$out = $payable - $var;
					$term_id = $f->fees_academic_term_id;
					$var = FeesPaymentCheque::model()->findByPk($f->fees_payment_cash_cheque_id)->fees_payment_cheque_amount;
					$total = 0;
					$student_fees = StudentFeesMaster::model()->findAll('fees_master_table_id = :fees_master_id AND student_fees_master_student_transaction_id = :student_id', array(':fees_master_id'=>$f->fees_payment_master_id,':student_id'=>$f->fees_student_id));
		
		//print_r($student_fees);  exit;
				foreach($student_fees as $fees_data)
					$total += $fees_data->fees_details_amount;
					$payable = $total;
					//$payable = FeesMaster::model()->findByPk($f->fees_payment_master_id)->fees_master_total;
					$payable1 = $payable;
					//$out = $payable - $var;
				
				}
				$out = $payable - $var;
				$ch_num = FeesPaymentCheque::model()->findByPk($f->fees_payment_cash_cheque_id)->fees_payment_cheque_number;
				echo "<tr class=".$class.">";
				echo "<td>".$i."</td>";
				echo "<td>".AcademicTermPeriod::model()->findByPk($f->fees_academic_period_id)-> academic_term_period."</td>";
				echo "<td>".AcademicTerm::model()->findByPk($f->fees_academic_term_id)->academic_term_name."</td>";
				echo "<td>".FeesPaymentMethod::model()->findByPk($f->fees_payment_method_id)->fees_payment_method_name."</td>";
				//echo "<td>".FeesMaster::model()->findByPk($f->fees_payment_master_id)->fees_master_total."</td>";
				echo "<td>".$payable1."</td>";
				$chqmodel = FeesPaymentCheque::model()->findByPk($f->fees_payment_cash_cheque_id);
				echo "<td>".$chqmodel->fees_payment_cheque_amount."</td>";
				//$var += FeesPaymentCheque::model()->findByPk($f->fees_payment_cash_cheque_id)->fees_payment_cheque_amount;
				$bank_model = BankMaster::model()->findByPk($chqmodel->fees_payment_cheque_bank);
				$bank_name = $bank_model->bank_short_name;
				$bank_branch = $bank_model->bank_short_name;
				$date = $f->fees_received_date;
				$new_date = date("d-m-Y", strtotime($date));
				echo "<td>".$new_date."</td>";	
				echo "<td>".$bank_name."</td>";
				echo "<td>".$bank_branch."</td>";
				echo "<td>".$ch_num."</td>";
				echo "<td>".FeesReceipt::model()->findByPk($f->fees_receipt_id)->fees_receipt_number."</td>";
				++$temp;
				$i += 1;
				$flag=1;
				}
			}
			if($temp!=0 && $flag==1){
			echo "<td>".$out."</td>";
				
			echo "</tr>";
			}
			$m++;
		}

?>
	</table>
<?php }?>
