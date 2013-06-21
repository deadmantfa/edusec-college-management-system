<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('shift_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->shift_id), array('view', 'id'=>$data->shift_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shift_type')); ?>:</b>
	<?php echo CHtml::encode($data->shift_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shift_organization_id')); ?>:</b>
	<?php 
		$org_name = Organization::model()->findbyPk($data->shift_organization_id);
	?>
	<?php echo CHtml::encode($org_name->organization_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shift_start_time')); ?>:</b>
	<?php echo CHtml::encode($data->shift_start_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shift_end_time')); ?>:</b>
	<?php echo CHtml::encode($data->shift_end_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shift_created_by')); ?>:</b>
	<?php
		$create_user = User::model()->findbyPk($data->shift_created_by);
	?>
	<?php echo CHtml::encode($create_user->user_organization_email_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shift_created_date')); ?>:</b>
	<?php echo CHtml::encode($data->shift_created_date); ?>
	<br />


</div>
