<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('block_user_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->block_user_id), array('view', 'id'=>$data->block_user_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_table_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_table_user_id); ?>
	<br />


</div>