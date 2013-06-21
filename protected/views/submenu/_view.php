<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('submenu_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->submenu_id), array('view', 'id'=>$data->submenu_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mainmenu_id')); ?>:</b>
	<?php echo CHtml::encode($data->mainmenu_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link')); ?>:</b>
	<?php echo CHtml::encode($data->link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />


</div>