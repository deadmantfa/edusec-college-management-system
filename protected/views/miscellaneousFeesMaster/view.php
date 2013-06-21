<?php
$this->breadcrumbs=array(
	'Miscellaneous Fees'=>array('admin'),
	$model->miscellaneous_fees_name,
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->miscellaneous_fees_id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->miscellaneous_fees_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Miscellaneous Fees <?php //echo $model->miscellaneous_fees_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'miscellaneous_fees_id',
		'miscellaneous_fees_name',
//		'created_by',
		array('name'=>'Created By',
			'value'=>User::model()->findByPk($model->created_by)->user_organization_email_id,
		),

		//'creation_date',
		array(
                'name'=>'creation_date',
                'type'=>'raw',		
                'value'=>($model->creation_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->creation_date), 'd-m-Y'),
	        ),
		array('name'=>'Organization',
			'value'=>Organization::model()->findByPk($model->miscellaneous_organization_id)->organization_name,
			'filter' => false,
		),
		
	),
)); ?>
