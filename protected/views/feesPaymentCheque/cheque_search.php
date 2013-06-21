<?php
$this->breadcrumbs=array(
	'Fees Cheque Details',
);


?>

<h1>Search Fees Cheque</h1>


<?php echo $this->renderPartial('search_form', array('model'=>$model,'fees_cheque'=>$fees_cheque,)); ?>
