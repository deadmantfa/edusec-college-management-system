<?php
$this->breadcrumbs=array(
	'Academic Year'=>array('admin'),
	$model->academic_term_period,
);

$this->menu=array(
//	array('label'=>'List AcademicTermPeriod', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->academic_terms_period_id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->academic_terms_period_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Academic Year  <?php //echo $model->academic_terms_period_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'academic_terms_period_id',
//		'academic_terms_period_name',
		'academic_term_period',
		//'academic_terms_period_start_date',
		//'academic_terms_period_end_date',
//		'academic_terms_period_organization_id',
//		'academic_terms_period_created_by',
		array('name'=>'academic_terms_period_created_by',
			'value'=>User::model()->findByPk($model->academic_terms_period_created_by)->user_organization_email_id,
		),

		//'academic_terms_period_creation_date',
		array(
                'name'=>'academic_terms_period_creation_date',
                'type'=>'raw',		
                'value'=>($model->academic_terms_period_creation_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->academic_terms_period_creation_date), 'd-m-Y'),
	        ),
		array('name'=>'Organization',
			'value'=>Organization::model()->findByPk($model->academic_terms_period_organization_id)->organization_name,
			'filter' => false,
		),
	),
)); ?>
