<?php
$this->breadcrumbs=array(
	'Teaching Methods'=>array('admin'),
	$model->teaching_methods_name,
);

$this->menu=array(
	//array('label'=>'List Teaching_methods', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->teaching_methods_id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->teaching_methods_id),'confirm'=>'Are you sure you want to delete this item?','class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Teaching Methods <?php //echo $model->teaching_methods_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'teaching_methods_id',
		'teaching_methods_name',
		'teaching_methods_alias',
		'remarks',
		//'teaching_methods_created_by',
		array('name'=>'created_by',
			'value'=>User::model()->findByPk($model->teaching_methods_created_by)->user_organization_email_id,
		),
		//'teaching_methods_created_date',
		array(
                'name'=>'teaching_methods_created_date',
               	
                'value'=>($model->teaching_methods_created_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->teaching_methods_created_date), 'd-m-Y'),
	        ),
	),
)); ?>
