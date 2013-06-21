<?php
	//echo $list1['student_roll_no'];
	echo "hi";
?>
<?php
		
		 $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'fees-payment-transaction-grid',
		'dataProvider'=>$model->cheque_return(),
		'enableSorting'=>true,
		'filter'=>$model,
		
		'columns'=>array(
			array(
			'header'=>'SN.',
			'class'=>'IndexColumn',
			),

			'fees_payment_cheque_number',
			
			/*array(
			    'name'=>'student_roll_no',
			    'value'=>'StudentInfo::model()->findByPk(StudentTransaction::model()->findByPk(FeesPaymentTransaction::model()->findByAttributes(array("fees_payment_cash_cheque_id"=>$data->fees_payment_cheque_id,"fees_payment_transaction_organization_id"=>Yii::app()->user->getState("org_id"),"fees_payment_method_id"=>2))->fees_student_id)->student_transaction_student_id)->student_roll_no',
			),
				
			array(
			    'name'=>'student_enroll_no',
			    'value'=>'StudentInfo::model()->findByPk(StudentTransaction::model()->findByPk(FeesPaymentTransaction::model()->findByAttributes(array("fees_payment_cash_cheque_id"=>$data->fees_payment_cheque_id,"fees_payment_transaction_organization_id"=>Yii::app()->user->getState("org_id"),"fees_payment_method_id"=>2))->fees_student_id)->student_transaction_student_id)->student_enroll_no',
			),

			array(
			    'name'=>'student_first_name',
			    'value'=>'StudentInfo::model()->findByPk(StudentTransaction::model()->findByPk(FeesPaymentTransaction::model()->findByAttributes(array("fees_payment_cash_cheque_id"=>$data->fees_payment_cheque_id,"fees_payment_transaction_organization_id"=>Yii::app()->user->getState("org_id"),"fees_payment_method_id"=>2))->fees_student_id)->student_transaction_student_id)->student_first_name',
			),

			*/

			array(
             		   'name'=>'fees_payment_cheque_date',
               		   'type'=>'raw',		
                	   'value'=>'date_format(date_create($data->fees_payment_cheque_date), "d-m-Y")',
	        	),
			
			array(
			'name' => 'fees_payment_cheque_status',
			'value'=>'($data->fees_payment_cheque_status == 1) ?  "Return Cheque" : "Credit Cheque"',
                 	),
			//'fees_payment_cheque_bank',
			array(
			'name' => 'fees_payment_cheque_bank',
			'value' => 'BankMaster::model()->findByPk($data->fees_payment_cheque_bank)->bank_short_name',
			),
			'fees_payment_cheque_branch',
			'fees_payment_cheque_amount',
			
		),
	
	));
	

?>

