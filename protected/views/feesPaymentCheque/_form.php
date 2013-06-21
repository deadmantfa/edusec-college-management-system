<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fees-payment-cheque-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fees_payment_cheque_number'); ?>
		<?php echo $form->textField($model,'fees_payment_cheque_number',array('size'=>6,'maxlength'=>6)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_payment_cheque_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fees_payment_cheque_date'); ?>
		<?php echo $form->textField($model,'fees_payment_cheque_date'); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_payment_cheque_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fees_payment_cheque_bank'); ?>
		<?php echo $form->dropdownList($model,'fees_payment_cheque_bank', BankMaster::items, array('empty' => '-----------Select---------')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_payment_cheque_bank'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fees_payment_cheque_amount'); ?>
		<?php echo $form->textField($model,'fees_payment_cheque_amount'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_payment_cheque_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fees_payment_cheque_status'); ?>
		<?php echo $form->textField($model,'fees_payment_cheque_status'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_payment_cheque_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
