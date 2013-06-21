<?php
$this->breadcrumbs=array(
	'Nationality'=>array('admin'),
	$model->nationality_name,
);

$this->menu=array(
//	array('label'=>'List Nationality', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->nationality_id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->nationality_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Nationality </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'nationality_id',
		'nationality_name',
//		'nationality_organization_id',
//		'nationality_created_by',
		array('name'=>'nationality_created_by',
			'value'=>User::model()->findByPk($model->nationality_created_by)->user_organization_email_id,
		),

		//'nationality_created_date',
		array(
                'name'=>'nationality_created_date',
                'type'=>'raw',		
                'value'=>($model->nationality_created_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->nationality_created_date), 'd-m-Y'),
	        ),
		/*
		array('name'=>'Organization:',
			'value'=>Organization::model()->findByPk($model->nationality_organization_id)->organization_name,
			'filter' => false,

		),*/
	),
)); ?>
