<?php
$this->breadcrumbs=array('Report',
	'Student Info',
	
);?>
<div class="dynamic-report-form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'studentinfo-form',
	'enableAjaxValidation'=>true,

)); ?>

	<?php //echo $form->errorSummary($model); ?>

	<div class="block-error">
		<?php echo Yii::app()->user->getFlash('no_student_found'); ?>
		
	</div>

	<div class="row">
		<?php echo CHtml::label('Branch Name',''); ?>
		<?php echo CHtml::dropDownList('branch', null, Branch::items(), array('empty' => 'Select Branch','tabindex'=>1));?>

		<?php echo CHtml::label('Quota',''); ?>
		<?php echo CHtml::dropDownList('quota', null, Quota::items(), array('empty' => 'Select Quota','tabindex'=>4));?>


		
	</div>
	
	<?php
	$org_id=Yii::app()->user->getState('org_id');
	$acd = Yii::app()->db->createCommand()
		->select('*')
		->from('academic_term')
		->where('current_sem=1 and academic_term_organization_id='.$org_id)
		->queryAll();
	$period=array();
	$acdterm=CHtml::listData($acd,'academic_term_id','academic_term_name');
	if(!empty($acdterm))	
	{  $pe_data = AcademicTermPeriod::model()->findByPk($acd[0]['academic_term_period_id']);
	   $period[$pe_data->academic_terms_period_id] = $pe_data->academic_term_period; 
	}?>
	<div class="row">
		<?php echo CHtml::label('Academic Year',''); ?>
		<?php  echo CHtml::dropDownList('acdm_period', null,$period, array('empty' => 'Select Year','tabindex'=>2) ); ?>

		<?php echo CHtml::label('City',''); ?>
		<?php echo CHtml::dropDownList('city', null, City::items(), array('empty' => 'Select City','tabindex'=>5));?>
	<span class="status">&nbsp;</span>
	</div>

	<div class="row">

		<?php echo CHtml::label('Semester',''); ?>
		<?php echo CHtml::dropDownList('sem', null, $acdterm, array('empty' => 'Select Semester','tabindex'=>3));?>
		
		<?php echo CHtml::label('Category',''); ?>
		<?php echo CHtml::dropDownList('category', null, Category::items(), array('empty' => 'Select Category','tabindex'=>6));?>
	</div>

	<div class="row">
		<?php echo CHtml::label('Blood Group',''); ?>
		<?php echo CHtml::dropDownList('bg', null, StudentInfo::getBloodGroup(), array('empty' => 'Select Blood Group','tabindex'=>7));?>
	</div>

	<div class="row">
		<?php echo CHtml::label('Gender',''); ?>
		<?php echo CHtml::dropDownList('gender', null, StudentInfo::getGenderOptions(), array('empty' => 'Select Gender','tabindex'=>8));?>
	</div>


</div>

<div class="dynamic-report-form">
<?php
		echo $this->renderPartial('criteria_selection_form', array('query'=>$query));

?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit', array('class'=>'submit','tabindex'=>32)); ?>
	</div>

</div>


<?php $this->endWidget(); ?>

