<style>
table, th, td {
 vertical-align: middle;
}
th, td, caption {
 padding: 4px 0 10px;
 text-align: left;
 border:none;
}

</style>
<?php 
$sv = array();
$data=StudentInfo::model()->findAll('student_info_transaction_id='.$id);

?>
<table border="1" width="200px">
<tr>
	<td><label>Student </label></td><td><?php echo $data[0]->student_first_name;?></td>
</tr>
<tr>
	<td><label>Enrollment No </label></td><td> <?php echo $data[0]->student_enroll_no;?></td>
</tr>
</table>
<?php 
if ($cash_data != null) {
$k=0;
?>

<h3>Payment By Cash</h3>
<table border="1">

	<tr>
		<th>
		     SN No.
		</th>
		<th>
		      Cash Receipt No
		</th>
		<th>
		     Fees Head
		</th>
		<th>
		     Fees Amount
		</th>
 		<th>
		      Date	
		</th>
		
		
 	</tr>
	<?php 
	foreach($cash_data as $m=>$v) {
            ?>	<tr>
		<td>
		      <?php echo ++$k; ?>		
		</td>
		<td>
		      <?php echo $v['miscellaneous_fees_payment_cash_receipt_id']; ?>		
		</td>
		<td>
		      <?php  
			echo MiscellaneousFeesMaster::model()->findByPk($v['miscellaneous_fees_payment_cash_master_id'])->miscellaneous_fees_name;?>		
		</td>
		<td>
		      <?php echo $v['miscellaneous_fees_payment_cash_amount']; ?>		
		</td>
		<td>
		      <?php echo date("d-m-Y",strtotime($v['miscellaneous_fees_payment_cash_creation_date'])); ?>		
		</td>
		
		
 	   </tr> 
       <?php
  
     }// end for loop
	
?>
</table>
<?php }
 else
{
	echo "<h3>Payment By Cash</h3>";
	echo "No Data";
}
 ?>
<br><br><br>
<?php 
if($cheque_data != null) {
$k=0;
?>

<h3>Payment By Cheque</h3>
<table border="1">

	<tr>
		<th>
		     SN No.
		</th>
		<th>
		      Cheque / Draft No.
		</th>
		<th>
		     Cheque / Draft Date
		</th>
		<th>
		     Bank
		</th>
		<th>
		     Branch
		</th>
		
		<th>
		     Receipt No.
		</th>
		<th>
		     Fees Head
		</th>
		<th>
		     Amount
		</th>
 		<th>
		      Date	
		</th>
		
		
 	</tr>
	<?php 
	foreach($cheque_data as $m=>$v) {
            ?>	<tr>
		<td>
		      <?php echo ++$k; ?>		
		</td>
		<td>
		      <?php echo $v['miscellaneous_fees_payment_cheque_number']; ?>		
		</td>
		<td>
		      <?php echo date("d-m-Y",strtotime($v['miscellaneous_fees_payment_cheque_date'])); ?>		
		</td>
		<td>
		       <?php echo BankMaster::model()->findByPk($v['miscellaneous_fees_payment_cheque_bank'])->bank_full_name; ?>		
		</td>
		<td>
		      <?php echo $v['miscellaneous_fees_payment_cheque_branch']; ?>		
		</td>
		
		<td>
		      <?php echo $v['miscellaneous_fees_payment_cheque_receipt_id']; ?>		
		</td>
		<td> <?php echo 

		MiscellaneousFeesMaster::model()->findByPk($v['miscellaneous_fees_payment_cheque_master_id'])->miscellaneous_fees_name;?>		
		</td>
		<td>
		      <?php echo $v['miscellaneous_fees_payment_cheque_amount']; ?>		
		</td>
		<td>
		      <?php echo date("d-m-Y",strtotime($v['miscellaneous_fees_payment_cheque_creation_date'])); ?>		
		</td>
		
 	   </tr> 
       <?php
 
     }// end for loop
	
?>
</table>
<?php }
else {
	echo "<h3>Payment By Cheque</h3>";
	echo "No Data";
}
 ?>
<br><br><br>



