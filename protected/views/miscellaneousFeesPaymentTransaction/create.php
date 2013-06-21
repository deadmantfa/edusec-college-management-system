<?php
$this->breadcrumbs=array(
	'Miscellaneous Fees '=>array('madmin'),
	
	'Add',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
//	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/mis_feesExportToPdf','id'=>$_REQUEST['id']),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To PDF','target'=>'_blank')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/mis_feesExportToExcel','id'=>$_REQUEST['id']),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),
);
?>

<h1>Add Miscellaneous Fees  </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'cash_model'=>$cash_model ,'cheque_model'=>$cheque_model)); ?>
