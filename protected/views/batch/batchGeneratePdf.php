<style>
table, th, td {
  vertical-align: middle;
}
th, td, caption {
  padding: 4px 0 10px;
  text-align: center;
}

</style>
<?php if ($model !== null):?>
<?$k=1;?>

	
<table border="1">

	<tr>
		<th>
		      SN.		</th>
 		<th>
		     Batch Code	</th>
		<th>
		
		     Branch       </th>
		<th>
		     Division        </th>
		<th>
		     Created By		
		</th>
		<th>
		     Organization Name		
		</th>
		
	
 	</tr>
	<?php foreach($model as $m=>$v)
	{
	   if($m <> 0) {
            ?>
	<tr>
       		<td>
			<?php echo $k; ?>
		</td>
		<td>
			<?php echo $v['batch_code']; ?>
		</td>	
		<td>
			<?php echo Branch::model()->findByPk($v['branch_id'])->branch_name;?>	
		</td>
		<td>
			<?php echo Division::model()->findByPk($v['div_id'])->division_code;?>
		</td>	
		<td>
		      <?php echo User::model()->findBypk($v['batch_created_by'])->user_organization_email_id; ?>	
		</td>
		<td>
		      <?php echo Organization::model()->findBypk($v['batch_organization_id'])->organization_name; ?>	
		</td>	
		
	
  	</tr>
	<?php $k++;?>
	 <?php  }// end if
	
	}// end for loop?>
     </table>

<?php endif; ?>
