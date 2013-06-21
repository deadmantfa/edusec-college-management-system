<?php
$this->breadcrumbs=array(
	'Miscellaneous Fees Receipts'=>array('index'),
	$model->miscellaneous_fees_receipt_id,
);

$this->menu=array(
	array('label'=>'List MiscellaneousFeesReceipt', 'url'=>array('index')),
	array('label'=>'Create MiscellaneousFeesReceipt', 'url'=>array('create')),
	array('label'=>'Update MiscellaneousFeesReceipt', 'url'=>array('update', 'id'=>$model->miscellaneous_fees_receipt_id)),
	array('label'=>'Delete MiscellaneousFeesReceipt', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->miscellaneous_fees_receipt_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MiscellaneousFeesReceipt', 'url'=>array('admin')),
);
?>

<h1>View MiscellaneousFeesReceipt #<?php echo $model->miscellaneous_fees_receipt_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'miscellaneous_fees_receipt_id',
		'miscellaneous_fees_receipt_number',
	),
)); ?>
