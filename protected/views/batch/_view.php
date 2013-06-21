<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('batch_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->batch_id), array('view', 'id'=>$data->batch_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('batch_name')); ?>:</b>
	<?php echo CHtml::encode($data->batch_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('batch_organization_id')); ?>:</b>
	<?php 
		$org_name = Organization::model()->findbyPk($data->batch_organization_id);
	?>
	<?php echo CHtml::encode($org_name->organization_name); ?>
	<br/>

	<b><?php echo CHtml::encode($data->getAttributeLabel('batch_created_by')); ?>:</b>
	<?php
		$create_user = User::model()->findbyPk($data->batch_created_by);
	?>	
	<?php echo CHtml::encode($create_user->user_organization_email_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('batch_creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->batch_creation_date); ?>
	<br />


</div>
