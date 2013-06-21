<?php
$this->breadcrumbs=array(
	'Submenus'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Submenu', 'url'=>array('index')),
	array('label'=>'Create Submenu', 'url'=>array('create')),
	array('label'=>'Update Submenu', 'url'=>array('update', 'id'=>$model->submenu_id)),
	array('label'=>'Delete Submenu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->submenu_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Submenu', 'url'=>array('admin')),
);
?>

<h1>View Submenu #<?php echo $model->submenu_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'mainmenu_id',
		'submenu_id',
		'title',
		'link',
		'status',
		'created_by',
		'created_date',
	),
)); ?>
