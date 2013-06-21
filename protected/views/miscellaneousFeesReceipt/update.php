<?php
$this->breadcrumbs=array(
	'Miscellaneous Fees Receipts'=>array('index'),
	$model->miscellaneous_fees_receipt_id=>array('view','id'=>$model->miscellaneous_fees_receipt_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MiscellaneousFeesReceipt', 'url'=>array('index')),
	array('label'=>'Create MiscellaneousFeesReceipt', 'url'=>array('create')),
	array('label'=>'View MiscellaneousFeesReceipt', 'url'=>array('view', 'id'=>$model->miscellaneous_fees_receipt_id)),
	array('label'=>'Manage MiscellaneousFeesReceipt', 'url'=>array('admin')),
);
?>

<h1>Update MiscellaneousFeesReceipt <?php echo $model->miscellaneous_fees_receipt_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>