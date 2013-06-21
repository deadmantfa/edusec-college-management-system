<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'student_fees_master_id'); ?>
		<?php echo $form->textField($model,'student_fees_master_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_fees_master_student_transaction_id'); ?>
		<?php echo $form->textField($model,'student_fees_master_student_transaction_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_master_table_id'); ?>
		<?php echo $form->textField($model,'fees_master_table_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_fees_master_details_id'); ?>
		<?php echo $form->textField($model,'student_fees_master_details_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_details_amount'); ?>
		<?php echo $form->textField($model,'fees_details_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_fees_master_org_id'); ?>
		<?php echo $form->textField($model,'student_fees_master_org_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_fees_master_created_by'); ?>
		<?php echo $form->textField($model,'student_fees_master_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_fees_master_creation_date'); ?>
		<?php echo $form->textField($model,'student_fees_master_creation_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->