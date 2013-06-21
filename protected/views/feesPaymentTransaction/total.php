
<?php
$this->menu=array(
	array('label'=>'', 'url'=>array('Total','Totalexport'=>'totalpdf','branch_id'=>$_REQUEST['branch_id'],'acm_id'=>$_REQUEST['acm_id'],'quota'=>$_REQUEST['quota'],'acm_name_id'=>$_REQUEST['acm_name_id']),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export to PDF','target'=>'_blank')),
	array('label'=>'', 'url'=>array('Total','totalexportexcel'=>'totalexcel','branch_id'=>$_REQUEST['branch_id'],'acm_id'=>$_REQUEST['acm_id'],'quota'=>$_REQUEST['quota'],'acm_name_id'=>$_REQUEST['acm_name_id']),'linkOptions'=>array('class'=>'export-excel','title'=>'Export to Excel','target'=>'_blank')),
);

$org_id=Yii::app()->user->getState('org_id');
$totalstudent=StudentTransaction::model()->findAllByAttributes( array(),$condition  = 'student_transaction_branch_id = :branch_id AND student_transaction_quota_id =:quota_id AND student_academic_term_period_tran_id = :acm_id AND student_academic_term_name_id = :acm_name_id AND student_transaction_organization_id = :org_id',
        $params     = array(
		':quota_id' => $_REQUEST['quota'],
                ':branch_id' => $_REQUEST['branch_id'], 
		':acm_id' => $_REQUEST['acm_id'], 
		':acm_name_id' => $_REQUEST['acm_name_id'], 
		':org_id' => $org_id,
	));

$fees_master = FeesMaster::model()->findByAttributes(array('fees_quota_id'=>$_REQUEST['quota'],'fees_branch_id'=>$_REQUEST['branch_id'],'fees_academic_term_name_id'=>$_REQUEST['acm_name_id']));

$fees_masterid= $fees_master->fees_master_id;

echo CHtml::link('GO BACK',Yii::app()->createUrl('feesPaymentTransaction/mis_report'))."</br></br>"; 
?>



<?php
$i=0;
$m=1;
if($totalstudent)
{
?>
<table class="table_data">
<th colspan="11"  style="font-size: 18px; color: rgb(255, 255, 255);">
		Total Student<br/>
<?php
echo "Branch : ".Branch::model()->findByPk($_REQUEST['branch_id'])->branch_name."(".Quota::model()->findByPk($_REQUEST['quota'])->quota_name.")<br/>";
echo "Semester: ".AcademicTerm::model()->findByPk($_REQUEST['acm_name_id'])->academic_term_name."(".AcademicTermPeriod::model()->findByPk( $_REQUEST['acm_id'])->academic_term_period.")";

?>
        </th>
<tr class="table_header">
<th>SI.No.</th>
<th>Enroll No.</th>
<th>Roll No.</th>
<th>Name</th>
<th>Payable Amount</th>
</tr>
<?php
$total_amt=0;
foreach($totalstudent as $t)
{	
	if(($m%2) == 0)
	{
	  $class = "odd";
	}
	else
	{
	  $class = "even";
	}
	echo "<tr class=".$class."><td>".++$i."</td>";
	echo "<td>".StudentInfo::model()->findByPk($t['student_transaction_student_id'])->student_enroll_no."</td><td>".StudentInfo::model()->findByPk($t['student_transaction_student_id'])->student_roll_no."</td><td>".StudentInfo::model()->findByPk($t['student_transaction_student_id'])->student_first_name." ".StudentInfo::model()->findByPk($t['student_transaction_student_id'])->student_middle_name." ".StudentInfo::model()->findByPk($t['student_transaction_student_id'])->student_last_name."</td>";

	$amtdata = Yii::app()->db->createCommand()
		->select('sum(fees_details_amount) as total')
		->from('student_fees_master')
		->where('student_fees_master_student_transaction_id='.$t['student_transaction_id'].' and fees_master_table_id='.$fees_masterid)
		->queryRow();

	$total_amt += $amtdata['total'];
	echo "<td>".$amtdata['total']."</td></tr>";

$m++;
}	
?>
<tr><th colspan = 4 style="font-size:18px;">Total Amount</th><th style="font-size:18px;"><?php echo $total_amt;?></th></tr>
</table>
<?php
}
else
{

	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";

}?>
