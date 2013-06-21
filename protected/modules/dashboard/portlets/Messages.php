<?php
class Messages extends DPortlet
{

  protected function renderContent()
  {
	/*$maxOrderNumber = Yii::app()->db->createCommand()
	  ->select('max(id) as max')
	  ->from('message_of_day')
	  ->queryScalar();
	$msg_id = $maxOrderNumber;*/

	$criteria = new CDbCriteria();
	$criteria->limit = 5;
	$criteria->order = 'id desc';

	$message = MessageOfDay::model()->findAll($criteria);

	if(!empty($message)) 
	{

		foreach($message as $list) {
		echo CHtml::link($list['message'],array('/messageOfDay/print_message','id'=>$list['id']),array('id'=>'stud_doc_id2'));
		echo "</br></br>";
		}
	}
	else
	{
			echo '<div "id"="stud_doc_id2">';
			echo '</div>';	
		
	}
		//echo CHtml::link('View All',array('/dashboard'),array('id'=>'stud_doc_id1'));
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
	$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'a#stud_doc_id2', 'config'=>$config));
	}

  
  protected function getTitle()
  {
    return 'Message of the day';
  }
  
  protected function getClassName()
  {
    return __CLASS__;
  }
}
?>

