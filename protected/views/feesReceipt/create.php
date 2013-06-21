<?php
$this->breadcrumbs=array(
	'Fees Receipts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FeesReceipt', 'url'=>array('index')),
	array('label'=>'Manage FeesReceipt', 'url'=>array('admin')),
);
?>

<h1>Create FeesReceipt</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>