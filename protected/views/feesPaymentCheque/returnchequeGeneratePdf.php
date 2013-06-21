<style>
table, th, td {
  vertical-align: middle;
}
th, td, caption {
  padding: 4px 0 10px;
  text-align: center;
}

</style>
<?php if ($model !== null):?>
<?$k=1;?>


<table border="1">

	<tr>
		<th>
		      SN.		</th>
 		<th>
		    Cheque No 	</th>
		<th>
		 Receipt No   	</th>
		<th>
		 Student Roll No.</th>
		<th>
		 Student Enroll No.</th>
		<th>
		 Student Name</th>
		<th>
		Semester</th>
		<th>
		Academic Year</th>
		<th>
		 Cheque Date</th>
		<th>
		 Cheque Status</th>
		<th>
		 Bank Name</th>
		<th>
		 Cheque Branch</th>
		<th>
		 Cheque Amount</th>
		
		
 	</tr>
	<?php foreach($model as $m=>$v)
	{
	   if($m <> 0) {
            ?>
	<tr>
       		<td>
			<?php echo $k; ?>
		</td>
		<td>
			<?php echo $v['fees_payment_cheque_number']; ?>
		</td>	
		<td>
			<?php $fees_model = FeesPaymentTransaction::model()->findByAttributes(array("fees_payment_cash_cheque_id"=>$v['fees_payment_cheque_id'],"fees_payment_transaction_organization_id"=>Yii::app()->user->getState("org_id"),"fees_payment_method_id"=>2)); 
				echo $fees_model->fees_receipt_id;
			?>
		
		</td>
		<td>
			<?php 
				$stud=StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$fees_model->fees_student_id)); 
			echo $stud->student_roll_no;
			?>
		</td>
		<td>
			<?php echo $stud->student_enroll_no; ?>
		</td>	
		<td>
			<?php echo $stud->student_first_name.' '.$stud->student_middle_name.' '.$stud->student_last_name; ?>
		</td>
		<td>
			<?php echo AcademicTerm::model()->findByPk(FeesPaymentTransaction::model()->findByAttributes(array("fees_payment_cash_cheque_id"=>$v['fees_payment_cheque_id'],"fees_payment_transaction_organization_id"=>Yii::app()->user->getState("org_id"),"fees_payment_method_id"=>2))->fees_academic_term_id)->academic_term_name?>
		</td>
		<td>
			<?php echo AcademicTermPeriod::model()->findByPk(FeesPaymentTransaction::model()->findByAttributes(array("fees_payment_cash_cheque_id"=>$v['fees_payment_cheque_id'],"fees_payment_transaction_organization_id"=>Yii::app()->user->getState("org_id"),"fees_payment_method_id"=>2))->fees_academic_period_id)->academic_term_period?>
		</td>
		<td>
			<?php echo date('d-m-Y',strtotime($v['fees_payment_cheque_date'])); ?>
		</td>
		<td>
			<?php echo $v['fees_payment_cheque_status'] =1 ? 'Return Cheque' :'' ; ?>
		</td>
		<td>
			<?php echo BankMaster::model()->findByPk($v['fees_payment_cheque_bank'])->bank_short_name; ?>
		</td>
		<td>
			<?php echo $v['fees_payment_cheque_branch']; ?>
		</td>
		<td>
			<?php echo $v['fees_payment_cheque_amount']; ?>
		</td>
		
		 
</tr>
	<?php $k++;?>
	 <?php  }// end if
	
	}// end for loop?>
     </table>

<?php endif; ?>
