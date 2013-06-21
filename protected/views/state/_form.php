<div class = "test" style="display:none;">
<?php        
if($model->scenario == 'insert')
$name = "Add State";
else
$name = "Edit State";
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>$name,
		'autoOpen'=>true,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>300,
                'resizable'=>false,
                'draggable'=>false,
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("state/admin").'"; }'
	),
));
?>



<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'state-form',
	'enableAjaxValidation'=>true,
	 'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'state_name'); ?>
		<?php echo $form->error($model,'state_name'); ?>
		<?php echo $form->textField($model,'state_name',array('size'=>22,'maxlength'=>60)); ?><span class="status">&nbsp;</span>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country_id'); ?>
		<?php //echo $form->textField($model,'country_id',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->dropDownList($model,'country_id', Country::items(), array('empty' => 'Select Country')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'country_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
</div>
