<?php
$this->breadcrumbs=array(
	'Student Fees Masters'=>array('admin'),
	'Add',
);

$this->menu=array(
	array('label'=>'List StudentFeesMaster', 'url'=>array('index')),
	array('label'=>'Manage StudentFeesMaster', 'url'=>array('admin')),
);
?>

<h1>Add Student Fees Master</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
