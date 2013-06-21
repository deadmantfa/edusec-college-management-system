<?php
if(Yii::app()->user->getState('emp_id'))
{
	$this->renderPartial('employeedashboard');
}
else if(Yii::app()->user->getState('stud_id'))
{
	$this->renderPartial('studentdashboard');
}
else
{
	$this->renderPartial('admindashboard');
}
?>
