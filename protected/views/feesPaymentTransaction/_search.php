<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'fees_payment_transaction_id'); ?>
		<?php echo $form->textField($model,'fees_payment_transaction_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_master_id'); ?>
		<?php echo $form->textField($model,'fees_master_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_payment_method_id'); ?>
		<?php echo $form->textField($model,'fees_payment_method_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_payment_cash_cheque_id'); ?>
		<?php echo $form->textField($model,'fees_payment_cash_cheque_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_receipt_id'); ?>
		<?php echo $form->textField($model,'fees_receipt_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_payment'); ?>
		<?php echo $form->textField($model,'fees_payment'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_received_user_id'); ?>
		<?php echo $form->textField($model,'fees_received_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_full_part_payment_id'); ?>
		<?php echo $form->textField($model,'fees_full_part_payment_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_student_id'); ?>
		<?php echo $form->textField($model,'fees_student_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->