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
			<?php echo $model->Rel_Stud_Info->student_bloodgroup.  '<br>'; ?>
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Tally Id :</b></lable>'; ?>
		<div class="rown">
			<?php echo $model->Rel_Stud_Info->student_tally_id .'<br>'; ?>
		</div>
	</div>
</div>

<div class = "row_all_v">
	<div class="rowv">
		<?php echo '<lable><b>Shift :</b></lable>'; ?>
		<div class="rown">
			<?php //echo $model->Rel_Shift->shift_type .'<br>'; ?>
			<?php $shiftid=StudentTransaction::model()->findByPk($model->student_archive_stud_tran_id)->student_transaction_shift_id;?>
			<?php echo Shift::model()->findByPk($shiftid)->shift_type;?>		
		</div>
	</div>

	<div class="rowv">
		<?php echo '<lable><b>Division :</b></lable>'; ?>
		<div class="rown">
			<?php //if(isset($model->Rel_Division->division_name)) echo $model->Rel_Division->division_name .'<br>'; 
			      //else echo "N/A";?>
				<?php $divisionid=StudentTransaction::model()->findByPk($model->student_archive_stud_tran_id)->student_transaction_division_id;?>
				<?php if(isset($divisionid))
	 				echo Division::model()->findByPk($divisionid)->division_name;
				      else echo "N/A";	?>		
			
		</div>
	</div>
</div>

<div class = "row_all_vm">
	<div class="rowv">
		<?php echo '<lable><b>Batch :</b></lable>'; ?>
		<div class="row_b">

			<?php //if(isset($model->Rel_Batch->batch_name)) echo $model->Rel_Batch->batch_name .'<br>'; 
			      //else echo "N/A";?>
				<?php $batchid=StudentTransaction::model()->findByPk($model->student_archive_stud_tran_id)->student_transaction_batch_id;?>
				<?php if(isset($batchid))
	 				echo Batch::model()->findByPk($batchid)->batch_name;
				      else echo "N/A";	?>	
			

		</div>
	</div>


	<div class="rowv">
		<?php echo '<lable><b>Organization :</b></lable>'; ?>
		<div class="row_b">
			<?php //echo $model->Rel_Organization->organization_name .'<br>'; ?>
			<?php $orgid=StudentTransaction::model()->findByPk($model->student_archive_stud_tran_id)->student_transaction_organization_id;?>
				<?php if(isset($orgid))
	 				echo Organization::model()->findByPk($orgid)->organization_name;
				      else echo "N/A";	?>		
		</div>
	</div>
	
</div>
<div class = "row_all_v">
		<div class="rowv">
		
				<?php $langknownid= StudentTransaction::model()->findByPk($model->student_archive_stud_tran_id)->student_transaction_languages_known_id;
				 echo '<lable><b>Language 1 :</b></lable>'; ?>
			<div class="rown">
				<?php //$languageid=LanguagesKnown::model()->findByPk($langknownid)->;?>
 				<?php if(LanguagesKnown::model()->findByPk($langknownid)->languages_known1!=0)
				{
					echo Languages::model()->findByPk(LanguagesKnown::model()->findByPk($langknownid)->languages_known1)->languages_name;
					echo "</br>";
				}
				else echo "N/A.</br>";?>
			</div>
		</div>

		<div class="rowv">
				<?php echo '<lable><b>Language 2 :</b></lable>';?>
			<div class="rown">	
				<?php //$languageid=LanguageKnown::model()->findByPk($langknownid);?>
 				<?php if(LanguagesKnown::model()->findByPk($langknownid)->languages_known2!=0)
				{
					echo Languages::model()->findByPk(LanguagesKnown::model()->findByPk($langknownid)->languages_known2)->languages_name;
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
 				
				<?php if(LanguagesKnown::model()->findByPk($langknownid)->languages_known3!=0)
				{
					echo Languages::model()->findByPk(LanguagesKnown::model()->findByPk($langknownid)->languages_known3)->languages_name;
					echo "</br>";
				}	
				else echo "N/A.</br>";?> 
			</div>	
		</div>		
		<div class="rowv">
				<?php echo '<lable><b>Language 4 :</b></lable>';?>
			<div class="rown"> 
				
				<?php if(LanguagesKnown::model()->findByPk($langknownid)->languages_known4!=0)
				{
					echo Languages::model()->findByPk(LanguagesKnown::model()->findByPk($langknownid)->languages_known4)->languages_name;
					echo "</br>";
				}		
				else echo "N/A.</br>";				
			?>

			</div>
		</div>
	</div>	


