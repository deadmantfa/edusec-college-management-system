<?php
$this->breadcrumbs=array(
	'Fees Payment Cheques'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List FeesPaymentCheque', 'url'=>array('index')),
	//array('label'=>'Create FeesPaymentCheque', 'url'=>array('create')),

	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('index'),'linkOptions'=>array('class'=>'List','title'=>'List')),
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

<h1>Manage Fees Payment Cheques</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'fees-payment-cheque-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
		'header'=>'SN.',
		'class'=>'IndexColumn',
		),
		//'fees_payment_cheque_id',
		'fees_payment_cheque_number',
		'fees_payment_cheque_date',
		'fees_payment_cheque_bank',
		'fees_payment_cheque_amount',
		'fees_payment_cheque_status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
