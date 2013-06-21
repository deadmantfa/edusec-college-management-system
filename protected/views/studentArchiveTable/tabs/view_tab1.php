<div class="row_photo_v">
		<?php //echo CHtml::image(Yii::app()->baseUrl.'/stud_images/' . $model->Rel_Photos->student_photos_path); ?>
		<?php $photoid=StudentTransaction::model()->findByPk($model->student_archive_stud_tran_id)->student_transaction_student_photos_id;
			echo CHtml::image(Yii::app()->baseUrl.'/stud_images/' .StudentPhotos::model()->findByPk($photoid)->student_photos_path);?>  
</div>
<!--<div class = "row_all_a">
	<div class="row_t_v">
		<?php echo '<lable><b>ID :</b></lable>';?>
		<div class="rowm">
			<?php echo $model->student_archive_stud_tran_id.'<br>'; ?>
		</div>
	</div>
</div>
-->

<div class = "row_all">

	<div class="row_t_v">
		<?php echo '<lable><b>Roll No :</b></lable>'; ?>
		<div class="rowm">
			<?php echo $model->Rel_Stud_Info->student_roll_no .'<br>'; ?>
		</div>	
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>GR No: </b></lable>'; ?>
		<div class="rowm">
			<?php echo $model->Rel_Stud_Info->student_gr_no .'<br>'; ?>
		</div>	
	</div>

</div>

<div class = "row_all_a">
	<div class="row_t_v">
		<?php echo '<lable><b>Merit Number :</b></lable>'; ?>
		<div class="rowm">
			<?php echo $model->Rel_Stud_Info->student_merit_no .'<br>'; ?>
		</div>
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Enrollment No :</b></lable>'; ?>
		<div class="rowm">
			<?php echo $model->Rel_Stud_Info->student_enroll_no .'<br>'; ?>
		</div>
	</div>
</div>

<div class = "row_all">
	<div class="row_t_v">
		<?php echo '<lable><b>Name :</b></lable>';?>
		<div class = "rowm">
			<?php echo $model->Rel_Stud_Info->title.$model->Rel_Stud_Info->student_first_name .'<br>'; ?>
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
			<?php echo $model->Rel_Stud_Info->student_mother_name.'<br>'; ?>
		</div>
	</div>
</div>

<div class = "row_all">

	<div class="row_t_v">
		<?php echo '<lable><b>Gender :</b></lable>';?>
		<div class="rowm">
			<?php echo $model->Rel_Stud_Info->student_gender.'<br>'; ?>
		</div>
	</div>
	<div class="row_t_v">
		<?php echo '<lable><b>Mobile No. :</b></lable>';?>
		<div class="rowm">
			<?php echo $model->Rel_Stud_Info->student_mobile_no.'<br>'; ?>
		</div>
	</div>

	
</div>

<div class = "row_all_a">
	<div class="row_t_v">


		<?php echo '<lable><b>ACPC Adm. Date :</b></lable>';?>

		<div class="rowm">
			
			<?php
			$date = date_create($model->Rel_Stud_Info->student_adm_date);
			echo date_format($date, 'd-m-Y');
			?>

		</div>
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Date of Birth :</b></lable>';?>
		<div class="rowm">

			<?php
			$date = date_create($model->Rel_Stud_Info->student_dob);
			echo date_format($date, 'd-m-Y');
			?>


		</div>
	</div>
</div>

<div class = "row_all">
	<div class="row_t_v">
		<?php echo '<lable><b>Term Period :</b></lable>';?>
		<div class="rowm">
			
			<?php
			echo AcademicTermPeriod::model()->findByPk($model->student_archive_ac_t_p_id)->academic_term_period;
			//echo $period;
			?>

		</div>
	1</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Semester Name :</b></lable>';?>
		<div class="rowm">

			<?php
			echo AcademicTerm::model()->findByPk($model->student_archive_ac_t_n_id)->academic_term_name;
			//echo $periodname;
			?>


		</div>
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
		<?php echo '<lable><b>Category :</b></lable>'; ?>
		<div class="rowm">
			<?php $categoryid=StudentTransaction::model()->findByPk($model->student_archive_stud_tran_id)->student_transaction_category_id;?>
			<?php echo Category::model()->findByPk($categoryid)->category_name;?>
		</div>
	</div>

</div>

<div class = "row_all">
	<div class="row_t_v">
		<?php echo '<lable><b>Nationality :</b></lable>'; ?>
		<div class="rowm">
			<?php $nationid=StudentTransaction::model()->findByPk($model->student_archive_stud_tran_id)->student_transaction_nationality_id;?>
			<?php echo Nationality::model()->findByPk($nationid)->nationality_name;?>
		</div>
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Quota :</b></lable>'; ?>
		<div class="rowm">
			<?php $quotaid=StudentTransaction::model()->findByPk($model->student_archive_stud_tran_id)->student_transaction_category_id;?>
			<?php echo Quota::model()->findByPk($quotaid)->quota_name;?>
		</div>
	</div>
</div>

<div class = "row_all_a">
	<div class="row_t_v">
		<?php echo '<lable><b>Religion :</b></lable>'; ?>
		<div class="rowm">

	<?php //echo ($model->student_transaction_religion_id != null ? $model->Rel_Religion->religion_name : 'NA'); ?>
	<?php $religionid=StudentTransaction::model()->findByPk($model->student_archive_stud_tran_id)->student_transaction_religion_id;?>
	<?php echo Religion::model()->findByPk($religionid)->religion_name;?>		
		</div>
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Branch :</b></lable>'; ?>
		<div class="rowm">
			<?php //echo $model->Rel_Branch->branch_name .'<br>'; ?>
			<?php $branchid=StudentTransaction::model()->findByPk($model->student_archive_stud_tran_id)->student_transaction_branch_id;?>
			<?php echo Branch::model()->findByPk($branchid)->branch_name;?>		
		</div>
	</div>
</div>

<div class = "row_all">	
	<div class="row_t_v">
		<?php echo '<lable><b>Resident Status :</b></lable>';?>
		<div class="rowm">
			<?php echo $model->Rel_Stud_Info->student_living_status.'<br>'; ?>
		</div>
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Student Status :</b></lable>';?>
		<div class="rowm">
			<?php echo $model->Rel_Stud_Info->student_dtod_regular_status.'<br>'; ?>
		</div>
	</div>	
</div>

