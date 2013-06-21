<?php

class DefaultController extends Controller
{
  /**
   * Init and render the portletable dashboard page.
   */
	public function actionIndex()
	{

		if(Yii::app()->user->isGuest)
			  Yii::app()->user->loginRequired();

	  $settings = array();
	  
	  // Get user settings.
	  $criteria=new CDbCriteria(array(
      'condition'=>'uid=' . Yii::app()->user->id,
    ));

    $dataProvider=new CActiveDataProvider('DashboardPortlet', array('criteria' => $criteria));
    
    $data = $dataProvider->getData();
    
    if (isset($data[0]))
    {
      $userSettings = unserialize($data[0]->settings);
      
      foreach ($userSettings as $class => $properties)
      {
        $settings[$properties['column']][$properties['weight']] = array(
          'class' => $class,
          'visible' => $properties['visible'],
          'weight' => $properties['weight']
        );
      }
      
      foreach ($settings as $key => $value)
      {
        // Sort all portlets in every column by weight.
        ksort($settings[$key]);
      }
    }
    
    // Use the default portlets settings if user did not set any portlet before.
    if (empty($settings))
    {
      $deaultSettings = $this->getModule()->portlets;
      $i=0;
	$new_settings = array();
	foreach ($deaultSettings as $list)
	{
	    $settings = array();
    	    foreach ($list as $class => $properties)
	    {
		$settings[$properties['weight']] = array(
		'class' => $class,
		'visible' => isset($properties['visible']) ? $properties['visible'] : true,
		'weight' => $properties['weight']
		);
	    }
		$new_setting[$i] = $settings;
		$i++;

	}
    }

	    $this->render('index',array(
	      'portlets'=>$new_setting
	    ));
	}
	
	/**
	 * Used for ajax call to save user portlets settings.
	 */
	public function actionSave()
	{
	  if (isset($_POST['portlets']) && !empty($_POST['portlets']))
	  {
	    $portlets = CJavaScript::jsonDecode($_POST['portlets']);
	    $transaction=Yii::app()->db->beginTransaction();
	    
	    try
	    {
	      // Delete outdated user settings.
  	    DashboardPortlet::model()->deleteAll('uid=:uid', array(':uid' => Yii::app()->user->id));

  	    // Save user new settings.
  	    $model = new DashboardPortlet;
  	    $model->settings = serialize($portlets);
  	    $model->save();
  	    
  	    $transaction->commit();
  	    
  	    echo CJavaScript::jsonEncode(array('message' => 'Save Successfully'));
	    }
	    catch (Exception $e)
	    {
	      $transaction->rollBack();
	      echo CJavaScript::jsonEncode(array('message' => 'Transaction Failed'));
	    }
	  }
	  else
	  {
	    echo CJavaScript::jsonEncode(array('message' => 'Incorrect arguments'));
	  }
	  
	  Yii::app()->end();
	}
}
