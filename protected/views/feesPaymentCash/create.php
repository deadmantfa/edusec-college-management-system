<?php
$this->breadcrumbs=array(
	'Fees Payment Cashes'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List FeesPaymentCash', 'url'=>array('index')),
	array('label'=>'Manage FeesPaymentCash', 'url'=>array('admin')),
);
?>

<h1>Add FeesPaymentCash</h1>

<?php echo $this->renderPartial('_form', array('pay_tran'=>$pay_tran)); ?>
