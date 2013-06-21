<?php
$this->breadcrumbs=array(
	'Branch Passoutsem Tag Tables',
);

$this->menu=array(
	array('label'=>'Create BranchPassoutsemTagTable', 'url'=>array('create')),
	array('label'=>'Manage BranchPassoutsemTagTable', 'url'=>array('admin')),
);
?>

<h1>Branch Passoutsem Tag Tables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
