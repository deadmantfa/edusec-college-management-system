<?php
$this->breadcrumbs=array(
	'Performance Category'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List FeedbackCategoryMaster', 'url'=>array('index')),
	//array('label'=>'Create FeedbackCategoryMaster', 'url'=>array('create')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/FeedbackcategoryExportToPdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To PDF','target'=>'_blank')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/FeedbackcategoryExportToExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('feedback-category-master-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Performance Category</h1>



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
	'id'=>'feedback-category-master-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		//'feedback_category_master_id',
		'feedback_category_name',
		//'feedback_category_created_by',
		//'feedback_category_creation_date',
		array(
                'name'=>'organization_name',
//                'type'=>'raw',		
                'value'=> '$data->Rel_org_feedback->organization_name',
	          ),
		//'feedback_category_organizaton_id',
		array(
			'class'=>'MyCButtonColumn',
		),
	),

	'pager'=>array(
		'class'=>'AjaxList',
//		'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>
