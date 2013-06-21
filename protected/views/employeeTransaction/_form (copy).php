<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-transaction-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<?php

            $personal_info  = $form->labelEx($info,'employee_no'); 
            $personal_info .= $form->textField($info,'employee_no',array('size'=>10,'maxlength'=>10));
            $personal_info .= $form->error($info,'employee_no'); 


            $personal_info .= $form->labelEx($info,'employee_first_name');
            $personal_info .= $form->textField($info,'employee_first_name',array('size'=>25,'maxlength'=>25));
            $personal_info .= $form->error($info,'employee_first_name');



            $personal_info .= $form->labelEx($info,'employee_middle_name');
            $personal_info .= $form->textField($info,'employee_middle_name',array('size'=>25,'maxlength'=>25));
            $personal_info .= $form->error($info,'employee_middle_name');



            $personal_info .= $form->labelEx($info,'employee_last_name');
            $personal_info .= $form->textField($info,'employee_last_name',array('size'=>25,'maxlength'=>25));
            $personal_info .= $form->error($info,'employee_last_name');


            $personal_info .= $form->labelEx($info,'employee_name_alias');
            $personal_info .= $form->textField($info,'employee_name_alias',array('size'=>10,'maxlength'=>10));
            $personal_info .= $form->error($info,'employee_name_alias');
	

	    $personal_info .= $form->labelEx($info,'employee_dob');
            $personal_info .= $form->textField($info,'employee_dob');
            $personal_info .= $form->error($info,'employee_dob');

            $personal_info .= $form->labelEx($info,'employee_birthplace');
            $personal_info .= $form->textField($info,'employee_birthplace',array('size'=>25,'maxlength'=>25));
            $personal_info .= $form->error($info,'employee_birthplace');

	    $personal_info .= $form->labelEx($info,'employee_gender');
            $personal_info .= $form->dropDownList($info,'employee_gender',$info->getGenderOptions(), array('empty' => 'Select one of the following...'));
            $personal_info .= $form->error($info,'employee_gender');


            $personal_info .= $form->labelEx($info,'employee_bloodgroup');
            $personal_info .= $form->dropDownList($info,'employee_bloodgroup',$info->getBloodGroup(), array('empty' => 'Select one of the following...'));
            $personal_info .= $form->error($info,'employee_bloodgroup');



            $personal_info .= $form->labelEx($info,'employee_marital_status');
            $personal_info .= $form->dropDownList($info,'employee_marital_status',$info->getMaritialStatus(), array('empty' => 'Select one of the following...'));
            $personal_info .= $form->error($info,'employee_marital_status');


            $other_info  = $form->labelEx($info,'employee_private_email');
            $other_info .= $form->textField($info,'employee_private_email',array('size'=>30,'maxlength'=>30));
            $other_info .= $form->error($info,'employee_private_email');

            $other_info .=  $form->labelEx($info,'employee_organization_mobile');
            $other_info .=  $form->textField($info,'employee_organization_mobile');
            $other_info .=  $form->error($info,'employee_organization_mobile');



            $other_info .=  $form->labelEx($info,'employee_private_mobile');
            $other_info .=  $form->textField($info,'employee_private_mobile');
            $other_info .=  $form->error($info,'employee_private_mobile');



            $other_info .=  $form->labelEx($info,'employee_pancard_no');
            $other_info .=  $form->textField($info,'employee_pancard_no',array('size'=>10,'maxlength'=>10));
            $other_info .=  $form->error($info,'employee_pancard_no');



            $other_info .=  $form->labelEx($info,'employee_account_no');
            $other_info .=  $form->textField($info,'employee_account_no');
            $other_info .=  $form->error($info,'employee_account_no');



            $other_info .=  $form->labelEx($info,'employee_joining_date');
            $other_info .=  $form->textField($info,'employee_joining_date');
            $other_info .=  $form->error($info,'employee_joining_date');


            $other_info .=  $form->labelEx($info,'employee_probation_period');
            $other_info .=  $form->textField($info,'employee_probation_period',array('size'=>10,'maxlength'=>10));
            $other_info .=  $form->error($info,'employee_probation_period');



            $other_info .=  $form->labelEx($info,'employee_hobbies');
            $other_info .=  $form->textArea($info,'employee_hobbies',array('rows'=>6, 'cols'=>50));
            $other_info .=  $form->error($info,'employee_hobbies');



            $other_info .=  $form->labelEx($info,'employee_technical_skills');
            $other_info .=  $form->textArea($info,'employee_technical_skills',array('rows'=>6, 'cols'=>50));
            $other_info .=  $form->error($info,'employee_technical_skills');



            $other_info .=  $form->labelEx($info,'employee_project_details');
            $other_info .=  $form->textArea($info,'employee_project_details',array('rows'=>6, 'cols'=>50));
            $other_info .=  $form->error($info,'employee_project_details');


            $other_info .=  $form->labelEx($info,'employee_curricular');
            $other_info .=  $form->textArea($info,'employee_curricular',array('rows'=>6, 'cols'=>50));
            $other_info .=  $form->error($info,'employee_curricular');



            $other_info .=  $form->labelEx($info,'employee_reference');
            $other_info .=  $form->textField($info,'employee_reference',array('size'=>25,'maxlength'=>25));
            $other_info .=  $form->error($info,'employee_reference');


            $other_info .=  $form->labelEx($info,'employee_refer_designation');
            $other_info .=  $form->textField($info,'employee_refer_designation',array('size'=>20,'maxlength'=>20));
            $other_info .=  $form->error($info,'employee_refer_designation');


	    $guardian_info  = $form->labelEx($info,'employee_guardian_name');
            $guardian_info .= $form->textField($info,'employee_guardian_name',array('size'=>25,'maxlength'=>25));
            $guardian_info .= $form->error($info,'employee_guardian_name');



            $guardian_info .= $form->labelEx($info,'employee_guardian_relation');
            $guardian_info .= $form->textField($info,'employee_guardian_relation',array('size'=>20,'maxlength'=>20));
            $guardian_info .= $form->error($info,'employee_guardian_relation');



            $guardian_info .= $form->labelEx($info,'employee_guardian_home_address');
            $guardian_info .= $form->textField($info,'employee_guardian_home_address',array('size'=>60,'maxlength'=>200));
            $guardian_info .= $form->error($info,'employee_guardian_home_address');


            $guardian_info .= $form->labelEx($info,'employee_guardian_qualification');
            $guardian_info .= $form->textField($info,'employee_guardian_qualification',array('size'=>50,'maxlength'=>50));
            $guardian_info .= $form->error($info,'employee_guardian_qualification');


            $guardian_info .= $form->labelEx($info,'employee_guardian_occupation');
            $guardian_info .= $form->textField($info,'employee_guardian_occupation',array('size'=>50,'maxlength'=>50));
            $guardian_info .= $form->error($info,'employee_guardian_occupation');

            $guardian_info .= $form->labelEx($info,'employee_guardian_income');
            $guardian_info .= $form->textField($info,'employee_guardian_income',array('size'=>15,'maxlength'=>15));
            $guardian_info .= $form->error($info,'employee_guardian_income');

            $guardian_info .= $form->labelEx($info,'employee_guardian_occupation_address');
            $guardian_info .= $form->textField($info,'employee_guardian_occupation_address',array('size'=>60,'maxlength'=>200));
            $guardian_info .= $form->error($info,'employee_guardian_occupation_address');



            $guardian_info .= $form->labelEx($info,'employee_guardian_occupation_city');
            $guardian_info .= $form->dropDownList($info,'employee_guardian_occupation_city', City::items(), array('empty' => 'Select one of the following...'));
            $guardian_info .= $form->error($info,'employee_guardian_occupation_city');



            $guardian_info .= $form->labelEx($info,'employee_guardian_city_pin');
            $guardian_info .= $form->textField($info,'employee_guardian_city_pin');
            $guardian_info .= $form->error($info,'employee_guardian_city_pin');



            $guardian_info .= $form->labelEx($info,'employee_guardian_phone_no');
            $guardian_info .= $form->textField($info,'employee_guardian_phone_no');
            $guardian_info .= $form->error($info,'employee_guardian_phone_no');


            $guardian_info .= $form->labelEx($info,'employee_guardian_mobile1');
            $guardian_info .= $form->textField($info,'employee_guardian_mobile1');
            $guardian_info .= $form->error($info,'employee_guardian_mobile1');


            $guardian_info .= $form->labelEx($info,'employee_guardian_mobile2');
            $guardian_info .= $form->textField($info,'employee_guardian_mobile2');
            $guardian_info .= $form->error($info,'employee_guardian_mobile2');


            $guardian_info .= $form->labelEx($info,'employee_faculty_of');
            $guardian_info .= $form->textField($info,'employee_faculty_of',array('size'=>50,'maxlength'=>50));
            $guardian_info .= $form->error($info,'employee_faculty_of');

            $guardian_info .= $form->labelEx($info,'employee_attendance_card_id');
            $guardian_info .= $form->textField($info,'employee_attendance_card_id',array('size'=>15,'maxlength'=>15));
            $guardian_info .= $form->error($info,'employee_attendance_card_id');


            $guardian_info .= $form->labelEx($info,'employee_tally_id');
            $guardian_info .= $form->textField($info,'employee_tally_id',array('size'=>9,'maxlength'=>9));
            $guardian_info .= $form->error($info,'employee_tally_id');


