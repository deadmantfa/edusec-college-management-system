<?php
/**
 * WdcalendarModule 
 * 
 * @uses CWebModule
 * @package 
 * @version $id$
 * @author Imre Mehesz <imre@clevertech.biz> 
 * @license PHP Version 5 {@link http://www.php.net/license/3_01.txt}
 */
class WdcalendarModule extends CWebModule
{
    /**
     * admin  
     * 
     * @var mixed
     * @access public
     */
    public $admin;

    /**
     * wd_options 
     * 
     * @var mixed
     * @access public
     */
    public $wd_options = array();

    /**
     * wd_default_options 
     * 
     * @var array
     * @access public
     */
    public $wd_default_options = array(
        'view'      => 'month',
        'theme'     => 3,
        'showday'   => 'JS:new Date()',
        'autoload'  => 'JS:true',
    );

    public $embed = false;

    /**
     * _assetsUrl  
     * 
     * @var mixed
     * @access private
     */
    private $_assetsUrl;

    /**
     * init  
     * 
     * @access public
     * @return void
     */
	public function init()
	{
        // if we are in install mode, we change the default controller
        // but only in DEBUG mode
        if( YII_DEBUG )
        {
            switch( $this->admin )
            {
                case 'install' :
                            $this->defaultController = 'install';
                            break;
            }
        }
		// import the module-level models and components
		if(Yii::app()->user->isGuest)
		{
			  Yii::app()->user->loginRequired();

		}
		else
		$this->setImport(array(
			'wdcalendar.models.*',
			'wdcalendar.components.*',
		));
	}

    /**
     * beforeControllerAction  
     * 
     * @param mixed $controller 
     * @param mixed $action 
     * @access public
     * @return void
     */
	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
            /**
             * loading jQuery so it's available through the module ...
             */
            Yii::app()->clientScript->registerCoreScript('jquery');
            // we need this configuration file for WDCal, they use old school mysql_connect
            require_once( YiiBase::getPathOfAlias( 'application.modules.wdcalendar.components') . '/dbconfig.php' );

			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
        {
			return false;
        }
	}

    /**
     * getAssetsUrl 
     *
     * this makes sure that our JS and CSS files are
     * available on the web.
     *
     * NOTE: make sure that in production YII_DEBUG should be set
     * to FALSE
     *
     * @access public
     * @return void
     */
    public function getAssetsUrl()
    {
        if ($this->_assetsUrl === null)
        {
            $this->_assetsUrl = Yii::app()->
                getAssetManager()
                    ->publish( 
                        Yii::getPathOfAlias(
                            'application.modules.wdcalendar.assets'
                        ),
                        false,
                        -1,
                        YII_DEBUG
                    );
        }

        return $this->_assetsUrl;
    }

    /**
     * getWdOptions 
     * 
     * @access public
     * @return void
     */
    public function getWdOptions()
    {
        return array_merge( $this->wd_default_options, $this->wd_options );
    }
}
