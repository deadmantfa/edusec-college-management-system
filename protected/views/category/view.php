<?php
$this->breadcrumbs=array(
	'Categories'=>array('admin'),
	$model->category_name,
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->category_id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->category_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Category </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'category_id',
		'category_name',
//		'category_organization_id',
//		'category_created_by',
		array('name'=>'category_created_by',
			'value'=>User::model()->findByPk($model->category_created_by)->user_organization_email_id,
		),
		//'category_created_date',
		array(
                'name'=>'category_created_date',
                'type'=>'raw',		
                'value'=>($model->category_created_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->category_created_date), 'd-m-Y'),
	        ),
		/*
		array('name'=>'Organization:',
			'value'=>Organization::model()->findByPk($model->category_organization_id)->organization_name,
			'filter' => false,

		),*/
	),
)); ?>
