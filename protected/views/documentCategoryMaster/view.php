<?php
$this->breadcrumbs=array(
	'Document Category'=>array('admin'),
	$model->doc_category_name,
);

$this->menu=array(
	//array('label'=>'List DocumentCategoryMaster', 'url'=>array('index')),
	//array('label'=>'Create DocumentCategoryMaster', 'url'=>array('create')),
	//array('label'=>'Update DocumentCategoryMaster', 'url'=>array('update', 'id'=>$model->doc_category_id)),
	//array('label'=>'Delete DocumentCategoryMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->doc_category_id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage DocumentCategoryMaster', 'url'=>array('admin')),

	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->doc_category_id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->doc_category_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Document Category <?php //echo $model->doc_category_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'doc_category_id',
		'doc_category_name',
		//'created_by',
		array('name'=>'created_by',
			'value'=>User::model()->findByPk($model->created_by)->user_organization_email_id,
		),
		array('name'=>'creation_date',
			'value'=>date_format(new DateTime($model->creation_date), 'd-m-Y'),
		),
		//'creation_date',
		//'docs_category_organization_id',
		array('name'=>'Organization',
			'value'=>Organization::model()->findByPk($model->docs_category_organization_id)->organization_name,
			'filter' => false,
		),
	),
)); ?>
