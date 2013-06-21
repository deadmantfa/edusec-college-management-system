<?php
$this->layout='//layouts/personal-profile';
$this->breadcrumbs=array(
	'Profile',
);?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'personal-profile',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

<div id="menulink">
	<div id="studentlogo">
	<?php if($model->Rel_Photo->employee_photos_path != null)
			echo CHtml::image(Yii::app()->baseUrl.'/emp_images/'.$photo->employee_photos_path,"",array("width"=>"175px","height"=>"160px"));			
	?>
	
	</div></br>
	<div id="divlink1" class="info-link">
	<a href="#form1" title="Info" id="link1">Personal Info</a>
	</div>
	<!--<div id="divlink2" class="info-link">
	<a href="#form2" id="link2">Guardian Info</a>
	</div>
	<div id="divlink3" class="info-link">
	<a href="#form3" id="link3">Other Info</a>
	</div>
	<div id="divlink4" class="info-link">
	<a href="#form4" id="link4">Address Info</a>
	</div> -->
	<div id="divlink5" class="info-link">
	<?php
		echo CHtml::link('Document',array('EmployeeDocsTrans/Employeedocs'),array('title'=>'My Documents', 'style'=>'text-decoration:none;color:white;'));
	?>
	</div>
	
	<div id="divlink6" class="info-link">
	<?php
		echo CHtml::link('Qualification',array('EmployeeAcademicRecordTrans/EmployeeAcademicRecords'),array('title'=>'My Qualification', 'style'=>'text-decoration:none;color:white;'));
	?>
	</div>
	<div id="divlink7" class="info-link">
	<?php
		echo CHtml::link('Experience',array('EmployeeExperienceTrans/EmployeeExperience'),array('title'=>'My Experience', 'style'=>'text-decoration:none;color:white;'));
	?>
	</div>
	
	
</div>

<div class="form profile-wrapper">
<?php echo $form->error($info,'employee_attendance_card_id'); ?>
<div id="form1" class="info-form">
	
	<fieldset >
		<legend>Personal Info</legend>
	
<div class="row">
       <div class="row-column1">
		<?php echo $form->labelEx($info,'employee_no'); ?> 
		<?php echo $info->employee_no;?> 
	</div>
	<div class="row-column2">
		<?php echo $form->labelEx($info,'employee_name_alias'); ?>
		<?php echo $info->employee_name_alias;?> 
	</div>
	<div class="row-column3">
		<?php echo $form->labelEx($info,'employee_aicte_id'); ?>
		<?php echo $info->employee_aicte_id;?>  
	</div>
</div>

<div class="row">
       <div class="row-column1">
		<?php echo $form->labelEx($info,'employee_gtu_id'); ?>
		<?php echo $info->employee_gtu_id;?>
	</div>
	<div class="row-column2">
		<?php  echo $form->labelEx($info,'employee_joining_date'); ?>
		<?php if($info->employee_joining_date!=null)
			echo date('d-m-Y',strtotime($info->employee_joining_date));?>
	</div>
	<div class="row-column3">
		<?php echo $form->labelEx($info,'employee_probation_period'); ?>
		<?php echo $info->employee_probation_period;?>
	</div>
</div>

<div class="row">
       <div class="row-column1">
		<?php echo $form->labelEx($info,'employee_probation_period'); ?>
		<?php echo $info->employee_probation_period;?>
	</div>
	<div class="row-column2">
		<?php echo $form->labelEx($model,'employee_transaction_department_id'); ?>
		<?php echo $model->Rel_Department->department_name;?>	 
	</div>
	<div class="row-column3">
		<?php echo $form->labelEx($model,'employee_transaction_designation_id'); ?>
		 <?php echo $model->Rel_Designation->employee_designation_name;?>		
	</div>
</div>

