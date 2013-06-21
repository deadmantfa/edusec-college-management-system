<?php
$this->breadcrumbs=array(
	'Left Detained Pass Student Tables'=>array('admin'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List LeftDetainedPassStudentTable', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Create LeftDetainedPassStudentTable</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
