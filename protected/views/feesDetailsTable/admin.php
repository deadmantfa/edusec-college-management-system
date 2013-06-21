<?php
$this->breadcrumbs=array(
	'Fees Details Tables'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List FeesDetailsTable', 'url'=>array('index')),
	array('label'=>'Create FeesDetailsTable', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('fees-details-table-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Fees Details Tables</h1>

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
	'id'=>'fees-details-table-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
		'fees_details_id',
		'fees_details_name',
		'fees_details_amount',
		'fees_details_created_by',
		'fees_details_created_date',
		'fees_details_tally_id',
		array(
			'class'=>'MyCButtonColumn',
		),
	),
)); ?>
