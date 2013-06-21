<?php
$this->breadcrumbs=array(
	'Miscellaneous Fees Receipts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MiscellaneousFeesReceipt', 'url'=>array('index')),
	array('label'=>'Manage MiscellaneousFeesReceipt', 'url'=>array('admin')),
);
?>

<h1>Create MiscellaneousFeesReceipt</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>