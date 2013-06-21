<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'block_user_id'); ?>
		<?php echo $form->textField($model,'block_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_table_user_id'); ?>
		<?php echo $form->textField($model,'user_table_user_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->