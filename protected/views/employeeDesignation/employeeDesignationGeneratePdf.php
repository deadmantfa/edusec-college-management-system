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
 		<th width="60px">
		      Name	</th>
		<th width="80px">
		     Designation Level       </th>
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
			<?php echo $v['employee_designation_name']; ?>
		</td>	
		<td>
			<?php echo $v['employee_designation_level']; ?>
		</td>
		<td>
		      <?php echo User::model()->findBypk($v['employee_designation_created_by'])->user_organization_email_id; ?>	
		</td>
		<td>
		      <?php echo Organization::model()->findBypk($v['employee_designation_organization_id'])->organization_name; ?>	
		</td>
		
	
  	</tr>
	<?php $k++;?>
	 <?php  }// end if
	
	}// end for loop?>
     </table>

<?php endif; ?>
