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
<script>
$(document).ready(function() {
$('#StudentTransaction_student_academic_term_name_id').change(function () {
	$('#StudentTransaction_student_transaction_branch_id').val(" ");
	$('#StudentTransaction_student_transaction_division_id').val(" ");
	$('#StudentTransaction_student_transaction_batch_id').val(" ");	
});
});
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-transaction-form',
	'enableAjaxValidation'=>true,
	'focus'=>array($info,'student_roll_no'),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),

)); ?>
 
<fieldset>
	<legend>Add Student</legend>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
  	<?php echo $form->error($info,'student_enroll_no'); ?>

	<div class="row">
		<?php $org_id=Yii::app()->user->getState('org_id'); ?>    
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_roll_no'); ?>   
			<?php echo $form->textField($info,'student_roll_no',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_roll_no'); ?>
		</div>
		
		<div class="row-right">
			<?php echo $form->labelEx($info,'student_enroll_no'); ?>
			<?php echo $form->textField($info,'student_enroll_no',array('size'=>13)); ?><span class="status">&nbsp;</span>
		</div>		
	</div>

	<div class="row">
		<div class="row-left">
		  	<?php echo $form->labelEx($info,'student_adm_date'); 
			?>
			<?php if($info->student_adm_date != '')
				$info->student_adm_date= date('d-m-Y',strtotime($info->student_adm_date));
			
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    	'model'=>$info, 
				'attribute'=>'student_adm_date',
			    	'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'maxDate'=>0,
				'showAnim' =>'slide',
				'yearRange'=>'1900:'.(date('Y')+1),
				'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
			    	),
				'htmlOptions'=>array(
				'style'=>'width:165px;vertical-align:top',
				'readonly'=>true,
			    	),
			));
			?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_adm_date'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($info,'student_dtod_regular_status'); ?>   
			<?php echo $form->dropdownList($info,'student_dtod_regular_status',$info->getStatusOptions(), array('empty' => 'Select Status')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_dtod_regular_status'); ?>
		</div>
		
	</div>

	<div class="row"> 
		<div class="row-left">
			<?php echo $form->labelEx($info,'title'); ?>   
			<?php echo $form->dropdownList($info,'title',$info->getTitleOptions(), array('empty' => 'Select Title')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'title'); ?>
		</div>  
	    	<div class="row-right">   
			<?php echo $form->labelEx($info,'student_first_name'); ?>
			<?php echo $form->textField($info,'student_first_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
			 <?php echo $form->error($info,'student_first_name'); ?>       
	    	</div>   	    	  
	</div>

	<div class="row"> 
		<div class="row-left">   
			<?php echo $form->labelEx($info,'student_middle_name'); ?>
			<?php echo $form->textField($info,'student_middle_name',array('size'=>13)); ?><span class="status">&nbsp;</span>        
			<?php echo $form->error($info,'student_middle_name'); ?>
	    	</div>   
	    	<div class="row-right">   
			<?php echo $form->labelEx($info,'student_last_name'); ?>
			<?php echo $form->textField($info,'student_last_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_last_name'); ?>
	    	</div>  
	</div>


	<div class="row">	
	    	<div class="row-left"> 
		    	<?php echo $form->labelEx($info,'student_email_id_1'); ?>
			<?php echo $form->textField($user,'user_organization_email_id',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($user,'user_organization_email_id'); ?>
	    	</div>
		<div class="row-right">
			<?php echo $form->labelEx($info,'student_mobile_no'); ?>   
			<?php echo $form->textField($info,'student_mobile_no',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_mobile_no'); ?>
	       </div>		
	</div>

	<div class="row">
		
		<?php
			$acd = Yii::app()->db->createCommand()
				->select('*')
				->from('academic_term')
				->where('current_sem=1 and academic_term_organization_id='.$org_id)
				->queryAll();
			$acdterm=CHtml::listData($acd,'academic_term_id','academic_term_name');	
			$period=array();
			if($acdterm)
			{
			$pe_data = AcademicTermPeriod::model()->findByPk($acd[0]['academic_term_period_id']);
			$period[$pe_data->academic_terms_period_id] = $pe_data->academic_term_period; 
			}
 
		?>
		<div class="row-left">
			<?php echo $form->labelEx($model,'student_transaction_quota_id'); ?>
			<?php echo $form->dropDownList($model,'student_transaction_quota_id',Quota::items(), array('empty' => 'Select Quota')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_transaction_quota_id'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($model,'student_academic_term_period_tran_id'); ?>
			<?php echo $form->dropDownList($model,'student_academic_term_period_tran_id',$period,array('prompt' => 'Select Year'));?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_academic_term_period_tran_id'); ?>
		</div>
	</div>
	
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($model,'student_academic_term_name_id'); ?>
			<?php echo $form->dropDownList($model,'student_academic_term_name_id',$acdterm,array('prompt' => 'Select Semester')); 
			?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_academic_term_name_id'); ?>
		</div>	
		<div class="row-right">
			<?php echo $form->labelEx($model,'student_transaction_branch_id'); ?>
			<?php echo $form->dropDownList($model,'student_transaction_branch_id',
					CHtml::listData(Branch::model()->findAll(array('condition'=>'branch_organization_id='.$org_id)),'branch_id','branch_name'),
					array(
					'prompt' => 'Select Branch',
					'ajax' => array(
					'type'=>'POST', 
					'url'=>CController::createUrl('dependent/getStudDivision'),			
					'dataType'=>'json',
					'success'=>'function(data) {

				          $("#StudentTransaction_student_transaction_division_id").html(data.div);
					  $("#StudentTransaction_student_transaction_batch_id").html(data.bat);
				
				        }',
					)));?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_transaction_branch_id'); ?>
		</div>
 	</div>

 	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($model,'student_transaction_division_id'); ?>
			<?php 
				echo $form->dropDownList($model,'student_transaction_division_id' ,array(),
					array(
					'prompt' => 'Select Division',
					'ajax' => array(
					'type'=>'POST', 
					'url'=>CController::createUrl('dependent/getStudbatch'), 
					'update'=>'#StudentTransaction_student_transaction_batch_id'
					)));?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_transaction_division_id'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($model,'student_transaction_batch_id'); ?>
			<?php
				echo $form->dropDownList($model,'student_transaction_batch_id',array(), array('prompt' => 'Select Batch')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_transaction_batch_id'); ?>
		</div>
	</div>
	<div class="row">
		<div class="row-left">
				<?php echo $form->labelEx($model,'student_transaction_shift_id'); ?>
				<?php echo $form->dropDownList($model,'student_transaction_shift_id',Shift::items(), array('prompt' =>'Select Shift')); ?><span class="status">&nbsp;</span>
				<?php echo $form->error($model,'student_transaction_shift_id'); ?>
		</div>
	</div>
	<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save', array('class'=>'submit')); ?>
	
	</div>
</fieldset>

<?php $this->endWidget(); ?>

</div><!-- form -->

