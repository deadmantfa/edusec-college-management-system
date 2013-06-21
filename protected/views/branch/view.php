<?php
$this->breadcrumbs=array(
	'Branches'=>array('admin'),
	$model->branch_name,
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->branch_id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->branch_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Branch </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'branch_id',
		'branch_name',
		'branch_code',
		array(
		'name'=>'branch_tag_id',
//                'type'=>'raw',		
		'value'=>($model->branch_tag_id == null) ? "Not Set" : $model->Rel_Branch_Tag->branch_tag_name,
	          ),

//		'branch_organization_id',
//		'branch_created_by',
		array('name'=>'branch_created_by',
			'value'=>User::model()->findByPk($model->branch_created_by)->user_organization_email_id,
		),

		//'branch_creation_date',
		array(
                'name'=>'branch_creation_date',
                'type'=>'raw',		
                'value'=>($model->branch_creation_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->branch_creation_date), 'd-m-Y'),
	        ),
		array('name'=>'Organization',
			'value'=>Organization::model()->findByPk($model->branch_organization_id)->organization_name,
			'filter' => false,
		), 
	),
)); ?>
