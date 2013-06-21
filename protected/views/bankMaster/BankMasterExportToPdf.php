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
		     Bank Full Name		
		</th>
		<th>
		     Bank Short Name		
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
		      <?php echo $v['bank_full_name']; ?>	
		</td>
		<td>
		      <?php echo $v['bank_short_name']; ?>	
		</td>
		
 	   </tr> 
       <?php
    
       }// end if
     }// end for loop
	
?>
</table>
<?php endif; ?>
