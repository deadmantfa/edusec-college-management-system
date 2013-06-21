<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('feedback_details_table_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->feedback_details_table_id), array('view', 'id'=>$data->feedback_details_table_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feedback_details_table_student_id')); ?>:</b>
	<?php echo CHtml::encode($data->feedback_details_table_student_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feedback_category_master_id')); ?>:</b>
	<?php echo CHtml::encode($data->feedback_category_master_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feedback_details_remarks')); ?>:</b>
	<?php echo CHtml::encode($data->feedback_details_remarks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feedback_details_table_created_by')); ?>:</b>
	<?php echo CHtml::encode($data->feedback_details_table_created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feedback_details_table_creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->feedback_details_table_creation_date); ?>
	<br />


</div>