<?php
$this->breadcrumbs=array(
	'Photo Gallery'=>array('admin'),
	//$model->photo_id,
);

$this->menu=array(
	//array('label'=>'List PhotoGallery', 'url'=>array('index')),
	//array('label'=>'Create PhotoGallery', 'url'=>array('create')),
	//array('label'=>'Delete PhotoGallery', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->photo_id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage PhotoGallery', 'url'=>array('admin')),
	//array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->photo_id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),	
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->photo_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),

);
?>

<h1>View Photo<?php //echo $model->photo_id; ?></h1>
<?php echo CHtml::image(Yii::app()->baseUrl.'/images/album1/album_thumbs/' . $model->photo_path);?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'photo_id',
		'photo_path',
		'photo_desc',
		//'created_by',
		//'creation_date',
		//'photo_gallery_org_id',
	),
)); ?>
