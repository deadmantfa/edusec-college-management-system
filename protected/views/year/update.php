<?php
$this->breadcrumbs=array(
	'Years'=>array('admin'),
	$model->year,
	'Edit',
);

$this->menu=array(

	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
//	array('label'=>'', 'url'=>array('index'),'linkOptions'=>array('class'=>'List','title'=>'List')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Years  <?php //echo $model->year_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
