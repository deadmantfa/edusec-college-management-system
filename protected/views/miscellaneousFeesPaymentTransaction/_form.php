<div class="form">

<?php

$student_name=StudentInfo::model()->findByPk(StudentTransaction::model()->findByPk($_REQUEST['id'])->student_transaction_student_id);
?>

<table  border="2px" id="twoColThinTable">
<tr class="row">
	<td class="col1">Name</td>
	<td class="col2"><?php echo $student_name->student_first_name." ".$student_name->student_middle_name." ".$student_name->student_last_name;?></td>
</tr>	
<tr class="row">
	<td class="col1">Enrollment No</td> 
	<td class="col2"> <?php echo $student_name->student_enroll_no ;?></td>
</tr>
	
</table>
<div>&nbsp;</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'miscellaneous-fees-payment-transaction-form',
	'enableAjaxValidation'=>true,
)); ?>

<div>
<?php echo CHtml::button('Cash', array('submit' => array('/miscellaneousFeesPaymentCash/create', 'id'=>$_REQUEST['id']), 'class'=>'submit')); ?>
<?php echo CHtml::button('Cheque', array('submit' => array('/miscellaneousFeesPaymentCheque/create', 'id'=>$_REQUEST['id']), 'class'=>'submit','style'=>'margin-left:5px;')); ?>
<?php //echo CHtml::button('Draft', array('submit' => array('/miscellaneousFeesPaymentCheque/draft', 'id'=>$_REQUEST['id']), 'class'=>'submit')); ?>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->

<div class="mise-grid-view">
<h4 class="final_view_doc">Payment By Cash</h4>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'miscellaneous-fees-payment-cash-grid',
	'dataProvider'=>$cash_model->mysearch(),
	//'filter'=>$model,
	'enableSorting'=>false,
	'columns'=>array(
		//'miscellaneous_fees_payment_cash_id',
		
		//'miscellaneous_fees_payment_cash_student_id',
		//'miscellaneous_fees_payment_cash_receipt_id',
		array(
			'name'=>'miscellaneous_fees_payment_cash_master_id',
			'value'=>'MiscellaneousFeesMaster::model()->findByPk($data->miscellaneous_fees_payment_cash_master_id)->miscellaneous_fees_name',
		),
		'miscellaneous_fees_payment_cash_amount',
		array(
                'name'=>'miscellaneous_fees_payment_cash_creation_date',
                //'type'=>'raw',		
                'value'=>'date_format(new DateTime($data->miscellaneous_fees_payment_cash_creation_date), "d-m-Y")',
	        ),
		array(
					'name'=>'miscellaneous_fees_payment_cash_receipt_id',
			'value'=>'MiscellaneousFeesReceipt::model()->findByPk($data->miscellaneous_fees_payment_cash_receipt_id)->miscellaneous_fees_receipt_number',
		),
		array(
			'class'=>'MyCButtonColumn',
			'template' => '{update}{delete}{print_rec}',
			'buttons'=>array(
				'delete' => array(
		                        'label'=>'Delete', // text label of the button
					'url'=>'Yii::app()->createUrl("miscellaneousFeesPaymentCash/delete", array("id"=>$data->miscellaneous_fees_payment_cash_id))',
					),
		                'update' => array(
		                        'label'=>'Edit', // text label of the button
					'url'=>'Yii::app()->createUrl("miscellaneousFeesPaymentCash/update", array("id"=>$data->miscellaneous_fees_payment_cash_id))',
		                ),
				'print_rec' => array(
                                'label'=>'Print Receipt', // text label of the button
				'url'=>'Yii::app()->createUrl("miscellaneousFeesPaymentCash/recpt_list", array("id"=>$data->miscellaneous_fees_payment_cash_id))',
                                'imageUrl'=> Yii::app()->baseUrl.'/images/rs.png',  // image URL of the button. If not set or false, a text link is used
                               'options' => array('class'=>'fees-receipt', 'target'=>'_blank'), // HTML options for the button

                        ),
			),

		),
	),
)); ?>
</div>

<div class="mise-grid-view">

<h4 class="final_view_doc">Payment By Cheque</h4>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'miscellaneous-fees-payment-cheque-grid',
	'dataProvider'=>$cheque_model->mysearch(),
	'enableSorting'=>false,
