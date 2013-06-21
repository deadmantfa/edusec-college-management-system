<?php
$this->breadcrumbs=array(
	'Feedback Details Tables',
);

$this->menu=array(
	array('label'=>'Create FeedbackDetailsTable', 'url'=>array('create')),
	array('label'=>'Manage FeedbackDetailsTable', 'url'=>array('admin')),
);
?>

<h1>Feedback Details Tables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
