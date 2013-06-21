<div class = "test" style="display:none;">
<?php        
if($model->scenario == 'insert')
$name = "Add Performance Category";
else
$name = "Edit Performance Category";
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
		
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("feedbackCategoryMaster/admin").'"; }'
	),
));
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'feedback-category-master-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'feedback_category_name'); ?>
		<?php echo $form->textField($model,'feedback_category_name',array('size'=>25,'maxlength'=>25)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'feedback_category_name'); ?>
	</div>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'feedback_category_created_by'); ?>
		<?php echo $form->textField($model,'feedback_category_created_by'); ?>
		<?php echo $form->error($model,'feedback_category_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'feedback_category_creation_date'); ?>
		<?php echo $form->textField($model,'feedback_category_creation_date'); ?>
		<?php echo $form->error($model,'feedback_category_creation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'feedback_category_organizaton_id'); ?>
		<?php echo $form->textField($model,'feedback_category_organizaton_id'); ?>
		<?php echo $form->error($model,'feedback_category_organizaton_id'); ?>
	</div>
-->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
</div>
