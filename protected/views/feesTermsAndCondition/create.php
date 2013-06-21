<?php
$this->breadcrumbs=array(
	'Terms And Conditions'=>array('admin'),
	'Add',
);

$this->menu=array(
	//array('label'=>'List FeesTermsAndCondition', 'url'=>array('index')),
	//array('label'=>'Manage FeesTermsAndCondition', 'url'=>array('admin')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Terms And Conditions</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
