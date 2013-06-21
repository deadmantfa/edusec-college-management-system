<?php
$this->breadcrumbs=array(
	'Left Detained Pass Student '=>array('leftClearStudent'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List LeftDetainedPassStudentTable', 'url'=>array('index')),
	//array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/LeftDetainExportToPdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To PDF','target'=>'_blank')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/LeftDetainExportToExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('left-detained-pass-student-table-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
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

<h1>Manage Left/Detained/Pass Student </h1>
<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'left-detained-pass-student-table-grid',
	'dataProvider'=>$dataProvider,
	'afterAjaxUpdate' => 'reInstallDatepicker',
	'filter'=>$model,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),

		//'id',
		//'student_id',
		//'status_id',
		//'sem',
		//'academic_term_period_id',
		/*
		'created_by',
		'oraganization_id',
		*/
		array(
                'name'=>'student_roll_no',
                'value'=> '$data->Rel_Stud_Info->student_roll_no',
          	),
		array(
                'name'=>'student_enroll_no',
                'value'=> '$data->Rel_Stud_Info->student_enroll_no',
          	),
		array(
                'name'=>'student_first_name',
                'value'=> '$data->Rel_Stud_Info->student_first_name',
          	),
		
		array(
                'name'=>'status_name',
                'value'=> '$data->Rel_left_status_id->status_name',
          	),
		

		array('name'=>'academic_term_period_id',
			'value'=>'AcademicTermPeriod::model()->findByPk($data->academic_term_period_id)->academic_term_period',
			'filter' =>CHtml::listData(AcademicTermPeriod::model()->findAll(array('condition'=>'academic_terms_period_organization_id='.Yii::app()->user->getState('org_id'))),'academic_terms_period_id','academic_term_period'),

		), 
 
		array('name'=>'sem',
			'value'=>'AcademicTerm::model()->findByPk($data->sem)->academic_term_name',
			'filter' =>CHtml::listData(AcademicTerm::model()->findAll(array('condition'=>'	current_sem=1 and academic_term_organization_id='.Yii::app()->user->getState('org_id'))),'academic_term_id','academic_term_name'),

		), 
		
		array(
                        'name' => 'left_detained_pass_student_cancel_date',
			'value'=>'($data->left_detained_pass_student_cancel_date== 0000-00-00) ? "Not Set" : date_format(new DateTime($data->left_detained_pass_student_cancel_date), "d-m-Y")',
                         'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model, 
                                'attribute' => 'left_detained_pass_student_cancel_date',
				//'id'=>'date',
                                'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'showAnim' =>'slide',
				'yearRange'=>'1900:'.(date('Y')+1),
				'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
		    'htmlOptions'=>array(
			'id'=>'left_detained_pass_student_cancel_date',
		     ),
			
                        ), 
                        true),

                ),
		'remarks',
		array(
			'class'=>'MyCButtonColumn',
			'template' => '{update}{Rejoin Student}{Detain Again}',
	                'buttons'=>array(
                        'Rejoin Student' => array(
                                'label'=>'Rejoin Student', 
				  'url'=>'Yii::app()->createUrl("LeftDetainedPassStudentTable/rejoin", array("id"=>$data->student_id))',
                                'imageUrl'=> Yii::app()->baseUrl.'/images/rejoin.png', 					//'options'=>array('id'=>'update-student-status'),
				'visible'=>'$data->Rel_left_student_id->student_transaction_detain_student_flag!=6',
                        ),
			'Detain Again' => array(
                                'label'=>'Detain Again', 
				  'url'=>'Yii::app()->createUrl("LeftDetainedPassStudentTable/detainagain", array("id"=>$data->student_id))',
                                'imageUrl'=> Yii::app()->baseUrl.'/images/rejoin.png', 		
				'visible'=>'$data->Rel_left_student_id->student_transaction_detain_student_flag==2',			
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
)); 
Yii::app()->clientScript->registerScript('for-date-picker',"
function reInstallDatepicker(id, data){
        $('#left_detained_pass_student_cancel_date').datepicker({'dateFormat':'dd-mm-yy'});
	  
}
");
?>

<?php
$config = array( 
    'scrolling' => 'no',
    'autoDimensions' => false,
    'width' => '715',
    'height' => '205', 
 //   'titleShow' => false,
    'overlayColor' => '#000',
    'padding' => '0',
    'showCloseButton' => true,
    'onClose' => function() {
                return window.location.reload();
            },

// change this as you need
);


$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'a#update-student-status', 'config'=>$config));

?>
