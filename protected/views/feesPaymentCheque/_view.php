<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_payment_cheque_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->fees_payment_cheque_id), array('view', 'id'=>$data->fees_payment_cheque_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_payment_cheque_number')); ?>:</b>
	<?php echo CHtml::encode($data->fees_payment_cheque_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_payment_cheque_date')); ?>:</b>
	<?php echo CHtml::encode($data->fees_payment_cheque_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_payment_cheque_bank')); ?>:</b>
	<?php echo CHtml::encode($data->fees_payment_cheque_bank); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_payment_cheque_amount')); ?>:</b>
	<?php echo CHtml::encode($data->fees_payment_cheque_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_payment_cheque_status')); ?>:</b>
	<?php echo CHtml::encode($data->fees_payment_cheque_status); ?>
	<br />


</div>