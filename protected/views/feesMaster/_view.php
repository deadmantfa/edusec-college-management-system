<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_master_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->fees_master_id), array('view', 'id'=>$data->fees_master_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_master_name')); ?>:</b>
	<?php echo CHtml::encode($data->fees_master_name); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_master_tally_id')); ?>:</b>
	<?php echo CHtml::encode($data->fees_master_tally_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_organization_id')); ?>:</b>
	<?php echo CHtml::encode($data->Rel_fees_org->organization_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_branch_id')); ?>:</b>
	<?php echo CHtml::encode($data->Rel_fees_branch->branch_name); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_academic_term_id')); ?>:</b>
	<?php echo CHtml::encode($data->fees_academic_term_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_quota_id')); ?>:</b>
	<?php echo CHtml::encode($data->fees_quota_id); ?>
	<br />

	*/ ?>

</div>
