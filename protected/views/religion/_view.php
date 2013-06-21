<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('religion_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->religion_id), array('view', 'id'=>$data->religion_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('religion_name')); ?>:</b>
	<?php echo CHtml::encode($data->religion_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('religion_organization_id')); ?>:</b>
	<?php 
		$org_name = Organization::model()->findbyPk($data->religion_organization_id);
	?>
	<?php echo CHtml::encode($org_name->organization_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('religion_created_by')); ?>:</b>
	<?php
		$create_user = User::model()->findbyPk($data->religion_created_by);
	?>
	<?php echo CHtml::encode($create_user->user_organization_email_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('religion_created_date')); ?>:</b>
	<?php echo CHtml::encode($data->religion_created_date); ?>
	<br />


</div>
