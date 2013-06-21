<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_details_master')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->fees_details_master),array('view','id'=>$data->fees_details_master)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_details_master_name')); ?>:</b>
	<?php echo CHtml::encode($data->fees_details_master_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->creation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organization_id')); ?>:</b>
	<?php echo CHtml::encode($data->organization_id); ?>
	<br />


</div>