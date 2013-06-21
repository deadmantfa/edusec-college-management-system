<?php
$this->breadcrumbs=array(
	'Student Status'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Studentstatusmaster', 'url'=>array('index')),
	//array('label'=>'Create Studentstatusmaster', 'url'=>array('create')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/StudentStatusExportToPdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To PDF','target'=>'_blank')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/StudentStatusExportToExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('studentstatusmaster-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Student Status</h1>



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
	'id'=>'studentstatusmaster-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		//'id',
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		'status_name',
		//'creation_date',
		//'created_by',
		//'organization_id',
		/*
		array('name'=>'Organization',
			'value'=>'Organization::model()->findByPk($data->organization_id)->organization_name',
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
