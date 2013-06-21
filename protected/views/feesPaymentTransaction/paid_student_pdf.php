
<?php 
$org_id=Yii::app()->user->getState('org_id');

$data= Yii::app()->db->createCommand()
->selectDistinct('fees.fees_student_id, stud.student_transaction_id,stud.student_transaction_student_id,stud.student_transaction_quota_id')
->from('fees_payment_transaction fees')
->join('student_transaction stud', 'fees.fees_student_id = stud.student_transaction_id')
->where('stud.student_transaction_branch_id = :branch_id AND stud.student_transaction_quota_id =:quota_id AND stud.student_academic_term_period_tran_id = :acm_id AND fees.fees_academic_term_id = :acm_name_id AND stud.student_transaction_organization_id = :org_id', array(
                ':branch_id' => $_REQUEST['branch_id'], 
		':acm_id' => $_REQUEST['acm_id'], 
		':acm_name_id' => $_REQUEST['acm_name_id'],
		':org_id' => $org_id, 
		':quota_id'=>$_REQUEST['quota'],
	))
->queryAll();

echo "<h2 align='center'>Branch : ".Branch::model()->findByPk($_REQUEST['branch_id'])->branch_name."(".Quota::model()->findByPk($_REQUEST['quota'])->quota_name.")<br/>";
echo "Semester: ".AcademicTerm::model()->findByPk($_REQUEST['acm_name_id'])->academic_term_name."(".AcademicTermPeriod::model()->findByPk( $_REQUEST['acm_id'])->academic_term_period.")"."</h2>";

$fees_master = FeesMaster::model()->findByAttributes(array('fees_quota_id'=>$_REQUEST['quota'],'fees_branch_id'=>$_REQUEST['branch_id'],'fees_academic_term_name_id'=>$_REQUEST['acm_name_id']));

$fees_masterid= $fees_master->fees_master_id;
if($data) {

?>

<table class="table_data" border="1">
<tr class="table_header">
	<th>SI.No.</th>
	<th>Enroll No.</th>
	<th>Roll No.</th>
	<th>Name</th>
	<th>Payable Amount</th>
	<th>Paid Amount</th>
	<th>Outstanding</th>
</tr>
<?php

$i = 0;
$m=1;
$grandpayable = 0;
$grandpaidtotal = 0;
$grandoutstandtotal = 0;
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

	$var_amt = $amtdata['total'];
	echo "<td>".$var_amt."</td>";

	$grandpayable += $var_amt;
	$totalpaidamt = 0;
	$paid_amt = FeesPaymentTransaction::model()->findAll(array('condition'=>'fees_payment_master_id='.$fees_masterid.' and fees_student_id='.$info['student_transaction_id']));
	foreach($paid_amt as $list)
	{
	   if($list['fees_payment_method_id']==1)
	   {
		$totalpaidcash = FeesPaymentCash::model()->findByPk($list['fees_payment_cash_cheque_id']);
		$totalpaidamt += $totalpaidcash->fees_payment_cash_amount;
	   }
	   else
	   {
		$totalpaidchaque = FeesPaymentCheque::model()->findByPk($list['fees_payment_cash_cheque_id']);
		if($totalpaidchaque->fees_payment_cheque_status == 0)
		$totalpaidamt += $totalpaidchaque->fees_payment_cheque_amount;
	   }
	}		
	echo "<td>".$totalpaidamt."</td>";
	$grandpaidtotal += $totalpaidamt;
	$grandoutstandtotal += $amtdata['total']-$totalpaidamt;
	echo "<td>".($amtdata['total']-$totalpaidamt)."</td></tr>";

$m++;
}
	
?>
<tr style="font-size:18px;" ><th></th><th></th><th></th><th>Total Amount</th><th><?php echo $grandpayable;?></th><th><?php echo $grandpaidtotal;?></th><th><?php echo $grandoutstandtotal;?></th></tr>
</table>
<?php 
}
else 
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
}
?>




