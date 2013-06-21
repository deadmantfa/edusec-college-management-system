<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users</h1>
<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),

		//'user_id',
		 array(
			'name'=>'user_organization_email_id',
			'header'=>'User',
			'value'=>'CHtml::link($data->user_organization_email_id,Yii::app()->createUrl("rights/assignment/user",array("id"=>$data->user_id)))',
		        'type'  => 'raw',
		      ),
		'user_type',

		array(
			'header'=>'Role',
			'value'=>'AuthAssignment::GetRole($data->user_id)',
		),
		array(
			'header'=>'Operation',
			'value'=>'AuthAssignment::GetOperation($data->user_id)',
		),

		//'user_password',

		/*'user_created_by',
		'user_creation_date',
		/*
		'user_organization_id',
		
		array(
			'class'=>'CButtonColumn',
		),*/
	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>
