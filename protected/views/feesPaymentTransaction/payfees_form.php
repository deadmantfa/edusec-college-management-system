<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Cash Details',
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
	'id'=>'fees-payment-cash-form',
	'enableAjaxValidation'=>true,
)); ?>



	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($pay_cash); ?>

	<div class="row">
		<?php echo $form->labelEx($pay_cash,'fees_payment_cash_amount'); ?>
		<?php echo $form->textField($pay_cash,'fees_payment_cash_amount'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($pay_cash,'fees_payment_cash_amount'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($pay_cash->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
