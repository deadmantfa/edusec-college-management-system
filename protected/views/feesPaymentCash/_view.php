<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_payment_cash_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->fees_payment_cash_id), array('view', 'id'=>$data->fees_payment_cash_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_payment_cash_amount')); ?>:</b>
	<?php echo CHtml::encode($data->fees_payment_cash_amount); ?>
	<br />


</div>