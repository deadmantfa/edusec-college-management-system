<?php
$this->breadcrumbs=array(
	'Fees Category'=>array('admin'),
	'Add',
);

$this->menu=array(
/*	array('label'=>'List FeesMaster', 'url'=>array('index')),*/
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
	//array('label'=>'', 'url'=>array('generatefees'),'linkOptions'=>array('class'=>'Create','title'=>'Generate Fees')),
);
?>

<h1>Add Fees Category</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
