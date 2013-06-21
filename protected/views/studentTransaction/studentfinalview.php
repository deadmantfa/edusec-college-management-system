<?php

$StudentInfo = StudentInfo::model()->findByPk($student_transaction[0]->student_transaction_student_id);
$AcademicTermPeriod = AcademicTermPeriod::model()->findByPk($student_transaction[0]->student_academic_term_period_tran_id);
$AcademicTerm = AcademicTerm::model()->findByPk($student_transaction[0]->student_academic_term_name_id);

if($student_transaction[0]->student_transaction_category_id != null)
$Category = Category::model()->findByPk($student_transaction[0]->student_transaction_category_id);
else
$Category = new Category;

if($student_transaction[0]->student_transaction_category_id != null)
$Nationality = Nationality::model()->findByPk($student_transaction[0]->student_transaction_nationality_id);
else
$Nationality = new Nationality;

if($student_transaction[0]->student_transaction_quota_id != null)
$Quota = Quota::model()->findByPk($student_transaction[0]->student_transaction_quota_id);
else
$Quota = new Quota;

if($student_transaction[0]->student_transaction_religion_id != null)
$Religion = Religion::model()->findByPk($student_transaction[0]->student_transaction_religion_id);
else
$Religion = new Religion;
$Branch = Branch::model()->findByPk($student_transaction[0]->student_transaction_branch_id);
$Shift = Shift::model()->findByPk($student_transaction[0]->student_transaction_shift_id);
$Division = Division::model()->findByPk($student_transaction[0]->student_transaction_division_id);
$Batch = Batch::model()->findByPk($student_transaction[0]->student_transaction_batch_id);
$Organization = Organization::model()->findByPk($student_transaction[0]->student_transaction_organization_id);

if($student_transaction[0]->student_transaction_languages_known_id != null)
$LanguagesKnown = LanguagesKnown::model()->findByPk($student_transaction[0]->student_transaction_languages_known_id);
else
$LanguagesKnown = new $LanguagesKnown;

if($student_transaction[0]->student_transaction_languages_known_id != null)
$StudentAddress = StudentAddress::model()->findByPk($student_transaction[0]->student_transaction_student_address_id);
else
$StudentAddress = new $StudentAddress;

?>
<h3>Student Detail</h3>
<h4>Personal Info</h4>
<table border="1" width="200px">
<tr>
	<td>
	<label> Roll No  </label></td><td><?php echo $StudentInfo->student_roll_no;?>
	</td>
</tr>
<tr>
	<td>
	<label> GR No  </label></td><td><?php echo $StudentInfo->student_gr_no;?>
	</td>
</tr>
<tr>
	<td>
	<label> Merit Number  </label></td><td><?php echo $StudentInfo->student_merit_no;?>
	</td>
</tr>
<tr>
	<td>
	<label> Enrollment No  </label></td><td><?php echo $StudentInfo->student_enroll_no;?>
	</td>
</tr>
<tr>
	<td>
	<label> Name </label></td><td><?php echo $StudentInfo->student_first_name;?>
	</td>
</tr>	
<tr>
	<td>
	<label> Husband/Father Name </label></td><td><?php echo $StudentInfo->student_middle_name;?>
	</td>
</tr>	
<tr>
	<td>
	<label> Surname </label></td><td><?php echo $StudentInfo->student_last_name;?>
	</td>
</tr>	
<tr>
	<td>
	<label> Mother Name </label></td><td><?php echo $StudentInfo->student_mother_name;?>
	</td>
</tr>	
<tr>
	<td>
	<label> Gender </label></td><td><?php echo $StudentInfo->student_gender;?>
	</td>
</tr>	
<tr>
	<td>
	<label> Mobile No. </label></td><td><?php echo $StudentInfo->student_mobile_no;?>
	</td>
</tr>	
<tr>
	<td>
	<label> ACPC Adm. Date </label></td><td><?php 
		if($StudentInfo->student_adm_date != NULL)
		echo date('d-m-Y',strtotime($StudentInfo->student_adm_date));
		?>
	</td>
</tr>	
<tr>
	<td>
	<label> Date of Birth </label></td><td><?php 
		if($StudentInfo->student_dob != NULL)
		echo date('d-m-Y',strtotime($StudentInfo->student_dob));		
		?>
	</td>
</tr>
<tr>
	<td>
	<label> Academic Year </label></td><td><?php echo $AcademicTermPeriod->academic_term_period;?>
	</td>
