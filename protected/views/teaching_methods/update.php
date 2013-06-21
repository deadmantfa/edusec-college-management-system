<?php
$this->breadcrumbs=array(
	'Teaching Methods'=>array('admin'),
	//$model->teaching_methods_id=>array('view','id'=>$model->teaching_methods_id),
	$model->teaching_methods_name,
	'Edit',
);

$this->menu=array(
	//array('label'=>'List Teaching_methods', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->teaching_methods_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Teaching Method <?php //echo $model->teaching_methods_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
