<?php
$this->breadcrumbs=array(
	'Fees Payment Cheques',
);

$this->menu=array(
	//array('label'=>'Create FeesPaymentCheque', 'url'=>array('create')),
	//array('label'=>'Manage FeesPaymentCheque', 'url'=>array('admin')),

	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Fees Payment Cheques</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
