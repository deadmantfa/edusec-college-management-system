<?php
$this->breadcrumbs=array(
	'Divisions'=>array('admin'),
	$model->division_name,
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->division_id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->division_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Division </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'division_id',
		'division_name',
//		'division_organization_id',
//		'division_created_by',
		array(
                'name'=>'branch_name',
//                'type'=>'raw',		
                'value'=> $model->Rel_Branch->branch_name,
	          ),
		array(
                'name'=>'academic_term_name',
//                'type'=>'raw',		
                'value'=> $model->Rel_ac_term->academic_term_name,
	          ),
		array(
                'name'=>'academic_term_period',
//                'type'=>'raw',		
                'value'=> $model->Rel_ac_period->academic_term_period,
	          ),
/*		array('name'=>'division_organization_id',
			'value'=>Organization::model()->findByPk($model->division_organization_id)->organization_name,
			'filter' => false,

		),*/ 
		array('name'=>'division_created_by',
			'value'=>User::model()->findByPk($model->division_created_by)->user_organization_email_id,
		),
		
		//'division_creation_date',
		array(
                'name'=>'division_creation_date',
                'type'=>'raw',		
                'value'=>($model->division_creation_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->division_creation_date), 'd-m-Y'),
	        ),
		array('name'=>'Organization',
			'value'=>Organization::model()->findByPk($model->division_organization_id)->organization_name,
			'filter' => false,

		),
	),
)); ?>
