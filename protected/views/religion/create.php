<?php
$this->breadcrumbs=array(
	'Religions'=>array('admin'),
	'Add',
);

$this->menu=array(
//	array('label'=>'List Religion', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Religion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
