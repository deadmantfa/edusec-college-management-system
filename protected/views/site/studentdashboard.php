<?php
$this->breadcrumbs=array(
	'Student',
);?>

<!-- End  timetable-->
<!-- Start GTU Notice --->
<?php 
$id=Yii::app()->user->getState('org_id');
	if(!empty($id))
	{
		$result=Gtunotice::model()->findAll(array("condition"=>"gtunotice_organization_id  =  $id","limit"=>"4"));
		if($result)
		{
?>
<div class="box">
<div class="box-header">
<h1>GTU Notice</h1>
</div>
<div class="box-content">
	<?php 
		
			echo '<ul>';
			foreach($result as $data)
			echo '<li>'.CHtml::link($data->Description."..",$data->Link,array('target'=>'_blank')).'</li>';
			echo '</ul>';
	?>	
</div>
</div>
<?php
		}
	}
?>
<!-- Start Mailbox -->
<div class="box">
<div class="box-header">
<h1>MailBox</h1>
</div>
<div class="box-content">
	<?php 
		Yii::app()->runController('mailbox/message/myinbox');
	?>
</div>
</div>
<!-- End Mailbox -->

<!-- Start notifications ---->


