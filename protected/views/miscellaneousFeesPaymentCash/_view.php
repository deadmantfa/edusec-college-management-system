<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('miscellaneous_fees_payment_cash_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->miscellaneous_fees_payment_cash_id), array('view', 'id'=>$data->miscellaneous_fees_payment_cash_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('miscellaneous_fees_payment_cash_amount')); ?>:</b>
	<?php echo CHtml::encode($data->miscellaneous_fees_payment_cash_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('miscellaneous_fees_payment_cash_student_id')); ?>:</b>
	<?php echo CHtml::encode($data->miscellaneous_fees_payment_cash_student_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('miscellaneous_fees_payment_cash_receipt_id')); ?>:</b>
	<?php echo CHtml::encode($data->miscellaneous_fees_payment_cash_receipt_id); ?>
	<br />


</div>