<div class="row">
	<div class="row-column1">
	      <?php echo $form->labelEx($model,'employee_transaction_shift_id'); ?>
	      <?php echo $model->Rel_Shift->shift_type;?>
	</div>
	<div class="row-column2">
		<?php echo $form->labelEx($info,'title'); ?>   
		<?php echo $info->title;?>
	</div>
	<div class="row-column3">
		<?php echo $form->labelEx($info,'employee_first_name'); ?>
		<?php echo $info->employee_first_name;?>
	</div>
</div>
		
<div class="row">
	<div class="row-column1">
	      <?php echo $form->labelEx($info,'employee_middle_name'); ?>
	      <?php echo $info->employee_middle_name;?>
	</div>
	<div class="row-column2">
	     <?php echo $form->labelEx($info,'employee_last_name'); ?>
	      <?php echo $info->employee_last_name;?>
	</div>
	<div class="row-column3">
	      <?php echo $form->labelEx($info,'employee_mother_name'); ?>
	      <?php echo $info->employee_mother_name;?>
	</div>
</div>

<div class="row">
	<div class="row-column1">
		<?php  echo $form->labelEx($info,'employee_dob'); ?>
		<?php if($info->employee_dob!=null)
			echo date('d-m-Y',strtotime($info->employee_dob));?>
	</div>
	<div class="row-column2">
		<?php echo $form->labelEx($info,'employee_birthplace'); ?>
		<?php echo $info->employee_birthplace;?>			
	</div>
	<div class="row-column3">
		<?php echo $form->labelEx($info,'employee_bloodgroup'); ?>
	        <?php echo $info->employee_bloodgroup;?>
	</div>
</div>
			
<div class="row">
	<div class="row-column1">
		<?php echo $form->labelEx($model,'employee_transaction_nationality_id'); ?>
		<?php if($model->employee_transaction_nationality_id != null)
			echo $model->Rel_Nationality->nationality_name;?>
	</div>
	<div class="row-column2">
		<?php echo $form->labelEx($info,'employee_marital_status'); ?>
	        <?php echo $info->employee_marital_status;?>
	</div>
	<div class="row-column3">
	      <?php echo $form->labelEx($model,'employee_transaction_religion_id'); ?>
	      <?php  if($model->employee_transaction_religion_id != null) 
		echo $model->Rel_Religion->religion_name;?>
	</div>
</div>

<div class="row">		
	<div class="row-column1">
	       <?php echo $form->labelEx($info,'employee_pancard_no'); ?>
	       <?php echo $info->employee_pancard_no;?>
	</div>
	<div class="row-column2">
	       <?php echo $form->labelEx($info,'employee_account_no'); ?>
	      <?php echo $info->employee_account_no;?>
	</div>
	<div class="row-column3">
	      <?php echo $form->labelEx($model,'employee_transaction_category_id'); ?>
	      <?php if($model->employee_transaction_category_id!=null)
			echo $model->Rel_Category->category_name;?>
	</div>
</div>

<div class="row">
	<div class="row-column1">
	       	 <?php echo $form->labelEx($info,'employee_type'); ?>
	         <?php 
			if($info->employee_type ==1)
			echo "Teaching";
			else
			echo "Non-Teaching";
		?>
	</div>
	<div class="row-column2">
		 <?php echo $form->labelEx($info,'employee_organization_mobile'); ?>
		 <?php echo $info->employee_organization_mobile;?>
	</div>
	<div class="row-column3">
		 <?php echo $form->labelEx($info,'employee_private_mobile'); ?>
		 <?php echo $info->employee_private_mobile;?>
	</div>
</div>

<div class="row">
	       <?php echo $form->labelEx($info,'employee_private_email'); ?>
	       <?php echo $info->employee_private_email;?>
	
</div>

</fieldset>
</div>

<div id="form2" class="info-form">
	<fieldset>
		<legend>Guardian Info</legend>
