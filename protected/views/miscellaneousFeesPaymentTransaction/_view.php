<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('miscellaneous_trans_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->miscellaneous_trans_id), array('view', 'id'=>$data->miscellaneous_trans_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('miscellaneous_fees_id')); ?>:</b>
	<?php echo CHtml::encode($data->miscellaneous_fees_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_fees_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_fees_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Amount')); ?>:</b>
	<?php echo CHtml::encode($data->Amount); ?>
	<br />


</div>