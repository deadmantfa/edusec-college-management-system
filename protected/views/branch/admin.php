<?php
$this->breadcrumbs=array(
	'Branches'=>array('admin'),
	'Manage',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/BranchExportToPdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To PDF','target'=>'_blank')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/BranchExportToExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),	
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('branch-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Branches</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'branch-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		//'branch_id',
		'branch_name',
		'branch_alias',
		'branch_code',
		
		array('name'=>'branch_tag_id',
			'value'=>'BranchPassoutsemTagTable::model()->findByPk($data->branch_tag_id)->branch_tag_name',
			'filter' =>CHtml::listData(BranchPassoutsemTagTable::model()->findAll(array('condition'=>'organization_id='.Yii::app()->user->getState('org_id'))),'id','branch_tag_name'),

		), 
		//'branch_created_by',
		//'branch_creation_date',
		array('name'=>'Organization',
			'value'=>'Organization::model()->findByPk($data->branch_organization_id)->organization_name',
			'filter' => false,
		), 
		/*
		array('name'=>'branch_creation_date',
		'type'=>'raw',
			'value'=>'$data->branch_creation_date',	
		),*/ 

		array(
			'class'=>'MyCButtonColumn',
		),
	),
		'pager'=>array(
		'class'=>'AjaxList',
		//'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>
