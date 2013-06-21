<?php
$this->breadcrumbs=array(
	'Fees Details Tables'=>array('index'),
	$model->fees_details_id=>array('view','id'=>$model->fees_details_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FeesDetailsTable', 'url'=>array('index')),
	array('label'=>'Create FeesDetailsTable', 'url'=>array('create')),
	array('label'=>'View FeesDetailsTable', 'url'=>array('view', 'id'=>$model->fees_details_id)),
	array('label'=>'Manage FeesDetailsTable', 'url'=>array('admin')),
);
?>

<h1>Update FeesDetailsTable <?php echo $model->fees_details_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>