<?php
$this->breadcrumbs=array(
	'Date Wise Collection Report',
	
);

$this->menu=array(
	//array('label'=>'List Attendence', 'url'=>array('index')),
	//array('label'=>'Manage Attendence', 'url'=>array('admin')),
);
?>

<h1>Date Wise Collection Report</h1>

<?php echo $this->renderPartial('date_report_form', array('model'=>$model)); ?>
