<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'miscellaneous-fees-receipt-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'miscellaneous_fees_receipt_number'); ?>
		<?php echo $form->textField($model,'miscellaneous_fees_receipt_number'); ?>
		<?php echo $form->error($model,'miscellaneous_fees_receipt_number'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->