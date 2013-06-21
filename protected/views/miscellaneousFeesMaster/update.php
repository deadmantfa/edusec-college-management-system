<?php
$this->breadcrumbs=array(
	'Miscellaneous Fees'=>array('admin'),
	//$model->miscellaneous_fees_name=>array('view','id'=>$model->miscellaneous_fees_id),
	$model->miscellaneous_fees_name,
	'Edit',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->miscellaneous_fees_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Miscellaneous Fees <?php //echo $model->miscellaneous_fees_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
