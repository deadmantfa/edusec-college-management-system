<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-fees-master-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'student_fees_master_student_transaction_id'); ?>
		<?php echo $form->textField($model,'student_fees_master_student_transaction_id'); ?>
		<?php echo $form->error($model,'student_fees_master_student_transaction_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fees_master_table_id'); ?>
		<?php echo $form->textField($model,'fees_master_table_id'); ?>
		<?php echo $form->error($model,'fees_master_table_id'); ?>
	</div>
-->

	<div class="row">
		<?php echo $form->labelEx($model,'student_fees_master_details_id'); ?>
		<?php echo FeesDetailsMaster::model()->findByPk($model->student_fees_master_details_id)->fees_details_master_name;?>
		<?php echo $form->error($model,'student_fees_master_details_id'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'fees_details_amount'); ?>
		<?php echo $form->textField($model,'fees_details_amount'); ?>
		<?php echo $form->error($model,'fees_details_amount'); ?>
	</div>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'student_fees_master_org_id'); ?>
		<?php echo $form->textField($model,'student_fees_master_org_id'); ?>
		<?php echo $form->error($model,'student_fees_master_org_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_fees_master_created_by'); ?>
		<?php echo $form->textField($model,'student_fees_master_created_by'); ?>
		<?php echo $form->error($model,'student_fees_master_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_fees_master_creation_date'); ?>
		<?php echo $form->textField($model,'student_fees_master_creation_date'); ?>
		<?php echo $form->error($model,'student_fees_master_creation_date'); ?>
	</div>
-->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
