<?php if ($model !== null):
$i=0;
?>
<table border="1">
	<tr>
		<th  width="80px">
		      SN No.</th>
 		<th width="80px">
		      Fees Details</th>
 		<th width="80px">
		      Created By</th>
 		<th width="80px">
		      Organization Name</th>
 	</tr>
	<?php foreach($model as $row=>$v): 
	 if($row <> 0) {
            ?>
	<tr>
        		<td>
			<?php echo ++$i; ?>
		</td>
       		<td>
			<?php echo $v['fees_details_master_name']; ?>
		</td>
       		<td>
			<?php echo User::model()->findByPk($v['created_by'])->user_organization_email_id; ?>
		</td>
       		<td>
			<?php echo Organization::model()->findByPk($v['organization_id'])->organization_name; ?>
		</td>
       	</tr>
     <?php } endforeach; ?>
</table>
<?php endif; ?>
