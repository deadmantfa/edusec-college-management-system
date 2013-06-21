<?php
$this->breadcrumbs=array(
	'Mainmenus'=>array('index'),
	$model->menu_id,
);

$this->menu=array(
	array('label'=>'List Mainmenu', 'url'=>array('index')),
	array('label'=>'Create Mainmenu', 'url'=>array('create')),
	array('label'=>'Update Mainmenu', 'url'=>array('update', 'id'=>$model->menu_id)),
	array('label'=>'Delete Mainmenu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->menu_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mainmenu', 'url'=>array('admin')),
);
?>

<h1>View Mainmenu #<?php echo $model->menu_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'menu_id',
		'menu_name',
		'link',
		'image',
		'status',
		'created_by',
		'created_date',
	),
)); ?>
