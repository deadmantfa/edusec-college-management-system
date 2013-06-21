<?php
$this->breadcrumbs=array(
	'Feedback Category Masters',
);

$this->menu=array(
	array('label'=>'Create FeedbackCategoryMaster', 'url'=>array('create')),
	array('label'=>'Manage FeedbackCategoryMaster', 'url'=>array('admin')),
);
?>

<h1>Feedback Category Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
