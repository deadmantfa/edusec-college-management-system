<?php
$this->breadcrumbs=array(
	'Fees Payment Methods'=>array('index'),
	$model->fees_payment_method_id=>array('view','id'=>$model->fees_payment_method_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FeesPaymentMethod', 'url'=>array('index')),
	array('label'=>'Create FeesPaymentMethod', 'url'=>array('create')),
	array('label'=>'View FeesPaymentMethod', 'url'=>array('view', 'id'=>$model->fees_payment_method_id)),
	array('label'=>'Manage FeesPaymentMethod', 'url'=>array('admin')),
);
?>

<h1>Update FeesPaymentMethod <?php echo $model->fees_payment_method_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>