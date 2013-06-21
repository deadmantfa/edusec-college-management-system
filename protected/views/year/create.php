<?php
$this->breadcrumbs=array(
	'Years'=>array('admin'),
	'Add',
);

$this->menu=array(
	//array('label'=>'List Year', 'url'=>array('index')),
//	array('label'=>'', 'url'=>array('index'),'linkOptions'=>array('class'=>'List','title'=>'List')),
	//array('label'=>'Manage Year', 'url'=>array('admin')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Years</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
