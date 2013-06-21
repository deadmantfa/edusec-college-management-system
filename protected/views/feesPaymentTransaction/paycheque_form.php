<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Cheque Details',
		'autoOpen'=>true,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>500,
                'resizable'=>false,
                'draggable'=>false,
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("feesPaymentTransaction/create/".$_REQUEST['student_id']).'"; }'
	),
));
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fees-payment-cheque-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($pay_cheque); ?>

	<div class="row">
		<?php echo $form->labelEx($pay_cheque,'fees_payment_cheque_number'); ?>
		<?php echo $form->textField($pay_cheque,'fees_payment_cheque_number',array('size'=>20,'maxlength'=>6)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($pay_cheque,'fees_payment_cheque_number'); ?>
	</div>
		<div class="row">
		<?php echo $form->labelEx($pay_cheque,'fees_payment_cheque_date'); ?>
		
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model'=>$pay_cheque, 
		    'attribute'=>'fees_payment_cheque_date',
		    'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'showAnim' =>'slide',
			'yearRange'=>'1900:'.(date('Y')+1),
			'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
			'htmlOptions'=>array(
			'style'=>'width:80px;vertical-align:top',
			'readonly'=>true,
		    ),
			
		));
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($pay_cheque,'fees_payment_cheque_date'); ?>
		</div>

	<div class="row">
		<?php echo $form->labelEx($pay_cheque,'fees_payment_cheque_bank'); ?>
		<?php echo $form->dropdownList($pay_cheque,'fees_payment_cheque_bank', BankMaster::items(),array('empty' => 'Select Bank')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($pay_cheque,'fees_payment_cheque_bank'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($pay_cheque,'fees_payment_cheque_branch'); ?>
		<?php echo $form->textField($pay_cheque,'fees_payment_cheque_branch'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($pay_cheque,'fees_payment_cheque_branch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($pay_cheque,'fees_payment_cheque_amount'); ?>
		<?php echo $form->textField($pay_cheque,'fees_payment_cheque_amount'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($pay_cheque,'fees_payment_cheque_amount'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($pay_cheque->isNewRecord ? 'Add' : 'Save', array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
