<?php
$this->breadcrumbs=array(
	'Miscellaneous Fees Payment Cashes',
);

$this->menu=array(
	array('label'=>'Create MiscellaneousFeesPaymentCash', 'url'=>array('create')),
	array('label'=>'Manage MiscellaneousFeesPaymentCash', 'url'=>array('admin')),
);
?>

<h1>Miscellaneous Fees Payment Cashes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
