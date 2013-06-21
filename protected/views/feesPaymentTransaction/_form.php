<div class="form fees-payment-form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fees-payment-transaction-form',
	'enableAjaxValidation'=>false,
)); ?>
<!--
	<p class="note">Fields with <span class="required">*</span> are required.</p>
-->
</br>
	<?php

$student_name=StudentInfo::model()->findByPk(StudentTransaction::model()->findByPk($_REQUEST['id'])->student_transaction_student_id);

$full_name = $student_name->student_first_name." ".$student_name->student_middle_name." ".$student_name->student_last_name;

$enroll_no = $student_name->student_enroll_no;
?>

<table  border="2px" id="twoColThinTable">
<tr class="row">
	<td class="col1">Name </td>
	<td class="col2"><?php echo $full_name;?></td>
</tr>	
<tr class="row">	
	<td class="col1">Enrollment No. </td> 
	<td class="col2"><?php echo $enroll_no;?></td>
</tr>
<tr class="row">	
	<td class="col1">Fees Category</td> 
	<td class="col2"><?php echo $FeesMasterDetails->fees_master_name;?></td>
</tr>	
<tr class="row">	
	<td class="col1">Organization</td> 
	<td class="col2"><?php echo $FeesMasterDetails->fees_organization_id;?></td>
</tr>
<tr class="row">	
	<td class="col1">Branch</td> 
	<td class="col2"><?php echo $FeesMasterDetails->fees_branch_id;?></td>
</tr>
<tr class="row">	
	<td class="col1">Academic Year</td> 
	<td class="col2"><?php echo $FeesMasterDetails->fees_academic_term_id;?></td>
</tr>
<tr class="row">	
	<td class="col1">Semester</td> 
	<td class="col2"><?php echo $FeesMasterDetails->fees_academic_term_name_id;?></td>
</tr>
<tr class="row">	
	<td class="col1">Quota</td> 
	<td class="col2"><?php echo $FeesMasterDetails->fees_quota_id;?></td>
</tr>
<tr class="row">	
	<td class="col1">Total Fees</td> 
	<td class="col2"><?php echo $FeesMasterDetails->fees_master_total;?></td>
</tr>	
</table>
<div>&nbsp;</div>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fees_payment'); ?>
		<?php echo $form->dropdownList($model,'fees_payment',FeesPaymentType::items()); ?>
		<?php echo $form->error($model,'fees_payment'); ?>
	</div>

	<?php echo $form->hiddenField($model,'fees_master_id',array('value'=>$model->fees_payment_master_id)); ?>
	<?php echo $form->hiddenField($model,'student_id',array('value'=>$_REQUEST['id'])); ?>

	<div class="row buttons">
		<?php echo CHtml::Button('Cash',array('submit' => array('payfeescash','student_id'=>$_REQUEST['id']),'class'=>'submit')); ?>
		<?php echo CHtml::Button('Cheque',array('submit' => array('payfeescheque','student_id'=>$_REQUEST['id']),'class'=>'submit','style'=>'margin-left:5px;')); ?>
	</div>
	<div>&nbsp;</div>


<?php $this->endWidget(); ?>

</div><!-- form -->



