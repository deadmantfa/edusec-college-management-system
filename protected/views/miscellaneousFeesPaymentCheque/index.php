<?php
$this->breadcrumbs=array(
	'Miscellaneous Fees Payment Cheques',
);

$this->menu=array(
	array('label'=>'Create MiscellaneousFeesPaymentCheque', 'url'=>array('create')),
	array('label'=>'Manage MiscellaneousFeesPaymentCheque', 'url'=>array('admin')),
);
?>

<h1>Miscellaneous Fees Payment Cheques</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
