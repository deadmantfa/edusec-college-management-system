<?php
$this->breadcrumbs=array(
	'Fees Details'=>array('admin'),
	//$model->fees_id=>array('view','id'=>$model->fees_id),
	$model->Rel_Fees_Details->fees_details_name,	
'Edit',
);

$this->menu=array(
	//array('label'=>'List FeesMasterTransaction', 'url'=>array('index')),
	//array('label'=>'Create FeesMasterTransaction', 'url'=>array('create')),
	//array('label'=>'View FeesMasterTransaction', 'url'=>array('view', 'id'=>$model->fees_id)),
	//array('label'=>'Manage FeesMasterTransaction', 'url'=>array('admin')),
);
?>

<h1>Edit Fees Details<?php //echo $model->fees_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'fees_details'=>$fees_details)); ?>
