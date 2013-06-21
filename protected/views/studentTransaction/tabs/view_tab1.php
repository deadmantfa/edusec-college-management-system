<div class="row_photo_v">
		<?php echo CHtml::image(Yii::app()->baseUrl.'/stud_images/' . $model->Rel_Photos->student_photos_path); ?>
</div>
<!--<div class = "row_all_a">
	<div class="row_t_v">
		<?php echo '<lable><b>ID :</b></lable>';?>
		<div class="rowm">
			<?php echo $model->student_transaction_id .'<br>'; ?>
		</div>
	</div>
</div>
-->

<div class = "row_all">

	<div class="row_t_v">
		<?php echo '<lable><b>Roll No :</b></lable>'; ?>
		<div class="rowm">
			<?php
				echo $model->Rel_Stud_Info->student_roll_no .'<br>'; 
			?>
		</div>
		
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>GR No: </b></lable>';?>
		<div class="rowm">
			<?php 
			if($model->Rel_Stud_Info->student_gr_no != null)
				echo $model->Rel_Stud_Info->student_gr_no .'<br>'; 
			else
				echo 'Not Set</br>';
			?>
		</div>
	</div>

</div>

<div class = "row_all_a">
	<div class="row_t_v">
		<?php echo '<lable><b>Merit Number :</b></lable>';?>
		<div class="rowm">
			<?php 
			if($model->Rel_Stud_Info->student_merit_no != null)
				echo $model->Rel_Stud_Info->student_merit_no .'<br>'; 
			else
				echo 'Not Set</br>';
			?>
		</div>
		
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Enrollment No :</b></lable>';?>
		<div class="rowm">
			<?php 
			
				echo $model->Rel_Stud_Info->student_enroll_no .'<br>'; 
			
			?>
		</div>
		
	</div>
</div>

<div class = "row_all">
	<div class="row_t_v">
		<?php echo '<lable><b>Name :</b></lable>';?>
		<div class = "rowm">
			<?php 				
				echo $model->Rel_Stud_Info->title.$model->Rel_Stud_Info->student_first_name .'<br>'; 
			?>
		</div>
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Husband/Father Name :</b></lable>';?>
		<div class = "rowm">
			<?php
				if($model->Rel_Stud_Info->student_middle_name != null)
					echo $model->Rel_Stud_Info->student_middle_name. '<br>';
				else
					 echo "N/A";
			
			?>
		</div>
	</div>
</div>

<div class = "row_all_a">
	<div class="row_t_v">
		<?php echo '<lable><b>Surname :</b></lable>';?>
		<div class = "rowm">
			<?php echo $model->Rel_Stud_Info->student_last_name.'<br>'; ?>
		</div>
		
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Mother Name :</b></lable>';?>
		<div class="rowm">
			<?php 
			if($model->Rel_Stud_Info->student_mother_name != null)
				echo $model->Rel_Stud_Info->student_mother_name.'<br>'; 
			else
				echo "Not Set</br>";
					
			?>
		</div>
	</div>
</div>

<div class = "row_all">

	<div class="row_t_v">
		<?php echo '<lable><b>Gender :</b></lable>';?>
		<div class="rowm">
			<?php 
			if($model->Rel_Stud_Info->student_gender != null)
				echo $model->Rel_Stud_Info->student_gender.'<br>'; 
			else
				echo "Not Set</br>";
			?>
		</div>
		
	</div>
	<div class="row_t_v">
		<?php echo '<lable><b>Mobile No. :</b></lable>';?>
		<div class="rowm">
			<?php 
			if($model->Rel_Stud_Info->student_mobile_no != null)
				echo $model->Rel_Stud_Info->student_mobile_no.'<br>'; 
			else
				echo "Not Set</br>";
			?>
		</div>
		
	</div>

	
</div>

<div class = "row_all_a">
	<div class="row_t_v">


		<?php echo '<lable><b>ACPC Adm. Date :</b></lable>';?>
		<div class="rowm">
			<?php
			if($model->Rel_Stud_Info->student_adm_date != null)
			{
			$date = date_create($model->Rel_Stud_Info->student_adm_date);
			echo date_format($date, 'd-m-Y');
			}
			else
				echo "Not Set</br>";
			?>
		</div>
		
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Date of Birth :</b></lable>';?>
		<div class="rowm">
			<?php
			if($model->Rel_Stud_Info->student_dob != null)
			{
			$date = date_create($model->Rel_Stud_Info->student_dob);
			echo date_format($date, 'd-m-Y');
			}
			else
				echo "Not Set</br>";
			?>
		</div>
		
	</div>
