<?php
$this->breadcrumbs=array(
	'Submenus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Submenu', 'url'=>array('index')),
	array('label'=>'Manage Submenu', 'url'=>array('admin')),
);
?>

<h1>Create Submenu</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>