//	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'miscellaneous_fees_payment_cheque_master_id',
			'value'=>'MiscellaneousFeesMaster::model()->findByPk($data->miscellaneous_fees_payment_cheque_master_id)->miscellaneous_fees_name',
		),
	//	'miscellaneous_fees_payment_cheque_id',
		'miscellaneous_fees_payment_cheque_number',
		//'miscellaneous_fees_payment_cheque_date',
		array('name' => 'miscellaneous_fees_payment_cheque_date',		     
	              'value' => 'date_format(date_create($data->miscellaneous_fees_payment_cheque_date), "d-m-Y")',
                     ),
		//'miscellaneous_fees_payment_cheque_bank',
		array('name' => 'miscellaneous_fees_payment_cheque_bank',	     
	             'value' => 'BankMaster::model()->findByPk($data->miscellaneous_fees_payment_cheque_bank)->bank_short_name',
                     ),
		'miscellaneous_fees_payment_cheque_branch',
		
		//'miscellaneous_fees_payment_cheque_receipt_id',
		'miscellaneous_fees_payment_cheque_amount',

		array(
                'name'=>'miscellaneous_fees_payment_cheque_creation_date',
                //'type'=>'raw',		
                'value'=>'date_format(new DateTime($data->miscellaneous_fees_payment_cheque_creation_date), "d-m-Y")',
	        ),
		array(
			'name'=>'miscellaneous_fees_payment_cheque_receipt_id',
			'value'=>'MiscellaneousFeesReceipt::model()->findByPk($data->miscellaneous_fees_payment_cheque_receipt_id)->miscellaneous_fees_receipt_number',
		),
		/*
		'miscellaneous_fees_payment_cheque_status',
		'miscellaneous_fees_payment_cheque_student_id',
		'miscellaneous_fees_payment_cheque_receipt_id',
		*/
		/*array(
                'name'=>'miscellaneous_fees_payment_cheque_draft_status',		
                'value'=> '$data->miscellaneous_fees_payment_cheque_draft_status==1 ?  "By Cheque" : "By Draft"',

        	),*/
		array(
			'class'=>'MyCButtonColumn',

			'template' => '{update}{delete}{print_rec}',

			'buttons'=>array(
				'delete' => array(
		                        'label'=>'Delete', // text label of the button
					'url'=>'Yii::app()->createUrl("miscellaneousFeesPaymentCheque/delete", array("id"=>$data->miscellaneous_fees_payment_cheque_id))',
					),
		                'update' => array(
		                        'label'=>'Edit', // text label of the button
					'url'=>'Yii::app()->createUrl("miscellaneousFeesPaymentCheque/update", array("id"=>$data->miscellaneous_fees_payment_cheque_id))',
		                ),
				'print_rec' => array(
                                'label'=>'Print Receipt', // text label of the button
				'url'=>'Yii::app()->createUrl("miscellaneousFeesPaymentCheque/recpt_list", array("id"=>$data->miscellaneous_fees_payment_cheque_id))',
                                'imageUrl'=> Yii::app()->baseUrl.'/images/rs.png',  // image URL of the button. If not set or false, a text link is used
                               'options' => array('class'=>'fees-receipt', 'target'=>'_blank'),
				 // HTML options for the button

                        ),
			),
		),
	),
)); ?>

</div>
<!--
<div class="mise-grid-view">

<h4 class="final_view_doc">Payment By Draft</h4>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'miscellaneous-fees-payment-draft-grid',
	'dataProvider'=>$cheque_model->mydraftsearch(),
//	'filter'=>$model,
	'enableSorting'=>false,
	'columns'=>array(
	//	'miscellaneous_fees_payment_cheque_id',
		'miscellaneous_fees_payment_cheque_number',
		//'miscellaneous_fees_payment_cheque_date',
		array('name' => 'miscellaneous_fees_payment_cheque_date',		     
	              'value' => 'date_format(date_create($data->miscellaneous_fees_payment_cheque_date), "d-m-Y")',
                     ),
		//'miscellaneous_fees_payment_cheque_bank',
		array('name' => 'miscellaneous_fees_payment_cheque_bank',	     
	             'value' => 'BankMaster::model()->findByPk($data->miscellaneous_fees_payment_cheque_bank)->bank_short_name',
                     ),
		'miscellaneous_fees_payment_cheque_branch',
		'miscellaneous_fees_payment_cheque_amount',
		//'miscellaneous_fees_payment_cheque_receipt_id',
		array('name' => 'miscellaneous_fees_payment_draft_receipt',	     
	             'value' => '$data->miscellaneous_fees_payment_cheque_receipt_id',
                     ),
		
		array(
                'name'=>'miscellaneous_fees_payment_cheque_creation_date',
                //'type'=>'raw',		
                'value'=>'date_format(new DateTime($data->miscellaneous_fees_payment_cheque_creation_date), "d-m-Y")',
	        ),
		/*
		'miscellaneous_fees_payment_cheque_status',
		'miscellaneous_fees_payment_cheque_student_id',
		'miscellaneous_fees_payment_cheque_receipt_id',
		*/
		array(
			'class'=>'CButtonColumn',

			'template' => '{update}{delete}{print_rec}',
			'buttons'=>array(
				'delete' => array(
		                        'label'=>'Delete', // text label of the button
					'url'=>'Yii::app()->createUrl("miscellaneousFeesPaymentCheque/delete", array("id"=>$data->miscellaneous_fees_payment_cheque_id))',
					),
		                'update' => array(
		                        'label'=>'Update', // text label of the button
					'url'=>'Yii::app()->createUrl("miscellaneousFeesPaymentCheque/update", array("id"=>$data->miscellaneous_fees_payment_cheque_id))',
		                ),
				'print_rec' => array(
                                'label'=>'Print Receipt', // text label of the button
				'url'=>'Yii::app()->createUrl("miscellaneousFeesPaymentCheque/recpt_list", array("id"=>$data->miscellaneous_fees_payment_cheque_id))',
                                'imageUrl'=> Yii::app()->baseUrl.'/images/rs.png',  // image URL of the button. If not set or false, a text link is used
                               'options' => array('class'=>'fees-receipt', 'target'=>'_blank'), // HTML options for the button

                        ),
			),
		),
	),
)); ?>
</div>-->


