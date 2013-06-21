<?php
$this->breadcrumbs=array(
	'Item Category'=>array('admin'),
	//$model->cat_name=>array('view','id'=>$model->id),
	$model->cat_name,
	'Edit',
);

$this->menu=array(
//	array('label'=>'List ItemCategory', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Item Category <?php //echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
