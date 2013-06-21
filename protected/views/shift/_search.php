<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<!--<div class="row">
		<?php echo $form->label($model,'shift_id'); ?>
		<?php echo $form->textField($model,'shift_id'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->label($model,'shift_type'); ?>
		<?php echo $form->textField($model,'shift_type',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shift_organization_id'); ?>
		<?php echo $form->textField($model,'shift_organization_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shift_start_time'); ?>
		<?php echo $form->textField($model,'shift_start_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shift_end_time'); ?>
		<?php echo $form->textField($model,'shift_end_time'); ?>
	</div>

	<!--<div class="row">
		<?php echo $form->label($model,'shift_created_by'); ?>
		<?php echo $form->textField($model,'shift_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shift_created_date'); ?>
		<?php echo $form->textField($model,'shift_created_date'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