</tr>
<tr>
	<td>
	<label> Semester </label></td><td><?php echo "Sem-".$AcademicTerm->academic_term_name;?>
	</td>
</tr>
<tr>
	<td>
	<label> BirthPlace </label></td><td><?php echo $StudentInfo->student_birthplace;?>
	</td>
</tr>	
<tr>
	<td>
	<label> Category </label></td><td><?php 
		if($Category)
		echo $Category->category_name;
		else
		echo "";
		?>
	</td>
</tr>	
<tr>
	<td>
	<label> Nationality </label></td><td><?php 
		if($Nationality)
		echo $Nationality->nationality_name;
		else
		echo "";
		?>
	</td>
</tr>	
<tr>
	<td><label> Quota </label></td>
	<td><?php echo $Quota->quota_name;?></td>
</tr>	
<tr>
	<td>
	<label> Religion </label></td><td><?php 
		if($Religion)
		echo $Religion->religion_name;
		else
		echo "";
		?>
	</td>
</tr>	
<tr>
	<td>
	<label> Branch </label></td><td><?php 

		echo $Branch->branch_name;
		?>
	</td>
</tr>	
<tr>
	<td>
	<label> Resident Status </label></td><td><?php echo $StudentInfo->student_living_status;?>
	</td>
</tr>	
<tr>
	<td>
	<label> Student Status </label></td><td><?php echo $StudentInfo->	student_dtod_regular_status;?>
	</td>
</tr>	
</table>
</br></br>


<h4>Guardian Info</h4>
<table border="1" width="200px">
<tr>
	<td>
	<label> Guardian Name  </label></td><td><?php echo $StudentInfo->student_guardian_name;?>
	</td>
</tr>
<tr>
	<td>
	<label> Relation  </label></td><td><?php echo $StudentInfo->student_guardian_relation;?>
	</td>
</tr>

<tr>
	<td>
	<label> Qualification  </label></td><td><?php echo $StudentInfo->student_guardian_qualification;?>
	</td>
</tr>
<tr>
	<td>
	<label> Occupation  </label></td><td><?php echo $StudentInfo->student_guardian_occupation;?>
	</td>
</tr>
<tr>
	<td>
	<label> Home Address  </label></td><td><?php echo $StudentInfo->student_guardian_home_address;?>
	</td>
</tr>
<tr>
	<td>
	<label> Occupation Address  </label></td><td><?php echo $StudentInfo->student_guardian_occupation_address;?>
	</td>
</tr>
<tr>
	<td>
	<label> Occupation City  </label></td><td><?php 
		if($StudentInfo->student_guardian_occupation_city != null)		
		echo City::model()->findByPk($StudentInfo->student_guardian_occupation_city)->city_name;
		else
		echo "";?>
	</td>
</tr>
<tr>
	<td>
	<label> City Pincode  </label></td><td><?php echo $StudentInfo->student_guardian_city_pin;?>
	</td>
</tr>
<tr>
	<td>
	<label> Income  </label></td><td><?php echo $StudentInfo->student_guardian_income;?>
	</td>
</tr>
<tr><td></td><td></td></tr>
<tr>
	<td>
	<label> Phone No  </label></td><td><?php echo $StudentInfo->student_guardian_phoneno;?>
	</td>
</tr>
<tr>
	<td>
	<label> Mobile No  </label></td><td><?php echo $StudentInfo->		student_guardian_mobile;?>
	</td>
</tr>
</table>
</br></br>


<h4>Other Info</h4>
<table border="1" width="200px">
<tr>
	<td>
	<label> Email Id 1  </label></td><td><?php echo $StudentInfo->student_email_id_1;?>
	</td>
</tr>
<tr>
	<td>
	<label> Email Id 2  </label></td><td><?php echo $StudentInfo->student_email_id_2;?>
	</td>
</tr>
<tr>
	<td>
	<label> Bloodgroup  </label></td><td><?php echo $StudentInfo->student_bloodgroup;?>
	</td>
</tr>
<tr>
	<td>
	<label> Organization  </label></td><td><?php $Organization->organization_name;?>
	</td>
</tr>
<tr>
	<td>
	<label> Tally Id  </label></td><td><?php echo $StudentInfo->student_tally_ledger_name;?>
	</td>
</tr>
<tr>
	<td>
	<label> Shift  </label></td><td><?php echo $Shift->shift_type;?>
	</td>
