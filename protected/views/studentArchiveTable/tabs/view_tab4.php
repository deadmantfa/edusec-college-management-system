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
			<?php $addressid=StudentTransaction::model()->findByPk($model->student_archive_stud_tran_id)->student_transaction_student_address_id;?>
			<?php echo StudentAddress::model()->findByPk($addressid)->student_address_c_line1.'<br>'; ?>
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Line1 :</b></lable>'; ?>
		<div class="row_b">
			<?php echo StudentAddress::model()->findByPk($addressid)->student_address_p_line1.'<br>'; ?>
		</div>
	</div>
</div>

<div class = "row_all_v">
	<div class="rowv">
		<?php echo '<lable><b>Line2 :</b></lable>'; ?>
		<div class="row_b">
			<?php echo StudentAddress::model()->findByPk($addressid)->student_address_c_line2.'<br>'; ?>
		</div>
	</div>


	<div class="rowv">
		<?php echo '<lable><b>Line2 :</b></lable>'; ?>
		<div class="row_b">
			<?php echo StudentAddress::model()->findByPk($addressid)->student_address_p_line2.'<br>'; ?>
		</div>
	</div>
</div>

<div class = "row_all_vm">
	<div class="rowv">
		<?php echo '<lable><b>City :</b></lable>'; ?>
		<div class="rown">

			
			    <?php echo StudentAddress::model()->findByPk($addressid)->student_address_c_city.'<br>'; ?>
			
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>City :</b></lable>'; ?>
		<div class="rown">
			<?php
			 $stud_p_city = $model->findcity(StudentAddress::model()->findByPk($addressid)->student_address_p_city);
			 echo $stud_p_city.'<br>'; ?>

		</div>
	</div>
</div>

<div class = "row_all_v">
	<div class="rowv">
		<?php echo '<lable><b>Pincode :</b></lable>'; ?>
		<div class="rown">
			<?php echo StudentAddress::model()->findByPk($addressid)->student_address_c_pin.'<br>'; ?>
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Pincode :</b></lable>'; ?>
		<div class="rown">
			<?php echo StudentAddress::model()->findByPk($addressid)->student_address_p_pin .'<br>'; ?>
		</div>
	</div>
</div>

<div class = "row_all_vm">
	<div class="rowv">
		<?php echo '<lable><b>State :</b></lable>'; ?>
		<div class="rown">
			<?php
			    $stud_c_state = $model->findstate(StudentAddress::model()->findByPk($addressid)->student_address_c_state);
			 echo $stud_c_state.'<br>'; ?>

		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>State :</b></lable>'; ?>
		<div class="rown">
			<?php
			    $stud_p_state = $model->findstate(StudentAddress::model()->findByPk($addressid)->student_address_p_state);
			 echo $stud_p_state.'<br>'; ?>

		</div>
	</div>
</div>

<div class = "row_all_v">
	<div class="rowv">
		<?php echo '<lable><b>Country :</b></lable>'; ?>
		<div class="rown">
			<?php
			    $stud_c_country = $model->findcountry(StudentAddress::model()->findByPk($addressid)->student_address_c_country);
			 echo $stud_c_country.'<br>'; ?>

		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Country :</b></lable>'; ?>
		<div class="rown">
			<?php
			    $stud_p_country = $model->findcountry(StudentAddress::model()->findByPk($addressid)->student_address_p_country);
			 echo $stud_p_country.'<br>'; ?>

		</div>
	</div>
</div>

<div class = "row_all_vm">
	<div class="rowv">
		<?php echo '<lable><b>Phone No :</b></lable>'; ?>
		<div class="rown">
			<?php
				if(StudentAddress::model()->findByPk($addressid)->student_address_phone != 0)
					echo StudentAddress::model()->findByPk($addressid)->student_address_phone.'<br>';
				else
					 echo "N/A";
			?>
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Mobile :</b></lable>'; ?>
		<div class="rown">
			<?php
				if(StudentAddress::model()->findByPk($addressid)->student_address_mobile != 0)
					echo StudentAddress::model()->findByPk($addressid)->student_address_mobile.'<br>';
				else
					 echo "N/A";
			?>

		</div>
	</div>
</div>
