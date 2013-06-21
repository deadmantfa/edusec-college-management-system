<?php
$this->breadcrumbs=array(
	'Shifts'=>array('admin'),
	$model->shift_type,
);

$this->menu=array(
//	array('label'=>'List Shift', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->shift_id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->shift_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Shift </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'shift_id',
		'shift_type',
//		'shift_organization_id',
		array(
			'name'=>'shift_start_time',
                        'value'=>date("h:i A",strtotime($model->shift_start_time)),
		),
		array(
			'name'=>'shift_end_time',
                        'value'=>date("h:i A",strtotime($model->shift_end_time)),
		),
//		'shift_created_by',
		array('name'=>'shift_created_by',
			'value'=>User::model()->findByPk($model->shift_created_by)->user_organization_email_id,
		),

		//'shift_created_date',
		array(
                'name'=>'shift_created_date',
                'type'=>'raw',		
                'value'=>($model->shift_created_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->shift_created_date), 'd-m-Y'),
	        ),
		array('name'=>'Organization',
			'value'=>Organization::model()->findByPk($model->shift_organization_id)->organization_name,
			'filter' => false,

		),
	),
)); ?>
