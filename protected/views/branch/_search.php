<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<!--<div class="row">
		<?php echo $form->label($model,'branch_id'); ?>
		<?php echo $form->textField($model,'branch_id'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->label($model,'branch_name'); ?>
		<?php echo $form->textField($model,'branch_name',array('size'=>30,'maxlength'=>30)); ?>
	</div>
<br/>
	<div class="row">
		<?php echo $form->label($model,'branch_organization_id'); ?>
		<?php echo $form->textField($model,'branch_organization_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'branch_code'); ?>
		<?php echo $form->textField($model,'branch_code'); ?>
	</div>
	<!--<div class="row">
		<?php echo $form->label($model,'branch_created_by'); ?>
		<?php echo $form->textField($model,'branch_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'branch_creation_date'); ?>
		<?php echo $form->textField($model,'branch_creation_date'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
