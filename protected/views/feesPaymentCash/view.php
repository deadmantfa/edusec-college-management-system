<?php
$this->breadcrumbs=array(
	'Fees Payment Cashes'=>array('index'),
	$model->fees_payment_cash_id,
);

$this->menu=array(
	array('label'=>'List FeesPaymentCash', 'url'=>array('index')),
	array('label'=>'Create FeesPaymentCash', 'url'=>array('create')),
	array('label'=>'Update FeesPaymentCash', 'url'=>array('update', 'id'=>$model->fees_payment_cash_id)),
	array('label'=>'Delete FeesPaymentCash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->fees_payment_cash_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FeesPaymentCash', 'url'=>array('admin')),
);
?>

<h1>View FeesPaymentCash #<?php echo $model->fees_payment_cash_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fees_payment_cash_id',
		'fees_payment_cash_amount',
	),
)); ?>
