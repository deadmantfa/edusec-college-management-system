<script>
$(document).ready(function () {
	$('#form2').hide();
	$('#form3').hide();
	$('#form4').hide();
	$('#form5').hide();
	$('#form6').hide();
	$('#form7').hide();
	$('#form8').hide();
	$('#submitbut1').hide();
	
	$('select').attr('disabled',true);
	$('input:text').attr('disabled',true);
	$('input:checkbox').attr('disabled',true);
	$('#ckbox').click(function () {
			
		if ($("#ckbox").is(":checked"))
		{
			$('#p_add').hide();
		}
		else
			$('#p_add').show();
	});
	$('#link1').click(function () {
		$('#form1').show();
		$('#form2').hide();
		$('#form3').hide();
		$('#form4').hide();
		$('#form5').hide();
		$('#form6').hide();
		$('#form7').hide();
		$('#form8').hide();
		$('#submitbut1').hide();
		$('#edit1').show();
		$('#form1 select').attr('disabled',true);
		$('#form1 input:text').attr('disabled',true);
		$('#form2 select').attr('disabled',true);
		$('#form2 input:text').attr('disabled',true);
		$('#form3 select').attr('disabled',true);
		$('#form3 input:text').attr('disabled',true);
		$('#form4 select').attr('disabled',true);
		$('#form4 input:text').attr('disabled',true);
	});
	$('#link2').click(function () {
		$('#form2').show();
		$('#form1').hide();
		$('#form3').hide();
		$('#form4').hide();
		$('#form5').hide();
		$('#form6').hide();
		$('#form7').hide();
		$('#form8').hide();
		$('#submitbut2').hide();
		$('#edit2').show();
		$('#form1 select').attr('disabled',true);
		$('#form1 input:text').attr('disabled',true);
		$('#form2 select').attr('disabled',true);
		$('#form2 input:text').attr('disabled',true);
		$('#form3 select').attr('disabled',true);
		$('#form3 input:text').attr('disabled',true);
		$('#form4 select').attr('disabled',true);
		$('#form4 input:text').attr('disabled',true);
	});
	$('#link3').click(function () {
		$('#form3').show();
		$('#form1').hide();
		$('#form2').hide();
		$('#form4').hide();
		$('#form5').hide();
		$('#form6').hide();
		$('#form7').hide();
		$('#form8').hide();
		$('#submitbut3').hide();
		$('#edit3').show();
		$('#form1 select').attr('disabled',true);
		$('#form1 input:text').attr('disabled',true);
		$('#form2 select').attr('disabled',true);
		$('#form2 input:text').attr('disabled',true);
		$('#form3 select').attr('disabled',true);
		$('#form3 input:text').attr('disabled',true);
		$('#form4 select').attr('disabled',true);
		$('#form4 input:text').attr('disabled',true);
	});
	$('#link4').click(function () {
		$('#form4').show();
		$('#form1').hide();
		$('#form2').hide();
		$('#form3').hide();
		$('#form5').hide();
		$('#form6').hide();
		$('#form7').hide();
		$('#form8').hide();
		$('#submitbut4').hide();
		$('#edit4').show();
		$('#form1 select').attr('disabled',true);
		$('#form1 input:text').attr('disabled',true);
		$('#form2 select').attr('disabled',true);
		$('#form2 input:text').attr('disabled',true);
		$('#form3 select').attr('disabled',true);
		$('#form3 input:text').attr('disabled',true);
		$('#form4 select').attr('disabled',true);
		$('#form4 input:text').attr('disabled',true);
	});
	$('#link5').click(function () {
		$('#form5').show();
		$('#form1').hide();
		$('#form2').hide();
		$('#form3').hide();
		$('#form4').hide();
		$('#form6').hide();
		$('#form7').hide();
		$('#form8').hide();		
	});
	$('#link6').click(function () {
		$('#form6').show();
		$('#form1').hide();
		$('#form2').hide();
		$('#form3').hide();
		$('#form4').hide();
		$('#form5').hide();
		$('#form7').hide();
		$('#form8').hide();
	});
	$('#link7').click(function () {
		$('#form7').show();
		$('#form1').hide();
		$('#form2').hide();
		$('#form3').hide();
		$('#form4').hide();
		$('#form5').hide();
		$('#form6').hide();
		$('#form8').hide();
	});
	$('#link8').click(function () {
		$('#form7').hide();
		$('#form1').hide();
		$('#form2').hide();
		$('#form3').hide();
		$('#form4').hide();
		$('#form5').hide();
		$('#form6').hide();
		$('#form8').show();
		
	});
	$('#edit1').click(function () {
		$('#submitbut1').show();
		$('#edit1').hide();
		$('#form1 select').attr('disabled',false);
		$('#form1 input:text').attr('disabled',false);
	});
	$('#edit2').click(function () {
		$('#submitbut2').show();
		$('#edit2').hide();
		$('#form2 select').attr('disabled',false);
		$('#form2 input:text').attr('disabled',false);
	});
	$('#edit3').click(function () {
		$('#submitbut3').show();
		$('#edit3').hide();
		$('#form3 select').attr('disabled',false);
		$('#form3 input:text').attr('disabled',false);
	});
	$('#edit4').click(function () {
		$('#submitbut4').show();
		$('#edit4').hide();
		$('#form4 select').attr('disabled',false);
		$('#form4 input:text').attr('disabled',false);
		$('input:checkbox').attr('disabled',false);
	});

	$('#StudentTransaction_student_academic_term_name_id').change(function () {
	$('#StudentTransaction_student_transaction_branch_id').val(" ");
	$('#StudentTransaction_student_transaction_division_id').val(" ");
	$('#StudentTransaction_student_transaction_batch_id').val(" ");	
});
});
</script>

