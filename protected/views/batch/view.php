<?php
$this->breadcrumbs=array(
	'Batches'=>array('admin'),
	$model->batch_name,
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->batch_id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->batch_id),'confirm'=>'Are you sure you want to delete this item?','class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Batch </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'batch_id',
		'batch_name',
		array(
                'name'=>'branch_name',
//                'type'=>'raw',		
                'value'=> $model->rel_branch->branch_name,
	          ),
		array(
                'name'=>'division_name',
//                'type'=>'raw',		
                'value'=> $model->rel_division->division_code,
	          ),
		array(
                'name'=>'batch_code',
//                'type'=>'raw',		
                'value'=> $model->batch_code,
	          ),		

		array(
		'name'=>'academic_term_name',
		'header'=>'Semester',
//                'type'=>'raw',		
                'value'=> $model->rel_batch_academic_id->academic_term_name,
	          ),
		array(
		'name'=>'academic_term_period',
//                'type'=>'raw',
		'header'=>'Academic Year',		
                'value'=> $model->rel_batch_academic_period_id->academic_term_period,
	          ),
//		'batch_organization_id',
//		'batch_created_by',
		array('name'=>'batch_created_by',
			'value'=>User::model()->findByPk($model->batch_created_by)->user_organization_email_id,
		),
		//'batch_creation_date',
		array(
                'name'=>'batch_creation_date',
                'type'=>'raw',		
                'value'=>($model->batch_creation_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->batch_creation_date), 'd-m-Y'),
	        ),
		array('name'=>'Organization',
			'value'=>Organization::model()->findByPk($model->batch_organization_id)->organization_name,
			'filter' => false,

		),

	),
)); ?>
