<?php
$this->breadcrumbs=array(
	'Shifts'=>array('admin'),
	//$model->shift_type=>array('view','id'=>$model->shift_id),
	$model->shift_type,	
	'Edit',
);

$this->menu=array(
//	array('label'=>'List Shift', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->shift_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Shift  <?php //echo $model->shift_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