<?php
	   Yii::app()->clientScript->registerScript('myHideEffect1','$(".flash-success").animate({opacity: 1.0}, 2000).fadeOut("slow");',CClientScript::POS_READY);
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-transaction-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
 
	<?php
		if(Yii::app()->user->hasFlash('data-save') && $flag==1) {?>
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('data-save');?>
		</div>
	<?php } ?>

<div id="menulink">
	<div id="studentlogo">
	<?php
		if($model->Rel_Photos->student_photos_path != null)
			echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/stud_images/'.$photo->student_photos_path,"",array("width"=>"176px","height"=>"178px")),array('/stud_images/'.$photo->student_photos_path),array('id'=>'photo'))."</br></br>";
		if(Yii::app()->user->checkAccess('StudentTransaction.UpdateStudentData') || Yii::app()->user->checkAccess('StudentTransaction.*')) 
		{
			 echo CHtml::link('Edit',array('updateprofilephoto','id'=>$model->student_transaction_id),array('id'=>'photoid','title'=>'Update Photo','style'=>'padding-right:50px;'));
		}
		 $config = array( 
					'scrolling' => 'no',
					'autoDimensions' => false,
					'width' => 'auto',
					'height' => 'auto', 
				 //   'titleShow' => false,
				       'overlayColor' => '#000',
				       'padding' => '0',
				       'showCloseButton' => true,			
				       'onClose' => function() {
						return window.location.reload();
					},

				// change this as you need
				);
				$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'#photo', 'config'=>$config));
		?>
	</div>

	</br>
	<div id="divlink1" class="info-link">
	<a href="#form1" id="link1">Personal Info</a>
	</div>
	<div id="divlink2" class="info-link">
	<a href="#form2" id="link2">Guardian Info</a>
	</div>
	<div id="divlink3" class="info-link">
	<a href="#form3" id="link3">Other Info</a>
	</div>
	<div id="divlink4" class="info-link">
	<a href="#form4" id="link4">Address Info</a>
	</div>
	<div id="divlink5" class="info-link">
	<a href="#form5" id="link5">Documents</a>
	</div>
	<div id="divlink6" class="info-link">
	<a href="#form6" id="link6">Qualifications</a>
	</div>
	<div id="divlink7" class="info-link">
	<a href="#form7" id="link7">Performances</a>
	</div>


	<?php 
		if((Yii::app()->user->getState('stud_id') || $_REQUEST['id'] ) && !Yii::app()->user->getState('emp_id')) { ?>	
			<div id="divlink8" class="info-link">
			<?php	echo CHtml::link('Paid Fees Details',array('feesPaymentTransaction/studentFeesReportwithoutform'),array('style'=>'text-decoration:none;color:white;'));?>
			</div>
		<?php }	?>

	<?php 
		if(Yii::app()->user->checkAccess('Report.Studenthistory') ) { ?>	
			<div id="divlink8" class="info-link">
			<?php	echo CHtml::link('History',array('report/studenthistory', 'id'=>$model->student_transaction_id),array('style'=>'text-decoration:none;color:white;')); ?>	
			</div>
		<?php }	?>
</div>

<!-- change for display message on the fieldset-->
	<?php echo $form->error($info,'student_enroll_no'); ?>
	<?php echo $form->error($info,'student_email_id_1'); ?>
	<?php echo $form->error($info,'student_email_id_2'); ?>


