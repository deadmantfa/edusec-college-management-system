<?php
$this->breadcrumbs=array(
	'Fees Payment Methods'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FeesPaymentMethod', 'url'=>array('index')),
	array('label'=>'Manage FeesPaymentMethod', 'url'=>array('admin')),
);
?>

<h1>Create FeesPaymentMethod</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>