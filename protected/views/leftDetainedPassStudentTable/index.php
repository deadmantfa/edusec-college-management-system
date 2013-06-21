<?php
$this->breadcrumbs=array(
	'Left Detained Pass Student Tables',
);

$this->menu=array(
	array('label'=>'Create LeftDetainedPassStudentTable', 'url'=>array('create')),
	array('label'=>'Manage LeftDetainedPassStudentTable', 'url'=>array('admin')),
);
?>

<h1>Left Detained Pass Student Tables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
