<?php
$this->breadcrumbs=array(
	'Batches'=>array('admin'),
	//$model->batch_name=>array('view','id'=>$model->batch_id),
	$model->batch_name,
	'Edit',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->batch_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Batch  <?php //echo $model->batch_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
