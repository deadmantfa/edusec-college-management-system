<?php
$this->breadcrumbs=array(
	'Reset Student Password',
	
);?>
<?php
/*
$this->breadcrumbs=array(
	'Left Detained Pass Student Tables'=>array('admin'),
	'Manage',
);*/
$this->menu=array(
	//array('label'=>'List LeftDetainedPassStudentTable', 'url'=>array('index')),
	//array('label'=>'Reset Student LoginID', 'url'=>array('/user/resetstudloginid'),'linkOptions'=>array('class'=>'','title'=>'Create')),

	//array('label'=>'Reset Admin Password', 'url'=>array('/user/resetadminpassword'),'linkOptions'=>array('class'=>'','title'=>'Create')),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('student-transaction-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Reset Student Password</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<div class="block-error">
		<?php echo Yii::app()->user->getFlash('resetstudpassword'); ?>
	</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-transaction-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(

		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),

		 array('name' => 'student_enroll_no',
		       'value' => '$data->Rel_Stud_Info->student_enroll_no',
                     ),
		 array('name' => 'student_roll_no',
		       'value' => '$data->Rel_Stud_Info->student_roll_no',
                     ),

		 array('name' => 'student_first_name',
		       'value' => '$data->Rel_Stud_Info->student_first_name',
                     ),

		/*array('name' => 'student_middle_name',
	              'value' => '$data->Rel_Stud_Info->student_middle_name',
                     ),

		array('name' => 'student_last_name',
	              'value' => '$data->Rel_Stud_Info->student_last_name',
                     ),*/
		 array('name'=>'student_transaction_branch_id',
			'value'=>'Branch::model()->findByPk($data->student_transaction_branch_id)->branch_name',
			'filter' =>CHtml::listData(Branch::model()->findAll(array('condition'=>'branch_organization_id='.Yii::app()->user->getState('org_id'))),'branch_id','branch_name'),

		), 
		array('name'=>'student_transaction_quota_id',
			'value'=>'Quota::model()->findByPk($data->student_transaction_quota_id)->quota_name',
			'filter' =>CHtml::listData(Quota::model()->findAll(array('condition'=>'quota_organization_id='.Yii::app()->user->getState('org_id'))),'quota_id','quota_name'),

		),

		array('name'=>'student_academic_term_period_tran_id',
			'value'=>'AcademicTermPeriod::model()->findByPk($data->student_academic_term_period_tran_id)->academic_term_period',
			'filter' =>CHtml::listData(AcademicTermPeriod::model()->findAll(array('condition'=>'academic_terms_period_organization_id='.Yii::app()->user->getState('org_id'))),'academic_terms_period_id','academic_term_period'),

		), 
 
		array('name'=>'student_academic_term_name_id',
			'value'=>'AcademicTerm::model()->findByPk($data->student_academic_term_name_id)->academic_term_name',
			'filter' =>CHtml::listData(AcademicTerm::model()->findAll(array('condition'=>'	academic_term_organization_id='.Yii::app()->user->getState('org_id'))),'academic_term_id','academic_term_name'),

		), 

		array(
			'class'=>'CButtonColumn',
			'template' => '{Reset Password}',
	                'buttons'=>array(
                        'Reset Password' => array(
                                'label'=>'Reset Password', 
				  'url'=>'Yii::app()->createUrl("user/update_stud_password", array("id"=>$data->student_transaction_user_id))',
                                'imageUrl'=> Yii::app()->baseUrl.'/images/Reset Password.png',  // image URL of the button. If not set or false, a text link is used
                              // 'options' => array('class'=>'fees'), // HTML options for the button
				'options'=>array('id'=>'update-student-status'),
                        ),
	            ),
		),
	),
	'pager'=>array(
		'class'=>'AjaxList',
		//'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>



