<?php
$this->breadcrumbs=array(
	'Photo Galleries',
);

$this->menu=array(
	array('label'=>'Create PhotoGallery', 'url'=>array('create')),
	array('label'=>'Manage PhotoGallery', 'url'=>array('admin')),
);
?>

<h1>Photo Galleries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
