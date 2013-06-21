<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fees-payment-transaction-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
	
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>


	<div class="block-error">
		<?php echo Yii::app()->user->getFlash('error'); ?>
	</div>
	<?php
	$org_id=Yii::app()->user->getState('org_id');
	$acd = Yii::app()->db->createCommand()
		->select('*')
		->from('academic_term')
		->where('current_sem=1 and academic_term_organization_id='.$org_id)
		->queryAll();
	$acdterm=CHtml::listData($acd,'academic_term_id','academic_term_name');	
	$pe_data = AcademicTermPeriod::model()->findByPk($acd[0]['academic_term_period_id']);
	$period[$pe_data->academic_terms_period_id] = $pe_data->academic_term_period; 

	?>
	<div class="row">

	  <?php echo $form->labelEx($model,'start_date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
		    array(
			'model'=>$model,
			'attribute'=>'start_date',
			'language' => 'en',
			'options' => array(
			    'dateFormat'=>'dd-mm-yy',
			    'changeMonth' => 'true',
			    'changeYear' => 'true',
			    'duration'=>'fast',
			    'maxDate'=>0,
			    'showAnim' =>'slide',
		         	'yearRange'=>'1900:'.(date('Y')+1),
			    
			),
			'htmlOptions'=>array('tabindex'=>1,
			'style'=>'height:18px;
			    padding-left: 4px;width:164px;',
			'readonly'=>true,
			)
		    )
		);
	?>
	<span class="status">&nbsp;</span>
	<?php echo $form->error($model,'start_date'); ?>
	</div>

	
	

	<div class="row">

	  <?php echo $form->labelEx($model,'end_date'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',
		    array(
			'model'=>$model,
			'attribute'=>'end_date',
			'language' => 'en',
			'options' => array(
			    'dateFormat'=>'dd-mm-yy',
			    'changeMonth' => 'true',
			    'changeYear' => 'true',
			    'duration'=>'fast',
			    'maxDate'=>0,
			    'showAnim' =>'slide',
			    'yearRange'=>'1900:'.(date('Y')+1),
			),
			'htmlOptions'=>array('tabindex'=>2,
			'style'=>'height:18px;
			    padding-left: 4px;width:164px;',
			'readonly'=>true,
			)
		    )
		);
	?>
	<span class="status">&nbsp;</span>
	<?php echo $form->error($model,'end_date'); ?>
	</div>
	<div class="row">
        <?php echo $form->labelEx($model,'fees_acdm_period'); ?>
        <?php
		echo $form->dropDownList($model,'fees_acdm_period',$period,
		array(
		'tabindex'=>3,
		)); 
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_acdm_period'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Semester'); ?>
	        <?php //echo $form->dropDownList($model,'student_academic_term_name_id',array()); ?>
		<?php 
			echo $form->dropDownList($model,'fees_acdm',$acdterm,array('prompt' => 'Select Semester','tabindex'=>4)); 
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_acdm'); ?>
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'fees_branch'); ?>
		<?php //echo $form->textField($model,'acdm_name_id'); ?>	
		<?php
			echo $form->dropDownList($model,'fees_branch',
				CHtml::listData(Branch::model()->findAll(array('condition'=> 'branch_organization_id='.$org_id)),'branch_id','branch_name'),array('prompt' => 'Select Branch','tabindex'=>5));		 
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_branch'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Search', array('class'=>'submit','tabindex'=>6));
			
		?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->



