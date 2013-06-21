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
$k = 0;
if ($model != null):
?>
<table border="1">

	<tr>
		<th>
		      SN.		
		</th>
		<th>
		      Division Name		
		</th>
		<th>
		      Division Code		
		</th>
 		<th>
		      Branch Name		
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
		      <?php echo $v['division_name']; ?>	
		</td>
		<td>
		      <?php echo $v['division_code']; ?>	
		</td>
		<td>
		     <?php echo Branch::model()->findByPk($v['branch_id'])->branch_name; ?>		
		</td>
		<td>
		     <?php echo User::model()->findByPk($v['division_created_by'])->user_organization_email_id; ?>		
		</td>
		<td>
		     <?php echo Organization::model()->findByPk($v['division_organization_id'])->organization_name; ?>		
		</td>
		
		
 	   </tr> 
       <?php
    
       }// end if
     }// end for loop
	
?>
</table>
<?php endif; ?>
