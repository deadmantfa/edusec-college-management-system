<?php
$this->breadcrumbs=array(
	'Religions'=>array('admin'),
	'Manage',
);

$this->menu=array(
//	array('label'=>'List Religion', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	
	array('label'=>'', 'url'=>array('ExportToPDFExcel/ReligionExportToPdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To Pdf','target'=>'_blank')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/ReligionExportToExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('religion-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Religions</h1>

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
	'id'=>'religion-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		//'religion_id',
		'religion_name',
		//'religion_organization_id',
		//'religion_created_by',
		//'religion_created_date',
		/* 
		array('name'=>'Organization',
			'value'=>'Organization::model()->findByPk($data->religion_organization_id)->organization_name',
			'filter' => false,

		),
		array('name'=>'religion_created_date',
			'value'=>'$data->religion_created_date',
			'filter' => false,

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