//	    $trans_info  = $form->labelEx($model,'employee_transaction_user_id'); 
//	    $trans_info .= $form->textField($model,'employee_transaction_user_id'); 
//	    $trans_info .= $form->error($model,'employee_transaction_user_id'); 

	    $trans_info = $form->labelEx($model,'employee_transaction_emp_address_id'); 
	    $trans_info .= $form->textField($model,'employee_transaction_emp_address_id'); 
	    $trans_info .= $form->error($model,'employee_transaction_emp_address_id'); 



	    $trans_info .= $form->labelEx($model,'employee_transaction_branch_id'); 
	    $trans_info .= $form->dropDownList($model,'employee_transaction_branch_id',Branch::items(), array('empty' => 'Select one of the following...')); 
	    $trans_info .= $form->error($model,'employee_transaction_branch_id'); 



	    $trans_info .= $form->labelEx($model,'employee_transaction_category_id'); 
	    $trans_info .= $form->dropDownList($model,'employee_transaction_category_id',Category::items(), array('empty' => 'Select one of the following...')); 
	    $trans_info .= $form->error($model,'employee_transaction_category_id'); 



	    $trans_info .= $form->labelEx($model,'employee_transaction_quota_id'); 
	    $trans_info .= $form->dropDownList($model,'employee_transaction_quota_id',Quota::items(), array('empty' => 'Select one of the following...')); 
	    $trans_info .= $form->error($model,'employee_transaction_quota_id'); 



	    $trans_info .= $form->labelEx($model,'employee_transaction_religion_id'); 
	    $trans_info .= $form->dropDownList($model,'employee_transaction_religion_id',Religion::items(), array('empty' => 'Select one of the following...')); 
	    $trans_info .= $form->error($model,'employee_transaction_religion_id'); 



	    $trans_info .= $form->labelEx($model,'employee_transaction_shift_id'); 
	    $trans_info .= $form->dropDownList($model,'employee_transaction_shift_id',Shift::items(), array('empty' => 'Select one of the following...')); 
	    $trans_info .= $form->error($model,'employee_transaction_shift_id'); 



	    $trans_info .= $form->labelEx($model,'employee_transaction_designation_id'); 
	    $trans_info .= $form->dropDownList($model,'employee_transaction_designation_id',EmployeeDesignation::items(), array('empty' => 'Select one of the following...')); 
	    $trans_info .= $form->error($model,'employee_transaction_designation_id'); 


	    $trans_info .= $form->labelEx($model,'employee_transaction_nationality_id'); 
	    $trans_info .= $form->dropDownList($model,'employee_transaction_nationality_id',Nationality::items(), array('empty' => 'Select one of the following...')); 
	    $trans_info .= $form->error($model,'employee_transaction_nationality_id'); 


	    $trans_info .= $form->labelEx($model,'employee_transaction_department_id'); 
	    $trans_info .= $form->dropDownList($model,'employee_transaction_department_id',Department::items(), array('empty' => 'Select one of the following...')); 
	    $trans_info .= $form->error($model,'employee_transaction_department_id'); 



