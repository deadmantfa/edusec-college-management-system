<?php
$this->breadcrumbs=array(
	'Former Student'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List StudentArchiveTable', 'url'=>array('index')),
	//array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('student-archive-table-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Former Student</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->
<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-archive-table-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
	//	'student_archive_id',
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),

		 array('name' => 'student_enroll_no',
		     // 'filter' => CHtml::listData(TaskMaster::model()->findAll(), 'task_name', 'task_name'),  // Note: Put this line if you need dropdown in Grid 				for display list of entry from master table
	              'value' => '$data->Rel_Stud_Info->student_enroll_no',
                     ),
		array('name' => 'student_roll_no',
		     // 'filter' => CHtml::listData(TaskMaster::model()->findAll(), 'task_name', 'task_name'),  // Note: Put this line if you need dropdown in Grid 				for display list of entry from master table
	              'value' => '$data->Rel_Stud_Info->student_roll_no',
                     ),

		 array('name' => 'student_first_name',
		     // 'filter' => CHtml::listData(TaskMaster::model()->findAll(), 'task_name', 'task_name'),  // Note: Put this line if you need dropdown in Grid 				for display list of entry from master table
	              'value' => '$data->Rel_Stud_Info->student_first_name',
                     ),

		array('name' => 'student_middle_name',
		     // 'filter' => CHtml::listData(TaskMaster::model()->findAll(), 'task_name', 'task_name'),  // Note: Put this line if you need dropdown in Grid 				for display list of entry from master table
	              'value' => '$data->Rel_Stud_Info->student_middle_name',
                     ),

		array('name' => 'student_last_name',
	              'value' => '$data->Rel_Stud_Info->student_last_name',
                     ),
		//'student_archive_stud_tran_id',
		//'student_archive_stud_id',
		array('name'=>'student_archive_ac_t_p_id',
			'value'=>'AcademicTermPeriod::model()->findByPk($data->student_archive_ac_t_p_id)->academic_term_period',
			'filter' =>CHtml::listData(AcademicTermPeriod::model()->findAll(array('condition'=>'academic_terms_period_organization_id='.Yii::app()->user->getState('org_id'))),'academic_terms_period_id','academic_term_period'),

		), 
 
		array('name'=>'student_archive_ac_t_n_id',
			'value'=>'AcademicTerm::model()->findByPk($data->	student_archive_ac_t_n_id)->academic_term_name',
			'filter' =>CHtml::listData(AcademicTerm::model()->findAll(array('condition'=>'academic_term_organization_id='.Yii::app()->user->getState('org_id'))),'academic_term_id','academic_term_name','academicTermPeriod.academic_term_period'),

		), 

		array('name' => 'status_name',
		      'value' => '$data->Rel_Status->status_name',
                ),
		
		array('name'=>'student_archive_branch_id',
			'value'=>'Branch::model()->findByPk($data->student_archive_branch_id)->branch_name',
			'filter' =>CHtml::listData(Branch::model()->findAll(array('condition'=>'branch_organization_id='.Yii::app()->user->getState('org_id'))),'branch_id','branch_name'),

		), 
	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>
