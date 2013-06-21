<div class = "test" style="display:none;">
<?php        
if($model->scenario == 'insert')
$name = "Add Miscellaneous Fees";
else
$name = "Edit Miscellaneous Fees";
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
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("miscellaneousFeesMaster/admin").'"; }'
	),
));
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'miscellaneous-fees-master-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'miscellaneous_fees_name'); ?>
		<?php echo $form->error($model,'miscellaneous_fees_name'); ?>
		<?php echo $form->textField($model,'miscellaneous_fees_name',array('size'=>25,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
	</div>

	<!--<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creation_date'); ?>
		<?php echo $form->textField($model,'creation_date'); ?>
		<?php echo $form->error($model,'creation_date'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save', array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
</div>
