<?php
$this->breadcrumbs=array(
	'Designations'=>array('admin'),
	$model->employee_designation_name,
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->employee_designation_id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->employee_designation_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Designation </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'employee_designation_id',
		'employee_designation_name',
		'employee_designation_level',
//		'employee_designation_organization_id',
//		'employee_designation_created_by',
		array('name'=>'employee_designation_created_by',
			'value'=>User::model()->findByPk($model->employee_designation_created_by)->user_organization_email_id,
		),

		//'employee_designation_created_date',
		array(
                'name'=>'employee_designation_created_date',
                'type'=>'raw',		
                'value'=>($model->employee_designation_created_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->employee_designation_created_date), 'd-m-Y'),
	        ),
		/*
		array('name'=>'Organization:',
			'value'=>Organization::model()->findByPk($model->employee_designation_organization_id)->organization_name,
			'filter' => false,

		),*/ 
	),
)); ?>
