<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fees-payment-transaction-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fees_student_id'); ?>
		<?php echo $form->textField($model,'fees_student_id'); ?>
		<?php echo $form->error($model,'fees_student_id'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->



