<div class = "test" style="display:none;">
<?php        
if($model->scenario == 'insert')
$name = "Add Academic Year";
else
$name = "Edit Academic Year";
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>$name,
		'autoOpen'=>true,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>480,
                'resizable'=>false,
                'draggable'=>false,
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("academicTermPeriod/admin").'"; }'
	),
));
?>



<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'academic-term-period-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

<!--	<div class="row">
		<?php echo $form->labelEx($model,'academic_terms_period_name'); ?>
		<?php echo $form->error($model,'academic_terms_period_name'); ?>
		<?php echo $form->textField($model,'academic_terms_period_name',array('size'=>40,'maxlength'=>60)); ?><span class="status">&nbsp;</span>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'academic_term_period'); ?>
		<?php echo $form->textField($model,'academic_term_period',array('size'=>25,'maxlength'=>60)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'academic_term_period'); ?>
	</div>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'academic_terms_period_start_date'); ?>
		<?php

        		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model'=>$model,
    			'attribute'=>'academic_terms_period_start_date',
   			'language'=>Yii::app()->language=='et' ? 'et' : null,
    			'options'=>array(
			'dateFormat'=>'yy-mm-dd',
			'showAnim' =>'slide',
       			//'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
        		//'showOn'=>'button', // 'focus', 'button', 'both'
        		//'buttonText'=>Yii::t('ui','Select form calendar'), 
        		 //'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png', 
       			 //'buttonImageOnly'=>true,
    ),
    'htmlOptions'=>array(
        'style'=>'width:80px;vertical-align:top'
    ),  
));?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'academic_terms_period_start_date'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'academic_terms_period_end_date'); ?>
		<?php

        		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model'=>$model,
    			'attribute'=>'academic_terms_period_end_date',
   			'language'=>Yii::app()->language=='et' ? 'et' : null,
    			'options'=>array(
			'dateFormat'=>'yy-mm-dd',
       			'showAnim'=>'slide', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
        		//'showOn'=>'button', // 'focus', 'button', 'both'
        		//'buttonText'=>Yii::t('ui','Select form calendar'), 
        		// 'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png', 
       			// 'buttonImageOnly'=>true,
		    ),
		    'htmlOptions'=>array(
			'style'=>'width:80px;vertical-align:top'
		    ),  
	));?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'academic_terms_period_end_date'); ?>
	</div>
-->

<!--
	<div class="row">
		<?php echo $form->labelEx($model,'academic_terms_period_organization_id'); ?>
		<?php echo $form->textField($model,'academic_terms_period_organization_id'); ?>
		<?php echo $form->error($model,'academic_terms_period_organization_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'academic_terms_period_created_by'); ?>
		<?php echo $form->textField($model,'academic_terms_period_created_by'); ?>
		<?php echo $form->error($model,'academic_terms_period_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'academic_terms_period_creation_date'); ?>
		<?php echo $form->textField($model,'academic_terms_period_creation_date'); ?>
		<?php echo $form->error($model,'academic_terms_period_creation_date'); ?>
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
</div>
