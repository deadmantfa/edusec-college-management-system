<?php
$this->breadcrumbs=array(
	'Fees Payment Types',
);

$this->menu=array(
	array('label'=>'Create FeesPaymentType', 'url'=>array('create')),
	array('label'=>'Manage FeesPaymentType', 'url'=>array('admin')),
);
?>

<h1>Fees Payment Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
