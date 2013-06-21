<?php
$this->breadcrumbs=array(
	'Search Fees Cheques',
);?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fees-payment-cheque-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<?php //echo $form->errorSummary($model); ?>	
	<div class="row">
		<?php echo $form->labelEx($model,'fees_payment_cheque_number'); ?>
		<?php echo $form->textField($model,'fees_payment_cheque_number',array('maxlength'=>6)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_payment_cheque_number'); ?>
		
		
	</div>
	<!--
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Search' : 'Save'); ?>
	</div>-->
	<div class = "row_t_v">
		<?php //echo CHtml::button('Search', array('class'=>'submit','submit' => array('Cheque_search'))); ?>

<?php
	echo CHtml::ajaxSubmitButton(
	    'Search',
	    array('Cheque_result'),
	    array(
	        'update'=>'#test',
	    ),
	    array('class'=>'submit')
	);
?>
	</div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->
<div id = "test">
	</div>
