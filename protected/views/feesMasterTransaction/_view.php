<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->fees_id), array('view', 'id'=>$data->fees_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_master_id')); ?>:</b>
	<?php echo CHtml::encode($data->fees_master_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_desc_id')); ?>:</b>
	<?php echo CHtml::encode($data->fees_desc_id); ?>
	<br />


</div>