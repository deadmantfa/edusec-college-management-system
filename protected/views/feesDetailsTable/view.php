<?php
$this->breadcrumbs=array(
	'Fees Details Tables'=>array('index'),
	$model->fees_details_id,
);

$this->menu=array(
	array('label'=>'List FeesDetailsTable', 'url'=>array('index')),
	array('label'=>'Create FeesDetailsTable', 'url'=>array('create')),
	array('label'=>'Update FeesDetailsTable', 'url'=>array('update', 'id'=>$model->fees_details_id)),
	array('label'=>'Delete FeesDetailsTable', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->fees_details_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FeesDetailsTable', 'url'=>array('admin')),
);
?>

<h1>View FeesDetailsTable #<?php echo $model->fees_details_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fees_details_id',
		'fees_details_name',
		'fees_details_amount',
		'fees_details_created_by',
		'fees_details_created_date',
		'fees_details_tally_id',
	),
)); ?>
