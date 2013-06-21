<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'feedback_details_table_id'); ?>
		<?php echo $form->textField($model,'feedback_details_table_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'feedback_details_table_student_id'); ?>
		<?php echo $form->textField($model,'feedback_details_table_student_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'feedback_category_master_id'); ?>
		<?php echo $form->textField($model,'feedback_category_master_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'feedback_details_remarks'); ?>
		<?php echo $form->textField($model,'feedback_details_remarks',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'feedback_details_table_created_by'); ?>
		<?php echo $form->textField($model,'feedback_details_table_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'feedback_details_table_creation_date'); ?>
		<?php echo $form->textField($model,'feedback_details_table_creation_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->