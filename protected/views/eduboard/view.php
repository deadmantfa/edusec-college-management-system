<?php
$this->breadcrumbs=array(
	'Education Board'=>array('admin'),
	$model->eduboard_name,
);

$this->menu=array(

	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
//	array('label'=>'', 'url'=>array('index'),'linkOptions'=>array('class'=>'List','title'=>'List')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->eduboard_id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->eduboard_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
	
);
?>

<h1>View Education Board <?php //echo $model->eduboard_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'eduboard_id',
		'eduboard_name',
//		'eduboard_organization_id',
//		'eduboard_created_by',
		array('name'=>'eduboard_created_by',
			'value'=>User::model()->findByPk($model->eduboard_created_by)->user_organization_email_id,
		),

		//'eduboard_created_date',
		array(
                'name'=>'eduboard_created_date',
                'type'=>'raw',		
                'value'=>($model->eduboard_created_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->eduboard_created_date), 'd-m-Y'),
	        ),
		/*
		array('name'=>'Organization:',
			'value'=>Organization::model()->findByPk($model->eduboard_organization_id)->organization_name,
			'filter' => false,

		),*/
	),
)); ?>
