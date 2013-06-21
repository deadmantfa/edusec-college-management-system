<?php
$this->breadcrumbs=array(
	'Block User Tables'=>array('index'),
	$model->block_user_id=>array('view','id'=>$model->block_user_id),
	'Update',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->block_user_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Update Block User : <?php echo $model->block_user_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
