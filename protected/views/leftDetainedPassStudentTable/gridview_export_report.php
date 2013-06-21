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
			<th>Student Roll No</th>	
			<th>Student Enroll No</th>
			<th>Student Name</th>
			<th>Student Status Name</th>			
			<th>Semester</th>
			<th>Academic Year</th>
			<th>Remarks</th>
			<th>Cancelation Date</th>
			<th>Created By</th>
			<th>Organization Name</th>

		</tr>
<?php
$k=0;
foreach($model as $m=>$v) {
          if($m <> 0) {
            ?>	<tr>
		<td>
		      <?php echo ++$k; ?>		
		</td>
 		<td> 	 	 	 	 	
		      <?php echo StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$v['student_id']))-> student_roll_no; ?>			
		</td>
		<td>
		      <?php echo StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$v['student_id']))-> student_enroll_no; ?>		
		</td>
		<td>
		      <?php echo StudentInfo::model()->findByPk($v['student_id'])->student_first_name; ?>		
		</td>
		<td>
		      <?php echo Studentstatusmaster::model()->findByPk($v['status_id'])->status_name; ?>		
		</td>
		<td>
		      <?php echo "Sem-".AcademicTerm::model()->findByPk($v['sem'])->academic_term_name; ?>		
		</td>
		<td>
		      <?php echo AcademicTermPeriod::model()->findByPk($v['academic_term_period_id'])->academic_term_period; ?>
		</td>
		<td>
		      <?php echo $v['remarks']; ?>
		</td>
		<td>
		      <?php if($v['left_detained_pass_student_cancel_date'] !=NULL)
				echo date('d-m-Y',strtotime($v['left_detained_pass_student_cancel_date'])); ?>
		</td>
		<td>
		      <?php echo User::model()->findByPk($v['created_by'])->user_organization_email_id; ?>
		</td>
		<td>
		      <?php echo Organization::model()->findByPk($v['oraganization_id'])->organization_name; ?>
		</td>
		 	   </tr> 
       <?php
    
       }// end if
     }// 
?>
</table>

