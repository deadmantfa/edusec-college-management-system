<?php
class GalleryView extends DPortlet
{

  protected function renderContent()
  {
	$this->Widget('application.extensions.gallery.EGallery',
        array(
		'path' => Yii::app()->baseUrl.'/images',
	    )
	);
   }
  
  protected function getTitle()
  {
    return 'GalleryView';
  }
  
  protected function getClassName()
  {
    return __CLASS__;
  }

}
?>
