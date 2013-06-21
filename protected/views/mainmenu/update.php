<?php
$this->breadcrumbs=array(
	'Mainmenus'=>array('index'),
	$model->menu_id=>array('view','id'=>$model->menu_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Mainmenu', 'url'=>array('index')),
	array('label'=>'Create Mainmenu', 'url'=>array('create')),
	array('label'=>'View Mainmenu', 'url'=>array('view', 'id'=>$model->menu_id)),
	array('label'=>'Manage Mainmenu', 'url'=>array('admin')),
);
?>

<h1>Update Mainmenu <?php echo $model->menu_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>