<?php

$this->breadcrumbs=array(
	$this->module->id,
);
?>

<?php $this->pageTitle=Yii::app()->name; ?>


<!-- *************************DASHBOARD***************************************************** -->
<?php $this->widget('DWidget', array('portlets' => $portlets)); ?>
