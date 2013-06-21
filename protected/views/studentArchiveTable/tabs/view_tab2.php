<div class = "row_all_v">
	<div class="rowv">
		<?php echo '<lable><b>Name :</b></lable>';?>
		<div class="rown">
			<?php echo $model->Rel_Stud_Info->student_guardian_name.'<br>'; ?>
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Relation :</b></lable>';?>
		<div class="rown">
			<?php echo $model->Rel_Stud_Info->student_guardian_relation.'<br>'; ?>
		</div>
	</div>
</div>

<div class = "row_all_vm">
	<div class="rowv">
		<?php echo '<lable><b>Qualification :</b></lable>';?>
		<div class="rown">
			<?php
				if($model->Rel_Stud_Info->student_guardian_qualification != null)
					echo $model->Rel_Stud_Info->student_guardian_qualification. '<br>';
				else
					 echo "N/A";
			
			?>

		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Occupation :</b></lable>';?>
		<div class="rown">
			<?php
				if($model->Rel_Stud_Info->student_guardian_occupation != null)
					echo $model->Rel_Stud_Info->student_guardian_occupation. '<br>';
				else
					 echo "N/A";
			
			?>
		</div>
	</div>
</div>

<div class = "row_all_v">
	<div class="rowv">
		<?php echo '<lable><b>Home Address :</b></lable>';?>
		<div class="row_b">
			<?php
				if($model->Rel_Stud_Info->student_guardian_home_address != null)
					echo $model->Rel_Stud_Info->student_guardian_home_address. '<br>';
				else
					 echo "N/A";			
			?>
		</div>
	</div>


	<div class="rowv">
		<?php echo '<lable><b>Occupation Address :</b></lable>';?>
		<div class="row_b">
			<?php
				if($model->Rel_Stud_Info->student_guardian_occupation_address != null)
					echo $model->Rel_Stud_Info->student_guardian_occupation_address. '<br>';
				else
					 echo "N/A";
			
			?>
		</div>
	</div>
</div>

<div class = "row_all_vm">
	<div class="rowv">
		<?php echo '<lable><b>Occupation City :</b></lable>';?>
		<div class="rown">
			<?php
				if($model->Rel_Stud_Info->student_guardian_occupation_city != 0)
				{
				    $guardian_city = $model->findcity($model->Rel_Stud_Info->student_guardian_occupation_city);
				    echo $guardian_city.  '<br>'; 
				}
				else
					echo "N/A";
			?>
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Pincode :</b></lable>';?>
		<div class="rown">
			<?php
				if($model->Rel_Stud_Info->student_guardian_city_pin != null)
					echo $model->Rel_Stud_Info->student_guardian_city_pin. '<br>';
				else
					 echo "N/A";
			?>
		</div>
	</div>
</div>

<div class = "row_all_v">
	<div class="rowv">
		<?php echo '<lable><b>Income :</b></lable>';?>
		<div class="rown">
			<?php echo $model->Rel_Stud_Info->student_guardian_income. '<br>'; ?>
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Phone No :</b></lable>';?>
		<div class="rown">
			<?php
				if($model->Rel_Stud_Info->student_guardian_phoneno != 0)
					echo $model->Rel_Stud_Info->student_guardian_phoneno. '<br>';
				else
					 echo "N/A";
			?>
		</div>
	</div>
</div>

<div class = "row_all_vm">
	<div class="rowv">
		<?php echo '<lable><b>Mobile :</b></lable>';?>
		<div class="rown">
			<?php echo $model->Rel_Stud_Info->student_guardian_mobile.  '<br>'; ?>

		</div>
	</div>
</div>