<div id="form1" class="info-form">
	<fieldset >
		<legend>Personal Info</legend>

	<div class="row">    
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_roll_no'); ?>   
			<?php echo $form->textField($info,'student_roll_no',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_roll_no'); ?>
		</div>

		<?php $org_id=Yii::app()->user->getState('org_id'); ?>
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_gr_no'); ?>   
			<?php echo $form->textField($info,'student_gr_no',array('size'=>13,'maxlength'=>15)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_gr_no'); ?>
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
			<?php echo $form->labelEx($info,'student_merit_no'); ?>   
			<?php echo $form->textField($info,'student_merit_no',array('size'=>13,'maxlength'=>15)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_merit_no'); ?>   
		</div>
	</div>

    	<div class="row">
		<div class="row-left">
		        <?php echo $form->labelEx($info,'student_enroll_no'); ?>
        		<?php echo $form->textField($info,'student_enroll_no',array('size'=>13,'maxlength'=>12)); ?><span class="status">&nbsp;</span>
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
			<?php echo $form->textField($info,'student_first_name',array('size'=>13,'maxlength'=>25)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_first_name'); ?>  
		</div>
	</div>

	<div class="row">   
    		<div class="row-left">   
			<?php echo $form->labelEx($info,'student_middle_name'); ?>
			<?php echo $form->textField($info,'student_middle_name',array('size'=>13,'maxlength'=>25)); ?><span class="status">&nbsp;</span>        
			<?php echo $form->error($info,'student_middle_name'); ?>      
    		</div>   
		<div class="row-right">   
			<?php echo $form->labelEx($info,'student_last_name'); ?>
			<?php echo $form->textField($info,'student_last_name',array('size'=>13,'maxlength'=>25)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_last_name'); ?>
    		</div>   
	</div>

	<div class="row">   
    		<div class="row-left">   
			<?php echo $form->labelEx($info,'student_mother_name'); ?>
			<?php echo $form->textField($info,'student_mother_name',array('size'=>13,'maxlength'=>25)); ?><span class="status">&nbsp;</span>        
			<?php echo $form->error($info,'student_mother_name'); ?>
    		</div>   
		<div class="row-right">
			<?php echo $form->labelEx($info,'student_gender'); ?>
			<?php echo $form->dropdownList($info,'student_gender',$info->getGenderOptions(), array('empty' => 'Select Gender')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_gender'); ?>
		</div>
   	</div>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_mobile_no'); ?>   
			<?php echo $form->textField($info,'student_mobile_no',array('size'=>13,'maxlength'=>15)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_mobile_no'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($info,'student_birthplace'); ?>
			<?php echo $form->textField($info,'student_birthplace',array('size'=>13,'maxlength'=>25)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_birthplace'); ?>
		</div>
    	</div>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_dob'); ?>
			<?php 
				if($info->student_dob != null)
					$info->student_dob= date('d-m-Y',strtotime($info->student_dob));	
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'=>$info, 
				'attribute'=>'student_dob',
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
				),));
			?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_dob'); ?>
		</div>
	
		<div class="row-right">

			<?php echo $form->labelEx($model,'student_transaction_nationality_id'); ?>
			<?php echo $form->dropDownList($model,'student_transaction_nationality_id',Nationality::items(), array('empty' => 'Select Nationality')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_transaction_nationality_id'); ?>
		</div>
	</div>

    	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($model,'student_transaction_religion_id'); ?>
        		<?php echo $form->dropDownList($model,'student_transaction_religion_id',Religion::items(), array('empty' => 'Select Religion')); ?><span class="status">&nbsp;</span>
        		<?php echo $form->error($model,'student_transaction_religion_id'); ?>
		</div>
		<div class="row-right">
        		<?php echo $form->labelEx($model,'student_transaction_quota_id'); ?>
			<?php echo $form->dropDownList($model,'student_transaction_quota_id',Quota::items(), array('empty' => 'Select Quota')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_transaction_quota_id'); ?>
		</div>
    	</div>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($model,'student_transaction_category_id'); ?>
			<?php echo $form->dropDownList($model,'student_transaction_category_id',Category::items(), array('empty' => 'Select Category')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_transaction_category_id'); ?>
		</div>
		<div class="row-right">
		<?php
			$acd = Yii::app()->db->createCommand()
				->select('*')
				->from('academic_term')
				->where('current_sem=1 and academic_term_organization_id='.$org_id)
				->queryAll();
			$acdterm=CHtml::listData($acd,'academic_term_id','academic_term_name');	
			$pe_data = AcademicTermPeriod::model()->findByPk($acd[0]['academic_term_period_id']);
			$period[$pe_data->academic_terms_period_id] = $pe_data->academic_term_period; 
		?>
			<?php echo $form->labelEx($model,'student_academic_term_period_tran_id'); ?>
			<?php echo $form->dropDownList($model,'student_academic_term_period_tran_id',$period,array('prompt' => 'Select Year'));?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_academic_term_period_tran_id'); ?>
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
			$pe_data = AcademicTermPeriod::model()->findByPk($acd[0]['academic_term_period_id']);
			$period[$pe_data->academic_terms_period_id] = $pe_data->academic_term_period; 
		?>
		<div class="row-left">
			<?php echo $form->labelEx($model,'student_academic_term_name_id'); ?>
			<?php echo $form->dropDownList($model,'student_academic_term_name_id',$acdterm,array('prompt' => 'Select Semester')); 
			?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_academic_term_name_id'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($model,'student_transaction_branch_id'); ?>
			<?php
				echo $form->dropDownList($model,'student_transaction_branch_id',
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
					)));
				 	?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_transaction_branch_id'); ?>
		</div>	
	</div>
	
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($model,'student_transaction_division_id'); ?>
			<?php echo $form->dropDownList($model,'student_transaction_division_id', CHtml::listData(Division::model()->findAll(array('condition'=>'academic_name_id='.$model->student_academic_term_name_id.' and branch_id='.$model->student_transaction_branch_id.' and division_organization_id='.$org_id)), 'division_id', 'division_code'),
				array(
				'prompt' => 'Select Division',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/getStudbatch'), 
				'update'=>'#StudentTransaction_student_transaction_batch_id', //selector to update
			
				)));
					  
			?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_transaction_division_id'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($model,'student_transaction_batch_id'); ?>
        		<?php
		 		if(isset($model->student_transaction_batch_id))
				  echo $form->dropDownList($model,'student_transaction_batch_id', CHtml::listData(Batch::model()->findAll(array('condition'=>'branch_id='.$model->student_transaction_branch_id.' and batch_organization_id='.$org_id.' and div_id='.$model->student_transaction_division_id)), 'batch_id', 'batch_code'),array('prompt'=>"Select Batch"));
		 		else	
		 		  echo $form->dropDownList($model,'student_transaction_batch_id', array('empty' => 'Select Batch')); ?><span class="status">&nbsp;</span>
 			<?php echo $form->error($model,'student_transaction_batch_id'); ?>
		</div>
	</div>
	
	<div class="row">
		<div class="row-left">
        		<?php echo $form->labelEx($model,'student_transaction_shift_id'); ?>
			<?php echo $form->dropDownList($model,'student_transaction_shift_id',Shift::items(), array('empty' => 'Select Shift')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_transaction_shift_id'); ?>
		</div>

    	</div>

	<?php  if(Yii::app()->user->checkAccess('StudentTransaction.UpdateStudentData') || Yii::app()->user->checkAccess('StudentTransaction.*')) {?>
    	<div class="row buttons">
		<?php echo CHtml::button('Save', array('submit'=>$this->createUrl('updateprofiletab1',array('id'=>$_REQUEST['id'])),'class'=>'submit', 'id'=>'submitbut1')); ?>
		<?php echo CHtml::button('Edit',array('class'=>'submit', 'id'=>'edit1')); ?>
   	</div>
<?php } ?>
	</fieldset>
</div>


<div id="form2" class="info-form">
<fieldset>
	<legend>Guardian Info</legend>
	
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_guardian_name'); ?>
			<?php echo $form->textField($info,'student_guardian_name',array('size'=>13,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_guardian_name'); ?>
		</div>
	
		<div class="row-right">
			<?php echo $form->labelEx($info,'student_guardian_relation'); ?>
			<?php echo $form->textField($info,'student_guardian_relation',array('size'=>13,'maxlength'=>20)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_guardian_relation'); ?>
		</div>
	</div>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_guardian_qualification'); ?>
			<?php echo $form->textField($info,'student_guardian_qualification',array('size'=>13,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_guardian_qualification'); ?>
		</div>

		<div class="row-right">
			<?php echo $form->labelEx($info,'student_guardian_occupation'); ?>
			<?php echo $form->textField($info,'student_guardian_occupation',array('size'=>13,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_guardian_occupation'); ?>
		</div>
  
	</div>

	<div class="row">
		<div class="row-left">        
			<?php echo $form->labelEx($info,'student_guardian_income'); ?>
			<?php echo $form->textField($info,'student_guardian_income',array('size'=>13,'maxlength'=>15)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_guardian_income'); ?>
		</div>      
	</div>

	<div class="row">
		<?php echo $form->labelEx($info,'student_guardian_occupation_address'); ?>
		<?php echo $form->textField($info,'student_guardian_occupation_address',array('size'=>59,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'student_guardian_occupation_address'); ?>
	</div>

	<div class="row">
        	<?php echo $form->labelEx($info,'student_guardian_home_address'); ?>
        	<?php echo $form->textField($info,'student_guardian_home_address',array('size'=>59,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
        	<?php echo $form->error($info,'student_guardian_home_address'); ?>
	</div>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_guardian_occupation_city'); ?>
			<?php echo $form->dropdownList($info,'student_guardian_occupation_city', City::items(), array('empty' => 'Select City')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_guardian_occupation_city'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($info,'student_guardian_city_pin'); ?>
			<?php echo $form->textField($info,'student_guardian_city_pin',array('size'=>13,'maxlength'=>6)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_guardian_city_pin'); ?>
		</div>
    	</div>

    	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_guardian_phoneno'); ?>
			<?php echo $form->textField($info,'student_guardian_phoneno',array('size'=>13,'maxlength'=>15)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_guardian_phoneno'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($info,'student_guardian_mobile'); ?>
			<?php echo $form->textField($info,'student_guardian_mobile',array('size'=>13,'maxlength'=>15)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_guardian_mobile'); ?>
		</div>
    	</div>

	<?php  if(Yii::app()->user->checkAccess('StudentTransaction.UpdateStudentData') || Yii::app()->user->checkAccess('StudentTransaction.*')) {?>
  	<div class="row buttons">
		<?php  echo CHtml::button('Save', array('submit'=>$this->createUrl('updateprofiletab2',array('id'=>$_REQUEST['id'])),'class'=>'submit', 'id'=>'submitbut2')); 
		echo CHtml::button('Edit',array('class'=>'submit', 'id'=>'edit2')); ?>
	</div>
	<?php } ?>

</fieldset>
</div>

<div id="form3" class="info-form">
<fieldset>
	<legend>Other Info</legend>
	<div class="row">
		<?php echo $form->labelEx($info,'student_email_id_1'); ?>
		<?php echo $form->textField($info,'student_email_id_1',array('size'=>59,'maxlength'=>60,'readOnly'=>true)); ?><span class="status">&nbsp;</span>
		<?php //echo $form->error($info,'student_email_id_1'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($info,'student_email_id_2'); ?>
		<?php echo $form->textField($info,'student_email_id_2',array('size'=>59,'maxlength'=>60)); ?><span class="status">&nbsp;</span>
		<?php //echo $form->error($info,'student_email_id_2'); ?>
	</div>


    	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_bloodgroup'); ?>
			<?php echo $form->dropdownList($info,'student_bloodgroup',$info->getBloodGroup(), array('empty' => 'Select Blood Group')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_bloodgroup'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($model,'College Name'); ?>
			<?php $org = Organization::model()->findByPk(Yii::app()->user->getState('org_id'))->organization_name; 
			echo $form->textField($model,'organization_name',array('value'=>$org,'size'=>13,'readOnly'=>true));
			?><span class="status">&nbsp;</span>
		</div>
    	</div>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($lang,'languages_known1'); ?>
			<?php echo $form->dropDownList($lang,'languages_known1',Languages::items(),array('empty'=>'Select Language')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($lang,'languages_known1'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($lang,'languages_known2');?>
			<?php echo $form->dropDownList($lang,'languages_known2',Languages::items(),array('empty'=>'Select Language')); ?><span class="status">&nbsp;</span>
		        <?php echo $form->error($lang,'languages_known2'); ?>
		</div>
    	</div>
	

    	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($lang,'languages_known3');?>
			<?php echo $form->dropDownList($lang,'languages_known3',Languages::items(),array('empty'=>'Select Language')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($lang,'languages_known3'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($lang,'languages_known4');?>
			<?php echo $form->dropDownList($lang,'languages_known4',Languages::items(),array('empty'=>'Select Language')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($lang,'languages_known4');?>
		</div>
    	</div>

	<?php  if(Yii::app()->user->checkAccess('StudentTransaction.UpdateStudentData') || Yii::app()->user->checkAccess('StudentTransaction.*')) {?>
     	<div class="row buttons">
		<?php  echo CHtml::button('Save', array('submit'=>$this->createUrl('updateprofiletab3',array('id'=>$_REQUEST['id'])),'class'=>'submit','id'=>'submitbut3'));
			echo CHtml::button('Edit',array('class'=>'submit', 'id'=>'edit3'));  ?>
    	</div>
	<?php } ?>
</fieldset>
</div>

<div id="form4" class="info-form">
<fieldset>
	<legend>Address Info</legend>
	
	<div class="form5">
		<?php echo ('<b><u>Current Address :</u></b>'); ?>
	</div>

	<div class="form5">
		<?php echo ('&nbsp;'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($address,'student_address_c_line1'); ?>
		<?php echo $form->textField($address,'student_address_c_line1',array('size'=>59,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($address,'student_address_c_line1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($address,'student_address_c_line2'); ?>
		<?php echo $form->textField($address,'student_address_c_line2',array('size'=>59,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($address,'student_address_c_line2'); ?>
	</div>
		
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($address,'student_address_c_taluka'); ?>
			<?php echo $form->textField($address,'student_address_c_taluka',array('size'=>13,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_c_taluka'); ?>
		</div>
		
		<div class="row-right">
			<?php echo $form->labelEx($address,'student_address_c_district'); ?>
			<?php echo $form->textField($address,'student_address_c_district',array('size'=>13,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_c_district'); ?>
		</div>
	</div>

	<div class="row">
		<div class="row-right">
			<?php echo $form->labelEx($address,'student_address_c_country'); ?>
			<?php echo $form->dropDownList($address,'student_address_c_country' ,Country::items(),
					array(
					'prompt' => 'Select Country',
					'ajax' => array(
					'type'=>'POST', 
					'url'=>CController::createUrl('dependent/UpdateStudCStates'), 
					'update'=>'#StudentAddress_student_address_c_state', //selector to update
			
					))); 
			?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_c_country'); ?>
		</div>
		<div class="row-left">
			<?php echo $form->labelEx($address,'student_address_c_state'); ?>
			<?php 
				if($address->student_address_c_state!=null)
				echo $form->dropDownList($address,'student_address_c_state', CHtml::listData(State::model()->findAll(array('condition'=>'country_id='.$address->student_address_c_country)), 'state_id', 'state_name'),
				array(
				'prompt' => 'Select State',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateStudCCities'), 
				'update'=>'#StudentAddress_student_address_c_city', //selector to update
			
				)));
				else	
				echo $form->dropDownList($address,'student_address_c_state',array(),
				array(
				'prompt' => 'Select State',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateStudCCities'), 
				'update'=>'#StudentAddress_student_address_c_city', //selector to update
			
				)));?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_c_state'); ?>
		</div>
	</div>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($address,'student_address_c_city'); ?>
			<?php 	
				if($address->student_address_c_city!=null)
					echo $form->dropDownList($address,'student_address_c_city', CHtml::listData(City::model()->findAll(array('condition'=>'state_id='.$address->student_address_c_state)), 'city_id', 'city_name'),array('prompt'=>'Select State'));
				else
					echo $form->dropDownList($address,'student_address_c_city',array(), array('empty' => 'Select City')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_c_city'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($address,'student_address_c_pin'); ?>
			<?php echo $form->textField($address,'student_address_c_pin',array('size'=>13,'maxlength'=>6)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_c_pin'); ?>
		</div>
	</div>
	
	<div class="row">	
		<?php  echo $form->checkBox($address,'stud_address_chkbox',array('value'=>1, 'uncheckValue'=>0,'id'=>'ckbox')); 
	      echo '&nbsp;&nbsp;Check this box if Current Address and Permanent Address are the same.';?>
	</div>

<div id="p_add">
	<div class="form5">
		<?php echo ('<b><u>Permanent Address :</u></b>'); ?>
	</div>

	<div class="form5">
		<?php echo ('&nbsp;'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($address,'student_address_p_line1'); ?>
		<?php echo $form->textField($address,'student_address_p_line1',array('size'=>59,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($address,'student_address_p_line1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($address,'student_address_p_line2'); ?>
		<?php echo $form->textField($address,'student_address_p_line2',array('size'=>59,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($address,'student_address_p_line2'); ?>
	</div>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($address,'student_address_p_taluka'); ?>
			<?php echo $form->textField($address,'student_address_p_taluka',array('size'=>13,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_p_taluka'); ?>
		</div>		
		<div class="row-right">
			<?php echo $form->labelEx($address,'student_address_p_district'); ?>
			<?php echo $form->textField($address,'student_address_p_district',array('size'=>13,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_p_district'); ?>
		</div>
	</div>

	<div class="row">
		<div class="row-right">
			<?php echo $form->labelEx($address,'student_address_p_country'); ?>
			<?php 
				echo $form->dropDownList($address,'student_address_p_country',Country::items(), 				array(
					'prompt' => 'Select Country',
					'ajax' => array(
					'type'=>'POST', 
					'url'=>CController::createUrl('dependent/UpdateStudPStates'), 
					'update'=>'#StudentAddress_student_address_p_state', //selector to update
			
					))); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_p_country'); ?>
		</div>

		<div class="row-left">
			<?php echo $form->labelEx($address,'student_address_p_state'); ?>
			<?php 
				if(!empty($address->student_address_p_state))
				echo $form->dropDownList($address,'student_address_p_state', CHtml::listData(State::model()->findAll(array('condition'=>'country_id='.$address->student_address_p_country)), 'state_id', 'state_name'),
				array(
				'prompt' => 'Select State',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateStudPCities'), 
				'update'=>'#StudentAddress_student_address_p_city', //selector to update
			
				)));
			else
				echo $form->dropDownList($address,'student_address_p_state',array(), 				array(
			'prompt' => 'Select State',
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/UpdateStudPCities'), 
			'update'=>'#StudentAddress_student_address_p_city', //selector to update
			))); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_p_state'); ?>
		</div>
	</div>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($address,'student_address_p_city'); ?>
			<?php 
				if(!empty($address->student_address_p_city))
				echo $form->dropDownList($address,'student_address_p_city', CHtml::listData(City::model()->findAll(array('condition'=>'state_id='.$address->student_address_p_state)), 'city_id', 'city_name'),array('prompt'=>'Select State'));
				else
				echo $form->dropDownList($address,'student_address_p_city',array(), array('empty' => 'Select City')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_p_city'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($address,'student_address_p_pin'); ?>
			<?php echo $form->textField($address,'student_address_p_pin',array('size'=>13,'maxlength'=>6)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_p_pin'); ?>
		</div>
	</div>
</div> <!-- p_add div finish here -->


	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($address,'student_address_phone'); ?>
			<?php echo $form->textField($address,'student_address_phone',array('size'=>13,'maxlength'=>15)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_phone'); ?>
		</div>	
		<div class="row-right">
			<?php echo $form->labelEx($address,'student_address_mobile'); ?>
			<?php echo $form->textField($address,'student_address_mobile',array('size'=>13,'maxlength'=>15)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_mobile'); ?>
		</div>

	</div>

	<div class="form5">
		<?php echo ('&nbsp;'); ?>
	</div>

	<?php  if(Yii::app()->user->checkAccess('StudentTransaction.UpdateStudentData') || Yii::app()->user->checkAccess('StudentTransaction.*')) {?>
	<div class="row buttons">
		<?php echo CHtml::button('Save', array('submit'=>$this->createUrl('updateprofiletab4',array('id'=>$_REQUEST['id'])),'class'=>'submit','id'=>'submitbut4'));
		     echo CHtml::button('Edit',array('class'=>'submit', 'id'=>'edit4')); 
		?>
       </div>
	<?php } ?>

</fieldset>
</div>

<div id="form5" class="info-form">
<fieldset>
	<legend>Student Document</legend>

<?php
//echo CHtml::button('Add', array('class'=>'submit', 'submit'=>array('studentDocsTrans/Create', 'id'=>$model->student_transaction_id)), array('id'=>'docid'));
if(Yii::app()->user->checkAccess('StudentTransaction.UpdateStudentData') || Yii::app()->user->checkAccess('StudentTransaction.*')) {
echo CHtml::link('Add',array('StudentDocsTrans/Create','id'=>$model->student_transaction_id),array('id'=>'docid'));
}
?>

	
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-docs-final_view',
	'dataProvider'=>$studentdocstrans->mysearch(),
//	'filter'=>$model,
	'enableSorting'=>false,
	'nullDisplay'=>'N/A',
	'columns'=>array(
		
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		
		array(
                'name'=>'Title',
                'type'=>'raw',
                'value'=>'CHtml::link(CHtml::encode($data->Rel_Stud_doc->title),"../../stud_docs/".$data->Rel_Stud_doc->student_docs_path, $htmlOptions=array("target"=>"_blank"))',
          	),

		array('name' => 'Document Category',
	              'value' => 'DocumentCategoryMaster::model()->findByPk($data->Rel_Stud_doc->doc_category_id)->doc_category_name',
                ),

		array(
                'name'=>'Description',
               // 'type'=>'raw',
                'value'=>'$data->Rel_Stud_doc->student_docs_desc',
          	),
		array(
                'name'=>'Submit Date',
               // 'type'=>'raw',
                //'value'=>'$data->Rel_Stud_doc->student_docs_submit_date',
	        'value'=>'date_format(new DateTime($data->Rel_Stud_doc->student_docs_submit_date), "d-m-Y")',
          	),

		array(
			'class'=>'CButtonColumn',
			'template' => '{delete}',
			'buttons'=>array(
			     
                        'delete' => array(
				'url'=>'Yii::app()->createUrl("studentDocsTrans/delete", array("id"=>$data->student_docs_trans_id))',
                        ),
		),
	    ),
		
	),
	'pager'=>array(
		'class'=>'AjaxList',
	//	'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>
</fieldset>
</div>

<div id="form6" class="info-form">
<fieldset>
	<legend>Student Qualifications</legend>
<?php

//echo CHtml::button('Add', array('class'=>'submit', 'id'=>'stud_doc_id1', 'submit'=>array('studentAcademicRecordTrans/create', 'id'=>$model->student_transaction_id))); 
if(Yii::app()->user->checkAccess('StudentTransaction.UpdateStudentData') || Yii::app()->user->checkAccess('StudentTransaction.*')) {
echo CHtml::link('Add',array('studentAcademicRecordTrans/create', 'id'=>$model->student_transaction_id),array('id'=>'quaid'));
}
	$config = array( 
		    'scrolling' => 'no',
		    'autoDimensions' => false,
		    'width' => '755',
		    'height' => '430', 
		    'titleShow' => false,
		    'overlayColor' => '#000',
		    'padding' => '0',
		    'showCloseButton' => true,
		    'onClose' => function() {
				return window.location.reload();
			    },

		// change this as you need
		);


		$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'#quaid', 'config'=>$config));
?>
	
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-academic-record-trans-grid',
	'dataProvider'=>$stud_qua->mysearch(),
	//'filter'=>$model,
	'enableSorting'=>false,
	'nullDisplay'=>'N/A',
	'columns'=>array(
	
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		
		array('name' => 'student_academic_record_trans_qualification_id',
	              'value' => '$data->Rel_student_qualification->qualification_name',
                     ),
		array('name' => 'student_academic_record_trans_eduboard_id',
			'value' => '$data->Rel_student_eduboard->eduboard_name',
                     ),
		array('name' => 'student_academic_record_trans_record_trans_year_id',
			'value' => '$data->Rel_student_year->year',
                     ),
		array('name' => 'theory_mark_obtained',
			'value' => '$data->theory_mark_obtained',
                     ),
		array('name' => 'theory_mark_max',
			'value' => '$data->theory_mark_max',
                     ),
		array('name' => 'theory_percentage',
			'value' => '$data->theory_percentage',
                     ),
		array('name' => 'practical_mark_obtained',
			'value' => '$data->practical_mark_obtained',
                     ),
		array('name' => 'practical_mark_max',
			'value' => '$data->practical_mark_max',
                     ),
		array('name' => 'practical_percentage',
			'value' => '$data->practical_percentage',
                     ),
		
		array(
			'class'=>'MyCButtonColumn',
			'template' => '{update}{delete}',
	                'buttons'=>array(
				
				'update' => array(
					'url'=>'Yii::app()->createUrl("studentAcademicRecordTrans/update", array("id"=>$data->student_academic_record_trans_id))',
					'options'=>array('id'=>'update-qualification'),
		                ),
				'delete' => array(
					'url'=>'Yii::app()->createUrl("studentAcademicRecordTrans/delete", array("id"=>$data->student_academic_record_trans_id))',
				
		                ),
			),
		),
	),
	'pager'=>array(
		'class'=>'AjaxList',
	//	'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); 

	$config = array( 
		    'scrolling' => 'no',
		    'autoDimensions' => false,
		    'width' => '755',
		    'height' => '430', 
		    'titleShow' => false,
		    'overlayColor' => '#000',
		    'padding' => '0',
		    'showCloseButton' => true,
		    'onClose' => function() {
				return window.location.reload();
			    },

		// change this as you need
		);


		$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'a#update-qualification', 'config'=>$config));
?>
</fieldset>
</div>
<div id="form7" class="info-form">
<fieldset>
	<legend>Student Performance</legend>
<?php

if(Yii::app()->user->checkAccess('StudentTransaction.UpdateStudentData') || Yii::app()->user->checkAccess('StudentTransaction.*')) {
echo CHtml::link('Add',array('feedbackDetailsTable/create', 'id'=>$model->student_transaction_id),array('id'=>'feedid'));
}
$config = array( 
		    'scrolling' => 'no',
		    'autoDimensions' => false,
		    'width' => '830',
		    'height' => '200', 
		    'titleShow' => false,
		    'overlayColor' => '#000',
		    'padding' => '0',
		    'showCloseButton' => true,
		    'onClose' => function() {
				return window.location.reload();
			    },

		// change this as you need
		);

		$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'#feedid', 'config'=>$config));
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'feedback-details-table-grid',
	'dataProvider'=>$stud_feed->mysearch(),
	//'filter'=>$model,
	'enableSorting'=>false,
	'columns'=>array(
		
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		array('name'=>'feedback_category_master_id',
			'value'=>'FeedbackCategoryMaster::model()->findByPk($data->feedback_category_master_id)->feedback_category_name',
		),
		'feedback_details_remarks',
		array(
                'name'=>'feedback_details_table_creation_date',
                'value'=>'date_format(new DateTime($data->feedback_details_table_creation_date), "d-m-Y")',
	        ),
		array('name'=>'feedback_details_table_created_by',
		      'value'=>'EmployeeTransaction::model()->findByAttributes(array("employee_transaction_user_id"=>$data->feedback_details_table_created_by)) == NULL ? "admin" : EmployeeInfo::model()->findByPk(EmployeeTransaction::model()->findByAttributes(array("employee_transaction_user_id"=>$data->feedback_details_table_created_by))->employee_transaction_employee_id)->employee_first_name',

		),
		array(
			'class'=>'MyCButtonColumn',
			'template' => '{update}{delete}',
	                'buttons'=>array(
				/*'view' => array(
					'url'=>'Yii::app()->createUrl("feedbackDetailsTable/view", array("id"=>$data->feedback_details_table_id))',
		                ),*/
				'update' => array(
					'url'=>'Yii::app()->createUrl("feedbackDetailsTable/update", array("id"=>$data->feedback_details_table_id))',
					'options'=>array('id'=>'update-feedback'),
		                ),
				'delete' => array(
					'url'=>'Yii::app()->createUrl("feedbackDetailsTable/delete", array("id"=>$data->feedback_details_table_id))',
		                ),
			),
		),
	),
	'pager'=>array(
		'class'=>'AjaxList',
	//	'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); 

$config = array( 
		    'scrolling' => 'no',
		    'autoDimensions' => false,
		    'width' => '830',
		    'height' => '200', 
		    'titleShow' => false,
		    'overlayColor' => '#000',
		    'padding' => '0',
		    'showCloseButton' => true,
		    'onClose' => function() {
				return window.location.reload();
			    },

		// change this as you need
		);
		$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'a#update-feedback', 'config'=>$config));
?>
</fielset>
</div>
<?php  $this->endWidget(); ?>

</div><!-- form -->
