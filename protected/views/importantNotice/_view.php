<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('notice_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->notice_id), array('view', 'id'=>$data->notice_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notice')); ?>:</b>
	<?php echo CHtml::encode($data->notice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php
		$create_user = User::model()->findbyPk($data->created_by);
	?>	
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->creation_date); ?>
	<br />


</div>
