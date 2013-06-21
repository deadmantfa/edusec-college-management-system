<?php
$this->breadcrumbs=array(
	'Miscellaneous Fees Payment Cashes'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List MiscellaneousFeesPaymentCash', 'url'=>array('index')),
	array('label'=>'Create MiscellaneousFeesPaymentCash', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('miscellaneous-fees-payment-cash-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Miscellaneous Fees Payment Cashes</h1>
<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'miscellaneous-fees-payment-cash-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'enableSorting'=>false,
	'columns'=>array(
		'miscellaneous_fees_payment_cash_id',
		'miscellaneous_fees_payment_cash_amount',
		'miscellaneous_fees_payment_cash_student_id',
		'miscellaneous_fees_payment_cash_receipt_id',
		array(
			'class'=>'MyCButtonColumn',
		),
	),
)); ?>
