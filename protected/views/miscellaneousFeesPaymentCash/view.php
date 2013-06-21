<?php
$this->breadcrumbs=array(
	'Miscellaneous Fees Payment Cashes'=>array('index'),
	$model->miscellaneous_fees_payment_cash_id,
	//StudentInfo::model()->findByPk($model->miscellaneous_fees_payment_cash_student_id)->student_first_name,
);

$this->menu=array(
//	array('label'=>'List MiscellaneousFeesPaymentCash', 'url'=>array('index')),
	array('label'=>'Create MiscellaneousFeesPaymentCash', 'url'=>array('create')),
	array('label'=>'Update MiscellaneousFeesPaymentCash', 'url'=>array('update', 'id'=>$model->miscellaneous_fees_payment_cash_id)),
	array('label'=>'Delete MiscellaneousFeesPaymentCash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->miscellaneous_fees_payment_cash_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MiscellaneousFeesPaymentCash', 'url'=>array('admin')),
);
?>

<h1>View Miscellaneous Fees Payment Cash <?php //echo $model->miscellaneous_fees_payment_cash_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'miscellaneous_fees_payment_cash_id',
		'miscellaneous_fees_payment_cash_amount',
		'miscellaneous_fees_payment_cash_student_id',
		'miscellaneous_fees_payment_cash_receipt_id',
	),
)); ?>
