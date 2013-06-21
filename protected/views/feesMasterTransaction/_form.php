<?php        
if($model->scenario == 'insert')
$name = "Add Fees Details";
else
$name = "Edit Fees Details";
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>$name,
		'autoOpen'=>true,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>'600',
                'resizable'=>false,
                'draggable'=>true,
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("feesMaster/admin").'"; }'

		
	),
));
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fees-master-transaction-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
				'validateOnSubmit'=>true,
			      ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary(array($model,$fees_details)); ?>

<!--
	<div class="row">
		<?php echo $form->labelEx($model,'fees_master_id'); ?>
	        <?php echo $form->dropDownList($model,'fees_master_id',FeesMaster::items(), array('empty' => 'Select one of the following...')); ?>
		<?php echo $form->error($model,'fees_master_id'); ?>
	</div>
-->

	<div class="row">
		<?php echo $form->labelEx($fees_details,'fees_details_name'); ?>
		<?php echo FeesDetailsMaster::model()->findByPk($fees_details->fees_details_name)->fees_details_master_name; //echo $form->textField($fees_details,'fees_details_name',array('size'=>40,'maxlength'=>40)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($fees_details,'fees_details_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($fees_details,'fees_details_amount'); ?>
		<?php echo $form->textField($fees_details,'fees_details_amount',array('size'=>6,'maxlength'=>6)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($fees_details,'fees_details_amount'); ?>
	</div>

<!--
	<div class="row">
		<?php echo $form->labelEx($fees_details,'fees_details_created_by'); ?>
		<?php echo $form->textField($fees_details,'fees_details_created_by'); ?>
		<?php echo $form->error($fees_details,'fees_details_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($fees_details,'fees_details_created_date'); ?>
		<?php echo $form->textField($fees_details,'fees_details_created_date'); ?>
		<?php echo $form->error($fees_details,'fees_details_created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($fees_details,'fees_details_tally_id'); ?>
		<?php echo $form->textField($fees_details,'fees_details_tally_id'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($fees_details,'fees_details_tally_id'); ?>
	</div>
-->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
