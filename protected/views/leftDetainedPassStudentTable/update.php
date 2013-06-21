<?php
$stud =StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$model->student_id));
$this->breadcrumbs=array(
	'Left Detained Pass Student Tables'=>array('admin'),
	$stud->student_first_name ,
	'Update',
);

$this->menu=array(
	//array('label'=>'List LeftDetainedPassStudentTable', 'url'=>array('index')),

	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Update Status of <?php echo $stud->student_first_name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
