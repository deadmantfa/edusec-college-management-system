<?php
$this->breadcrumbs=array(
	'Miscellaneous Fees Payment Cheques'=>array('index'),
	$model->miscellaneous_fees_payment_cheque_id,
);

$this->menu=array(
//	array('label'=>'List MiscellaneousFeesPaymentCheque', 'url'=>array('index')),
	array('label'=>'Create MiscellaneousFeesPaymentCheque', 'url'=>array('create')),
	array('label'=>'Update MiscellaneousFeesPaymentCheque', 'url'=>array('update', 'id'=>$model->miscellaneous_fees_payment_cheque_id)),
	array('label'=>'Delete MiscellaneousFeesPaymentCheque', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->miscellaneous_fees_payment_cheque_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MiscellaneousFeesPaymentCheque', 'url'=>array('admin')),
);
?>

<h1>View Miscellaneous Fees Payment Cheque : <?php echo $model->miscellaneous_fees_payment_cheque_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'miscellaneous_fees_payment_cheque_id',
		'miscellaneous_fees_payment_cheque_number',
		'miscellaneous_fees_payment_cheque_date',
		'miscellaneous_fees_payment_cheque_bank',
		'miscellaneous_fees_payment_cheque_branch',
		'miscellaneous_fees_payment_cheque_amount',
		'miscellaneous_fees_payment_cheque_status',
		'miscellaneous_fees_payment_cheque_student_id',
		'miscellaneous_fees_payment_cheque_receipt_id',
	),
)); ?>
