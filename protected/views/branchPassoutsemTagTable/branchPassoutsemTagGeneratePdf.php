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
<?$k=0;?>
	
<table border="1">

	<tr>
		<th width="40px">
		      SN.		
		</th>
 		<th width="80px">
		     Branch Tag	
		</th>
		<th width="50px">
		     Pass Out Sem	
		</th>
		<th width="90px">
		      Created By	
		</th>
		<th width="80px">
		      Organzation	
		</th>
		
	
 	</tr>
	<?php foreach($model as $m=>$v)
	{
	   if($m <> 0) {
            ?>
	<tr>
       		<td>
			<?php echo ++$k; ?>
		</td>
		<td>
			<?php echo $v['branch_tag_name']; ?>
		</td>	
		<td>	
			<?php echo "Sem-".$v['pass_out_sem'];?>	
		</td> 
		<td>   
		      <?php echo User::model()->findByPk($v['created_by'])->user_organization_email_id; ?>	
		</td>		
		<td>
			<?php echo Organization::model()->findByPk($v['organization_id'])->organization_name;?>
		</td>       
	
  	</tr>
	
	 <?php  }// end if
	
	}// end for loop?>
     </table>

<?php endif; ?>
