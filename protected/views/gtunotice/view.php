<?php
$this->breadcrumbs=array(
	'GTU Notices'=>array('admin'),
	//$model->Description,
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->ID),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View GTU Notice <?php //echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'ID',
		'Description',
		'Link',
//		'Created_By',
		array('name'=>'Created_By',
			'value'=>User::model()->findByPk($model->Created_By)->user_organization_email_id,
		),

		//'Created_date',

		array(
                'name'=>'Created_date',
               	
                'value'=>($model->Created_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->Created_date), 'd-m-Y'),
	        ),
	),
)); ?>
