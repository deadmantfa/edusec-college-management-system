<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_receipt_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->fees_receipt_id), array('view', 'id'=>$data->fees_receipt_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_receipt_number')); ?>:</b>
	<?php echo CHtml::encode($data->fees_receipt_number); ?>
	<br />


</div>