<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'block-user-table-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_table_user_id'); ?>
		<?php echo $form->dropDownList($model,'user_table_user_id', User :: items()); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'user_table_user_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
