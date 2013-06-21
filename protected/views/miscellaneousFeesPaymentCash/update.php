<?php
$this->breadcrumbs=array(
	'Miscellaneous Fees Payment'=>array('miscellaneousFeesPaymentTransaction/create','id'=>$model->miscellaneous_fees_payment_cash_student_id),
	'Manage',
);

$this->menu=array(
	/*array('label'=>'List MiscellaneousFeesPaymentCash', 'url'=>array('index')),
	array('label'=>'Create MiscellaneousFeesPaymentCash', 'url'=>array('create')),
	array('label'=>'View MiscellaneousFeesPaymentCash', 'url'=>array('view', 'id'=>$model->miscellaneous_fees_payment_cash_id)),
	array('label'=>'Manage MiscellaneousFeesPaymentCash', 'url'=>array('admin')),*/
);
?>

<h1>Edit Miscellaneous Fees Payment Cash <?php //echo $model->miscellaneous_fees_payment_cash_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
