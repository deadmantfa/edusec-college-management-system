<?php
$this->breadcrumbs=array(
	'Fees Receipts'=>array('index'),
	$model->fees_receipt_id,
);

$this->menu=array(
	array('label'=>'List FeesReceipt', 'url'=>array('index')),
	array('label'=>'Create FeesReceipt', 'url'=>array('create')),
	array('label'=>'Update FeesReceipt', 'url'=>array('update', 'id'=>$model->fees_receipt_id)),
	array('label'=>'Delete FeesReceipt', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->fees_receipt_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FeesReceipt', 'url'=>array('admin')),
);
?>

<h1>View FeesReceipt #<?php echo $model->fees_receipt_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fees_receipt_id',
		'fees_receipt_number',
	),
)); ?>
