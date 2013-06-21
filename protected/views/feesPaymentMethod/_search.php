<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'fees_payment_method_id'); ?>
		<?php echo $form->textField($model,'fees_payment_method_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_payment_method_name'); ?>
		<?php echo $form->textField($model,'fees_payment_method_name',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->