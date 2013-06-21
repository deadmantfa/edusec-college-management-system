<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_payment_method_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->fees_payment_method_id), array('view', 'id'=>$data->fees_payment_method_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_payment_method_name')); ?>:</b>
	<?php echo CHtml::encode($data->fees_payment_method_name); ?>
	<br />


</div>