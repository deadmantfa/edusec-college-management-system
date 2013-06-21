<?php
$this->breadcrumbs=array(
	'Assign Company'=>array('admin'),
	$model->Rel_ass_user->user_organization_email_id,
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Assign Company <?php //echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'id',
//		'assign_user_id',
		array('name' => 'assign_user_id',
		      'value' => $model->Rel_ass_user->user_organization_email_id,
                     ),

		array('name' => 'assign_org_id',
		      'value' => $model->Rel_ass_org->organization_name,
                     ),
		//'assign_role_id',
		//'assign_org_id',
	),
)); ?>
