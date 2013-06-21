<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_payment_transaction_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->fees_payment_transaction_id), array('view', 'id'=>$data->fees_payment_transaction_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_payment_master_id')); ?>:</b>
	<?php echo CHtml::encode($data->fees_payment_master_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_payment_method_id')); ?>:</b>
	<?php echo CHtml::encode($data->fees_payment_method_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_payment_cash_cheque_id')); ?>:</b>
	<?php echo CHtml::encode($data->fees_payment_cash_cheque_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_receipt_id')); ?>:</b>
	<?php echo CHtml::encode($data->fees_receipt_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_payment')); ?>:</b>
	<?php echo CHtml::encode($data->fees_payment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_received_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->fees_received_user_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_full_part_payment_id')); ?>:</b>
	<?php echo CHtml::encode($data->fees_full_part_payment_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_student_id')); ?>:</b>
	<?php echo CHtml::encode($data->fees_student_id); ?>
	<br />

	*/ ?>

</div>
