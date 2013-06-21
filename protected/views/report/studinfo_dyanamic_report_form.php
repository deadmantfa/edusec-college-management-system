<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'studentinfo-form',
	'enableAjaxValidation'=>true,

)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="block-error">
		<?php echo Yii::app()->user->getFlash('no_student_found'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_transaction_branch_id'); ?>
		<?php echo $form->dropDownList($model,'student_transaction_branch_id',Branch::items(), array('empty' => 'Select Branch','tabindex'=>1)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_transaction_branch_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'student_academic_term_period_tran_id'); ?>
		<?php echo $form->dropDownList($model,'student_academic_term_period_tran_id',AcademicTermPeriod::items(), array('empty' => 'Select Year','tabindex'=>2)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_academic_term_period_tran_id'); ?>
	</div>



<div class="row buttons">
	<?php echo CHtml::submitButton('Search', array('class'=>'submit','name'=>'search','tabindex'=>3)); ?>
</div>

<?php		
	if($branch && $acdm_period)
	echo $this->renderPartial('criteria_selection_form', array('model'=>$model,'branch'=>$branch,'acdm_period'=>$acdm_period));

	

?>
<?php $this->endWidget(); ?>
</div>
