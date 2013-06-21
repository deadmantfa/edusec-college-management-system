

<script type="text/javascript">
function cheking(a)
{
	var v=document.getElementById("amounts_"+a).value;
	if(isNaN(v)){
		alert("Please Enter Numeric Value");
		document.getElementById("amounts_"+a).value = "";
		document.getElementById("amounts_"+a).focus();
	}
}
</script>
<?php
$this->breadcrumbs=array(
	'Fees Category'=>array('admin'),
	'Add',
);

$this->menu=array(
	//array('label'=>'List FeesMaster', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),

);

?>

<h1>Add Fees Category</h1>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fees-master-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); 
	$org_id=Yii::app()->user->getState('org_id');
	$branch_array=Branch::model()->findAll(array('condition'=>'branch_organization_id ='.$org_id));
	$quota_array=Quota::model()->findAll(array('condition'=>'quota_organization_id='.$org_id)); 
	$fees_details = FeesDetailsMaster::model()->findAll(array('condition'=>'organization_id='.$org_id));?>
	
	<div class="row fees-branch-list">
	<?php echo $form->labelEx($model,'fees_branch_id'); ?>
	<?php
	foreach($branch_array as $b)
	{
		echo "<div class='row'>";
		echo $form->checkBox($model, 'fees_branch_id[]', array('value'=>$b['branch_id'], 'uncheckValue'=>null));	
		echo "&nbsp;".$b['branch_name'];
?>
		</div>
<?php	}?><span class="status">&nbsp;</span>
	<?php echo $form->error($model,'fees_branch_id'); ?>
	</div>
	<div class="row fees-quota-list">
	<?php echo $form->labelEx($model,'fees_quota_id'); ?>
	<?php
	foreach($quota_array as $q)
	{
		echo "<div class='row'>";
		echo $form->checkBox($model, 'fees_quota_id[]', array('value'=>$q['quota_id'], 'uncheckValue'=>null));	
		echo "&nbsp;".$q['quota_name'];
?>
		</div>
<?php   }  ?>
	<?php echo $form->error($model,'fees_quota_id'); ?>
	</div>
	<div class="fees-detail">
	<?php
	if($fees_details)
	{
		foreach($fees_details as $list) {
			echo '<ul class="fees-detail-list"><li>'.CHtml::label($list->fees_details_master_name,'').'</li>';
			echo '<li>'.CHtml::textField('amounts['.$list->fees_details_master.']', null,array('onblur'=>'cheking('.$list->fees_details_master.')')).'</li></ul>';

		 }
	}
	else
	{
		echo "<span class='required'>".CHtml::label('No Fees Details Master created. Create first','')."</span>";
		echo CHtml::link('click here',array('feesDetailsMaster/create'));
	}
	?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fees_academic_term_name_id'); ?>
		<?php echo $form->dropDownList($model,'fees_academic_term_name_id', CHtml::listData(AcademicTerm::model()->findAll(array('condition'=>'current_sem = 1  AND academic_term_organization_id='.Yii::app()->user->getState('org_id'))), 'academic_term_id', 'academic_term_name'), array('empty' => 'Select Semester'));?>
		<span class="status">&nbsp;</span><?php echo $form->error($model,'fees_academic_term_name_id'); ?>
		</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save', array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
