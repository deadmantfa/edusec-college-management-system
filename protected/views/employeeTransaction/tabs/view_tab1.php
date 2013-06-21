
<!--<div class ="formv">-->

	<div class="row_photo_v">
	       <?php echo CHtml::image(Yii::app()->baseUrl.'/emp_images/' . $model->Rel_Photo->employee_photos_path); ?>
	</div>

<!--<div class = "row_all">
	<div class="row_t_v">
		<?php echo '<lable><b>ID :</b></lable>';?>
			<div class = "rowm">
			<?php echo $model->employee_transaction_id .'<br>'; ?>
			</div>
	</div>

</div>
-->
<div class = "row_all">
	
	<div class="row_t_v">
		<?php echo '<lable><b>Employee No. :</b></lable>'; ?>
		<div class = "rowm">
			<?php echo $model->Rel_Emp_Info->employee_no.'<br>'; ?>
		</div>
	</div>
</div>
<div class = "row_all_a">

	<div class = "row_t_v">
		<?php echo '<lable><b>Employee AICTE Id:</b></lable>'; ?>
		<div class="rowm">
			<?php echo $model->Rel_Emp_Info->employee_aicte_id .'<br>'; ?>
		</div>	
	</div>



	<div class="row_t_v">
		<?php echo '<lable><b>Employee GTU Id :</b></lable>'; ?>
			<div class = "rowm">
			<?php echo $model->Rel_Emp_Info->employee_gtu_id .'<br>'; ?>
			</div>
	</div>
</div>
<div class = "row_all">
	<div class="row_t_v">
		<?php echo '<lable><b>Name :</b></lable>'; ?>
		<div class = "rowm">
			<?php echo $model->Rel_Emp_Info->title.$model->Rel_Emp_Info->employee_first_name .'<br>'; ?>
		</div>
	</div>


	<div class="row_t_v">
		<?php echo '<lable><b>Husband/Father Name :</b></lable>'; ?>
		<div class="rowm">
			<?php
				if($model->Rel_Emp_Info->employee_middle_name != null)
					echo $model->Rel_Emp_Info->employee_middle_name. '<br>';
				else
					 echo "N/A";
			
			?>

		</div>
	</div>

</div>

<div class = "row_all_a">

	<div class = "row_t_v">
		<?php echo '<lable><b>Surname :</b></lable>'; ?>
		<div class="rowm">
			<?php echo $model->Rel_Emp_Info->employee_last_name .'<br>'; ?>
		</div>	
	</div>



	<div class="row_t_v">
		<?php echo '<lable><b>Mother Name :</b></lable>'; ?>
			<div class = "rowm">
			<?php echo $model->Rel_Emp_Info->employee_mother_name .'<br>'; ?>
			</div>
	</div>
</div>
<div class = "row_all">

	<div class="row_t_v">
		<?php echo '<lable><b>Alias Name :</b></lable>'; ?>
			<div class = "rowm">
			<?php
				if($model->Rel_Emp_Info->employee_name_alias != null)
					echo $model->Rel_Emp_Info->employee_name_alias. '<br>';
				else
					 echo "N/A";
			
			?>

			</div>
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>DOB :</b></lable>';?>
			<div class = "rowm">

			<?php
			$date = date_create($model->Rel_Emp_Info->employee_dob);
			echo date_format($date, 'd-m-Y');
			?>


			</div>
	</div>
</div>

<div class = "row_all_a">
	<div class="row_t_v">
		<?php echo '<lable><b>Birthplace :</b></lable>'; ?>
			<div class = "rowm">
			<?php
				if($model->Rel_Emp_Info->employee_birthplace != null)
					echo $model->Rel_Emp_Info->employee_birthplace. '<br>';
				else
					 echo "N/A";
			
			?>
			</div>
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Gender :</b></lable>';?>
			<div class = "rowm">
			<?php echo $model->Rel_Emp_Info->employee_gender .'<br>'; ?>
			</div>
	</div>
</div>

<div class = "row_all">
	<div class="row_t_v">
		<?php echo '<lable><b>Bloodgroup :</b></lable>'; ?>
			<div class = "rowm">
			<?php echo $model->Rel_Emp_Info->employee_bloodgroup .'<br>'; ?>
			</div>
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Marital Status :</b></lable>'; ?>
			<div class = "rowm">
			<?php echo $model->Rel_Emp_Info->employee_marital_status .'<br>'; ?>
			</div>
	</div>
</div>

