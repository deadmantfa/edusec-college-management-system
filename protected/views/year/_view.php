<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('year_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->year_id), array('view', 'id'=>$data->year_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />


</div>