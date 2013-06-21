<?php
$this->breadcrumbs=array(
	'Fees Payment Transactions'=>array('index'),
	$model->fees_payment_transaction_id,
);

$this->menu=array(
	array('label'=>'List FeesPaymentTransaction', 'url'=>array('index')),
	array('label'=>'Create FeesPaymentTransaction', 'url'=>array('create')),
	array('label'=>'Update FeesPaymentTransaction', 'url'=>array('update', 'id'=>$model->fees_payment_transaction_id)),
	array('label'=>'Delete FeesPaymentTransaction', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->fees_payment_transaction_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FeesPaymentTransaction', 'url'=>array('admin')),
);
?>

<h1>View Fees Payment Transaction #<?php echo $model->fees_payment_transaction_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fees_payment_transaction_id',
		'fees_payment_master_id',
		'fees_payment_method_id',
		'fees_payment_cash_cheque_id',
		'fees_receipt_id',
		'fees_payment',
		'fees_received_user_id',
		'fees_full_part_payment_id',
		'fees_student_id',
	),
)); ?>
