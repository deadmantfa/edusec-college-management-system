<?php
$this->breadcrumbs=array(
	'Fees Payment Cashes'=>array('index'),
	$model->fees_payment_cash_id=>array('view','id'=>$model->fees_payment_cash_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FeesPaymentCash', 'url'=>array('index')),
	array('label'=>'Create FeesPaymentCash', 'url'=>array('create')),
	array('label'=>'View FeesPaymentCash', 'url'=>array('view', 'id'=>$model->fees_payment_cash_id)),
	array('label'=>'Manage FeesPaymentCash', 'url'=>array('admin')),
);
?>

<h1>Update FeesPaymentCash <?php echo $model->fees_payment_cash_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>