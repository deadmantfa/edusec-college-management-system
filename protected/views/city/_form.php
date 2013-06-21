<div class = "test" style="display:none;">
<?php        
if($model->scenario == 'insert')
$name = "Add City";
else
$name = "Edit City";
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>$name,
		'autoOpen'=>true,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>350,
                'resizable'=>false,
                'draggable'=>false,
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("city/admin").'"; }'
	),
));
?>



<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'city-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>


	<div class="row">
        <?php echo $form->labelEx($model,'country_id'); ?>
	<?php
			echo $form->dropDownList($model,'country_id', Country :: items(),
			array(
			'prompt' => 'Select Country',
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/getstatecity'), 
			'update'=>'#City_state_id', //selector to update
			 
			),'tabindex'=>21));
			
			 
			?><span class="status">&nbsp;</span>
        <?php echo $form->error($model,'country_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'state_id'); ?>
		<?php 
		
			if(isset($model->state_id))
				echo $form->dropDownList($model,'state_id', CHtml::listData(State::model()->findAll(array('condition'=>'state_id='.$model->state_id)), 'state_id', 'state_name'));
			else
				echo $form->dropDownList($model,'state_id',array('empty' => 'Select State')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'state_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'city_name'); ?>
		<?php echo $form->error($model,'city_name'); ?>
		<?php echo $form->textField($model,'city_name',array('size'=>30,'maxlength'=>60)); ?><span class="status">&nbsp;</span>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
</div>
