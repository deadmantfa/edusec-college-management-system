<?php
$this->breadcrumbs=array(
	'Performance Category'=>array('admin'),
	$model->feedback_category_name,
);

$this->menu=array(
	//array('label'=>'List FeedbackCategoryMaster', 'url'=>array('index')),
	//array('label'=>'Create FeedbackCategoryMaster', 'url'=>array('create')),
	//array('label'=>'Update FeedbackCategoryMaster', 'url'=>array('update', 'id'=>$model->feedback_category_master_id)),
	//array('label'=>'Delete FeedbackCategoryMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->feedback_category_master_id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage FeedbackCategoryMaster', 'url'=>array('admin')),


	//array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->feedback_category_master_id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->feedback_category_master_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Performance Category <?php //echo $model->feedback_category_master_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'feedback_category_master_id',
		'feedback_category_name',
		//'feedback_category_created_by',
		//'feedback_category_creation_date',
		//'feedback_category_organizaton_id',
		array('name'=>'feedback_category_created_by',
			'value'=>User::model()->findByPk($model->feedback_category_created_by)->user_organization_email_id,
		),
		//'batch_creation_date',
		array(
                'name'=>'feedback_category_creation_date',
                'type'=>'raw',		
                'value'=>($model->feedback_category_creation_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->feedback_category_creation_date), 'd-m-Y'),
	        ),
		array('name'=>'Organization',
			'value'=>Organization::model()->findByPk($model->feedback_category_organizaton_id)->organization_name,
			'filter' => false,

		),
	),
)); ?>
