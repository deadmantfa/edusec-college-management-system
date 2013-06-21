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
		     Name	</th>
		<th>
		     Alias       </th>
		<th>
		     Code        </th>
		<th>
		     Tag Name	</th>
		<th>
		     Created By		
		</th>
		<th>
		     Organization		
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
			<?php echo $v['branch_name']; ?>
		</td>	
		<td>
			<?php echo $v['branch_alias']; ?>
		</td>
		<td>
			<?php echo $v['branch_code']; ?>
		</td>		
		<td>	
			<?php echo BranchPassoutsemTagTable::model()->findByPk($v['branch_tag_id'])->branch_tag_name;?>	
		</td>    
		<td>
		      <?php echo User::model()->findBypk($v['branch_created_by'])->user_organization_email_id; ?>	
		</td>
		<td>
		      <?php echo Organization::model()->findBypk($v['branch_organization_id'])->organization_name; ?>	
		</td>
  	</tr>
	<?php $k++;?>
	 <?php  }// end if
	
	}// end for loop?>
     </table>

<?php endif; ?>
