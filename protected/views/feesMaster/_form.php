<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fees-master-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fees_master_name'); ?>
		<?php echo $form->textField($model,'fees_master_name',array('size'=>30,'maxlength'=>30)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_master_name'); ?>
	</div>

<!--
	<div class="row">
		<?php echo $form->labelEx($model,'fees_master_created_by'); ?>
		<?php echo $form->textField($model,'fees_master_created_by'); ?>
		<?php echo $form->error($model,'fees_master_created_by'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'fees_master_created_date'); ?>
		<?php echo $form->textField($model,'fees_master_created_date'); ?>
		<?php echo $form->error($model,'fees_master_created_date'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'fees_master_tally_id'); ?>
		<?php echo $form->textField($model,'fees_master_tally_id'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_master_tally_id'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'fees_organization_id'); ?>
		<?php echo $form->textField($model,'fees_organization_id'); ?>
		<?php echo $form->error($model,'fees_organization_id'); ?>
	</div>
-->
	<div class="row">
		<?php echo $form->labelEx($model,'fees_branch_id'); ?>
	        <?php echo $form->dropDownList($model,'fees_branch_id',Branch::items(), array('empty' => 'Select Branch')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_branch_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fees_academic_term_id'); ?>
	        <?php //echo $form->dropDownList($model,'fees_academic_term_id',AcademicTermPeriod::items(), array('empty' => '----------Select--------')); ?>
		<?php
			echo $form->dropDownList($model,'fees_academic_term_id',AcademicTermPeriod::items(),
			array(
			'prompt' => 'Select Year',
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/getFeesmasterItemName'), 
			'update'=>'#FeesMaster_fees_academic_term_name_id', //selector to update
			))); 
			 
			?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_academic_term_id'); ?>
	</div>
      
	<div class="row">
		<?php echo $form->labelEx($model,'fees_academic_term_name_id'); ?>
	        <?php //echo $form->dropDownList($model,'fees_academic_term_name_id',array()); ?>
		<?php 
			
			if(isset($model->fees_academic_term_name_id))
				echo $form->dropDownList($model,'fees_academic_term_name_id', CHtml::listData(AcademicTerm::model()->findAll(array('condition'=>'academic_term_id='.$model->fees_academic_term_name_id)), 'academic_term_id', 'academic_term_name'));
			else
				echo $form->dropDownList($model,'fees_academic_term_name_id',array()); 
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_academic_term_name_id'); ?>
	</div>	
	
	<div class="row">
		<?php echo $form->labelEx($model,'fees_quota_id'); ?>
	        <?php echo $form->dropDownList($model,'fees_quota_id',Quota::items(), array('empty' => 'Select Quota')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_quota_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'submit','name'=>'generate')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
