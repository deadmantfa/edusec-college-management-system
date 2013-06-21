<?php
class GTU_Notice extends DPortlet
{

  protected function renderContent()
  {
   // echo 'Blogs Content';
	$id=Yii::app()->user->getState('org_id');
	if(!empty($id))
	{
		$result=Gtunotice::model()->findAll(array("condition"=>"gtunotice_organization_id  =  $id","limit"=>"4"));
		if($result)
		{
			foreach($result as $data)
			echo CHtml::link($data->Description."..",$data->Link,array('target'=>'_blank')).'<br /><br />';
		}
	}
  }

  protected function getTitle()
  {
    return 'GTU Notice';
  }
  
  protected function getClassName()
  {
    return __CLASS__;
  }
}
