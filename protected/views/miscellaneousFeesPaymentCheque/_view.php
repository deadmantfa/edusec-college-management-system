<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('miscellaneous_fees_payment_cheque_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->miscellaneous_fees_payment_cheque_id), array('view', 'id'=>$data->miscellaneous_fees_payment_cheque_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('miscellaneous_fees_payment_cheque_number')); ?>:</b>
	<?php echo CHtml::encode($data->miscellaneous_fees_payment_cheque_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('miscellaneous_fees_payment_cheque_date')); ?>:</b>
	<?php echo CHtml::encode($data->miscellaneous_fees_payment_cheque_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('miscellaneous_fees_payment_cheque_bank')); ?>:</b>
	<?php echo CHtml::encode($data->miscellaneous_fees_payment_cheque_bank); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('miscellaneous_fees_payment_cheque_branch')); ?>:</b>
	<?php echo CHtml::encode($data->miscellaneous_fees_payment_cheque_branch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('miscellaneous_fees_payment_cheque_amount')); ?>:</b>
	<?php echo CHtml::encode($data->miscellaneous_fees_payment_cheque_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('miscellaneous_fees_payment_cheque_status')); ?>:</b>
	<?php echo CHtml::encode($data->miscellaneous_fees_payment_cheque_status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('miscellaneous_fees_payment_cheque_student_id')); ?>:</b>
	<?php echo CHtml::encode($data->miscellaneous_fees_payment_cheque_student_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('miscellaneous_fees_payment_cheque_receipt_id')); ?>:</b>
	<?php echo CHtml::encode($data->miscellaneous_fees_payment_cheque_receipt_id); ?>
	<br />

	*/ ?>

</div>