<?php
$this->breadcrumbs=array(
	'Fees Payment Methods',
);

$this->menu=array(
	array('label'=>'Create FeesPaymentMethod', 'url'=>array('create')),
	array('label'=>'Manage FeesPaymentMethod', 'url'=>array('admin')),
);
?>

<h1>Fees Payment Methods</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
