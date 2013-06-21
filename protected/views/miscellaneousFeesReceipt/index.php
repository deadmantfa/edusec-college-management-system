<?php
$this->breadcrumbs=array(
	'Miscellaneous Fees Receipts',
);

$this->menu=array(
	array('label'=>'Create MiscellaneousFeesReceipt', 'url'=>array('create')),
	array('label'=>'Manage MiscellaneousFeesReceipt', 'url'=>array('admin')),
);
?>

<h1>Miscellaneous Fees Receipts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
