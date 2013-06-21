<?php
$this->breadcrumbs=array(
	'Fees Payment Methods'=>array('index'),
	$model->fees_payment_method_id,
);

$this->menu=array(
	array('label'=>'List FeesPaymentMethod', 'url'=>array('index')),
	array('label'=>'Create FeesPaymentMethod', 'url'=>array('create')),
	array('label'=>'Update FeesPaymentMethod', 'url'=>array('update', 'id'=>$model->fees_payment_method_id)),
	array('label'=>'Delete FeesPaymentMethod', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->fees_payment_method_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FeesPaymentMethod', 'url'=>array('admin')),
);
?>

<h1>View FeesPaymentMethod #<?php echo $model->fees_payment_method_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fees_payment_method_id',
		'fees_payment_method_name',
	),
)); ?>
