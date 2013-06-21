<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('division_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->division_id), array('view', 'id'=>$data->division_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('division_name')); ?>:</b>
	<?php echo CHtml::encode($data->division_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('division_organization_id')); ?>:</b>
	<?php 
		$org_name = Organization::model()->findbyPk($data->division_organization_id);
	?>
	<?php echo CHtml::encode($org_name->organization_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('division_created_by')); ?>:</b>
	<?php
		$create_user = User::model()->findbyPk($data->division_created_by);
	?>
	<?php echo CHtml::encode($create_user->user_organization_email_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('division_creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->division_creation_date); ?>
	<br />


</div>
