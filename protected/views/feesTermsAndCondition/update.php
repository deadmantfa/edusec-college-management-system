<?php
$this->breadcrumbs=array(
	'Terms And Conditions'=>array('admin'),
	$model->term,
	'Edit',
);

$this->menu=array(
	//array('label'=>'List FeesTermsAndCondition', 'url'=>array('index')),
	//array('label'=>'Create FeesTermsAndCondition', 'url'=>array('create')),
	//array('label'=>'View FeesTermsAndCondition', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage FeesTermsAndCondition', 'url'=>array('admin')),


	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Terms And Conditions <?php //echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