<div class = "row_all_a">
	<div class="row_t_v">
		<?php echo '<lable><b>Private Mobile :</b></lable>' ; ?>
		<div class="rowm">
			<?php
				if($model->Rel_Emp_Info->employee_private_mobile != 0)
					echo $model->Rel_Emp_Info->employee_private_mobile. '<br>';
				else
					 echo "N/A";
			?>

		</div>
	</div> 

	<div class="row_t_v">
		<?php echo '<lable><b>Pancard No :</b></lable>' ; ?>
		<div class="rowm">
			<?php
				if($model->Rel_Emp_Info->employee_pancard_no != null)
					echo $model->Rel_Emp_Info->employee_pancard_no. '<br>';
				else
					 echo "N/A";
			
			?>
		</div>
	</div>
</div>

<div class = "row_all">
	<div class="row_t_v">
		<?php echo '<lable><b>Account No :</b></lable>'; ?> 
		<div class="rowm">
			<?php
				if($model->Rel_Emp_Info->employee_account_no != 0)
					echo $model->Rel_Emp_Info->employee_account_no. '<br>';
				else
					 echo "N/A";
			
			?>
		</div>
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Joining Date :</b></lable>' ; ?>
		<div class="rowm">

			<?php
			$date = date_create($model->Rel_Emp_Info->employee_joining_date);
			echo date_format($date, 'd-m-Y');
			?>

		</div>
	</div>
</div>

<div class = "row_all_a">
	<div class="row_t_v">
		<?php echo '<lable><b>Probation Period :</b></lable>' ; ?>
		<div class="rowm">
			<?php
				if($model->Rel_Emp_Info->employee_probation_period != null)
					echo $model->Rel_Emp_Info->employee_probation_period. '<br>';
				else
					 echo "N/A";
			
			?>
		</div>
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Private Email :</b></lable>' ; ?>
		<div class="rowm">
			<?php echo $model->Rel_Emp_Info->employee_private_email .'<br>'; ?>
		</div>
	</div>
</div>

<div class = "row_all">
	<div class="row_t_v">
		<?php echo '<lable><b>Category :</b></lable>' ;?>
		<div class="rowm">
			<?php echo $model->Rel_Category->category_name .'<br>'; ?>
		</div>
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Employee Type :</b></lable>'; ?>
		<div class="rowm">
			<?php  if($model->Rel_Emp_Info->employee_type==1) echo 'Teaching' .'<br>';
				else echo 'Non-Teaching' .'<br>';  ?>
		</div>
	</div> 
</div>

<div class = "row_all_a">
	<div class="row_t_v">
		<?php echo '<lable><b>Religion :</b></lable>' ; ?>
		<div class="rowm">

			<?php echo ($model->employee_transaction_religion_id != null ? $model->Rel_Religion->religion_name : 'NA'); ?>
		</div>
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Shift :</b></lable>' ; ?>
		<div class="rowm">
			<?php echo $model->Rel_Shift->shift_type .'<br>'; ?>
		</div>
	</div>
</div>

<div class = "row_all">
	<div class="row_t_v">
		<?php echo '<lable><b>Designation :</b></lable>' ; ?>
		<div class="rowm">
			<?php echo $model->Rel_Designation->employee_designation_name .'<br>'; ?>
		</div>
	</div>

	<div class="row_t_v">
		<?php echo '<lable><b>Nationality :</b></lable>' ; ?>
		<div class="rowm">
			<?php echo $model->Rel_Nationality->nationality_name .'<br>'; ?>
		</div>
	</div>
</div>

<div class = "row_all_a">
	<div class="row_t_v">
		<?php echo '<lable><b>Department :</b></lable>' ;?>
		<div class="rowm">
			<?php echo $model->Rel_Department->department_name .'<br>'; ?>
		</div>
	</div>

	
	<div class="row_t_v">
	<?php echo '<lable><b>Org. Mobile :</b></lable>' ; ?>
		<div class="rowm">
			<?php
				if($model->Rel_Emp_Info->employee_organization_mobile != 0)
					echo $model->Rel_Emp_Info->employee_organization_mobile. '<br>';
				else
					 echo "N/A";
			
			?></div></div>
		
</div>
<!--
<div class = "row_all_a">
	<div class="row_t_v">
		<?php echo '<lable><b>Org. Mobile :</b></lable>' ; ?>
		<div class="rowm">
			<?php
				if($model->Rel_Emp_Info->employee_organization_mobile != 0)
					echo $model->Rel_Emp_Info->employee_organization_mobile. '<br>';
				else
					 echo "N/A";
			
			?>
		</div>
	</div>
</div>
-->
<!--</div>-->
