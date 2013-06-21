<?php
class Holidays extends DPortlet
{

  protected function renderContent()
  {
	$record = Yii::app()->db->createCommand()
	  ->select('*')
	  ->from('holidays')
	  ->limit(4)
	  ->queryAll();

//	print_r($record);
	foreach($record as $list)
		echo $list['date']."&nbsp;&nbsp;&nbsp;".$list['holiday_name'] .'<br>';
	echo CHtml::link('View All',array('/holidays/admin'));
  }
  
  protected function getTitle()
  {
    return 'Holidays';
  }
  
  protected function getClassName()
  {
    return __CLASS__;
  }
}
