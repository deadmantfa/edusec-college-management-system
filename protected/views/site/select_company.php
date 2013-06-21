
<h3 style ="margin-top:10px;">List of Organization</h3>

<?php
	 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'select_company_form',
	'enableAjaxValidation'=>true,
	)); 
?>
	
	    <?php echo $form->errorSummary($model); ?>
	
	<div class="block-error">
		<?php echo Yii::app()->user->getFlash('not-select'); ?>
	</div>
	<div class="row">
<?php
		$listcompany = CHtml::listData($company,'organization_id', 'organization_name');

		echo $form->labelEx($model,'organization_name',array('class'=>'main-select-label'));
		echo $form->radioButtonList($model,'organization_name',$listcompany,array('template'=>'<span class="rb">{input} {label}</span>'));
		echo $form->error($model,'organization_name');



?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Select',array('class'=>'submit','name' => 'select_org')); ?>
	</div>
	
<?php $this->endWidget(); ?>






