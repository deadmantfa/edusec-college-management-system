<?php
$this->breadcrumbs=array(
	'Bank'=>array('admin'),
	$model->bank_full_name,
);

$this->menu=array(
	//array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->bank_id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->bank_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Bank  <?php //echo $model->bank_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'bank_id',
		'bank_full_name',
		'bank_short_name',
		/*
		array('name'=>'Organization:',
			'value'=>Organization::model()->findByPk($model->bank_organization_id)->organization_name,
			'filter' => false,

		),*/
	),
)); ?>
