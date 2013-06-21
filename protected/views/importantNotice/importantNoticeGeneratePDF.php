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
		      	notice 	
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
		      <?php echo $v['notice']; ?>	
		</td>
		<td>
		     <?php echo User::model()->findByPk($v['created_by'])->user_organization_email_id; ?>		
		</td>		
		<td>
		     <?php echo Organization::model()->findByPk($v['notice_organization_id'])->organization_name; ?>		
		</td>
		
		
			
 	   </tr> 
       <?php
    
       }// end if
     }// end for loop
	
?>
</table>
<?php endif; ?>