</tr>
<tr>
	<td>
	<label> Division  </label></td><td><?php echo $Division->division_name;?>
	</td>
</tr>
<tr>
	<td>
	<label> Batch  </label></td><td><?php echo $Batch->batch_name;?>
	</td>
</tr>
<tr>
	<td>
	<label> Organization  </label></td><td><?php echo $Organization->organization_name;?>
	</td>
</tr>
<tr>
	<td>
	<label> Language 1  </label></td><td><?php 
			if($LanguagesKnown->languages_known1 != null)
			echo Languages::model()->findByPk($LanguagesKnown->languages_known1)->languages_name;
			else
			echo "";	
		?>
	</td>
</tr>
<tr>
	<td>
	<label> Language 2  </label></td><td><?php 
			if($LanguagesKnown->languages_known2 != null)
			echo Languages::model()->findByPk($LanguagesKnown->languages_known2)->languages_name;
			else
			echo "";	
		?>
	</td>
</tr>
<tr>
	<td>
	<label> Language 3  </label></td><td><?php 
			if($LanguagesKnown->languages_known3 != null)
			echo Languages::model()->findByPk($LanguagesKnown->languages_known3)->languages_name;
			else
			echo "";	
		?>
	</td>
</tr>
<tr>
	<td>
	<label> Language 4  </label></td><td><?php 
			if($LanguagesKnown->languages_known4 != null)
			echo Languages::model()->findByPk($LanguagesKnown->languages_known4)->languages_name;
			else
			echo "";	
		?>
	</td>
</tr>
</table>
</br></br>


<h4>Address Info</h4>
<table border="1" width="200px">
<tr>
<td colspan="2" align="center">Current Address</td>
</tr>
<tr>	
	<td>
	<label> Line1  </label></td><td><?php 
		echo $StudentAddress->student_address_c_line1;
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> Line2  </label></td><td><?php 
		$StudentAddress->student_address_c_line2;
		?>
	</td>
</tr>

<tr>	
	<td>
	<label> Taluka  </label></td><td><?php 
		echo $StudentAddress->student_address_c_taluka;
		?>
	</td>
</tr>

<tr>	
	<td>
	<label> District  </label></td><td><?php 
		echo $StudentAddress->student_address_c_district;
		?>
	</td>
</tr>

<tr>	
	<td>
	<label> City </label></td><td><?php 
		if($StudentAddress->student_address_c_city !=0)
		echo City::model()->findByPk($StudentAddress->student_address_c_city)->city_name;
		else
		echo "";
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> Pincode </label></td><td><?php 
		echo $StudentAddress->student_address_c_pin;
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> State </label></td><td><?php 
		if($StudentAddress->student_address_c_state !=0)
		echo State::model()->findByPk($StudentAddress->student_address_c_state)->state_name;
		else
			echo "";
			
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> Country </label></td><td><?php 
		if($StudentAddress->student_address_c_country!=0)
		echo  Country::model()->findByPk($StudentAddress->student_address_c_country)->name;
		else
		echo "";
		?>
	</td>
</tr>

<tr>
<td colspan="2" align="center">Permanent Address</td>
</tr>
<tr>	
	<td>
	<label> Line1  </label></td><td><?php
		echo $StudentAddress->student_address_p_line1;
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> Line2  </label></td><td><?php 
		echo $StudentAddress->student_address_p_line2;
		?>
	</td>
</tr>

<tr>	
	<td>
	<label> Taluka  </label></td><td><?php 
		echo $StudentAddress->student_address_p_taluka;
		?>
	</td>
</tr>

<tr>	
	<td>
	<label> District  </label></td><td><?php 
		echo $StudentAddress->student_address_p_district;
		?>
	</td>
</tr>


<tr>	
	<td>
	<label> City </label></td><td><?php 
		if($StudentAddress->student_address_p_city !=0)
		echo City::model()->findByPk($StudentAddress->student_address_p_city)->city_name;
		else
		echo "";
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> Pincode </label></td><td><?php 
		echo $StudentAddress->student_address_p_pin;
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> State </label></td><td><?php 
		if($StudentAddress->student_address_p_state !=0)
				echo State::model()->findByPk($StudentAddress->student_address_p_state)->state_name;
		else
			echo "";
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> Country </label></td><td><?php 
		if($StudentAddress->student_address_p_country!=0)
		echo  Country::model()->findByPk($StudentAddress->student_address_p_country)->name;
	else
		echo "";
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> Phone No </label></td><td><?php 
		echo $StudentAddress->student_address_phone;
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> Mobile No </label></td><td><?php 
		echo $StudentAddress->student_address_mobile;
		?>
	</td>
