<?php
$this->breadcrumbs=array(
	'Student Fees Masters'=>array('admin'),
	'Manage',
);
$this->menu=array(
	array('label'=>'', 'url'=>array('studentFeesMaster/admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);

?>

</br></br>


<?php
$m=1;
if(!empty($remaining))
{
	$i=0;
?>
	<table  class="table_data">
	<th colspan="7"  style="font-size: 18px; color: rgb(255, 255, 255);">
		Remaining Student<br/>

        </th>
	<tr class="table_header">
	<th>Sr No</th>
	<th>Enrollment No</th>
	<th>Roll No</th>
	<th>Student Name</th>
	<th>Surname</th>
	<th>Quota</th>
	<th>Assign Fees</th>
	</tr>

<?php	foreach($remaining as $list)
	{	
		if(($m%2) == 0)
		{
		  $class = "odd";
		}
		else
		{
		  $class = "even";
		}
		echo "<tr class=\"$class\"><td>".++$i."</td>
		     <td>".$list['student_enroll_no']."</td>
		     <td>".$list['student_roll_no']."</td>
		     <td>".$list['student_first_name']."</td>
		     <td>".$list['student_last_name']."</td>
		     <td>".Quota::model()->findByPk($list['fees_quota_id'])->quota_name."</td>
		     <td>".CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/add.jpeg'),Yii::app()->createUrl("studentFeesMaster/feesassign/".$list['student_transaction_id']),array('title'=>'Add Fees'))."</td>
		    </tr>";
	$m++;
	}


?></table>

<?php
}
else
{
	echo "<h3 style='color:red'>No More Student Remaining</h3>";
}

?>
