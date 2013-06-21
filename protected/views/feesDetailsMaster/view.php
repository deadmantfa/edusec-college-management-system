<?php
$this->breadcrumbs=array(
	'Fees Details Masters'=>array('admin'),
	$model->fees_details_master_name,
);

$this->menu=array(
//	array('label'=>'','url'=>array('index')),
	array('label'=>'','url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'','url'=>array('update','id'=>$model->fees_details_master),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->fees_details_master),'confirm'=>'Are you sure you want to delete this item?','confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'','url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Fees Details</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'fees_details_master',
		'fees_details_master_name',
		array('name'=>'created_by',
			'value'=>User::model()->findByPk($model->created_by)->user_organization_email_id,
		),
		array(
                'name'=>'creation_date',
                'type'=>'raw',		
                'value'=>($model->creation_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->creation_date), 'd-m-Y'),
	        ),
		array('name'=>'Organization',
			'value'=>Organization::model()->findByPk($model->organization_id)->organization_name,
			'filter' => false,
		),
	),
)); ?>
