<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fees-payment-cash-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
				'validateOnSubmit'=>true,
			      ),
)); ?>



	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fees_payment_cash_amount'); ?>
		<?php echo $form->textField($model,'fees_payment_cash_amount'); ?>
		<?php echo $form->error($model,'fees_payment_cash_amount'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
