<?php
$this->breadcrumbs=array(
	'Student '=>array('admin'),
	'Add',
);

$this->menu=array(
	
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Student Information</h1>

<?php echo $this->renderPartial('create_form', array('model'=>$model,'info'=>$info,'user'=>$user)); ?>
