<?php
$this->breadcrumbs=array(
	'Student Fees Masters'=>array('admin'),
	
);

$this->menu=array(
	array('label'=>'', 'url'=>array('addotherfees', 'id'=>$_REQUEST['student_id']),'linkOptions'=>array('class'=>'Create','title'=>'Add Other Fees')),
/*	array('label'=>'List StudentFeesMaster', 'url'=>array('index')),
	array('label'=>'Create StudentFeesMaster', 'url'=>array('create')),
	array('label'=>'Update StudentFeesMaster', 'url'=>array('update', 'id'=>$model->student_fees_master_id)),
	array('label'=>'Delete StudentFeesMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->student_fees_master_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentFeesMaster', 'url'=>array('admin')),*/
);
?>
<?php
		
	$stud_info =  StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$_REQUEST['student_id']));
	$stud_tran_info =  StudentTransaction::model()->findByPk($_REQUEST['student_id']);
	$academic_period =  AcademicTermPeriod::model()->findByPk($stud_tran_info->student_academic_term_period_tran_id)->academic_term_period;
	$semester =  AcademicTerm::model()->findByPk($stud_tran_info->student_academic_term_name_id)->academic_term_name;	
?>
<table  border="2px" id="twoColThinTable">
<tr class="row">
	<td class="col1">Name </td>
	<td class="col2"><?php echo $stud_info->student_first_name.' '.$stud_info->student_middle_name.' '.$stud_info->student_last_name;?></td>
</tr>
<tr class="row">	
	<td class="col1">Enrollment No. </td> 
	<td class="col2"><?php echo $stud_info->student_enroll_no;?></td>
</tr>	
<tr class="row">
	<td class="col1">Roll No. </td> 
	<td class="col2"> <?php echo $stud_info->student_roll_no;?></td>
</tr>
<tr class="row">
	<td class="col1">Academic Year </td> 
	<td class="col2"><?php echo $academic_period;?></td>
</tr>	

<tr class="row">	
	<td class="col1">Current Semester  </td> 
	<td class="col2">Sem:-<?php echo $semester; ?></td>
</tr>	
<tr class="row">
	<td class="col1">Quota </td> 
	<td class="col2"><?php echo Quota::model()->findByPk($stud_tran_info->student_transaction_quota_id)->quota_name;?></td>
</tr>
</table>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-fees-master-grid',
	'dataProvider'=>$model->student_details_search(),
	//'filter'=>$model,

	'columns'=>array(

		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),

		//'student_fees_master_student_transaction_id',
		array(
		'name'=>'student_fees_master_details_id',
		'value'=>'FeesDetailsMaster::model()->findByPk($data->student_fees_master_details_id)->fees_details_master_name',
		),
		//'fees_master_table_id',
		//'student_fees_master_details_id',
		'fees_details_amount',
		//'student_fees_master_org_id',
		/*
		'student_fees_master_created_by',
		'student_fees_master_creation_date',
		*/
		array(
			'class'=>'CButtonColumn',
			'template' => '{update}{delete}',
			'buttons'=>array(
		                'view' => array(
					'url'=>'Yii::app()->createUrl("view", array("id"=>$data->student_fees_master_id,"student_id"=>$data->student_fees_master_student_transaction_id))',
		                ),

                	),
			
		),


	),
)); ?>
