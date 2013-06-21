<?php
$this->breadcrumbs=array(
	'Fees Payment Cheques'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List FeesPaymentCheque', 'url'=>array('index')),
	//array('label'=>'Create FeesPaymentCheque', 'url'=>array('create')),

	//array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	//array('label'=>'', 'url'=>array('index'),'linkOptions'=>array('class'=>'List','title'=>'List')),

	array('label'=>'', 'url'=>array('ExportToPDFExcel/returnchequelistExportToPdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To PDF')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/returnchequelistExportToExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('fees-payment-cheque-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>List of Return Cheque</h1>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php
$dataProvider = $model->returnchequeseach();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php 
 $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'fees-payment-transaction-grid',
		'dataProvider'=>$dataProvider,
		'enableSorting'=>false,
		'enablePagination'=>false,
		//'filter'=>$model,
		
		'columns'=>array(
			array(
			'header'=>'SI No',
			'class'=>'IndexColumn',
			),

			'fees_payment_cheque_number',

			array(
			    'header'=>'Receipt No.',
			    'value'=>'FeesPaymentTransaction::model()->findByAttributes(array("fees_payment_cash_cheque_id"=>$data->fees_payment_cheque_id,"fees_payment_transaction_organization_id"=>Yii::app()->user->getState("org_id"),"fees_payment_method_id"=>2))->fees_receipt_id',
			),

			array(
			    'name'=>'student_roll_no',
			    'value'=>'StudentInfo::model()->findByPk(StudentTransaction::model()->findByPk(FeesPaymentTransaction::model()->findByAttributes(array("fees_payment_cash_cheque_id"=>$data->fees_payment_cheque_id,"fees_payment_transaction_organization_id"=>Yii::app()->user->getState("org_id"),"fees_payment_method_id"=>2))->fees_student_id)->student_transaction_student_id)->student_roll_no',
			),
				
			array(
			    'name'=>'student_enroll_no',
			    'value'=>'StudentInfo::model()->findByPk(StudentTransaction::model()->findByPk(FeesPaymentTransaction::model()->findByAttributes(array("fees_payment_cash_cheque_id"=>$data->fees_payment_cheque_id,"fees_payment_transaction_organization_id"=>Yii::app()->user->getState("org_id"),"fees_payment_method_id"=>2))->fees_student_id)->student_transaction_student_id)->student_enroll_no',
			),

			array(
			    'name'=>'student_first_name',
			    'value'=>'StudentInfo::model()->findByPk(StudentTransaction::model()->findByPk(FeesPaymentTransaction::model()->findByAttributes(array("fees_payment_cash_cheque_id"=>$data->fees_payment_cheque_id,"fees_payment_transaction_organization_id"=>Yii::app()->user->getState("org_id"),"fees_payment_method_id"=>2))->fees_student_id)->student_transaction_student_id)->student_first_name',
			),
			array(
			    'name'=>'academic_term_name',
			    'header'=>'Semester',
			    'value'=>'AcademicTerm::model()->findByPk(FeesPaymentTransaction::model()->findByAttributes(array("fees_payment_cash_cheque_id"=>$data->fees_payment_cheque_id,"fees_payment_transaction_organization_id"=>Yii::app()->user->getState("org_id"),"fees_payment_method_id"=>2))->fees_academic_term_id)->academic_term_name',
			),
			array(
			    'name'=>'academic_term_period',
			     'header'=>'Academic Year',
			    'value'=>'AcademicTermPeriod::model()->findByPk(FeesPaymentTransaction::model()->findByAttributes(array("fees_payment_cash_cheque_id"=>$data->fees_payment_cheque_id,"fees_payment_transaction_organization_id"=>Yii::app()->user->getState("org_id"),"fees_payment_method_id"=>2))->fees_academic_period_id)->academic_term_period',
			),
			

			array(
             		   'name'=>'fees_payment_cheque_date',
               		   'type'=>'raw',		
                	   'value'=>'date_format(date_create($data->fees_payment_cheque_date), "d-m-Y")',
	        	),
			
			array(
			'name' => 'fees_payment_cheque_status',
			'value'=>'($data->fees_payment_cheque_status == 1) ?  "Return Cheque" : "Credit Cheque"',
                 	),
			//'fees_payment_cheque_bank',
			array(
			'name' => 'fees_payment_cheque_bank',
			'value' => 'BankMaster::model()->findByPk($data->fees_payment_cheque_bank)->bank_short_name',
			),
			'fees_payment_cheque_branch',
			'fees_payment_cheque_amount',
			
		),
		'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
	
	));
	

?>
