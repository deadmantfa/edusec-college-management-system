<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<!--<div class="row">
		<?php echo $form->label($model,'division_id'); ?>
		<?php echo $form->textField($model,'division_id'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->label($model,'division_name'); ?>
		<?php echo $form->textField($model,'division_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'division_organization_id'); ?>
		<?php echo $form->textField($model,'division_organization_id'); ?>
	</div>

	<!--<div class="row">
		<?php echo $form->label($model,'division_created_by'); ?>
		<?php echo $form->textField($model,'division_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'division_creation_date'); ?>
		<?php echo $form->textField($model,'division_creation_date'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
