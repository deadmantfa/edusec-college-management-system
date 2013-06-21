<?php
Yii::import('zii.widgets.jui.CJuiWidget');

class DWidget extends CJuiWidget
{
  /**
   * @var string the name of the container element that contains all panels. Defaults to 'div'.
   */
  public $tagName='div';
  
  public $portlets = array();
  
  public $allPortlets = array();

  /**
   * Renders the open tag of the dialog.
   * This method also registers the necessary javascript code.
   */
  public function init()
  {
    parent::init();

    $cs=Yii::app()->getClientScript();
    $scriptUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.dashboard.assets'));
    
    $cs->registerCssFile($scriptUrl . '/jgrowl/jquery.jgrowl.css');
    $cs->registerScriptFile($scriptUrl . '/jgrowl/jquery.jgrowl.js');
    $cs->registerScriptFile($scriptUrl . '/js/json2.js');
    $cs->registerCssFile($scriptUrl . '/css/dashboard.css');
    $cs->registerScriptFile($scriptUrl . '/js/dashboard.js');
    
    $param['baseUrl']= Yii::app()->createUrl('dashboard/default').'/';
    $param = CJavaScript::encode($param);
    $js = "jQuery.dashboard($param);";
    $cs->registerScript(__CLASS__ . '#dashboard', $js);
    
    $id=$this->getId();
    if (isset($this->htmlOptions['id']))
      $id = $this->htmlOptions['id'];
    else
      $this->htmlOptions['id']=$id;

    echo CHtml::openTag($this->tagName,$this->htmlOptions)."\n";
    $this->render('dashboard', array('portlets' => $this->portlets, 'allPortlets' => $this->allPortlets));
  }

  /**
   * Renders the close tag of the dialog.
   */
  public function run()
  {
    echo CHtml::closeTag($this->tagName);
  }
}
?>