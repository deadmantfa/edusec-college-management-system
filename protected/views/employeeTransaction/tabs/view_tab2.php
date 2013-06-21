
<div class = "row_all_v">
	<div class="row_v">
		<?php echo '<lable><b>Name :</b></lable>' ; ?>
		<div class="rown">
			<?php
				if($model->Rel_Emp_Info->employee_guardian_name != null)
					echo $model->Rel_Emp_Info->employee_guardian_name .'<br>'; 
				else
					 echo "N/A";
			?>
		</div>
	</div>

	<div class="row_v">
		<?php echo '<lable><b>Relation :</b></lable>' ; ?>
		<div class="rown">
			<?php
				if($model->Rel_Emp_Info->employee_guardian_relation != null)
				echo $model->Rel_Emp_Info->employee_guardian_relation .'<br>';
			else
					 echo "N/A";
			?>
		</div>
	</div>
</div>

<div class = "row_all_vm">
	<div class="row_v">
		<?php echo '<lable><b>Qualification :</b></lable>' ;?>
		<div class="rown">
			<?php
				if($model->Rel_Emp_Info->employee_guardian_qualification != null)
					echo $model->Rel_Emp_Info->employee_guardian_qualification. '<br>';
				else
					 echo "N/A";
			
			?>
		</div>
	</div>

	<div class="row_v">
		<?php echo '<lable><b>Occupation :</b></lable>' ; ?> 
		<div class="rown">
			<?php
				if($model->Rel_Emp_Info->employee_guardian_occupation != null)
					echo $model->Rel_Emp_Info->employee_guardian_occupation. '<br>';
				else
					 echo "N/A";
			
			?>
		</div>
	</div>
</div>

<div class = "row_all_v">
	<div class="row_v">
		<?php echo '<lable><b>Income</b> : </lable>' ; ?>
		<div class="rown">
			<?php
				if($model->Rel_Emp_Info->employee_guardian_income != null)
				  echo $model->Rel_Emp_Info->employee_guardian_income .'<br>';
			else
					 echo "N/A";
			
			?>
		</div>
	</div>

	<div class="row_v">
		<?php echo '<lable><b>Attendance Card Id :</b></lable>'; ?>
		<div class="rown">
			<?php echo $model->Rel_Emp_Info->employee_attendance_card_id .'<br>'; ?>
		</div>
	</div>
</div>

<div class = "row_all_vm">
	<div class="row_v">
		<?php echo '<lable><b>Home Address :</b></lable>' ;?>
		<div class="row_b">
		<?php
				if($model->Rel_Emp_Info->employee_guardian_home_address != null)
				echo $model->Rel_Emp_Info->employee_guardian_home_address .'<br>';
			else
					 echo "N/A";
			
			?>
		</div>

	</div>

	<div class="row_v">
		<?php echo '<lable><b>Occupation Address :</b></lable>' ; ?>
		<div class="row_b">

			<?php
				if($model->Rel_Emp_Info->employee_guardian_occupation_address != null)
					 echo $model->Rel_Emp_Info->employee_guardian_occupation_address .'<br>'; 
				else
					 echo "N/A";
			
			?>
		</div>
	</div>
</div>

<div class = "row_all_v">
	<div class="row_v">
		<?php echo '<lable><b>Occupation City :</b></lable>' ; ?>
		<div class="rown">
			<?php

			if($model->Rel_Emp_Info->employee_guardian_occupation_city != 0)
			{
			   $guardian_city = $model->findcity($model->Rel_Emp_Info->employee_guardian_occupation_city);
			   echo $guardian_city.  '<br>'; 
			}
			else
			 echo "N/A";
			?>
		</div>
	</div>

	<div class="row_v">
		<?php echo '<lable><b>City Pin :</b></lable>' ; ?>
		<div class="rown">
			<?php
				if($model->Rel_Emp_Info->employee_guardian_city_pin != null)
					echo $model->Rel_Emp_Info->employee_guardian_city_pin. '<br>';
				else
					 echo "N/A";
			
			?>
		</div>
	</div>
</div>

<div class = "row_all_vm">
	<div class="row_v">
		<?php echo '<lable><b>Phone No :</b></lable>'; ?>
		<div class="rown">
			<?php
				if($model->Rel_Emp_Info->employee_guardian_phone_no != 0)
					echo $model->Rel_Emp_Info->employee_guardian_phone_no. '<br>';
				else
					 echo "N/A";
			
			?>
		</div>
	</div>

	<div class="row_v">
		<?php echo '<lable><b>Mobile1 :</b></lable>'; ?>
		<div class="rown">
			<?php // echo $model->Rel_Emp_Info->employee_guardian_mobile1 .'<br>'; ?>
			<?php
				if($model->Rel_Emp_Info->employee_guardian_mobile1 != 0)
					echo $model->Rel_Emp_Info->employee_guardian_mobile1. '<br>';
				else
					 echo "N/A";
			
			?>
		</div>
	</div>
</div>

<div class = "row_all_v">
	<div class="row_v">
		<?php echo '<lable><b>Mobile2 :</b></lable>' ; ?>
		<div class="rown">
			<?php
				if($model->Rel_Emp_Info->employee_guardian_mobile2 != 0)
					echo $model->Rel_Emp_Info->employee_guardian_mobile2. '<br>';
				else
					 echo "N/A";
			
			?>
		</div>
	</div>

</div>

