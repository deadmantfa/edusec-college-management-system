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
		<th align="center" >
		      SN.		</th>
 		<th align="center" >
		     Organization Email ID</th>
		<th align="center" >
		      Created By</th>
		<th align="center" >
		     Organization</th>
		
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
			<?php //echo $v['assign_user_id'];?>
		      <?php echo User::model()->findByPk($v['assign_user_id'])->user_organization_email_id; ?>	
		</td>			
 	
		
		<td>	
			
		      <?php echo User::model()->findByPk($v['assign_created_by'])->user_organization_email_id; ?>	
		</td>			
 	
		<td>	
			<?php echo Organization::model()->findByPk($v['assign_org_id'])->organization_name;?> 	
		</td>  
  	</tr>
	<?php $k++;?>
	 <?php  }// end if
	
	}// end for loop?>
     </table>

<?php endif; ?>
