<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_fees_master_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->student_fees_master_id), array('view', 'id'=>$data->student_fees_master_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_fees_master_student_transaction_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_fees_master_student_transaction_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_master_table_id')); ?>:</b>
	<?php echo CHtml::encode($data->fees_master_table_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_fees_master_details_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_fees_master_details_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees_details_amount')); ?>:</b>
	<?php echo CHtml::encode($data->fees_details_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_fees_master_org_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_fees_master_org_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_fees_master_created_by')); ?>:</b>
	<?php echo CHtml::encode($data->student_fees_master_created_by); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('student_fees_master_creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->student_fees_master_creation_date); ?>
	<br />

	*/ ?>

</div>