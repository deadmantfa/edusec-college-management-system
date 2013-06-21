<?php
$this->breadcrumbs=array(
	'Photo Gallery'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List PhotoGallery', 'url'=>array('index')),
	//array('label'=>'Create PhotoGallery', 'url'=>array('create')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Upload')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('photo-gallery-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Photo Galleries</h1>
<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">-
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
	'id'=>'photo-gallery-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		//'photo_id',
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		//'photo_path',
		array(
		'name' => 'photo_path',
		'type'=>'raw',
                'value'=>  'CHtml::image("../images/album1/album_thumbs/" . $data->photo_path, "No Image",array("width"=>"20px","height"=>"20px"))',
                 ),
		'photo_desc',
		//'created_by',
		//'creation_date',
		//'photo_gallery_org_id',
		array(
			'class'=>'MyCButtonColumn',
		),
	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>
