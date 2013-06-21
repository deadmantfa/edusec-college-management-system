<?php

$this->menu=array(
//	array('label'=>'List EmployeeTransaction', 'url'=>array('index')),
	//array('label'=>'', 'url'=>array('StudentFeesReport'),'linkOptions'=>array('class'=>'Manage','title'=>'Studentwise Report')),
	
	array('label'=>'', 'url'=>array('Mis_report','MISexport'=>'pdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export to PDF','target'=>'_blank')),

	array('label'=>'', 'url'=>array('Mis_report','MISexportexcel'=>'excel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export to Excel','target'=>'_blank')),
);
/*$_SESSION['numStud']=$numStud;
$_SESSION['fees_data']=$fees_data;
$_SESSION['paid_stud_count']=$paid_stud_count;
$_SESSION['unpaid_stud_count']=$unpaid_stud_count;
$_SESSION['total_amount']=$total_amount;
$_SESSION['total_receive_amount']=$total_receive_amount; */
//echo CHtml::link('Export to Pdf',array('Mis_report','MISexport'=>'pdf'));
?>


	<table  class="table_data">
	<th colspan="11"  style="font-size: 18px; color: rgb(255, 255, 255);">
		Fees Summary
        </th>
		<tr class="table_header">
			<th>SI.NO.</th>
			<th>Branch</th>
			<th>Academic Year</th>
			<th>Semester</th>
			<th>Quota</th>			
			<th>Total Student</th>
			<th>Paid/Partialy Paid Student</th>
			<th>UnPaid Student</th>
			<th>Total Amount</th>
			<th>Receive Amount</th>
			<th>Outstanding Amount</th>
		</tr>		 

<?php	
	$k = 1;
	$j = 0;
	$final_total_amount = 0;
	$final_receive_amount = 0;
	$final_outstand_amount = 0;

$m=1;
foreach ($fees_data as $i)	
{
	if(($m%2) == 0)
	{
	  $class = "odd";
	}
	else
	{
	  $class = "even";
	}
?>
	<tr class="<?php echo $class; ?>">
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
			<?php echo AcademicTerm::model()->findByPk($i['fees_academic_term_name_id'])->academic_term_name;?>
		</td>
		<td>
			<?php echo Quota::model()->findByPk($i['fees_quota_id'])->quota_name;?>
		</td>
		<td>

		<u>
			<?php echo CHtml::link($numStud[$j],array('feesPaymentTransaction/total','branch_id'=>$i['fees_branch_id'],'acm_id'=>$i['fees_academic_term_id'],'acm_name_id'=>$i['fees_academic_term_name_id'],'quota'=>$i['fees_quota_id']));?></u>
		</td>
		<td>
		<u>
			<?php 
				echo CHtml::link($paid_stud_count[$j],array('feesPaymentTransaction/paid','branch_id'=>$i['fees_branch_id'],'acm_id'=>$i['fees_academic_term_id'],'acm_name_id'=>$i['fees_academic_term_name_id'],'quota'=>$i['fees_quota_id']));
			?></u>
		</td>
		<td>
		<u>	
			<?php echo CHtml::link($unpaid_stud_count[$j],array('feesPaymentTransaction/unpaid','branch_id'=>$i['fees_branch_id'],'acm_id'=>$i['fees_academic_term_id'],'acm_name_id'=>$i['fees_academic_term_name_id'],'quota'=>$i['fees_quota_id']));
			?></u>
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

<?php 
  $j++;
  $k++; 
  $m++;
}

?>
	</tr>	
		<tr class="report_footer">
			
			<td colspan=8 style="font-weight:bold;" border="0">
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

