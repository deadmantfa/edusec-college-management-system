<?php
$this->breadcrumbs=array(
	'Item Category'=>array('admin'),
	'Add',
);

$this->menu=array(
//	array('label'=>'List ItemCategory', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Item Category</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
