<?php
$this->breadcrumbs=array(
	'Organizations'=>array('admin'),
	//$model->organization_name=>array('view','id'=>$model->organization_id),
	$model->organization_name,
	'Edit',
);

$this->menu=array(
//	array('label'=>'List Organization', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->organization_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Organization <!--: <?php echo $model->organization_id; ?></h1>-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
