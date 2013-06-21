<?php
$this->breadcrumbs=array(
	'Departments'=>array('admin'),
	$model->department_name,
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->department_id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->department_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Department </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'department_id',
		'department_name',
//		'department_organization_id',
//		'department_created_by',
		array('name'=>'department_created_by',
			'value'=>User::model()->findByPk($model->department_created_by)->user_organization_email_id,
		),

		//'department_created_date',
		array(
                'name'=>'department_created_date',
                'type'=>'raw',		
                'value'=>($model->department_created_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->department_created_date), 'd-m-Y'),
	        ),
		array('name'=>'Organization',
			'value'=>Organization::model()->findByPk($model->department_organization_id)->organization_name,
			'filter' => false,
		),
	),
)); ?>
