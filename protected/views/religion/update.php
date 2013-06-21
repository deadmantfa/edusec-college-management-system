<?php
$this->breadcrumbs=array(
	'Religions'=>array('admin'),
	//$model->religion_name=>array('view','id'=>$model->religion_id),
	$model->religion_name,
	'Edit',
);

$this->menu=array(
//	array('label'=>'List Religion', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->religion_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Religion  <?php //echo $model->religion_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
