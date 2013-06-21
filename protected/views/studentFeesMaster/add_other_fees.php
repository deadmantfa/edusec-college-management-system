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
	'Student Fees Masters'=>array('admin'),
	//$_REQUEST['id']=>array('view','student_id'=>$_REQUEST['id']),
	'Edit',
);

?>
<?php
		
	$stud_info =  StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$_REQUEST['id']));
	$stud_tran_info =  StudentTransaction::model()->findByPk($_REQUEST['id']);
	$academic_period =  AcademicTermPeriod::model()->findByPk($stud_tran_info->student_academic_term_period_tran_id)->academic_term_period;
	$semester =  AcademicTerm::model()->findByPk($stud_tran_info->student_academic_term_name_id)->academic_term_name;
?>
<table  border="2px" id="twoColThinTable">
<tr class="row">
	<td class="col1">Name </td>
	<td class="col2"><?php echo $stud_info->student_first_name.' '.$stud_info->student_middle_name.' '.$stud_info->student_last_name;?></td>
</tr>	
<tr class="row">	
	<td class="col1">Enrollment No. </td> 
	<td class="col2"><?php echo $stud_info->student_enroll_no;?></td>
</tr>	
<tr class="row">
	<td class="col1">Roll No.</td> 
	<td class="col2"> <?php echo $stud_info->student_roll_no;?></td>
</tr>	
<tr class="row">

	<td class="col1">Academic Year </td> 

	<td class="col2"><?php echo $academic_period;?></td>
</tr>	

<tr class="row">	
	<td class="col1">Current Semester  </td> 
	<td class="col2">Sem:-<?php echo $semester; ?></td>
</tr>	
<tr class="row">
	<td class="col1">Quota </td> 
	<td class="col2"><?php echo Quota::model()->findByPk($stud_tran_info->student_transaction_quota_id)->quota_name;?></td>
</tr>	
<table></br>
<fieldset  style="width:495px;border:1px solid">
 <legend style="color:#3B5998;font-weight:bold;">Add Fees</legend>
</br>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-fees-master-form',
	'enableAjaxValidation'=>true,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

<?php //print_r($fees_head_array); 

	if(!empty($fees_head_array))
	{
	foreach($fees_head_array as $list){
		
?>
	<div class="row" style="padding-left:15px">
		<?php echo CHtml::label($list['fees_details_master_name'],''); ?>
		<?php echo CHtml::textField('amounts['.$list['fees_details_master'].']', null,array('onblur'=>'cheking('.$list['fees_details_master'].')')) ?>
		
	</div>

<?php } ?>
	<div class="row buttons" style="padding-left:15px">
		<?php echo CHtml::submitButton('Submit', array('id'=>$_REQUEST['id'],'class'=>'submit'));  ?>
	</div>
	<?php } 
		else
		{
			echo "<h3 align=center style=color:red>No More Fees Details. Already added. Please create first</h3></br>";
			echo CHtml::link('GO BACK',Yii::app()->createUrl('studentFeesMaster/view?student_id='.$_REQUEST['id'])); 
		}
?>

<?php $this->endWidget(); ?>

</div><!-- form -->
</fieldset>

