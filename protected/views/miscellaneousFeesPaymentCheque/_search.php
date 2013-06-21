<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'miscellaneous_fees_payment_cheque_id'); ?>
		<?php echo $form->textField($model,'miscellaneous_fees_payment_cheque_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'miscellaneous_fees_payment_cheque_number'); ?>
		<?php echo $form->textField($model,'miscellaneous_fees_payment_cheque_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'miscellaneous_fees_payment_cheque_date'); ?>
		<?php echo $form->textField($model,'miscellaneous_fees_payment_cheque_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'miscellaneous_fees_payment_cheque_bank'); ?>
		<?php echo $form->textField($model,'miscellaneous_fees_payment_cheque_bank'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'miscellaneous_fees_payment_cheque_branch'); ?>
		<?php echo $form->textField($model,'miscellaneous_fees_payment_cheque_branch',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'miscellaneous_fees_payment_cheque_amount'); ?>
		<?php echo $form->textField($model,'miscellaneous_fees_payment_cheque_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'miscellaneous_fees_payment_cheque_status'); ?>
		<?php echo $form->textField($model,'miscellaneous_fees_payment_cheque_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'miscellaneous_fees_payment_cheque_student_id'); ?>
		<?php echo $form->textField($model,'miscellaneous_fees_payment_cheque_student_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'miscellaneous_fees_payment_cheque_receipt_id'); ?>
		<?php echo $form->textField($model,'miscellaneous_fees_payment_cheque_receipt_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->