<?php
class Important_notice extends DPortlet
{

  protected function renderContent()
  {

	$notice;
	$id=Yii::app()->user->getState('org_id');
	if(!empty($id))
	{
		$criteria = new CDbCriteria();
		$criteria->condition = "notice_organization_id = ".Yii::app()->user->getState('org_id');
		$criteria->limit = 5;
		$criteria->order = 'notice_id desc';
		$notice = ImportantNotice::model()->findAll($criteria);

		foreach($notice as $list) {
		
			$imp_notice = substr($list['notice'],0,150)."...";
			echo CHtml::link($imp_notice,array('/importantNotice/print_notice','id'=>$list['notice_id']),array('id'=>'hello')).'<br /><br />';
		}
			
		$config = array( 
			'scrolling' => 'no',
			'autoDimensions' => false,
			'width' => '500',
			'height' => '100', 
		       'overlayColor' => '#000',
		       'padding' => '0',
		       'showCloseButton' => true,
		       'onClose' => function() {
				return window.location.reload();
			},

			// change this as you need
		);
			$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'a#hello', 'config'=>$config));
	}
	else
	{
		echo '<div id="stud_doc_id1">';
		echo '</div>';			
	}
	
	
}
  protected function getTitle()
  {
    return 'Important Notice';
  }
  
  protected function getClassName()
  {
    return __CLASS__;
  }
}
?>
