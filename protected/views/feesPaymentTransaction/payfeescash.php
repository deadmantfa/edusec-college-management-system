<?php
$this->breadcrumbs=array(
	'Fees Payment Transactions'=>array('index'),
	'Add',
);

$this->menu=array(
//	array('label'=>'List FeesPaymentTransaction', 'url'=>array('index')),
//	array('label'=>'Manage FeesPaymentTransaction', 'url'=>array('admin')),
);
?>

<h1>Add Cash Details</h1>

<?php echo $this->renderPartial('payfees_form', array('model'=>$model,'pay_cash'=>$pay_cash)); ?>
