<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'miscellaneous_trans_id'); ?>
		<?php echo $form->textField($model,'miscellaneous_trans_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'miscellaneous_fees_id'); ?>
		<?php echo $form->textField($model,'miscellaneous_fees_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_fees_id'); ?>
		<?php echo $form->textField($model,'student_fees_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Amount'); ?>
		<?php echo $form->textField($model,'Amount'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->