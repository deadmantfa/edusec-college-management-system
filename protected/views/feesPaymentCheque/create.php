<?php
$this->breadcrumbs=array(
	'Fees Payment Cheques'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List FeesPaymentCheque', 'url'=>array('index')),
	//array('label'=>'Manage FeesPaymentCheque', 'url'=>array('admin')),

	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
	array('label'=>'', 'url'=>array('index'),'linkOptions'=>array('class'=>'List','title'=>'List')),
	
);
?>

<h1>Create FeesPaymentCheque</h1>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
