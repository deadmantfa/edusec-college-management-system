
<?php
$this->breadcrumbs=array(
	'Miscellaneous Fees Payment'=>array('madmin'),
	'Manage',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
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

<h1>Select Student</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->
<?php
$dataProvider = $model->search();
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-transaction-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
/*		'student_transaction_id',
		'student_transaction_user_id',
		'student_transaction_student_id',
		'student_transaction_branch_id',
		'student_transaction_category_id',
		'student_transaction_organization_id',*/
		array(
		'header'=>'SN.',
		'class'=>'IndexColumn',
		),

		 array('name' => 'student_enroll_no',
		       'value' => '$data->Rel_Stud_Info->student_enroll_no',
                     ),

		 array('name' => 'student_first_name',
	              'value' => '$data->Rel_Stud_Info->student_first_name',
                     ),

		array('name' => 'student_middle_name',
	              'value' => '$data->Rel_Stud_Info->student_middle_name',
                     ),

		array('name' => 'student_last_name',
		      'value' => '$data->Rel_Stud_Info->student_last_name',
                     ),
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

		
		/*
		'student_transaction_student_address_id',
		'student_transaction_nationality_id',
		'student_transaction_quota_id',
		'student_transaction_religion_id',
		'student_transaction_shift_id',
		'student_transaction_languages_known_id',
		'student_transaction_student_photos_id',
		'student_transaction_division_id',
		'student_transaction_batch_id',
		'student_academic_term_period_tran_id',
		*/
		array(
			'class'=>'MyCButtonColumn',
			'template' => '{Add Fees}',
	                'buttons'=>array(
                        'Add Fees' => array(
                                'label'=>'Pay Miscellaneous Fees', // text label of the button
//                                'url'=>"CHtml::normalizeUrl(array('feesMasterTransaction/create','id'=>model->fees_master_id))",
				  'url'=>'Yii::app()->createUrl("miscellaneousFeesPaymentTransaction/create", array("id"=>$data->student_transaction_id))',
                                'imageUrl'=> Yii::app()->baseUrl.'/images/add.jpeg',  // image URL of the button. If not set or false, a text link is used
                               'options' => array('class'=>'fees'), // HTML options for the button
                        ),			
                        /*'view' => array(
				'url'=>'Yii::app()->createUrl("studentTransaction/final_view", array("id"=>$data->student_transaction_id))',
                        ),*/

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
