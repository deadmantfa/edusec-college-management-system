<?php
$this->breadcrumbs=array(
	'Performance Category'=>array('admin'),
	'Add',
);

$this->menu=array(
	//array('label'=>'List FeedbackCategoryMaster', 'url'=>array('index')),
	//array('label'=>'Manage FeedbackCategoryMaster', 'url'=>array('admin')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Performance Category </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
