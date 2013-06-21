<style>
div.form fieldset {
    border: 1px solid #3B5998;
    border-radius: 7px 7px 7px 7px;
    margin: 0 0 10px 10px;
    padding: 10px;
    min-width:700px;
}
legend {
    color:#3B5998;  
    font-size:14px;
    font-weight:bold;
}
</style>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-transaction-form',
	'enableAjaxValidation'=>true,
	'focus'=>array($info,'title'),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	 'clientOptions'=>array('validateOnSubmit'=>true),
)); 

Yii::app()->clientScript->registerScript(
  'myHideEffect',
  '$(".flash-error").animate({opacity: 1.0}, 2000).fadeOut("slow");',
CClientScript::POS_READY
);
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
<?php
if(Yii::app()->user->hasFlash('photo-save')) { ?>
	<div class="flash-error">
		<?php echo Yii::app()->user->getFlash('photo-save');
		
	 ?>
		
	</div>
<?php } ?>
	<?php // echo $form->errorSummary(array($info,$model,$photo,$address,$lang)); ?>
<fieldset>
	<legend>Add Employee</legend>
<div class="row">
	<div class="row-left">
		<?php echo $form->labelEx($info,'title'); ?>   
		<?php echo $form->dropdownList($info,'title',$info->getTitleOptions(), array('empty' => 'Select Title')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'title'); ?>
	</div>
	<div class="row-right">
		<?php echo $form->labelEx($info,'employee_first_name'); ?>
<?php echo $form->textField($info,'employee_first_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($info,'employee_first_name'); ?>
	</div>
</div>
<div class="row">
	<div class="row-left">
              <?php echo $form->labelEx($info,'employee_middle_name'); ?>
              <?php echo $form->textField($info,'employee_middle_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($info,'employee_middle_name'); ?>
	</div>
	<div class="row-right">
             <?php echo $form->labelEx($info,'employee_last_name'); ?>
               <?php echo $form->textField($info,'employee_last_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_last_name'); ?>
	</div>
</div>
<div class="row">
	<div class="row-left">
		<?php echo $form->labelEx($info,'employee_name_alias'); ?>
              <?php echo $form->textField($info,'employee_name_alias',array('size'=>13)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_name_alias'); ?>
	</div>
	<div class="row-right">
		 <?php echo $form->labelEx($info,'employee_attendance_card_id'); ?>
	       	<?php echo $form->textField($info,'employee_attendance_card_id',array('size'=>13)); ?><span class="status">&nbsp;</span>
	       	<?php echo $form->error($info,'employee_attendance_card_id'); ?>
		</div>
</div>
<div class="row">
	<div class="row-left">
		<?php  echo $form->labelEx($info,'employee_joining_date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model'=>$info, 
		    'attribute'=>'employee_joining_date',
		    'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'showAnim' =>'slide',
			'maxDate'=>0,
			'yearRange'=>'1900:'.(date('Y')+1),
			'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
			'htmlOptions'=>array(
			'size'=>13,
			'readonly'=>true,
		    ),
			
		));
	?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'employee_joining_date'); ?>
	</div>
	<div class="row-right">
		<?php echo $form->labelEx($info,'employee_type'); ?>
		<?php echo $form->dropDownList($info,'employee_type',array(""=>"Select Type","1"=>"Teaching","0"=>"Non Teaching")); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'employee_type'); ?>
	</div>
</div>
<div class="row">
	<div class="row-left">
	      <?php echo $form->labelEx($model,'employee_transaction_designation_id'); ?>
	      <?php echo $form->dropDownList($model,'employee_transaction_designation_id',EmployeeDesignation::items(), array('empty' => 'Select Designation')); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($model,'employee_transaction_designation_id'); ?>
	</div>

	<div class="row-right">
	      <?php echo $form->labelEx($model,'employee_transaction_department_id'); ?>
	      <?php echo $form->dropDownList($model,'employee_transaction_department_id',Department::items(), array('empty' => 'Select Department')); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($model,'employee_transaction_department_id'); ?>
	</div>
</div>
<div class="row">
	<div class="row-left">
	      <?php echo $form->labelEx($model,'employee_transaction_shift_id'); ?>
	      <?php echo $form->dropDownList($model,'employee_transaction_shift_id',Shift::items(), array('empty' => 'Select Shift')); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($model,'employee_transaction_shift_id'); ?>
	</div>
	<div class="row-left">
	      <?php echo $form->labelEx($info,'employee_private_mobile'); ?>
               <?php echo $form->textField($info,'employee_private_mobile',array('size'=>13)); ?><span class="status">&nbsp;</span>
               <?php echo $form->error($info,'employee_private_mobile'); ?>
	</div>
</div>
<div class="row">
		<div class="row-left">
		      <?php echo $form->labelEx($info,'employee_private_email'); ?>
		      <?php echo $form->textField($user,'user_organization_email_id',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($user,'user_organization_email_id'); ?>
		</div>
</div>
<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save', array('class'=>'submit')); ?>
	
</div>
</fieldset>
<?php $this->endWidget(); ?>

</div><!-- form -->

