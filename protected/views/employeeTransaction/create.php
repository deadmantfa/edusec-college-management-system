<?php
$this->breadcrumbs=array(
	'Employee'=>array('admin'),
	'Add',
);

$this->menu=array(
	/*array('label'=>'List EmployeeTransaction', 'url'=>array('index')),*/
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Employee</h1>

<?php echo $this->renderPartial('create_form', array('model'=>$model,'info'=>$info,'user'=>$user)); ?>
