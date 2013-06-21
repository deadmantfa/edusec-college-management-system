<?php
$this->breadcrumbs=array(
	'Miscellaneous Fees Payment '=>array('miscellaneousFeesPaymentTransaction/create','id'=>$_REQUEST['id']),
	'Manage',
);


$this->menu=array(
	//array('label'=>'List MiscellaneousFeesPaymentCash', 'url'=>array('index')),
	//array('label'=>'Manage MiscellaneousFeesPaymentCash', 'url'=>array('admin')),
);
?>

<h1>Add Fees</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
