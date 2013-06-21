<div class = "test" style="display:none;">
<?php        
if($model->scenario == 'insert')
$name = "Add Division";
else
$name = "Edit Division";
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
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("division/admin").'"; }'
	),
));
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'division-form',
	'enableAjaxValidation'=>true,
	 'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'division_name'); ?>
		<?php echo $form->error($model,'division_name'); ?>
		<?php echo $form->textField($model,'division_name',array('size'=>25,'maxlength'=>60)); ?><span class="status">&nbsp;</span>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'branch_id'); ?>
		<?php echo $form->error($model,'branch_id'); ?>
		<?php echo $form->dropDownList($model,'branch_id',Branch::code(), array('empty' => 'Select Branch')) ?><span class="status">&nbsp;</span>
	</div>
<?php //echo $form->dropDownList($model,'client_1_age', CHtml::listData(FormFields::model()->findAll(), 'value', 'value'), array('empty'=>'Select age')) ?>
<div class="row">
		<?php echo $form->labelEx($model,'academic_period_id'); ?>
		
		<?php
			echo $form->dropDownList($model,'academic_period_id',AcademicTermPeriod::items(),
			array(
			'prompt' => 'Select Year',
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/getDivisionItemName'), 
			'update'=>'#Division_academic_name_id', //selector to update
			))); 
			 
			?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'academic_period_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'academic_name_id'); ?>
		
		<?php 
			
			if(isset($model->academic_name_id))
				echo $form->dropDownList($model,'academic_name_id', CHtml::listData(AcademicTerm::model()->findAll(array('condition'=>'academic_term_period_id='.$model->academic_period_id)), 'academic_term_id', 'academic_term_name'),array(
			'empty' => 'Select Semester'));
			else
				echo $form->dropDownList($model,'academic_name_id',array(),array(
			'empty' => 'Select Semester')); 
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'academic_name_id'); ?>
	</div>	

<!--	<div class="row">
		<?php echo $form->labelEx($model,'division_organization_id'); ?>
		<?php echo $form->dropDownList($model,'division_organization_id', Organization :: items()); ?>
		<?php echo $form->error($model,'division_organization_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'division_created_by'); ?>
		<?php echo $form->textField($model,'division_created_by'); ?>
		<?php echo $form->error($model,'division_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'division_creation_date'); ?>
		<?php echo $form->textField($model,'division_creation_date'); ?>
		<?php echo $form->error($model,'division_creation_date'); ?>
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
