<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('branch_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->branch_id), array('view', 'id'=>$data->branch_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('branch_name')); ?>:</b>
	<?php echo CHtml::encode($data->branch_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('branch_organization_id')); ?>:</b>
	<?php 
		$org_name = Organization::model()->findbyPk($data->branch_organization_id);
	?>	
	<?php echo CHtml::encode($org_name->organization_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('branch_created_by')); ?>:</b>
	<?php
		$create_user = User::model()->findbyPk($data->branch_created_by);
	?>
	<?php echo CHtml::encode($create_user->user_organization_email_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('branch_creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->branch_creation_date); ?>
	<br />


</div>
