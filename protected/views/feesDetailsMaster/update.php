<?php
$this->breadcrumbs=array(
	'Fees Details Masters'=>array('admin'),
	$model->fees_details_master,
	'Edit',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->fees_details_master),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Fees Details Master</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
