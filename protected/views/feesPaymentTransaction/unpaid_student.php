<?php
$this->menu=array(
	array('label'=>'', 'url'=>array('unpaid','unpaidExport'=>'unpaidpdf','branch_id'=>$_REQUEST['branch_id'],'acm_id'=>$_REQUEST['acm_id'],'quota'=>$_REQUEST['quota'],'acm_name_id'=>$_REQUEST['acm_name_id']),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export to PDF','target'=>'_blank')),
	array('label'=>'', 'url'=>array('unpaid','unpaidexportexcel'=>'unpaidexcel','branch_id'=>$_REQUEST['branch_id'],'acm_id'=>$_REQUEST['acm_id'],'quota'=>$_REQUEST['quota'],'acm_name_id'=>$_REQUEST['acm_name_id']),'linkOptions'=>array('class'=>'export-excel','title'=>'Export to Excel','target'=>'_blank')),
);
 $org_id=Yii::app()->user->getState('org_id');
 $data= Yii::app()->db->createCommand()
->selectDistinct('stud.student_transaction_id,stud.student_transaction_student_id,stud.student_transaction_quota_id')
->from('student_transaction stud')
->where('stud.student_transaction_id NOT IN (SELECT fees_student_id FROM fees_payment_transaction where fees_academic_term_id=stud.student_academic_term_name_id )
AND stud.student_transaction_branch_id = :branch_id AND stud.student_transaction_quota_id =:quota AND stud.student_academic_term_period_tran_id = :acm_id AND stud.student_academic_term_name_id = :acm_name_id AND stud.student_transaction_organization_id = :org_id', array(
                ':branch_id' => $_REQUEST['branch_id'], 
		':acm_id' => $_REQUEST['acm_id'], 
		':acm_name_id' => $_REQUEST['acm_name_id'], 
		':org_id' => $org_id,
		':quota'=>$_REQUEST['quota'],
	))
->queryAll();

$fees_master = FeesMaster::model()->findByAttributes(array('fees_quota_id'=>$_REQUEST['quota'],'fees_branch_id'=>$_REQUEST['branch_id'],'fees_academic_term_name_id'=>$_REQUEST['acm_name_id']));

$fees_masterid= $fees_master->fees_master_id;

echo CHtml::link('GO BACK',Yii::app()->createUrl('feesPaymentTransaction/mis_report'))."</br></br>"; 
?>

<?php
/*$_SESSION['branch_id']=$_REQUEST['branch_id'];
$_SESSION['acm_id']=$_REQUEST['acm_id'];
$_SESSION['acm_name_id']=$_REQUEST['acm_name_id'];*/

//echo CHtml::link('Export to pdf',array('unpaid','unpaidExport'=>'unpaidpdf','branch_id'=>$_REQUEST['branch_id'],'acm_id'=>$_REQUEST['acm_id'],'acm_name_id'=>$_REQUEST['acm_name_id']));


if($data) {

?>
<table class="table_data">
<th colspan="11"  style="font-size: 18px; color: rgb(255, 255, 255);">
		Unpaid Student<br/>
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
<th>OutStanding Amount</th>
</tr>
<?php

$i = 0;
$m=1;
$total_amt=0;
foreach($data as $info)
{	
	if(($m%2) == 0)
	{
	  $class = "odd";
	}
	else
	{
	  $class = "even";
	}
	$detail = StudentInfo::model()->findByPk($info['student_transaction_student_id']);
	echo "<tr class=".$class."><td>".++$i."</td>";

	echo "<td>".$detail->student_enroll_no."</td><td>".$detail->student_roll_no."</td>
	      <td>".$detail->student_first_name." ".$detail->student_middle_name." ".$detail->student_last_name.
	     "</td>";
	$amtdata = Yii::app()->db->createCommand()
		->select('sum(fees_details_amount) as total')
		->from('student_fees_master')
		->where('student_fees_master_student_transaction_id='.$info['student_transaction_id'].' and fees_master_table_id='.$fees_masterid)
		->queryRow();

	$total_amt += $amtdata['total'];
	echo "<td>".$amtdata['total']."</td></tr>";

$m++;
}
?><tr style="font-size:18px;"><th colspan = 4>Total Amount</th><th><?php echo $total_amt;?></th></tr>
</table>
<?php }
else {
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
}
?>




