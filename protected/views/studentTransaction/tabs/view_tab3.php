<div class = "row_all_vm">
	<div class="rowv">
		<?php echo '<lable><b>Email Id 1 :</b></lable>';?>
		<div class="rown">
			<?php echo $model->Rel_Stud_Info->student_email_id_1.  '<br>'; ?>
		</div>
	</div>
</div>
<div class = "row_all_v">

	<div class="rowv">
		<?php echo '<lable><b>Email Id 2 :</b></lable>';?>
		<div class="rown">
			<?php
				if($model->Rel_Stud_Info->student_email_id_2 != null)
					echo $model->Rel_Stud_Info->student_email_id_2. '<br>';
				else
					 echo "N/A";
			?>

		</div>
	</div>
</div>

<div class = "row_all_vm">	
	<div class="rowv">
		<?php echo '<lable><b>Bloodgroup :</b></lable>';?>
		<div class="rown">
			<?php
			if($model->Rel_Stud_Info->student_bloodgroup != null)
				echo $model->Rel_Stud_Info->student_bloodgroup.  '<br>'; 
			else
				echo "Not Set</br>";
			?>
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Tally Id :</b></lable>'; ?>
		<div class="rown">
			<?php 
			if($model->Rel_Stud_Info->student_tally_id != null)
				echo $model->Rel_Stud_Info->student_tally_id .'<br>'; 
			else
				echo "Not Set</br>";
			?>
		</div>
	</div>
</div>

<div class = "row_all_v">
	<div class="rowv">
		<?php echo '<lable><b>Shift :</b></lable>'; 
		if($model->student_transaction_shift_id != null) {?>
		<div class="rown">
			<?php echo $model->Rel_Shift->shift_type .'<br>'; ?>
		</div>
		<? } else {?>
		<div class="rown">
			<?php echo "Not Set</br>"; ?>
		</div>
		<?php } ?>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Division :</b></lable>'; ?>
		<div class="rown">
			<?php if(isset($model->Rel_Division->division_name)) echo $model->Rel_Division->division_name .'<br>'; 
			      else echo "N/A";
			?>
		</div>
	</div>
</div>

<div class = "row_all_vm">
	<div class="rowv">
		<?php echo '<lable><b>Batch :</b></lable>'; ?>
		<div class="row_b">

			<?php if(isset($model->Rel_Batch->batch_name)) echo $model->Rel_Batch->batch_name .'<br>'; 
			      else echo "N/A";
			?>

		</div>
	</div>


	<div class="rowv">
		<?php echo '<lable><b>Organization :</b></lable>'; ?>
		<div class="row_b">
			<?php echo $model->Rel_Organization->organization_name .'<br>'; ?>
		</div>
	</div>
	
</div>
<div class = "row_all_v">
	<div class="rowv">
		
				<?php 
				if($model->student_transaction_languages_known_id) {
					if(isset($model->Rel_languages_known->languages_known_id)) 
	          		
				 echo '<lable><b>Language 1 :</b></lable>'; ?>
				<div class="rown">

 				<?php if($model->Rel_languages_known->languages_known1!=0)
				{
					echo Languages::model()->findByPk($model->Rel_languages_known->languages_known1)->languages_name;
					echo "</br>";
				}
				else echo "N/A.</br>";?>
					</div>
		</div>
			<div class="rowv">
				<?php echo '<lable><b>Language 2 :</b></lable>';?>
				<div class="rown">	
				<?php if($model->Rel_languages_known->languages_known2!=0)
				{
					echo Languages::model()->findByPk($model->Rel_languages_known->languages_known2)->languages_name;
					echo "</br>";
				}
				else echo "N/A.</br>";	?>
				</div>
		</div>
	</div>
				<div class = "row_all_vm">
				<div class="rowv">
			
				<?php echo '<lable><b>Language 3 :</b></lable>';?>
				<div class="rown"> 
 				<?php 
				if($model->Rel_languages_known->languages_known3!=0)
				{
					echo Languages::model()->findByPk($model->Rel_languages_known->languages_known3)->languages_name;
					echo "</br>";
				}
				else echo "N/A.</br>";?> 
				</div>	
			</div>		
				<div class="rowv">
				<?php echo '<lable><b>Language 4 :</b></lable>';?>
				<div class="rown"> 
				
				<?php if($model->Rel_languages_known->languages_known4!=0)
				{
					echo Languages::model()->findByPk($model->Rel_languages_known->languages_known4)->languages_name;
					echo "</br>";
				}
				else echo "N/A.</br>";	
				
			?>

		</div>
		<?php } ?>
	</div>
</div>


