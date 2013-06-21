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
		     Fees Payment Type 	
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
		      <?php echo $v['fees_type_name']; ?>	
		</td>
				
		<td>
		     <?php echo Organization::model()->findByPk($v['fees_payment_type_organization_id'])->organization_name; ?>		
		</td>
			
 	   </tr> 
       <?php
    
       }// end if
     }// end for loop
	
?>
</table>
<?php endif; ?>
