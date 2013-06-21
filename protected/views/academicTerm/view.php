<?php
$this->breadcrumbs=array(
	'Semester'=>array('admin'),
	$model->academic_term_name,
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->academic_term_id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->academic_term_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Semester <?php //echo $model->academic_term_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'academic_term_id',
		'academic_term_name',
		array(
                'name'=>'academic_term_start_date',
                'type'=>'raw',		
                'value'=>($model->academic_term_start_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->academic_term_start_date), 'd-m-Y'),
	        ),
		array(
                'name'=>'academic_term_end_date',
                'type'=>'raw',		
                'value'=>($model->academic_term_end_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->academic_term_end_date), 'd-m-Y'),
	        ),
//		'academic_term_period_id',
		array('name'=>'academic_term_period_id',
			'value'=>AcademicTermPeriod::model()->findByPk($model->academic_term_period_id)->academic_term_period,
		),
		array(
			'name'=>'current_sem',
			'value'=>($model->current_sem == 1) ?  "YES" : "NO",
		),
		array('name'=>'Organization',
			'value'=>Organization::model()->findByPk($model->academic_term_organization_id)->organization_name,
			'filter' => false,
		),
		

	),
)); ?>
