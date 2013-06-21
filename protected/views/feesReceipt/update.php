<?php
$this->breadcrumbs=array(
	'Fees Receipts'=>array('index'),
	$model->fees_receipt_id=>array('view','id'=>$model->fees_receipt_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FeesReceipt', 'url'=>array('index')),
	array('label'=>'Create FeesReceipt', 'url'=>array('create')),
	array('label'=>'View FeesReceipt', 'url'=>array('view', 'id'=>$model->fees_receipt_id)),
	array('label'=>'Manage FeesReceipt', 'url'=>array('admin')),
);
?>

<h1>Update FeesReceipt <?php echo $model->fees_receipt_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>