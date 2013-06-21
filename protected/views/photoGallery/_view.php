<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->photo_id), array('view', 'id'=>$data->photo_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo_path')); ?>:</b>
	<?php echo CHtml::encode($data->photo_path); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo_desc')); ?>:</b>
	<?php echo CHtml::encode($data->photo_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->creation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo_gallery_org_id')); ?>:</b>
	<?php echo CHtml::encode($data->photo_gallery_org_id); ?>
	<br />


</div>