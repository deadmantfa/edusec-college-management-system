<?php
$this->breadcrumbs=array(
	'Fees Payment Cashes',
);

$this->menu=array(
	array('label'=>'Create FeesPaymentCash', 'url'=>array('create')),
	array('label'=>'Manage FeesPaymentCash', 'url'=>array('admin')),
);
?>

<h1>Fees Payment Cashes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
