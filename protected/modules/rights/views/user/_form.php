<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_organization_email_id'); ?>
		<?php echo $form->textField($model,'user_organization_email_id',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'user_organization_email_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_password'); ?>
		<?php echo $form->textField($model,'user_password',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'user_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_type'); ?>
		<?php echo $form->textField($model,'user_type',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'user_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_created_by'); ?>
		<?php echo $form->textField($model,'user_created_by'); ?>
		<?php echo $form->error($model,'user_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_creation_date'); ?>
		<?php echo $form->textField($model,'user_creation_date'); ?>
		<?php echo $form->error($model,'user_creation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_organization_id'); ?>
		<?php echo $form->textField($model,'user_organization_id'); ?>
		<?php echo $form->error($model,'user_organization_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->