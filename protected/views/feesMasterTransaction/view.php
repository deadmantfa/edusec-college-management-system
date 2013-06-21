<?php
$this->breadcrumbs=array(
	'Fees Master Transactions'=>array('index'),
	$model->fees_id,
);

$this->menu=array(
	array('label'=>'List FeesMasterTransaction', 'url'=>array('index')),
	array('label'=>'Create FeesMasterTransaction', 'url'=>array('create')),
	array('label'=>'Update FeesMasterTransaction', 'url'=>array('update', 'id'=>$model->fees_id)),
	array('label'=>'Delete FeesMasterTransaction', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->fees_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FeesMasterTransaction', 'url'=>array('admin')),
);
?>

<h1>View FeesMasterTransaction #<?php echo $model->fees_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fees_id',
		'fees_master_id',
		'fees_desc_id',
	),
)); ?>