//	    $trans_info .= $form->labelEx($model,'employee_transaction_organization_id'); 
//	    $trans_info .= $form->dropDownList($model,'employee_transaction_organization_id',Organization::items(), array('empty' => 'Select one of the following...')); 
//	    $trans_info .= $form->error($model,'employee_transaction_organization_id'); 



	    $trans_info .= $form->labelEx($model,'employee_transaction_languages_known_id'); 
	    $trans_info .= $form->textField($model,'employee_transaction_languages_known_id'); 
	    $trans_info .= $form->error($model,'employee_transaction_languages_known_id'); 



	    $trans_info .= $form->labelEx($model,'employee_transaction_emp_photos_id'); 
	    $trans_info .= CHtml::form('','post',array('enctype'=>'multipart/form-data')); 
	    $trans_info .= CHtml::activeFileField($photo, 'employee_photos_path'); 
	    $trans_info .= CHtml::endForm();

?>

 <?php
        $this->widget('CTabView',array(
            'tabs'=>array(
                'tab1' => array(
                    'title'=>'Personal Info',
                    'content'=>$personal_info,

                ),
                'tab2' => array(
                    'title'=>'Guardian Info',
                    'content'=>$guardian_info,

                ),
                'tab3' => array(
                    'title'=>'Other Info',
                    'content'=>$other_info,

                ),
		 'tab4' => array(
                    'title'=>'Transaction Info',
                    'content'=>$trans_info,

                ),
                       
            ),

        ));

?>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
