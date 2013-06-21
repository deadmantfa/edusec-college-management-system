<?php
$this->breadcrumbs=array(
	'Branch Tags '=>array('admin'),
	'Add',
);

$this->menu=array(
	//array('label'=>'List BranchPassoutsemTagTable', 'url'=>array('index')),
	//array('label'=>'Manage BranchPassoutsemTagTable', 'url'=>array('admin')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),

);
?>

<h1>Add Branch Tags</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
