<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'photo-gallery-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
				'validateOnSubmit'=>false,
			      ),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	
	
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>
	<div class="row">
	
	<?php 
		if(isset($model->photo_path))
		{
			echo CHtml::image(Yii::app()->baseUrl.'/images/album1/album_thumbs/'.$model->photo_path);
		}
?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'photo_path'); ?>
		<?php //echo $form->textField($model,'photo_path',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->fileField($model,'photo_path'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'photo_path'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'photo_desc'); ?>
		<?php echo $form->textField($model,'photo_desc',array('size'=>30,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'photo_desc'); ?>
	</div>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creation_date'); ?>
		<?php echo $form->textField($model,'creation_date'); ?>
		<?php echo $form->error($model,'creation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'photo_gallery_org_id'); ?>
		<?php echo $form->textField($model,'photo_gallery_org_id'); ?>
		<?php echo $form->error($model,'photo_gallery_org_id'); ?>
	</div>
-->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
