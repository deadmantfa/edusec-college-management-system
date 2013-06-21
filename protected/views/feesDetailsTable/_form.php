<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fees-details-table-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fees_details_name'); ?>
		<?php echo $form->textField($model,'fees_details_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'fees_details_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fees_details_amount'); ?>
		<?php echo $form->textField($model,'fees_details_amount'); ?>
		<?php echo $form->error($model,'fees_details_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fees_details_created_by'); ?>
		<?php echo $form->textField($model,'fees_details_created_by'); ?>
		<?php echo $form->error($model,'fees_details_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fees_details_created_date'); ?>
		<?php echo $form->textField($model,'fees_details_created_date'); ?>
		<?php echo $form->error($model,'fees_details_created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fees_details_tally_id'); ?>
		<?php echo $form->textField($model,'fees_details_tally_id'); ?>
		<?php echo $form->error($model,'fees_details_tally_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
