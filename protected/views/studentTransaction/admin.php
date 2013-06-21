<?php
$this->breadcrumbs=array(
	'Student'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	//array('label'=>'', 'url'=>array('Importationinstruction'),'linkOptions'=>array('class'=>'remaining_employee','title'=>'Importation Instruction')),
	//array('label'=>'', 'url'=>array('importation/StudentTransaction/import'),'linkOptions'=>array('class'=>'remaining_employee','title'=>'Importation')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/StudentTransactionExportPdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To Pdf','target'=>'_blank')),	
	array('label'=>'', 'url'=>array('ExportToPDFExcel/StudentTransactionExportExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),
	
);

//echo CHtml::link('Export To Pdf',array('StudentTransaction/GeneratePdf'),array('style'=>'color:red'));

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

<h1>Manage Students</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php
 //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php
    Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".flash-error").animate({opacity: 1.0}, 5000).fadeOut("slow");',
 CClientScript::POS_READY
);

    Yii::app()->clientScript->registerScript(
   'myHideEffect1',
   '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
 CClientScript::POS_READY
);


?>
<div id="statusMsg">
<?php
	if(Yii::app()->user->hasFlash('error')) { ?>
	<div class="flash-error">
		<?php echo Yii::app()->user->getFlash('error'); ?>
	</div>
<?php } ?>
<?php
	if(Yii::app()->user->hasFlash('success')) { ?>
	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('success'); ?>
	</div>
<?php } ?>

</div>

<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-transaction-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'ajaxUpdate'=>false,
	'columns'=>array(
/*		'student_transaction_id',
		'student_transaction_user_id',
		'student_transaction_student_id',
		'student_transaction_branch_id',
		'student_transaction_category_id',
		'student_transaction_organization_id',*/
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		//'Rel_Student_Address.Rel_c_city.city_name',
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

		/*array('name' => 'student_middle_name',
		     // 'filter' => CHtml::listData(TaskMaster::model()->findAll(), 'task_name', 'task_name'),  // Note: Put this line if you need dropdown in Grid 				for display list of entry from master table
	              'value' => '$data->Rel_Stud_Info->student_middle_name',
                     ),*/

		array('name' => 'student_last_name',
		     // 'filter' => CHtml::listData(TaskMaster::model()->findAll(), 'task_name', 'task_name'),  // Note: Put this line if you need dropdown in Grid 				for display list of entry from master table
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
			//'filter' =>CHtml::listData(AcademicTermPeriod::model()->findAll(array('condition'=>'academic_terms_period_organization_id='.Yii::app()->user->getState('org_id'))),'academic_terms_period_id','academic_term_period'),
		), 
 
		array('name'=>'student_academic_term_name_id',
			'value'=>'AcademicTerm::model()->findByPk($data->student_academic_term_name_id)->academic_term_name',
			'filter' =>CHtml::listData(AcademicTerm::model()->findAll(array('condition'=>'current_sem=1 and academic_term_organization_id='.Yii::app()->user->getState('org_id'))),'academic_term_id','academic_term_name'),

		), 

		/**/

		 array('name' => 'student_dtod_regular_status',
	         'value' => '$data->Rel_Stud_Info->student_dtod_regular_status',
                     ),
		array('name' => 'status_name',
		      'value' => '$data->Rel_Status->status_name',
                ),

		array(
		'type'=>'raw',
                'value'=>  'CHtml::image("../stud_images/" . $data->Rel_Photos->student_photos_path, "No Image",array("width"=>"20px","height"=>"20px"))',
                 ),
		
		
		array(
			'class'=>'MyCButtonColumn',
			'template' => '{update} {delete} ',
	                'buttons'=>array(
                        'Add Fees' => array(
                                'label'=>'Pay Fees', // text label of the button
//                                'url'=>"CHtml::normalizeUrl(array('feesMasterTransaction/create','id'=>model->fees_master_id))",
				  'url'=>'Yii::app()->createUrl("feesPaymentTransaction/create", array("id"=>$data->student_transaction_id))',
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
	//	'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),

)); ?>
