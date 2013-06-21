<?php
$this->breadcrumbs=array(
	'Fees Details Masters',
);

$this->menu=array(
	array('label'=>'Create FeesDetailsMaster', 'url'=>array('create')),
	array('label'=>'Manage FeesDetailsMaster', 'url'=>array('admin')),
);
?>

<h1>Fees Details Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
