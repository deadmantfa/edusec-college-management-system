<?php
$this->breadcrumbs=array(
	'Branch Tags'=>array('admin'),
	$model->branch_tag_name,
	'Edit',
);

$this->menu=array(
	//array('label'=>'List BranchPassoutsemTagTable', 'url'=>array('index')),
	//array('label'=>'Create BranchPassoutsemTagTable', 'url'=>array('create')),
	//array('label'=>'View BranchPassoutsemTagTable', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage BranchPassoutsemTagTable', 'url'=>array('admin')),

	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Branch Tags  <?php //echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
