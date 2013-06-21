<?php
$this->breadcrumbs=array(
	'Photo Gallery'=>array('admin'),
	//$model->photo_id=>array('view','id'=>$model->photo_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List PhotoGallery', 'url'=>array('index')),
	//array('label'=>'Create PhotoGallery', 'url'=>array('create')),
	//array('label'=>'View PhotoGallery', 'url'=>array('view', 'id'=>$model->photo_id)),
	//array('label'=>'Manage PhotoGallery', 'url'=>array('admin')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Update PhotoGallery <?php //echo $model->photo_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>


