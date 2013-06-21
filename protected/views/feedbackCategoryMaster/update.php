<?php
$this->breadcrumbs=array(
	'Performance Category'=>array('admin'),
	//$model->feedback_category_master_id=>array('view','id'=>$model->feedback_category_master_id),
	$model->feedback_category_name,
	'Edit',
);

$this->menu=array(
	//array('label'=>'List FeedbackCategoryMaster', 'url'=>array('index')),
	//array('label'=>'Create FeedbackCategoryMaster', 'url'=>array('create')),
	//array('label'=>'View FeedbackCategoryMaster', 'url'=>array('view', 'id'=>$model->feedback_category_master_id)),
	//array('label'=>'Manage FeedbackCategoryMaster', 'url'=>array('admin')),

	//array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->feedback_category_master_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Performance Category <?php //echo $model->feedback_category_master_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
