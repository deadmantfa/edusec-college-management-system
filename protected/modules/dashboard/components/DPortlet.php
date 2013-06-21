<?php
Yii::import('zii.widgets.CPortlet');

abstract class DPortlet extends CPortlet
{ 
  public $visible = true;
  
  public function init()
  {
    $this->htmlOptions['class'] = 'dashboard-portlet';
    $this->decorationCssClass = 'dashboard-portlet-header';
    $this->titleCssClass = 'dashboard-portlet-title';
    $this->contentCssClass = 'dashboard-portlet-content';
    $this->title = $this->getTitle();
    $this->id = $this->getClassName();
    
    if (!$this->visible)
    {
      $this->htmlOptions['class'] .= ' dashboard-portlet-invisible';
    }
    
    parent::init();
  }
  
  protected function getTitle()
  {
  }
  
  /**
   * Renders the decoration for the portlet.
   */
  protected function renderDecoration()
  {
    if($this->title!==null)
    {
      echo "<div class=\"{$this->decorationCssClass}\">\n";
      echo "<span class=\"{$this->titleCssClass}\">{$this->title}</span>\n";
      echo "</div>\n";
    }
  }
  
  protected function getClassName()
  {
  }
}