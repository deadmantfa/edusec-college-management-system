<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'fees_details_id'); ?>
		<?php echo $form->textField($model,'fees_details_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_details_name'); ?>
		<?php echo $form->textField($model,'fees_details_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_details_amount'); ?>
		<?php echo $form->textField($model,'fees_details_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_details_created_by'); ?>
		<?php echo $form->textField($model,'fees_details_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_details_created_date'); ?>
		<?php echo $form->textField($model,'fees_details_created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_details_tally_id'); ?>
		<?php echo $form->textField($model,'fees_details_tally_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->