<?php
$this->breadcrumbs=array(
	'Fees Receipts',
);

$this->menu=array(
	array('label'=>'Create FeesReceipt', 'url'=>array('create')),
	array('label'=>'Manage FeesReceipt', 'url'=>array('admin')),
);
?>

<h1>Fees Receipts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
