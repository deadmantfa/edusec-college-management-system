<?php
$this->breadcrumbs=array(
	'Chart Report',
);
/*
$this->menu=array(
	array('label'=>'', 'url'=>array('studentwise_report'),'linkOptions'=>array('class'=>'Create','title'=>'Studentwise Report')),
);*/
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attendence-form',
	'enableAjaxValidation'=>true,

)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	
	<?php echo $form->errorSummary($model); ?>
		
	
	<div class="row">
		<?php echo $form->labelEx($model,'sem_id'); ?>
		<?php echo $form->dropDownList($model,'sem_id',AcademicTermPeriod::items(), array('empty' => 'Select Year','tabindex'=>1)); ?>
		
	</div>
	<div class="row buttons">
		<?php echo CHtml::button('Select', array('class'=>'submit','submit' => array('ChartReport'),'tabindex'=>2)); ?>
	</div>
	

<?php $this->endWidget(); ?>

</div><!-- form -->



