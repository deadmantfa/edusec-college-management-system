<?php
$this->breadcrumbs=array(
	'Fees Payment Cheques'=>array('Cheque_search'),
	$model->fees_payment_cheque_number,
);

$this->menu=array(
	//array('label'=>'List FeesPaymentCheque', 'url'=>array('index')),
	//array('label'=>'Create FeesPaymentCheque', 'url'=>array('create')),
	//array('label'=>'Update FeesPaymentCheque', 'url'=>array('update', 'id'=>$model->fees_payment_cheque_id)),
	//array('label'=>'Delete FeesPaymentCheque', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->fees_payment_cheque_id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage FeesPaymentCheque', 'url'=>array('admin')),

	//array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	//array('label'=>'', 'url'=>array('update', 'id'=>$model->fees_payment_cheque_id),'linkOptions'=>array('class'=>'Edit','title'=>'Update')),
	//array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->fees_payment_cheque_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	//array('label'=>'', 'url'=>array('index'),'linkOptions'=>array('class'=>'List','title'=>'List')),	
	//array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Fees Cheque Details <?php //echo $model->fees_payment_cheque_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'fees_payment_cheque_id',
		'fees_payment_cheque_number',
		array(
                'name'=>'fees_payment_cheque_date',		
                'value'=>date_format(date_create($model->fees_payment_cheque_date),'d-m-Y'),
	        ),
		
		array(
			'name' => 'fees_payment_cheque_bank',
			'value' => BankMaster::model()->findByPk($model->fees_payment_cheque_bank)->bank_short_name,
		),
		'fees_payment_cheque_amount',
		
		//'fees_payment_cheque_date',
		//'fees_payment_cheque_status',
		//'fees_payment_cheque_bank',
		array(
		'name' => 'fees_payment_cheque_status',
		'value'=>($model->fees_payment_cheque_status == 1) ?  'Return Cheque' : 'Credit Cheque',
                 ),
		'fees_payment_cheque_branch',
	),
)); ?>

<?php 
echo '<br/><br/>';
//echo CHtml::button('Update Cheque Status', array('submit' => array('my_update','id'=>$model->fees_payment_cheque_id))); ?>

