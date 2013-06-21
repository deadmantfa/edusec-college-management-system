<?php
$this->breadcrumbs=array(
	'Employee'=>array('admin'),
	$model->Rel_Emp_Info->employee_first_name,
	'Edit',
);


if(Yii::app()->user->checkAccess('EmployeeTransaction.Create') || Yii::app()->user->checkAccess('EmployeeTransaction.*'))
$this->menu[]=array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add'));

if(Yii::app()->user->checkAccess('EmployeeTransaction.Admin') || Yii::app()->user->checkAccess('EmployeeTransaction.*'))
$this->menu[]=array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage'));

if(Yii::app()->user->checkAccess('ExportTOPDFExcel.*'))
$this->menu[]=array('label'=>'', 'url'=>array('ExportToPDFExcel/EmployeeFinalViewExportToPdf', 'id'=>$_REQUEST['id']),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To Pdf','target'=>'_blank'));
//$this->menu=array(
/*	array('label'=>'List EmployeeTransaction', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	//array('label'=>'', 'url'=>array('final_view', 'id'=>$model->employee_transaction_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/EmployeeFinalViewExportToPdf', 'id'=>$_REQUEST['id']),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To Pdf')),
);*/
?>

<h1>Edit Employee <?php //echo $model->employee_transaction_id; ?></h1>

<?php 	 
		
	//echo CHtml::link('Next',array('EmployeeTransaction/update/'.$_REQUEST['id']))."</br></br>";
?>


<?php echo $this->renderPartial('_form', array('model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'lang'=>$lang,'emp_doc'=>$emp_doc,'emp_record'=>$emp_record,'emp_exp'=>$emp_exp,'flag'=>$flag)); ?>
