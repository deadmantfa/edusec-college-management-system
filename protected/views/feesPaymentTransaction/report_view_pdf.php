<style>
table, th, td {
  vertical-align: middle;
}
th, td, caption {
  padding: 4px 0 10px;
  text-align: center;
}

</style>
<table border="1">
		<tr>
			<th>Sr.NO.</th>
			<th>Branch</th>
			<th>Academic Year</th>
			<th>Semester</th>
			<th>Quota</th>						
			<th>Total Student</th>
			<th>Paid Student</th>
			<th>UnPaid Student</th>
			<th>Total Amount</th>
			<th>Receive Amount</th>
			<th>Outstanding Amount</th>
		</tr>

<?php
$k=1;
$j=0;
//print_r($numStud);
$final_total_amount = 0;
$final_receive_amount = 0;
$final_outstand_amount = 0;

foreach ($fees_data as $i)	
{
?>
		<tr>
			<td>
				<?php echo $k; ?>
			</td>

		<td>
			<?php echo Branch::model()->findByPk($i['fees_branch_id'])->branch_name;?>
		</td>
		<td>
			<?php echo AcademicTermPeriod::model()->findByPk($i['fees_academic_term_id'])->academic_term_period;?>
		</td>

		<td>
			<?php echo "Sem-".AcademicTerm::model()->findByPk($i['fees_academic_term_name_id'])->academic_term_name;?>
		</td>
		<td>
			<?php echo Quota::model()->findByPk($i['fees_quota_id'])->quota_name;?>
		</td>
		<td>
			<?php echo $numStud[$j];?>
		</td>
		<td>
			<?php 
				echo $paid_stud_count[$j];
			?>
		</td>
		<td>
			<?php echo $unpaid_stud_count[$j];
			?>
		</td>
		<td>
			<?php   $final_total_amount += $total_amount[$j];
				echo $total_amount[$j]?>
		</td>

		<td>
			<?php	$final_receive_amount += $total_receive_amount[$j];
				echo $total_receive_amount[$j]?>
		</td>

		<td>
			<?php	$final_outstand_amount += $total_amount[$j] - $total_receive_amount[$j];
				echo $total_amount[$j] - $total_receive_amount[$j]?>
		</td>


		
		</tr>
<?php
	$k++;
	$j++; 
}

 ?>

		<tr>
			<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
			<td style="font-weight:bold;">
				Total
			</td>
			<td style="font-weight:bold">
				<?php echo $final_total_amount; ?>
			</td>
			<td style="font-weight:bold">
				<?php echo $final_receive_amount; ?>
			</td>
			<td style="font-weight:bold">
				<?php echo $final_outstand_amount; ?>
			</td>
		</tr>
</table>		 


