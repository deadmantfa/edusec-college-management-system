<div class = "test" style="display:none;">
<?php        
if($model->scenario == 'insert')
$name = "Add Shift";
else
$name = "Edit Shift";
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
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("shift/admin").'"; }'
	),
));
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'shift-form',
	'enableAjaxValidation'=>true,
	 'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row1">
		<?php echo $form->labelEx($model,'shift_type'); ?>
		<?php echo $form->textField($model,'shift_type',array('size'=>25,'maxlength'=>15),array('tabindex'=>1)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'shift_type'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'shift_start_time'); ?>
		<?php
		 $this->widget('application.extensions.jui_timepicker.JTimePicker', array(
		    'model'=>$model,
		     'attribute'=>'shift_start_time',
		     // additional javascript options for the date picker plugin
		     'options'=>array(
			 'showPeriod'=>true,
			 ),
		     'htmlOptions'=>array('size'=>8,'maxlength'=>4,'readonly'=>true),
		 ));
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'shift_start_time'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'shift_end_time'); ?>
		<?php
		 $this->widget('application.extensions.jui_timepicker.JTimePicker', array(
		    'model'=>$model,
		     'attribute'=>'shift_end_time',
		     // additional javascript options for the date picker plugin
		     'options'=>array(
			 'showPeriod'=>true,
			 ),
		     'htmlOptions'=>array('size'=>8,'maxlength'=>4,'readonly'=>true),
		 ));
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'shift_end_time'); ?>
	</div>
	<!--
	<div class="row1">
		<?php echo $form->labelEx($model,'shift_start_time'); ?>
		<?php echo $form->textField($model,'shift_start_time'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'shift_start_time'); ?>
	</div>

	<div class="row1">
		<?php echo $form->labelEx($model,'shift_end_time'); ?>
		<?php echo $form->textField($model,'shift_end_time'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'shift_end_time'); ?>
	</div>-->
<!--
	<div class="row1">
		<?php echo $form->labelEx($model,'shift_organization_id'); ?>
		<?php echo $form->dropDownList($model,'shift_organization_id', Organization :: items()); ?>
		<?php echo $form->error($model,'shift_organization_id'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'shift_created_by'); ?>
		<?php echo $form->textField($model,'shift_created_by'); ?>
		<?php echo $form->error($model,'shift_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shift_created_date'); ?>
		<?php echo $form->textField($model,'shift_created_date'); ?>
		<?php echo $form->error($model,'shift_created_date'); ?>
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
