<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'miscellaneous_fees_payment_cash_id'); ?>
		<?php echo $form->textField($model,'miscellaneous_fees_payment_cash_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'miscellaneous_fees_payment_cash_amount'); ?>
		<?php echo $form->textField($model,'miscellaneous_fees_payment_cash_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'miscellaneous_fees_payment_cash_student_id'); ?>
		<?php echo $form->textField($model,'miscellaneous_fees_payment_cash_student_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'miscellaneous_fees_payment_cash_receipt_id'); ?>
		<?php echo $form->textField($model,'miscellaneous_fees_payment_cash_receipt_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->