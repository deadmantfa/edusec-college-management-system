<?php
$this->breadcrumbs=array(
	'Teaching Methods',
);

$this->menu=array(
	array('label'=>'Create Teaching_methods', 'url'=>array('create')),
	array('label'=>'Manage Teaching_methods', 'url'=>array('admin')),
);
?>

<h1>Teaching Methods</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
