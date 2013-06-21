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
			<th>Fees Category</th>
				
			<th>Quota Name</th>
			
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
		      <?php echo $v['fees_master_name']; ?>			
		</td>
		<td>
		      <?php echo Quota::model()->findByPk($v['fees_quota_id'])->quota_name; ?>		
		</td>
		
		<td>
		      <?php echo User::model()->findByPk($v['fees_master_created_by'])->user_organization_email_id; ?>
		</td>
		<td>
		      <?php echo Organization::model()->findByPk($v['fees_organization_id'])->organization_name; ?>
		</td>
		 	   </tr> 
       <?php
    
       }// end if
     }// 
?>
</table>

