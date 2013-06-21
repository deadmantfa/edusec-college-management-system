<?php
$this->breadcrumbs=array(
	'Feedback Details Tables'=>array('admin'),
	//$model->feedback_details_table_id,
);

$this->menu=array(
	//array('label'=>'List FeedbackDetailsTable', 'url'=>array('index')),
	//array('label'=>'Create FeedbackDetailsTable', 'url'=>array('create')),
	//array('label'=>'Update FeedbackDetailsTable', 'url'=>array('update', 'id'=>$model->feedback_details_table_id)),
	//array('label'=>'Delete FeedbackDetailsTable', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->feedback_details_table_id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage FeedbackDetailsTable', 'url'=>array('admin')),

	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->feedback_details_table_id),'linkOptions'=>array('class'=>'Edit','title'=>'Update')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->feedback_details_table_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Student Feedback Details <?php //echo $model->feedback_details_table_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'feedback_details_table_id',
		'feedback_details_table_student_id',
		'feedback_category_master_id',
		'feedback_details_remarks',
		'feedback_details_table_created_by',
		'feedback_details_table_creation_date',
	),
)); ?>
