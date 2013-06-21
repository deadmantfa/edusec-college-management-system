<?php
$this->breadcrumbs=array(
	'Student Fees Masters'=>array('admin'),
	//$model->student_fees_master_id=>array('view','student_id'=>$model->student_fees_master_student_transaction_id),
	'Edit',
);?>

<?php
/*
$this->menu=array(
	array('label'=>'List StudentFeesMaster', 'url'=>array('index')),
	array('label'=>'Create StudentFeesMaster', 'url'=>array('create')),
	array('label'=>'View StudentFeesMaster', 'url'=>array('view', 'id'=>$model->student_fees_master_id)),
	array('label'=>'Manage StudentFeesMaster', 'url'=>array('admin')),
);*/
?>

<h1>Edit Student Fees  <?php //echo $model->student_fees_master_id; ?></h1></br>
<?php
		
	$stud_info =  StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$model->student_fees_master_student_transaction_id));
	$stud_tran_info =  StudentTransaction::model()->findByPk($model->student_fees_master_student_transaction_id);
	$academic_period =  AcademicTermPeriod::model()->findByPk($stud_tran_info->student_academic_term_period_tran_id)->academic_term_period;
	$semester =  AcademicTerm::model()->findByPk($stud_tran_info->student_academic_term_name_id)->academic_term_name;
	
	
?>
<table  border="2px" id="twoColThinTable">
<tr class="row">
	<td class="col1">Name </td>
	<td class="col2"><?php echo $stud_info->student_first_name.' '.$stud_info->student_middle_name.' '.$stud_info->student_last_name?></td>
</tr>	

<tr class="row">	
	<td class="col1">Enrollment No. </td> 
	<td class="col2"><?php echo $stud_info->student_enroll_no?></td>
</tr>	
<tr class="row">
	<td class="col1">Roll No. </td> 
	<td class="col2"> <?php echo $stud_info->student_roll_no?></td>
</tr>	
	
<tr class="row">
	<td class="col1">
	Current/Last Semester </td> 
	<td class="col2"> <?php echo $semester ?></td>
</tr>	
<tr class="row">	
	<td class="col1">Current/Passing Academic Year </td> 
	<td class="col2"><?php echo $academic_period ?></td>
</tr>	
<tr class="row">
	<td class="col1">Quota </td> 
	<td class="col2"><?php echo Quota::model()->findByPk($stud_tran_info->student_transaction_quota_id)->quota_name;?></td>
</tr>	
</table>
</br>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
