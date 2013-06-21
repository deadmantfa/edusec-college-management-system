<?php        
if($model->scenario == 'insert')
$name = "Add Education Board";
else
$name = "Edit Education Board";
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
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("eduboard/admin").'"; }'
	),
));
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'eduboard-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row1">
		<?php echo $form->labelEx($model,'eduboard_name'); ?>
		<?php echo $form->textField($model,'eduboard_name',array('size'=>25,'maxlength'=>30)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'eduboard_name'); ?>
	</div>
	<!--
	<div class="row1">
		<?php echo $form->labelEx($model,'eduboard_organization_id'); ?>
		<?php echo $form->dropDownList($model,'eduboard_organization_id', Organization :: items()); ?>
		<?php echo $form->error($model,'eduboard_organization_id'); ?>
	</div>
	-->
	<!--<div class="row">
		<?php echo $form->labelEx($model,'eduboard_created_by'); ?>
		<?php echo $form->textField($model,'eduboard_created_by'); ?>
		<?php echo $form->error($model,'eduboard_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eduboard_created_date'); ?>
		<?php echo $form->textField($model,'eduboard_created_date'); ?>
		<?php echo $form->error($model,'eduboard_created_date'); ?>
	</div>-->
<br/>
	<div class="row1 buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
