<?php
$this->breadcrumbs=array(
	'Religions'=>array('admin'),
	$model->religion_name,
);

$this->menu=array(
//	array('label'=>'List Religion', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->religion_id),'linkOptions'=>array('class'=>'Edit','title'=>'Update')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->religion_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Religion</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'religion_id',
		'religion_name',
//		'religion_organization_id',
//		'religion_created_by',
		array('name'=>'religion_created_by',
			'value'=>User::model()->findByPk($model->religion_created_by)->user_organization_email_id,
		),

		//'religion_created_date',
		array(
                'name'=>'religion_created_date',
                'type'=>'raw',		
                'value'=>($model->religion_created_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->religion_created_date), 'd-m-Y'),
	        ),
		/*
		array('name'=>'Organization:',
			'value'=>Organization::model()->findByPk($model->religion_organization_id)->organization_name,
			'filter' => false,

		),*/
	),
)); ?>
