<?php
$this->breadcrumbs=array(
	'Student Fees Masters',
);

$this->menu=array(
	array('label'=>'Create StudentFeesMaster', 'url'=>array('create')),
	array('label'=>'Manage StudentFeesMaster', 'url'=>array('admin')),
);
?>

<h1>Student Fees Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
