<?php
$this->breadcrumbs=array(
	'Student Status'=>array('admin'),
	$model->status_name,
);

$this->menu=array(
	//array('label'=>'List Studentstatusmaster', 'url'=>array('index')),
	//array('label'=>'Create Studentstatusmaster', 'url'=>array('create')),
	//array('label'=>'Update Studentstatusmaster', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Studentstatusmaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Studentstatusmaster', 'url'=>array('admin')),

	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),


);
?>

<h1>View Student Status <?php //echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'status_name',
		
		//'created_by',
		array('name'=>'created_by',
			'value'=>User::model()->findByPk($model->created_by)->user_organization_email_id,
		),
		//'creation_date',
		array(
                'name'=>'creation_date',
                'type'=>'raw',		
                'value'=>($model->creation_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->creation_date), 'd-m-Y'),
	        ),
		/*
		array('name'=>'Organization',
			'value'=>Organization::model()->findByPk($model->organization_id)->organization_name,
			'filter' => false,
		),*/
		//'organization_id',
	),
)); ?>
