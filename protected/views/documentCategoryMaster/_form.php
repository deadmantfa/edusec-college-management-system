<?php
$name = $model->isNewRecord ? 'Add Document Category' : 'Edit Document Category';
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
		
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("documentCategoryMaster/admin").'"; }'
	),
));

?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'document-category-master-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'doc_category_name'); ?>
		<?php echo $form->textField($model,'doc_category_name',array('size'=>25,'maxlength'=>30)); ?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'doc_category_name'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>
</div><!-- form -->
