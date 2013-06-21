<?php
$this->breadcrumbs=array(
	'Fees Payment Cheques'=>array('index'),
	$model->fees_payment_cheque_id=>array('view','id'=>$model->fees_payment_cheque_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List FeesPaymentCheque', 'url'=>array('index')),
	//array('label'=>'Create FeesPaymentCheque', 'url'=>array('create')),
	//array('label'=>'View FeesPaymentCheque', 'url'=>array('view', 'id'=>$model->fees_payment_cheque_id)),
	//array('label'=>'Manage FeesPaymentCheque', 'url'=>array('admin')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->fees_payment_cheque_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('index'),'linkOptions'=>array('class'=>'List','title'=>'List')),	
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->fees_payment_cheque_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
);
?>

<h1>Update FeesPaymentCheque <?php echo $model->fees_payment_cheque_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
