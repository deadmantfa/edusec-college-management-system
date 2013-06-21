<?php
$this->breadcrumbs=array(
	'Fees Master Transactions',
);

$this->menu=array(
	array('label'=>'Create FeesMasterTransaction', 'url'=>array('create')),
	array('label'=>'Manage FeesMasterTransaction', 'url'=>array('admin')),
);
?>

<h1>Fees Master Transactions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
