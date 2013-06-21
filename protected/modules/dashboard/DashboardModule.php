<?php

/**
 * Version 1.1
 * @author vincent.dong
 *
 */
class DashboardModule extends CWebModule
{
  
  /*
   * Create database tables if this var is true.
   */
  public $debug = false;
  
  public $layout = 'column1';
  
  /*
   * This is default portlets settings. Set this in main.php.
   */
  public $portlets = array();
  
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		if(Yii::app()->user->isGuest)
		{
			  Yii::app()->user->loginRequired();

		}
		else
		$this->setImport(array(
			'dashboard.models.*',
			'dashboard.components.*',
		  'dashboard.portlets.*',
		));
		
	  	if( $this->debug == true)
		    {
		      $this->tableCreate();
		    }
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			return true;
		}
		else
			return false;
	}
	
	protected function tableCreate()
	{
	  $db = Yii::app()->db;
    if($db)
    {
        $transaction = $db->beginTransaction();
        if(!in_array('dashboard_page', $db->getSchema()->tableNames))
        {
            $sql = "CREATE TABLE IF NOT EXISTS `dashboard_page` (
                 `id` int unsigned NOT NULL auto_increment,
                 `user_id` int unsigned NOT NULL,
                 `title` varchar(1000) character set utf8 default NULL,
                 `path` varchar(1000) character set utf8 default NULL,
                 `weight` int unsigned,
                  PRIMARY KEY  (`id`)
                    ) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
            $db->createCommand($sql)->execute();
        }
        if(!in_array('dashboard_portlet', $db->getSchema()->tableNames))
        {

	   $sql = "CREATE TABLE IF NOT EXISTS `dashboard_portlet` (
                 `id` int unsigned NOT NULL auto_increment,
                 `dashboard` int unsigned NOT NULL DEFAULT 0 ,
                 `uid` int unsigned,
                 `settings` text character set utf8 default NULL,
                  PRIMARY KEY  (`id`)
                    ) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";

            $db->createCommand($sql)->execute();
        }

        $transaction->commit();
    }
    else
    {
      throw new CException('Database connection is not working');
    }
	}
}
