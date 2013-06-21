<style>
table, th, td {
  vertical-align: middle;
}
th, td, caption {
  padding: 4px 0 10px;
  text-align: center;
}

</style>
<?php 
$k=0;
if ($model != null):

?>
<table border="1">

	<tr>
		<th>
		   SN.	
		</th>
 		<th>
		     Shift		
		</th>
		<th>
		     Start Time		
		</th>
 		<th>
		     End Time		
		</th>
		<th>
		     Created By		
		</th>
		<th>
		     Organization Name		
		</th>
 		
		
 	</tr>
	<?php 
	foreach($model as $m=>$v) {
          if($m <> 0) {
            ?>	<tr>
		<td>
		      <?php echo ++$k; ?>	
		</td>
		<td>
		     <?php echo $v['shift_type']; ?>		
		</td>
		<td>
		      <?php echo $v['shift_start_time']; ?>	
		</td>
		<td>
		     <?php echo $v['shift_end_time']; ?>		
		</td>
		<td>
		     <?php echo User::model()->findByPk($v['shift_created_by'])->user_organization_email_id; ?>		
		</td>
		<td>
		     <?php echo Organization::model()->findByPk($v['shift_organization_id'])->organization_name; ?>		
		</td>
		
 	   </tr> 
       <?php
    
       }// end if
     }// end for loop
	
?>
</table>
<?php endif; ?>
