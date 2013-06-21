<?php
$this->breadcrumbs=array(
	'Mainmenus',
);

$this->menu=array(
	array('label'=>'Create Mainmenu', 'url'=>array('create')),
	array('label'=>'Manage Mainmenu', 'url'=>array('admin')),
);
?>

<h1>Mainmenus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
