<div class = "test" style="display:none;">
<?php        
if($model->scenario == 'insert')
$name = "Add Bank";
else
$name = "Edit Bank";
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>$name,
		'autoOpen'=>true,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>480,
                'resizable'=>false,
                'draggable'=>false,
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("bankMaster/admin").'"; }'
	),
));
?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bank-master-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'bank_full_name'); ?>
		<?php echo $form->error($model,'bank_full_name'); ?>
		<?php echo $form->textField($model,'bank_full_name',array('size'=>25,'maxlength'=>60)); ?><span class="status">&nbsp;</span>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bank_short_name'); ?>
		<?php echo $form->textField($model,'bank_short_name',array('size'=>25,'maxlength'=>15)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'bank_short_name'); ?>
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
