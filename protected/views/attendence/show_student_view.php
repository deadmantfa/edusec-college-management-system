<?php
$this->breadcrumbs=array(
	'Attendance',

);?>
<table  border="2px" id="twoColThinTable">
<tr class="row">
	<td class="col1">Division </td>
	<td class="col2"><?php echo Division::model()->findByPk($_REQUEST['division_id'])->division_code;?></td>
</tr>
<tr class="row">
	<td class="col1">Batch</td> 
	<td class="col2"> <?php if($_REQUEST['batch'] != 0) echo Batch::model()->findByPk($_REQUEST['batch'])->batch_code ;?></td>
</tr>
<tr class="row">
	<td class="col1">Subject </td> 
	<td class="col2"> <?php echo SubjectMaster::model()->findByPk($_REQUEST['subject_id'])->subject_master_name ;?></td>
</tr>	
<tr class="row">
	<td class="col1">Date </td> 
	<td class="col2"> <?php echo $_REQUEST['date'] ;?></td>
</tr>
</table>
<?php
 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attendence-form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	//'enableAjaxValidation'=>false,
	 'stateful'=>true,
	//'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

<?php 
	
	echo "</br>";		
			$count = 0;
			$count = count($row1);
		if($count==0)
		{
		echo "No student with this criteria";
		}
		else
		{
			
			for($i=0;$i<count($row1);$i++)
			{
			   $stud_id = $row1[$i]['student_transaction_id'];
			   $info = StudentInfo::model()->findByPk($row1[$i]['student_transaction_student_id']);
			   $name_lable = $info->student_first_name.'('.$info->student_enroll_no.')';
?>
		<div class="row">
			<?php echo $form->labelEx($model,$name_lable); ?>		   			
			<?php echo $form->checkBox($model, 'st_id[]', array('value'=>$stud_id, 'uncheckValue'=>null,'checked'=>'checked')); ?>&nbsp;&nbsp;&nbsp;
                        <?php //echo CHtml::activeCheckBox($model,'stud_id[]'.$i,array('checked'=>false,'value'=>$stud_id,'uncheckValue' => null)); ?>
			<?php echo $form->error($model,'stud_id'); ?>
		</div>

<?php  			
}

?>
<div class="row buttons">
		<?php 
			 //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		<?php echo CHtml::submitButton('Save', array('class'=>'submit','name'=>'save','tabindex'=>10)); 
			 ?>
	</div>
<?php }?>
<?php $this->endWidget(); ?>

</div>