</tr>
</table>
</br></br>
<?php echo "</br></br>"; ?>
<h3>Attached Documents</h3>

<?php $k=0;

if ($student_docs != null){
?>
<table border="1">

	<tr>
		<th>
		      SN.		
		</th>
		<th>
		      Title
		</th>
		<th>
		      Document Category
		</th>
		<th width="70px">
		      Description		
		</th>
		<th>
		      Submit Date
		</th>
 		
 	</tr>
	<?php 
	
	foreach($student_docs as $m=>$v) {
		
		$StudentDocs = StudentDocs::model()->findByPk($v['student_docs_trans_stud_docs_id']);
            ?>	<tr>
			<td>
			      <?php echo ++$k; ?>		
			</td>
			<td>
			      <?php echo $StudentDocs->title;?>
			</td>
			<td>
			      <?php echo DocumentCategoryMaster::model()->findByPk($StudentDocs->doc_category_id)->doc_category_name; ?>
			</td>
			<td width="70px">
			      <?php echo $StudentDocs->student_docs_desc; ?>		
			</td>
			<td>
			      <?php $docdate = date_create($StudentDocs->student_docs_submit_date);
				echo date_format($docdate,'d-m-Y');?>
			</td>
 		</tr> 
       <?php
    
     }// end for loop
	
?>
</table>
<?php }
	else 
		echo "No document available";
	

 ?>
</br></br>
<h3>Qualification</h3>

<?php $k=0;
//print_r($model);exit;
if ($studentqualification != null){
?>
<table border="1">

	<tr>
		<th>
		      SN.		
		</th>
		<th>
		     Qualification
		</th>
		<th>
		     Eduboard
		</th>
		<th>
		     Year
		</th>
		<th>
		     Theory Mark Obtained
		</th>
		<th>
		     Theory Mark Max
		</th>
		<th>
		    Theory Percentage
		</th>
		<th>
		    Practical Mark Obtained
		</th>
		<th>
		    Practical Mark Max
		</th>
		<th>
		   Practical Percentage
		</th>
		
 	</tr>
	<?php 
	foreach($studentqualification as $m=>$v) {
            ?>	<tr>
			<td>
			      <?php echo ++$k; ?>		
			</td>
			<td>
			      <?php echo Qualification::model()->findByPk($v['student_academic_record_trans_qualification_id'])->qualification_name; ?>
			</td>
			<td>
			      <?php echo Eduboard::model()->findByPk($v['student_academic_record_trans_eduboard_id'])->eduboard_name; ?>
			</td>
			<td>
			      <?php echo Year::model()->findByPk($v['student_academic_record_trans_record_trans_year_id'])->year; ?>
			</td>
			<td>
			      <?php echo $v['theory_mark_obtained']; ?>
			</td>
			<td>
			      <?php echo $v['theory_mark_max']; ?>
			</td>
			<td>
			      <?php echo $v['theory_percentage']; ?>
			</td>
			<td>
			      <?php echo $v['practical_mark_obtained']; ?>
			</td>
			<td>
			      <?php echo $v['practical_mark_max']; ?>
			</td>
			<td>
			      <?php echo $v['practical_percentage']; ?>
			</td>
 		</tr> 
       <?php

     }// end for loop
	
?>
</table>
<?php }
	else
		echo "No data available";
?>
</br></br>
<h3>Performance</h3>

<?php $k=0;
//print_r($model);exit;
if ($studentfeedbackdetailstable != null){
?>
<table border="1">

	<tr>
		<th>
		      SN.		
		</th>
		<th>
		     Performance Category
		</th>
		<th>
		     Performance Remarks
		</th>
		
 	</tr>
	<?php 
	foreach($studentfeedbackdetailstable as $m=>$v) {
            ?>	<tr>
			<td>
			      <?php echo ++$k; ?>		
			</td>
			<td>
			      <?php echo FeedbackCategoryMaster::model()->findByPk($v['feedback_category_master_id'])->feedback_category_name; ?>
			</td>
			<td>
			      <?php echo $v['feedback_details_remarks']; ?>
			</td>
		</tr> 
       <?php
     }// end for loop
	
?>
</table>
<?php }
	else
		echo "No data available";
 ?>
