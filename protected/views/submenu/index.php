<?php
$this->breadcrumbs=array(
	'Submenus',
);

$this->menu=array(
	array('label'=>'Create Submenu', 'url'=>array('create')),
	array('label'=>'Manage Submenu', 'url'=>array('admin')),
);
?>

<h1>Submenus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
