<?php
$this->breadcrumbs=array(
	'Miscellaneous Fees Payment Transactions'=>array('admin'),
	$model->miscellaneous_trans_id,
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
//	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->miscellaneous_trans_id),'linkOptions'=>array('class'=>'Edit','title'=>'Update')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->miscellaneous_trans_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Miscellaneous Fees Payment Transaction : <?php echo $model->miscellaneous_trans_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'miscellaneous_trans_id',
		//'miscellaneous_fees_id',
		//'student_fees_id',
		
		 array('name' => 'miscellaneous_fees_id',
	              'value' => $model->Rel_mfees->miscellaneous_fees_name,
                     ),

		 array('name' => 'student_fees_id',
	              'value' => StudentInfo::model()->findByPk($model->Rel_stud->student_transaction_student_id)->student_first_name,			
                     ),
			 
		'Amount',
	),
)); ?>
