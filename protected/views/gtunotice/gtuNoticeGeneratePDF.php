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

if ($model != null):?>
<?$k=0;?>
<table border="1">

	<tr>
		<th align="center">
		      SN.		
		</th>
		<th>
		     Description
		</th>
		<th>
		     Link
		</th>
		<th>
		     Created By		
		</th>
		
 		<th>
		     Organization		
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
		      <?php echo $v['Description']; ?>	
		</td>
		<td>
		      <?php echo $v['Link']; ?>	
		</td>
		<td>
		     <?php echo User::model()->findByPk($v['Created_By'])->user_organization_email_id; ?>		
		</td>		
		<td>
		     <?php echo Organization::model()->findByPk($v['gtunotice_organization_id'])->organization_name; ?>		
		</td>
		
		
			
 	   </tr> 
       <?php
    
       }// end if
     }// end for loop
	
?>
</table>
<?php endif; ?>
