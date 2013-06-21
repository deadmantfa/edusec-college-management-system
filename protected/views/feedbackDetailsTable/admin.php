<?php
$this->breadcrumbs=array(
	'Student Feedback Details'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List FeedbackDetailsTable', 'url'=>array('index')),
	//array('label'=>'Create FeedbackDetailsTable', 'url'=>array('create')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('feedback-details-table-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Student Feedback Details</h1>


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
	'id'=>'feedback-details-table-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		//'feedback_details_table_id',
		'feedback_details_table_student_id',
		'feedback_category_master_id',
		'feedback_details_remarks',
		//'feedback_details_table_created_by',
		//'feedback_details_table_creation_date',
		array(
			'class'=>'MyCButtonColumn',
		),
	),
	'pager'=>array(
		'class'=>'AjaxList',
//		'maxButtonCount'=>25,
		'header'=>''
	    ),
)); ?>
