<?php
$this->breadcrumbs=array(
	'Quotas'=>array('admin'),
	//$model->quota_name=>array('view','id'=>$model->quota_id),
	$model->quota_name,
	'Edit',
);

$this->menu=array(
//	array('label'=>'List Quota', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->quota_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Quota <?php //echo $model->quota_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
