<?php
$this->breadcrumbs=array(
	'Block User Tables',
);

$this->menu=array(
	array('label'=>'Create BlockUserTable', 'url'=>array('create')),
	array('label'=>'Manage BlockUserTable', 'url'=>array('admin')),
);
?>

<h1>Block User Tables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
