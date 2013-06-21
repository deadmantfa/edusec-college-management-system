<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'fees_id'); ?>
		<?php echo $form->textField($model,'fees_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_master_id'); ?>
		<?php echo $form->textField($model,'fees_master_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_desc_id'); ?>
		<?php echo $form->textField($model,'fees_desc_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->