</div>

<div class = "row_all">
	<div class="row_t_v">
		<?php echo '<lable><b>Academic Year :</b></lable>';
		if($model->student_transaction_student_id != null)
		{
		?>
		<div class="rowm">		
			<?php
			echo AcademicTermPeriod::model()->findByPk($model->student_academic_term_period_tran_id)->academic_term_period;
			//echo $period;
			?>

		</div>
		<?php } else { ?>
		<div class="rowm">
			<?php echo 'Not Set</br>'; ?>
		</div>			
		<?php } ?>
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Semester :</b></lable>';
		if($model->student_academic_term_period_tran_id != null)
		{
		?>
		<div class="rowm">

			<?php
			echo AcademicTerm::model()->findByPk($model->student_academic_term_name_id)->academic_term_name;
			//echo $periodname;
			?>
		</div>
		<?php } else { ?>
		<div class="rowm">
			<?php echo 'Not Set</br>'; ?>
		</div>			
		<?php } ?>
	</div>
</div>



<div class = "row_all_a">
	<div class="row_t_v">
		<?php echo '<lable><b>BirthPlace :</b></lable>';?>
		<div class="rowm">
			<?php
				if($model->Rel_Stud_Info->student_birthplace != null)
					echo $model->Rel_Stud_Info->student_birthplace. '<br>';
				else
					 echo "N/A";
			
			?>

		</div>
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Category :</b></lable>'; 
		if($model->student_transaction_category_id != null)
		{
		?>
		<div class="rowm">
			<?php echo $model->Rel_Category->category_name .'<br>'; ?>
		</div>
		<?php } else { ?>
		<div class="rowm">
			<?php echo 'Not Set</br>'; ?>
		</div>			
		<?php } ?>
	</div>

</div>

<div class = "row_all">
	<div class="row_t_v">
		<?php echo '<lable><b>Nationality :</b></lable>'; 
		if($model->student_transaction_nationality_id != null)
		{
		?>
		<div class="rowm">
			<?php echo $model->Rel_Nationality->nationality_name .'<br>'; ?>
		</div>
		<?php } else { ?>
		<div class="rowm">
			<?php echo 'Not Set</br>'; ?>
		</div>			
		<?php } ?>
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Quota :</b></lable>'; 
		if($model->student_transaction_quota_id != null)
		{	
		?>
		<div class="rowm">
			<?php echo $model->Rel_Quota->quota_name .'<br>'; ?>
		</div>
		<?php } else { ?>
		<div class="rowm">
			<?php echo 'Not Set</br>'; ?>
		</div>			
		<?php } ?>
	</div>
</div>

<div class = "row_all_a">
	<div class="row_t_v">
		<?php echo '<lable><b>Religion :</b></lable>'; 
		if($model->student_transaction_religion_id != null)
		{			
		?>
		<div class="rowm">
			<?php echo ($model->student_transaction_religion_id != null ? $model->Rel_Religion->religion_name : 'NA'); ?>			
		</div>
		<?php } else { ?>
		<div class="rowm">
			<?php echo 'Not Set</br>'; ?>
		</div>			
		<?php } ?>
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Branch :</b></lable>'; 
		if($model->student_transaction_branch_id != null)
		{			
		?>
		<div class="rowm">
			<?php echo $model->Rel_Branch->branch_name .'<br>'; ?>
		</div>
		<?php } else { ?>
		<div class="rowm">
			<?php echo 'Not Set</br>'; ?>
		</div>			
		<?php } ?>
	</div>
</div>

<div class = "row_all">	
	<div class="row_t_v">
		<?php echo '<lable><b>Resident Status :</b></lable>';?>
		<div class="rowm">
			<?php 
			if($model->Rel_Stud_Info->student_living_status != null)
				echo $model->Rel_Stud_Info->student_living_status.'<br>'; 
			else
				echo 'Not Set</br>'; 
			?>
		</div>
		
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Student Status :</b></lable>';?>
		<div class="rowm">
			<?php 
			if($model->Rel_Stud_Info->student_dtod_regular_status != null)
				echo $model->Rel_Stud_Info->student_dtod_regular_status.'<br>'; 
			else
				echo 'Not Set</br>';
			?>
		</div>
	</div>	
</div>

