<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('feedback_category_master_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->feedback_category_master_id), array('view', 'id'=>$data->feedback_category_master_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feedback_category_name')); ?>:</b>
	<?php echo CHtml::encode($data->feedback_category_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feedback_category_created_by')); ?>:</b>
	<?php echo CHtml::encode($data->feedback_category_created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feedback_category_creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->feedback_category_creation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feedback_category_organizaton_id')); ?>:</b>
	<?php echo CHtml::encode($data->feedback_category_organizaton_id); ?>
	<br />


</div>