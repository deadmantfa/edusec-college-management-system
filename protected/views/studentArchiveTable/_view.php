<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_archive_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->student_archive_id), array('view', 'id'=>$data->student_archive_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_archive_stud_tran_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_archive_stud_tran_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_archive_stud_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_archive_stud_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_archive_ac_t_p_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_archive_ac_t_p_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_archive_ac_t_n_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_archive_ac_t_n_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_archive_status')); ?>:</b>
	<?php echo CHtml::encode($data->student_archive_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_archive_created_by')); ?>:</b>
	<?php echo CHtml::encode($data->student_archive_created_by); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('student_archive_creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->student_archive_creation_date); ?>
	<br />

	*/ ?>

</div>