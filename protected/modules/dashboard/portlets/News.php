<?php
class News extends DPortlet
{

  protected function renderContent()
  {
    	$this->widget('ext.bbcnewsticker.EBBCNewsTicker',
            array('items'=>array(
                           'News Content',
                          
                           )
          
                 )
	 );
   // echo 'News Content';
  }
  
  protected function getTitle()
  {
    return 'News';
  }
  
  protected function getClassName()
  {
    return __CLASS__;
  }
}
