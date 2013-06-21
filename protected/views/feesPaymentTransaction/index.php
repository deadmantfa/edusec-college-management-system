<?php
$this->breadcrumbs=array(
	'Fees Payment Transactions',
);

$this->menu=array(
	array('label'=>'Create FeesPaymentTransaction', 'url'=>array('create')),
	array('label'=>'Manage FeesPaymentTransaction', 'url'=>array('admin')),
);
?>

<h1>Fees Payment Transactions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
