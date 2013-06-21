<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'fees_receipt_id'); ?>
		<?php echo $form->textField($model,'fees_receipt_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_receipt_number'); ?>
		<?php echo $form->textField($model,'fees_receipt_number'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->