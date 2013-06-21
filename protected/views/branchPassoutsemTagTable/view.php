<?php
$this->breadcrumbs=array(
	'Branch Tags'=>array('admin'),
	$model->branch_tag_name,
);

$this->menu=array(
	//array('label'=>'List BranchPassoutsemTagTable', 'url'=>array('index')),
	//array('label'=>'Create BranchPassoutsemTagTable', 'url'=>array('create')),
	//array('label'=>'Update BranchPassoutsemTagTable', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete BranchPassoutsemTagTable', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage BranchPassoutsemTagTable', 'url'=>array('admin')),

	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),

	
);
?>

<h1>View Branch Tag <?php //echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'branch_tag_name',
		'pass_out_sem',
		//'created_by',
		array('name'=>'created_by',
			'value'=>User::model()->findByPk($model->created_by)->user_organization_email_id,
		),
		array(
                'name'=>'creation_date',
                'type'=>'raw',		
                'value'=>($model->creation_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->creation_date), 'd-m-Y'),
	        ),
		//'creation_date',
		//'organization_id',
		array('name'=>'Organization',
			'value'=>Organization::model()->findByPk($model->organization_id)->organization_name,
			'filter' => false,
		),
	),
)); ?>
