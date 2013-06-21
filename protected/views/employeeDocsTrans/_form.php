<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Attach Document',
		'autoOpen'=>true,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>430,
                'resizable'=>false,
                'draggable'=>false,
		
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("employeeTransaction/update/".$_REQUEST['id']).'"; }'
	),
));

?>
<style>
.row #EmployeeDocs_employee_docs_path {
  width: 200px;
}
</style>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-docs-trans-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php // echo $form->errorSummary($model); 
		//$this->layout='receipt_layout';
	?>

	<div class="row">
		<?php echo $form->labelEx($emp_doc,'doc_category_id'); ?>
		<?php echo $form->dropDownList($emp_doc,'doc_category_id',CHtml::listData(DocumentCategoryMaster::model()->findAll(array('condition'=>'docs_category_organization_id='.Yii::app()->user->getState('org_id'))),'doc_category_id','doc_category_name'),array('empty' => 'Select Category')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($emp_doc,'doc_category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($emp_doc,'title'); ?>
		<?php echo $form->textField($emp_doc,'title',array('size'=>17,'maxlength'=>20)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($emp_doc,'title'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($emp_doc,'employee_docs_desc'); ?>
		<?php echo $form->textArea($emp_doc,'employee_docs_desc',array('rows'=>3,'cols'=>16)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($emp_doc,'employee_docs_desc'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($emp_doc,'employee_docs_submit_date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model'=>$emp_doc, 
		    'attribute'=>'employee_docs_submit_date',
		    'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'showAnim' =>'slide',
			'maxDate'=>0,
			'yearRange'=>'1900:'.(date('Y')+1),
			'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
			'htmlOptions'=>array(
			'style'=>'width:165px;vertical-align:top',
			'readonly'=>true,
		    ),
			
		));
		?>
		
		<span class="status">&nbsp;</span>
		<?php echo $form->error($emp_doc,'employee_docs_submit_date'); ?>
	</div>
	<div class="row">
	      <?php echo $form->labelEx($emp_doc,'employee_docs_path'); ?>
		<?php echo $form->fileField($emp_doc, 'employee_docs_path'); ?>
		
	      <?php echo $form->error($emp_doc,'employee_docs_path'); ?><?php CHtml::endForm(); ?>	
	</div>
	<div class="hint"><b>Hint:-</b>&nbsp;Upload Only Jpeg, Jpg, Pdf, Txt, Doc, Gif, Png Type Document</div>
	 <div>&nbsp;</div>

	<div class="row buttons">

	       <?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save', array('class'=>'submit')); ?>

	</div>

<?php $this->endWidget(); 
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

</div><!-- form -->
