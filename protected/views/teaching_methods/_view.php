<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('teaching_methods_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->teaching_methods_id), array('view', 'id'=>$data->teaching_methods_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teaching_methods_name')); ?>:</b>
	<?php echo CHtml::encode($data->teaching_methods_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teaching_methods_alias')); ?>:</b>
	<?php echo CHtml::encode($data->teaching_methods_alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remarks')); ?>:</b>
	<?php echo CHtml::encode($data->remarks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teaching_methods_created_by')); ?>:</b>
	<?php echo CHtml::encode($data->teaching_methods_created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teaching_methods_created_date')); ?>:</b>
	<?php echo CHtml::encode($data->teaching_methods_created_date); ?>
	<br />


</div>