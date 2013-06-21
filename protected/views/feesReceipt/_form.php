<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fees-receipt-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fees_receipt_number'); ?>
		<?php echo $form->textField($model,'fees_receipt_number'); ?>
		<?php echo $form->error($model,'fees_receipt_number'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->