<div class="row">
     	<div class="row-column1">
      		<?php echo $form->labelEx($info,'employee_guardian_name'); ?>
      		<?php echo $info->employee_guardian_name;?>
     	</div>
        <div class="row-column2">
	      	<?php echo $form->labelEx($info,'employee_guardian_relation'); ?>
              	<?php echo $info->employee_guardian_relation;?>
	</div>
	<div class="row-column3">
		 <?php echo $form->labelEx($info,'employee_guardian_qualification'); ?>
		 <?php echo $info->employee_guardian_qualification;?>
	</div>
</div>
	
<div class="row">
	<div class="row-column1">
	      <?php echo $form->labelEx($info,'employee_guardian_occupation'); ?>
	      <?php echo $info->employee_guardian_occupation;?>
	</div>	   
	<div class="row-column2">
	      <?php echo $form->labelEx($info,'employee_guardian_income'); ?>
	      <?php echo $info->employee_guardian_income;?>
	</div>
</div>

<div class="row">
	      <?php echo $form->labelEx($info,'employee_guardian_home_address'); ?>
	      <?php echo $info->employee_guardian_home_address;?>
</div>

<div class="row">
     	<div class="row-column1">
	     <?php echo $form->labelEx($info,'employee_guardian_occupation_city'); ?>
	     <?php if($info->employee_guardian_occupation_city!=0)
		    echo $info->Rel_g_city->city_name;?>
	</div>
     	<div class="row-column2">
      	     <?php echo $form->labelEx($info,'employee_guardian_city_pin'); ?>
             <?php echo $info->employee_guardian_city_pin;?>
     	</div>
     	<div class="row-column3">           
	      <?php echo $form->labelEx($info,'employee_guardian_mobile1'); ?>
	      <?php echo $info->employee_guardian_mobile1;?>
	</div>

</div>
	
<div class="row">
	<div class="row-column1">
	      <?php echo $form->labelEx($info,'employee_guardian_mobile2'); ?>
	      <?php echo $info->employee_guardian_mobile2;?>
	 </div>
	 <div class="row-column2">
	      <?php echo $form->labelEx($info,'employee_guardian_phone_no'); ?>
	      <?php echo $info->employee_guardian_mobile2;?>
	 </div>

</div>       
	</fieldset>
</div>
<div id="form3" class="info-form">
	<fieldset>
		<legend>Other Info</legend>
<div class="row">
      	<div class="row-column1">
      	      <?php echo $form->labelEx($info,'employee_attendance_card_id'); ?>
              <?php echo $info->employee_attendance_card_id;?>
     	</div>
      	<div class="row-column2">
	       <?php echo $form->labelEx($info,'employee_faculty_of'); ?>
               <?php echo $info->employee_faculty_of;?>
	</div>
	<div class="row-column3">
	       <?php echo $form->labelEx($info,'employee_curricular'); ?>
	       <?php echo $info->employee_faculty_of;?>
	</div>
</div>

<div class="row">

      	<div class="row-column1">
	       <?php echo $form->labelEx($info,'employee_project_details'); ?>
	       <?php echo $info->employee_project_details;?>
      	</div>
      	<div class="row-column2">
	       <?php echo $form->labelEx($info,'employee_technical_skills'); ?>
	       <?php echo $info->employee_technical_skills;?>
	</div>

	<div class="row-column3">
	       <?php echo $form->labelEx($info,'employee_hobbies'); ?>
	       <?php echo $info->employee_hobbies;?>
	</div>
</div>
	

<div class="row">
	<div class="row-column1">
		<?php echo $form->labelEx($lang,'languages_known1'); ?>
		<?php 
			if($lang->languages_known1)
			echo $lang->Rel_Langs1->languages_name;?>
	 </div>
	 <div class="row-column2">
		<?php echo $form->labelEx($lang,'languages_known2');?>
		<?php if($lang->languages_known2)
			echo $lang->Rel_Langs2->languages_name;?>
	 </div>	
	<div class="row-column3">
	       <?php echo $form->labelEx($info,'employee_reference'); ?>
	       <?php echo $info->employee_reference;?>
	</div>
</div>	

