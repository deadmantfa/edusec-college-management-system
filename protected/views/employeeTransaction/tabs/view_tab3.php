<div class = "row_all_v">

	<div class="rowv">
		<?php echo '<lable><b>Reference :</b></lable>' ; ?>
		<div class="rowm">
			<?php
				if($model->Rel_Emp_Info->employee_reference != null)
					echo $model->Rel_Emp_Info->employee_reference. '<br>';
				else
					 echo "N/A";
			
			?>
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Refer Designation :</b></lable>' ; ?>
		<div class="rowm">
			<?php
				if($model->Rel_Emp_Info->employee_refer_designation != null)
					echo $model->Rel_Emp_Info->employee_refer_designation. '<br>';
				else
					 echo "N/A";
			
			?>
		</div>
	</div>

</div>

<div class = "row_all_vm">

	<div class="rowv">
		<?php echo '<lable><b>Hobbies :</b></lable>' ; ?>
		<div class="row_b">
			<?php
				if($model->Rel_Emp_Info->employee_hobbies != null)
					echo $model->Rel_Emp_Info->employee_hobbies. '<br>';
				else
					 echo "N/A";
			
			?>
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Technical Skills :</b></lable>' ; ?>
		<div class="row_b">
			<?php
				if($model->Rel_Emp_Info->employee_technical_skills != null)
					echo $model->Rel_Emp_Info->employee_technical_skills. '<br>';
				else
					 echo "N/A";
			
			?>
		</div>
	</div>

</div>

<div class = "row_all_v">

	<div class="rowv">
		<?php echo '<lable><b>Project Details :</b></lable>' ;?>
		<div class="row_b">
			<?php
				if($model->Rel_Emp_Info->employee_project_details != null)
					echo $model->Rel_Emp_Info->employee_project_details. '<br>';
				else
					 echo "N/A";
			
			?>
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Curricular :</b></lable>' ; ?>
		<div class="row_b">
			<?php
				if($model->Rel_Emp_Info->employee_curricular != null)
					echo $model->Rel_Emp_Info->employee_curricular. '<br>';
				else
					 echo "N/A";
			
			?>
		</div>

	</div>

</div>

<div class = "row_all_vm">

</div>
<div class="row_all_vm">


	<div class="row_v">
		<?php echo '<lable><b>Course :</b></lable>' ; ?>
		<div class="rown">
			<?php echo $model->Rel_Emp_Info->employee_faculty_of .'<br>'; ?>
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Organization Name :</b></lable>' ;?>
		<div class="rowm">
			<?php echo $model->Rel_Organization->organization_name .'<br>'; ?>
		</div>
	</div>

</div>
