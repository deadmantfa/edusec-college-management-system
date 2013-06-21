<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<!--
	<div class="row">
		<?php echo $form->label($model,'fees_master_id'); ?>
		<?php echo $form->textField($model,'fees_master_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_master_name'); ?>
		<?php echo $form->textField($model,'fees_master_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_master_created_by'); ?>
		<?php echo $form->textField($model,'fees_master_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_master_created_date'); ?>
		<?php echo $form->textField($model,'fees_master_created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_master_tally_id'); ?>
		<?php echo $form->textField($model,'fees_master_tally_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_organization_id'); ?>
		<?php echo $form->textField($model,'fees_organization_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fees_branch_id'); ?>
		<?php echo $form->textField($model,'fees_branch_id'); ?>
	</div>
-->
	<div class="row">
		<?php echo $form->label($model,'fees_academic_term_id'); ?>
		<?php //echo $form->textField($model,'fees_academic_term_id'); ?>
		<?php echo $form->dropDownList($model,'fees_academic_term_id',AcademicTermPeriod::items()); ?>
			 
	</div>
<!--
	<div class="row">
		<?php echo $form->label($model,'fees_quota_id'); ?>
		<?php echo $form->textField($model,'fees_quota_id'); ?>
	</div>
-->
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
