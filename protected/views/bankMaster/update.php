<?php
$this->breadcrumbs=array(
	'Bank'=>array('admin'),
	//$model->bank_full_name=>array('view','id'=>$model->bank_id),
	$model->bank_full_name,
	'Edit',
);

$this->menu=array(
	//array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->bank_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Bank<?php //echo $model->bank_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
