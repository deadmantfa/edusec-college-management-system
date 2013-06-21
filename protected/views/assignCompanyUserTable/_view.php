<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assign_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->assign_user_id); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('assign_org_id')); ?>:</b>
	<?php echo CHtml::encode($data->assign_org_id); ?>
	<br />


</div>
