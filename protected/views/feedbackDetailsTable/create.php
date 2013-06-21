<?php
$this->breadcrumbs=array(
	'Student Feedback Details'=>array('admin'),
	'Add',
);

$this->menu=array(
	//array('label'=>'List FeedbackDetailsTable', 'url'=>array('index')),
	//array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Student Performance Details</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
