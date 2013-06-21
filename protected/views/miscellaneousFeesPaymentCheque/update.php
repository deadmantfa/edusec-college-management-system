<?php

$this->breadcrumbs=array(
	'Miscellaneous Fees Payment '=>array('miscellaneousFeesPaymentTransaction/create','id'=>$model->miscellaneous_fees_payment_cheque_student_id),
	'Manage',
);
$this->menu=array(
	/*array('label'=>'List MiscellaneousFeesPaymentCheque', 'url'=>array('index')),
	array('label'=>'Create MiscellaneousFeesPaymentCheque', 'url'=>array('create')),
	array('label'=>'View MiscellaneousFeesPaymentCheque', 'url'=>array('view', 'id'=>$model->miscellaneous_fees_payment_cheque_id)),
	array('label'=>'Manage MiscellaneousFeesPaymentCheque', 'url'=>array('admin')),*/
);
?>

<h1>Edit Miscellaneous Fees Payment Cheque  <?php //echo $model->miscellaneous_fees_payment_cheque_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
