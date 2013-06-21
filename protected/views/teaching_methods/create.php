<?php
$this->breadcrumbs=array(
	'Teaching Methods'=>array('admin'),
	'Add',
);

$this->menu=array(
	//array('label'=>'List Teaching_methods', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Teaching Methods</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
