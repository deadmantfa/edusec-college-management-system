<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<!--
	<div class="row">
		<?php echo $form->label($model,'student_archive_id'); ?>
		<?php echo $form->textField($model,'student_archive_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_archive_stud_tran_id'); ?>
		<?php echo $form->textField($model,'student_archive_stud_tran_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_archive_stud_id'); ?>
		<?php echo $form->textField($model,'student_archive_stud_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_archive_ac_t_p_id'); ?>
		<?php echo $form->textField($model,'student_archive_ac_t_p_id'); ?>
	</div>
-->

	<div class="row">
		<?php echo $form->labelEx($model,'student_archive_branch_id'); ?>
		<?php echo $form->dropDownList($model,'student_archive_branch_id',CHtml::listData(Branch::model()->findAll(array('condition'=>'branch_organization_id='.Yii::app()->user->getState('org_id'))),'branch_id','branch_name'),array('empty' => 'Select Branch','tabindex'=>1));?>
		<?php echo $form->error($model,'student_archive_branch_id'); ?>
	</div>

	<div class="row">
        <?php echo $form->labelEx($model,'student_archive_ac_t_p_id'); ?>
	<?php
			echo $form->dropDownList($model,'student_archive_ac_t_p_id',AcademicTermPeriod::items(),
			array(
			'prompt' => 'Select Year','tabindex'=>2,
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/getStudentArchiveAcademicTerm'), 
			'update'=>'#StudentArchiveTable_student_archive_ac_t_n_id', //selector to update
			
			))); 
			 
			?><span class="status">&nbsp;</span>
        <?php echo $form->error($model,'student_archive_ac_t_p_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_archive_ac_t_n_id'); ?>
		<?php echo $form->dropDownList($model,'student_archive_ac_t_n_id',array()); ?>
	</div>

<!--
	<div class="row">
		<?php echo $form->label($model,'student_archive_status'); ?>
		<?php echo $form->textField($model,'student_archive_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_archive_created_by'); ?>
		<?php echo $form->textField($model,'student_archive_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_archive_creation_date'); ?>
		<?php echo $form->textField($model,'student_archive_creation_date'); ?>
	</div>
-->
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
