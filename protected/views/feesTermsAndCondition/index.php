<?php
$this->breadcrumbs=array(
	'Fees Terms And Conditions',
);

$this->menu=array(
	array('label'=>'Create FeesTermsAndCondition', 'url'=>array('create')),
	array('label'=>'Manage FeesTermsAndCondition', 'url'=>array('admin')),
);
?>

<h1>Fees Terms And Conditions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
