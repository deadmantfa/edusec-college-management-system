<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->user_id), array('view', 'id'=>$data->user_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_organization_email_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_organization_email_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_password')); ?>:</b>
	<?php echo CHtml::encode($data->user_password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_type')); ?>:</b>
	<?php echo CHtml::encode($data->user_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_created_by')); ?>:</b>
	<?php echo CHtml::encode($data->user_created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->user_creation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_organization_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_organization_id); ?>
	<br />


</div>