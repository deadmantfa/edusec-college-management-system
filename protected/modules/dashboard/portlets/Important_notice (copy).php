<?php
class Important_notice extends DPortlet
{

  protected function renderContent()
  {
    //echo 'Notice Content';
	/*
	$result=ImportantNotice::model()->findAll(array('limit'=>1,'order'=>'notice_id desc'));
	foreach($result as $data)
	*/
	$notice;
	$id=Yii::app()->user->getState('org_id');
	if(!empty($id))
	{
		$maxOrderNumber = Yii::app()->db->createCommand()
		->select('max(notice_id) as max')
		->from('important_notice')
		->where('notice_organization_id='.$id)
		->queryScalar();
		if($maxOrderNumber)
		{
			$notice_id = $maxOrderNumber;
			$notice = ImportantNotice::model()->findByPk($notice_id);
			$notice = $notice->notice;
			
			$notice = substr($notice,0,50)."...";
			$this->widget('ext.bbcnewsticker.EBBCNewsTicker',
            		array('items'=>array(
                          	CHtml::link($notice,array('/importantNotice/print_notice','id'=>$notice_id),array('id'=>'hello')),
        		     ),
			 	'wrapperHtmlOptions'=>array('id'=>"hello"), 
             			)
			);
			//$this->widget('ext.eticker.ETicker',array('data'=>array($notice, CHtml::link($notice,array('/importantNotice/print_notice','id'=>$notice_id),array('id'=>'stud_doc_id1')))));
			//echo CHtml::link($notice,array('/importantNotice/print_notice','id'=>$notice_id),array('id'=>'stud_doc_id1'));
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
			$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'#hello', 'config'=>$config));
			
			//echo CHtml::link('View',array('/importantNotice/print_notice','id'=>$notice_id),array('id'=>'hello'));
				
			
		}
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
