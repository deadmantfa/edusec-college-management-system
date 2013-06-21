<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('miscellaneous_fees_receipt_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->miscellaneous_fees_receipt_id), array('view', 'id'=>$data->miscellaneous_fees_receipt_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('miscellaneous_fees_receipt_number')); ?>:</b>
	<?php echo CHtml::encode($data->miscellaneous_fees_receipt_number); ?>
	<br />


</div>