<div class="row">

	<div class="row-column1">
	       <?php echo $form->labelEx($info,'employee_refer_designation'); ?>
	       <?php echo $info->employee_refer_designation;?>
	</div>
	 
</div>
<div class="row">
       <?php echo $form->labelEx($model,'employee_transaction_organization_id'); ?>
       <?php $org=Organization::model()->findByPk($model->employee_transaction_organization_id)->organization_name;
		echo $org;	
	?>
</div> 
	
</fieldset>
</div>
<div class="address-data">
	<fieldset>
		<legend>Current Address</legend>

	<div class="row">
		 <?php echo $form->labelEx($address,'employee_address_c_line1'); ?>
		 <?php echo $address->employee_address_c_line1;?>		
	</div>
	<div class="row">
		 <?php echo $form->labelEx($address,'employee_address_c_line2');?>
		  <?php echo $address->employee_address_c_line2;?>
	</div>
	<div class="row">
		<div class="row-left">
		 <?php echo $form->labelEx($address,'employee_address_c_taluka'); ?>
		 <?php echo $address->employee_address_c_taluka;?>
	   	</div>
		<div class="row-right">
		 <?php echo $form->labelEx($address,'employee_address_c_district'); ?>
		<?php echo $address->employee_address_c_district;?>
	   	</div>

	</div>
	<div class="row">
		<div class="row-right">
		 <?php echo $form->labelEx($address,'employee_address_c_country'); ?>
		<?php if($address->employee_address_c_country!=0)
			echo $address->Rel_c_country->name;?>
	   	</div>
		<div class="row-left">
		 <?php echo $form->labelEx($address,'employee_address_c_state'); ?>
		<?php if($address->employee_address_c_state!=0)
			echo $address->Rel_c_state->state_name;?>
		</div>
	</div>

	<div class="row">
		<div class="row-left">
		<?php echo $form->labelEx($address,'employee_address_c_city'); ?>
		<?php if($address->employee_address_c_city!=0)
			echo $address->Rel_c_city->city_name;?>
	   	</div>
		<div class="row-right">
		 <?php echo $form->labelEx($address,'employee_address_c_pincode'); ?>
		 <?php echo $address->employee_address_c_pincode;?>
	   	</div>

	</div>

</fieldset>

</div>

<div class="address-data">
	<fieldset>
		<legend>Permenent Address</legend>

	<div class="row">
		 <?php echo $form->labelEx($address,'employee_address_p_line1'); ?>
		<?php echo $address->employee_address_p_line1;?>
	</div>
	<div class="row">
		 <?php echo $form->labelEx($address,'employee_address_p_line2'); ?>
		<?php echo $address->employee_address_p_line2;?>
	</div>
	<div class="row">
		<div class="row-left">
		 <?php echo $form->labelEx($address,'employee_address_p_taluka'); ?>
		 <?php echo $address->employee_address_p_taluka;?>
		</div>
		<div class="row-right">
		 <?php echo $form->labelEx($address,'employee_address_p_district'); ?>
		<?php echo $address->employee_address_p_district;?>
	   	</div>
	</div>
  
	<div class="row">
		 <div class="row-right">
		 <?php echo $form->labelEx($address,'employee_address_p_country'); ?>
		<?php if($address->employee_address_p_country!=0)
			echo $address->Rel_p_country->name;?>
	   	 </div>
		 <div class="row-left">
		 <?php echo $form->labelEx($address,'employee_address_p_state');?>
		<?php if($address->employee_address_p_state!=0)
			echo $address->Rel_p_state->state_name;?>
	   	 </div>
	</div>
	 
	<div class="row">
		<div class="row-left">
		<?php echo $form->labelEx($address,'employee_address_p_city'); ?>
		<?php if($address->employee_address_p_city!=0)
			echo $address->Rel_p_city->city_name;?>
	   	</div>



		<div class="row-right">
		 <?php echo $form->labelEx($address,'employee_address_p_pincode'); ?>
		 <?php echo $address->employee_address_p_pincode;?>
		</div>

	</div>

</fieldset>

</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
