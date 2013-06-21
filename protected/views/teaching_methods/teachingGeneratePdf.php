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
		      Teaching Method Name	</th>
		<th>
		     Teaching Method Alias	</th>
		<th>
		     Remarks	</th>
		<th>
		    Created By</th>
		
		
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
			<?php echo $v['teaching_methods_name']; ?>
		</td>
		<td>
			<?php echo $v['teaching_methods_alias']; ?>
		</td>
		<td>
			<?php echo $v['remarks']; ?>
		</td>	
		
	
		<td>	
			<?php echo User::model()->findByPk($v['teaching_methods_created_by'])->user_organization_email_id;?> 	
		</td>  
</tr>
	<?php $k++;?>
	 <?php  }// end if
	
	}// end for loop?>
     </table>

<?php endif; ?>
