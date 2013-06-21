<?php
$this->breadcrumbs=array(
	'Fees Category'=>array('admin'),
	//$model->fees_master_name=>array('view','id'=>$model->fees_master_id),
	$model->fees_master_name,
	'Edit',
);

$this->menu=array(
/*	array('label'=>'List FeesMaster', 'url'=>array('index')),*/
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->fees_master_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Fees Category <?php //echo $model->fees_master_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
