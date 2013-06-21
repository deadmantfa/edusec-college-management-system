<div class = "test" style="display:none;">
<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Left / Rejoin Student',
		'autoOpen'=>true,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>400,
                'resizable'=>false,
                'draggable'=>false,
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("leftDetainedPassStudentTable/leftClearStudent").'"; }'
	),
));
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'left-detained-pass-student-table-form',
	//'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($status_model,'status_id'); ?>
		<?php echo $form->dropDownList($status_model,'status_id',
				CHtml::listData(Studentstatusmaster::model()->findAll('status_name <>'.'"Regular"'),'id','status_name'));?>
		<?php echo $form->error($status_model,'status_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($status_model,'left_detained_pass_student_cancel_date'); ?>
		<?php if(isset($model->left_detained_pass_student_cancel_date))
			    {
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'=>$status_model,
				'attribute'=>'left_detained_pass_student_cancel_date',
				'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
			    	'maxDate'=>0,
				'showAnim' =>'slide',
				'yearRange'=>'1900:'.(date('Y')+1),
				'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
				       
				),
				'htmlOptions'=>array(
				'style'=>'width:165px;vertical-align:top;',
				'value'=>date("d-m-Y", strtotime($model->left_detained_pass_student_cancel_date)),
			
				),
				));
			    }
			else
			{
			    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'model'=>$status_model,
			    'attribute'=>'left_detained_pass_student_cancel_date',
			    'options'=>array(
			    'dateFormat'=>'dd-mm-yy',
			    'changeYear'=>'true',
			    'changeMonth'=>'true',
			    'maxDate'=>0,
			    'showAnim' =>'slide',
				'yearRange'=>'1900:'.(date('Y')+1),	
			    'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',           
			    ),
			    'htmlOptions'=>array(
			    'style'=>'width:165px;vertical-align:top'
			    ),
           
			));
			}
		?>
		
		<span class="status">&nbsp;</span>
		<?php echo $form->error($status_model,'left_detained_pass_student_cancel_date'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($status_model,'remarks'); ?>
		<?php echo $form->textField($status_model,'remarks',array('size'=>17)); ?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($status_model,'remarks'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($status_model->isNewRecord ? 'Add' : 'Save',array('name' => 'update_status_student','class'=>'submit'));
		  
		 ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
</div>
