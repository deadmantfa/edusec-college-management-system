<div class = "test" style="display:none;">
<?php
if($model->scenario == 'insert')
$name = "Add Quota";
else
$name = "Edit Quota";        

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
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("quota/admin").'"; }'
	),
));
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'quota-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row1">
		<?php echo $form->labelEx($model,'quota_name'); ?>
		<?php echo $form->textField($model,'quota_name',array('size'=>25,'maxlength'=>60)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'quota_name'); ?>
	</div>

	<!--<div class="row1">
		<?php echo $form->labelEx($model,'quota_organization_id'); ?>
		<?php echo $form->dropDownList($model,'quota_organization_id', Organization :: items()); ?>
		<?php echo $form->error($model,'quota_organization_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'quota_created_by'); ?>
		<?php echo $form->textField($model,'quota_created_by'); ?>
		<?php echo $form->error($model,'quota_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'quota_created_date'); ?>
		<?php echo $form->textField($model,'quota_created_date'); ?>
		<?php echo $form->error($model,'quota_created_date'); ?>
	</div>-->
<br/>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
</div>
