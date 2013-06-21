<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_details_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->fees_details_id), array('view', 'id'=>$data->fees_details_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_details_name')); ?>:</b>
	<?php echo CHtml::encode($data->fees_details_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_details_amount')); ?>:</b>
	<?php echo CHtml::encode($data->fees_details_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_details_created_by')); ?>:</b>
	<?php echo CHtml::encode($data->fees_details_created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_details_created_date')); ?>:</b>
	<?php echo CHtml::encode($data->fees_details_created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_details_tally_id')); ?>:</b>
	<?php echo CHtml::encode($data->fees_details_tally_id); ?>
	<br />


</div>