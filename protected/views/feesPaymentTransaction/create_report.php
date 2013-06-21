<?php
$this->breadcrumbs=array(
	'Fees Summary',
	
);

$this->menu=array(
	//array('label'=>'List Attendence', 'url'=>array('index')),
	//array('label'=>'Manage Attendence', 'url'=>array('admin')),
);
?>



<?php echo $this->renderPartial('report_view', array('numStud'=>$numStud,'fees_data'=>$fees_data,'paid_stud_count'=>$paid_stud_count,'unpaid_stud_count'=>$unpaid_stud_count,'total_amount'=>$total_amount,'total_receive_amount'=>$total_receive_amount)); ?>
