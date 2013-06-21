<?php
$this->breadcrumbs=array(
	'Years',
);

$this->menu=array(
	//array('label'=>'Create Year', 'url'=>array('create')),
	//array('label'=>'Manage Year', 'url'=>array('admin')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Years</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
