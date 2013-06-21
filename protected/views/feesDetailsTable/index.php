<?php
$this->breadcrumbs=array(
	'Fees Details Tables',
);

$this->menu=array(
	array('label'=>'Create FeesDetailsTable', 'url'=>array('create')),
	array('label'=>'Manage FeesDetailsTable', 'url'=>array('admin')),
);
?>

<h1>Fees Details Tables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
