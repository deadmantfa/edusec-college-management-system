
<div class = "row_all_v">
	<div class = "rowv">
		<?php echo '<lable><b><u>Current Address</u></b></lable>'; ?>
	</div>

	<div class = "rowv">
		<?php echo '<lable><b><u>Permanent Address</u></b></lable>'; ?>
	</div>
</div>

<div class = "row_all_vm">
	<div class="rowv">
		<?php echo '<lable><b>Line1 :</b></lable>'; ?>
		<div class="row_b">
			<?php echo $model->Rel_Employee_Address->employee_address_c_line1 .'<br>'; ?>
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Line1 :</b></lable>'; ?>
		<div class="row_b">
			<?php echo $model->Rel_Employee_Address->employee_address_p_line1 .'<br>'; ?>
		</div>
	</div>
</div>

<div class = "row_all_v">
	<div class="rowv">
		<?php echo '<lable><b>Line2 :</b></lable>'; ?>
		<div class="row_b">
			<?php echo $model->Rel_Employee_Address->employee_address_c_line2 .'<br>'; ?>
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Line2 :</b></lable>'; ?>
		<div class="row_b">
			<?php echo $model->Rel_Employee_Address->employee_address_p_line2 .'<br>'; ?>
		</div>
	</div>

</div>

<div class = "row_all_vm">

	<div class="rowv">
		<?php echo '<lable><b>City :</b></lable>'; ?>
		<div class="rowm">
			<?php
   $emp_c_city = $model->findcity($model->Rel_Employee_Address->employee_address_c_city);
echo $emp_c_city .'<br>'; ?>
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>City :</b></lable>'; ?>
		<div class="rowm">
			<?php
   $emp_p_city = $model->findcity($model->Rel_Employee_Address->employee_address_p_city);
echo $emp_p_city .'<br>'; ?>
		</div>
	</div>
</div>

<div class = "row_all_v">
	<div class="rowv">
		<?php echo '<lable><b>Pincode :</b></lable>'; ?>
		<div class="rowm">
			<?php echo $model->Rel_Employee_Address->employee_address_c_pincode .'<br>'; ?>
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Pincode :</b></lable>'; ?>
		<div class="rowm">
			<?php echo $model->Rel_Employee_Address->employee_address_p_pincode .'<br>'; ?>
		</div>
	</div>
</div>

<div class = "row_all_vm">
	<div class="rowv">
		<?php echo '<lable><b>State :</b></lable>'; ?>
		<div class="rowm">
			<?php
   $emp_c_state = $model->findstate($model->Rel_Employee_Address->employee_address_c_state);
echo $emp_c_state .'<br>'; ?>
		</div>
	</div>


	<div class="rowv">
		<?php echo '<lable><b>State :</b></lable>'; ?>
		<div class="rowm">
			<?php
   $emp_p_state = $model->findstate($model->Rel_Employee_Address->employee_address_p_state);
echo $emp_p_state .'<br>'; ?>
		</div>
	</div>
</div>

<div class = "row_all_v">
	<div class="rowv">
		<?php echo '<lable><b>Country :</b></lable>'; ?>
		<div class="rowm">
			<?php
   $emp_c_country = $model->findcountry($model->Rel_Employee_Address->employee_address_c_country);
echo $emp_c_country .'<br>'; ?>
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Country :</b></lable>'; ?>
		<div class="rowm">
			<?php
   $emp_p_country = $model->findcountry($model->Rel_Employee_Address->employee_address_p_country);
echo $emp_p_country .'<br>'; ?>
		</div>
	</div>
</div>
<!--
<div class = "row_all_vm">
	<div class="rowv">
		<?php echo '<lable><b>Phone No :</b></lable>'; ?>
		<div class="rowm">
			<?php
				if($model->Rel_Employee_Address->employee_address_phone != 0)
					echo $model->Rel_Employee_Address->employee_address_phone. '<br>';
				else
					 echo "N/A";
			
			?>
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Mobile No :</b></lable>'; ?>
		<div class="rowm">
			<?php
				if($model->Rel_Employee_Address->employee_address_mobile != 0)
					echo $model->Rel_Employee_Address->employee_address_mobile. '<br>';
				else
					 echo "N/A";
			
			?>
		</div>
	</div>
</div>
-->
