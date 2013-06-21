<div class = "test" style="display:none;">
<?php        

if($model->scenario == 'insert')
$name = "Add Branch";
else
$name = "Edit Branch";

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
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("branch/admin").'"; }'

	),
));
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'branch-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); 
	
?>
	<?php echo $form->error($model,'branch_name'); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'branch_name'); ?>		
		<?php echo $form->textField($model,'branch_name',array('size'=>25,'maxlength'=>60)); ?><span class="status">&nbsp;</span>
	</div>
		
	<div class="row">
		<?php echo $form->labelEx($model,'branch_tag_id'); ?>
		<?php echo $form->error($model,'branch_tag_id'); ?>
		<?php echo $form->dropDownList($model,'branch_tag_id',BranchPassoutsemTagTable::items(), array('empty' => 'Select Branch Tag')) ?><span class="status">&nbsp;</span>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'branch_alias'); ?>
		<?php echo $form->textField($model,'branch_alias',array('size'=>25,'maxlength'=>20)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'branch_alias'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'branch_code'); ?>
		<?php echo $form->textField($model,'branch_code',array('size'=>5,'maxlength'=>5)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'branch_code'); ?>
	</div>
	<!--	<div class="row1">
		<?php echo $form->labelEx($model,'branch_organization_id'); ?>
		<?php echo $form->dropDownList($model,'branch_organization_id',Organization :: items()); ?>
		<?php echo $form->error($model,'branch_organization_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'branch_created_by'); ?>
		<?php echo $form->textField($model,'branch_created_by'); ?>
		<?php echo $form->error($model,'branch_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'branch_creation_date'); ?>
		<?php echo $form->textField($model,'branch_creation_date'); ?>
		<?php echo $form->error($model,'branch_creation_date'); ?>
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
