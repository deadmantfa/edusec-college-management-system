<?php 
if($model->student_transaction_student_address_id != null)
{
?>
<div class = "row_all_v">
	<div class = "rowv">
		<?php echo '<lable><b><u>Current Address</u></b></lable>'; ?>
	</div>

	<div class = "rowv">
		<?php echo '<lable><b><u>Permanant Address</u></b></lable>'; ?>
	</div>
</div>

<div class = "row_all_vm">
	<div class="rowv">
		<?php echo '<lable><b>Line1 :</b></lable>'; ?>
		<div class="row_b">
			<?php 
			if($model->Rel_Student_Address->student_address_c_line1 != null)
				echo $model->Rel_Student_Address->student_address_c_line1 .'<br>'; 
			else
				echo "Not Set</br>";

			?>
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Line1 :</b></lable>'; ?>
		<div class="row_b">
			<?php 
			if($model->Rel_Student_Address->student_address_p_line1 != null)
				echo $model->Rel_Student_Address->student_address_p_line1 .'<br>'; 
			else
				echo "Not Set</br>";
			?>
		</div>
	</div>
</div>

<div class = "row_all_v">
	<div class="rowv">
		<?php echo '<lable><b>Line2 :</b></lable>'; ?>
		<div class="row_b">
			<?php 
			if($model->Rel_Student_Address->student_address_c_line2 != null)
				echo $model->Rel_Student_Address->student_address_c_line2 .'<br>'; 
			else
				echo "Not Set</br>";
			?>
		</div>
	</div>


	<div class="rowv">
		<?php echo '<lable><b>Line2 :</b></lable>'; ?>
		<div class="row_b">
			<?php 
			if($model->Rel_Student_Address->student_address_p_line2 != null)
				echo $model->Rel_Student_Address->student_address_p_line2 .'<br>'; 
			else
				echo "Not Set</br>";
			?>
		</div>
	</div>
</div>

<div class = "row_all_vm">
	<div class="rowv">
		<?php echo '<lable><b>City :</b></lable>'; ?>
		<div class="rown">
			<?php
			if($model->Rel_Student_Address->student_address_c_city != null) 		{
			    $stud_c_city = $model->findcity($model->Rel_Student_Address->student_address_c_city);
			    echo $stud_c_city .'<br>'; 
			}
			else
			    echo "Not Set</br>";
			
			?>

		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>City :</b></lable>'; ?>
		<div class="rown">
			<?php
			if($model->Rel_Student_Address->student_address_p_city != null)			{
			$stud_p_city = $model->findcity($model->Rel_Student_Address->student_address_p_city);
			 echo $stud_p_city .'<br>'; 
			}
			else
				echo "Not Set</br>";

			?>

		</div>
	</div>
</div>

<div class = "row_all_v">
	<div class="rowv">
		<?php echo '<lable><b>Pincode :</b></lable>'; ?>
		<div class="rown">
			<?php 
			if($model->Rel_Student_Address->student_address_c_pin != null)			{
				echo $model->Rel_Student_Address->student_address_c_pin .'<br>'; 
			}
			else
				echo "Not Set</br>";
			?>
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Pincode :</b></lable>'; ?>
		<div class="rown">
			<?php 
			if($model->Rel_Student_Address->student_address_p_pin != null)			{
				echo $model->Rel_Student_Address->student_address_p_pin .'<br>'; 
			}
			else
				echo "Not Set</br>";
			?>
		</div>
	</div>
</div>

<div class = "row_all_vm">
	<div class="rowv">
		<?php echo '<lable><b>State :</b></lable>'; ?>
		<div class="rown">
			<?php
			if($model->Rel_Student_Address->student_address_c_state != null)
			{
			    $stud_c_state = $model->findstate($model->Rel_Student_Address->student_address_c_state);
			 echo $stud_c_state .'<br>'; 
			}
			else
				echo "Not Set</br>";
			?>

		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>State :</b></lable>'; ?>
		<div class="rown">
			<?php
			if($model->Rel_Student_Address->student_address_p_state != null)			{
			    $stud_p_state = $model->findstate($model->Rel_Student_Address->student_address_p_state);
			 echo $stud_p_state .'<br>'; 
			}
			else
				echo "Not Set</br>";	
			?>

		</div>
	</div>
</div>

<div class = "row_all_v">
	<div class="rowv">
		<?php echo '<lable><b>Country :</b></lable>'; ?>
		<div class="rown">
			<?php
			if($model->Rel_Student_Address->student_address_c_country != null) {
			    $stud_c_country = $model->findcountry($model->Rel_Student_Address->student_address_c_country);
			 echo $stud_c_country .'<br>'; 
			}
			else
				echo "Not Set</br>";
			?>

		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Country :</b></lable>'; ?>
		<div class="rown">
			<?php
			if($model->Rel_Student_Address->student_address_p_country != null) {
			    $stud_p_country = $model->findcountry($model->Rel_Student_Address->student_address_p_country);
			 echo $stud_p_country .'<br>'; 
			}
			else
				echo "Not Set</br>";
			?>

		</div>
	</div>
</div>

<div class = "row_all_vm">
	<div class="rowv">
		<?php echo '<lable><b>Phone No :</b></lable>'; ?>
		<div class="rown">
			<?php
				if($model->Rel_Student_Address->student_address_phone != 0)
					echo $model->Rel_Student_Address->student_address_phone. '<br>';
				else
					 echo "N/A";
			?>
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Mobile :</b></lable>'; ?>
		<div class="rown">
			<?php
				if($model->Rel_Student_Address->student_address_mobile != 0)
					echo $model->Rel_Student_Address->student_address_mobile. '<br>';
				else
					 echo "N/A";
			?>

		</div>
	</div>
</div>
<?php }
else
{
	echo "Nol data available. update if you want";
}
