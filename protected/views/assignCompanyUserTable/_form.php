<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'assign-company-user-table-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'assign_user_id'); ?>
		<?php
			if($model->scenario == 'insert') {
			echo $form->dropDownList($model,'assign_user_id', User :: items(), array('empty' => 'Select User')); ?><span class="status">&nbsp;</span>
			<?php }
			else
			echo User::model()->findByPk($model->assign_user_id)->user_organization_email_id;
			?>
			
		<?php echo $form->error($model,'assign_user_id'); ?>
	</div>

<!--	<div class="row">
		<?php echo $form->labelEx($model,'assign_role_id'); ?>
		<?php echo $form->dropDownList($model,'assign_role_id', RoleMaster :: items(), array('empty' => '-----------Select---------')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'assign_role_id'); ?>
	</div>
-->
	<div class="row">
		<?php echo $form->labelEx($model,'assign_org_id'); ?>
		<?php echo $form->dropDownList($model,'assign_org_id', Organization :: items(), array('empty' => 'Select Organization')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'assign_org_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
