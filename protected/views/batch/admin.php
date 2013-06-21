<?php
$this->breadcrumbs=array(
	'Batches'=>array('admin'),
	'Manage',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/BatchExportToPdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To PDF','target'=>'_blank')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/BatchExportToExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),	
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('batch-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Batches</h1>

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
	'id'=>'batch-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
  	//'template'=>"{items}\n{pager}",
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),

		//'batch_id',
		'batch_code',
		//'batch_organization_id',

		/*array(
                'name'=>'branch_name',
//                'type'=>'raw',		
                'value'=> '$data->rel_branch->branch_name',
	          ),*/
		array('name'=>'branch_id',
			'value'=>'Branch::model()->findByPk($data->branch_id)->branch_name',
			'filter' =>CHtml::listData(Branch::model()->findAll(array('condition'=>'branch_organization_id='.Yii::app()->user->getState('org_id'))),'branch_id','branch_name'),

		), 
		
		array(
                'name'=>'division_code',
//                'type'=>'raw',		
                'value'=> '$data->rel_division->division_code',
	          ),
		/*
		array(
                'name'=>'subject_master_name',
//                'type'=>'raw',		
                'value'=> '$data->rel_subject->subject_master_name',
	          ), */
		array('name'=>'Organization',
			'value'=>'Organization::model()->findByPk($data->batch_organization_id)->organization_name',
			'filter' => false,

		),

		//'batch_created_by',
		/*
		array('name'=>'batch_creation_date',
			'value'=>'$data->batch_creation_date',
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
