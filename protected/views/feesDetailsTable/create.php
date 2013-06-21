<?php
$this->breadcrumbs=array(
	'Fees Details Tables'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FeesDetailsTable', 'url'=>array('index')),
	array('label'=>'Manage FeesDetailsTable', 'url'=>array('admin')),
);
?>

<h1>Create FeesDetailsTable</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>