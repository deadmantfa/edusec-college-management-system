<?php
$this->breadcrumbs=array(
	'Student Document'=>array('/studentTransaction/update','id'=>$_REQUEST['id']),
	'Add',
);

?>

<h1>Add Student Document</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'stud_doc'=>$stud_doc)); ?>
