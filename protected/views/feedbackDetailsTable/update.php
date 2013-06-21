<?php
$this->breadcrumbs=array(
	'Student Feedback Details'=>array('admin'),
	//$model->feedback_details_table_id=>array('view','id'=>$model->feedback_details_table_id),
	'Edit',
);

$this->menu=array(
	//array('label'=>'List FeedbackDetailsTable', 'url'=>array('index')),
	//array('label'=>'Create FeedbackDetailsTable', 'url'=>array('create')),
	//array('label'=>'View FeedbackDetailsTable', 'url'=>array('view', 'id'=>$model->feedback_details_table_id)),
	//array('label'=>'Manage FeedbackDetailsTable', 'url'=>array('admin')),

	//array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	//array('label'=>'', 'url'=>array('view', 'id'=>$model->feedback_details_table_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	//array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Student Performance Details <?php //echo $model->feedback_details_table_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
