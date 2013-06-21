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

if ($model != null):
$k=0;
?>
<table border="1">

	<tr>
		<th>
		    SN		
		</th>
 		<th>
		     Religion		
		</th>
		
 		<th>
		     Created By		
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
		     <?php echo $v['religion_name']; ?>		
		</td>
		
		<td>
		     <?php echo User::model()->findByPk($v['religion_created_by'])->user_organization_email_id; ?>		
		</td>
		
 	   </tr> 
       <?php
    
       }// end if
     }// end for loop
	
?>
</table>
<?php endif; ?>
