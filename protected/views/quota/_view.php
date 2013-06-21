<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('quota_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->quota_id), array('view', 'id'=>$data->quota_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quota_name')); ?>:</b>
	<?php echo CHtml::encode($data->quota_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quota_organization_id')); ?>:</b>
	<?php 
		$org_name = Organization::model()->findbyPk($data->quota_organization_id);
	?>
	<?php echo CHtml::encode($org_name->organization_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quota_created_by')); ?>:</b>
	<?php
		$create_user = User::model()->findbyPk($data->quota_created_by);
	?>
	<?php echo CHtml::encode($create_user->user_organization_email_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quota_created_date')); ?>:</b>
	<?php echo CHtml::encode($data->quota_created_date); ?>
	<br />


</div>
