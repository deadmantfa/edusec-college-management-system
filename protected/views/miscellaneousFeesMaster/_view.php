<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('miscellaneous_fees_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->miscellaneous_fees_id), array('view', 'id'=>$data->miscellaneous_fees_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('miscellaneous_fees_name')); ?>:</b>
	<?php echo CHtml::encode($data->miscellaneous_fees_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->creation_date); ?>
	<br />


</div>
