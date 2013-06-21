<?php
$this->breadcrumbs=array(
	'Left Detained Pass Student '=>array('admin'),
	//$model->Rel_left_student_id->student_first_name ,
	StudentInfo::model()->findByPk(StudentTransaction::model()->findByPk($model->student_id)->student_transaction_student_id)->student_first_name,
);

$this->menu=array(
	//array('label'=>'List LeftDetainedPassStudentTable', 'url'=>array('index')),
	//array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	//array('label'=>'', 'url'=>array('update', 'id'=>$model->id),'linkOptions'=>array('class'=>'Edit','title'=>'Update')),
	//array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Left/Detain/Clear Student <?php //echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		//'student_id',
		//'status_id',
		//'sem',
		//'academic_term_period_id',
		/*
		array(
                'name'=>'student_first_name',
                'value'=> $model->Rel_left_student_id->student_first_name ,
          	),*/
		array(
                'name'=>'student_id',
                'value'=> StudentInfo::model()->findByPk(StudentTransaction::model()->findByPk($model->student_id)->student_transaction_student_id)->student_first_name,
		'filter'=>false,
          	),
		array(
                'name'=>'status_name',
                'value'=> $model->Rel_left_status_id->status_name ,
          	),
		array(
                'name'=>'academic_term_name',
                'value'=> $model->Rel_left_sem_id->academic_term_name,
          	),
		array(
                'name'=>'academic_term_period',
                'value'=> $model->Rel_left_academic_term_period_id->academic_term_period,
          	),
		'creation_date',
		//'created_by',
		array('name'=>'created_by',
			'value'=>User::model()->findByPk($model->created_by)->user_organization_email_id,
		),
		array('name'=>'oraganization_id',
			'value'=>Organization::model()->findByPk($model->oraganization_id)->organization_name,
		),
		//'oraganization_id',



	),
)); ?>
