<?php
$this->breadcrumbs=array(
	'Photo Gallery'=>array('admin'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List PhotoGallery', 'url'=>array('index')),
	//array('label'=>'Manage PhotoGallery', 'url'=>array('admin')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Upload Photo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
