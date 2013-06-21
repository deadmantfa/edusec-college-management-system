<?php
$this->breadcrumbs=array(
	'Branches'=>array('admin'),
	//$model->branch_name=>array('view','id'=>$model->branch_id),
	$model->branch_name,
	'Edit',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->branch_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);

?>

<h1>Edit Branch <?php //echo $model->branch_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
