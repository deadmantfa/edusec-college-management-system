<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
        $this->settingsForJs();
		$this->render('index');
	}

    protected function beforeRender( $view )
    {
        if( ! $this->module->embed )
        {
            $this->layout = '/layouts/wdcalendar';
        }

        return parent::beforeRender( $view );
    }

    /**
     * actionDatafeed 
     *
     * this action makes it possible for us to call datafeed as a Yii
     * and it just simply loads the original datafeed.php file
     *
     * @access public
     * @return void
     */
    public function actionDatafeed()
    {
        require_once( YiiBase::getPathOfAlias( 'application.modules.wdcalendar.components') . '/datafeed.php' );
        die();
    }

    /**
     * actionEdit  
     * 
     * this action makes it possible for us to call edit as a Yii action
     * and it just simply loads the original edit.php file
     *
     * @access public
     * @return void
     */
    public function actionEdit()
    {
        $wdcalendar_assets = $this->module->getAssetsUrl();
        require_once( YiiBase::getPathOfAlias( 'application.modules.wdcalendar.components') . '/edit.php' );
        die();
    }

    /**
     * settingsForJs 
     * 
     * @access public
     * @return void
     */
    public function settingsForJs()
    {
        $wdcalendar_assets = $this->module->getAssetsUrl();

        $cs=Yii::app()->clientScript;
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/alert.css', NULL);
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/calendar.css', NULL);
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/colorselect.css', NULL);
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/dailog.css', NULL);
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/dp.css', NULL);
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/dropdown.css', NULL);
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/main.css', NULL);
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/Error.css', NULL);

        $cs->registerScriptFile( $wdcalendar_assets . '/js/Common.js', CClientScript::POS_END);

        // for EDIT
        $cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.form.js', CClientScript::POS_END);
        //$cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.validate.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/datepicker_lang_US.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.datepicker.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.dropdown.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.colorselect.js', CClientScript::POS_END);

    /*<script src="src/jquery.js" type="text/javascript"></script>    
    <script src="src/Plugins/Common.js" type="text/javascript"></script>        
    <script src="src/Plugins/jquery.form.js" type="text/javascript"></script>     
    <script src="src/Plugins/jquery.validate.js" type="text/javascript"></script>     
    <script src="src/Plugins/datepicker_lang_US.js" type="text/javascript"></script>        
    <script src="src/Plugins/jquery.datepicker.js" type="text/javascript"></script>     
    <script src="src/Plugins/jquery.dropdown.js" type="text/javascript"></script>     
    <script src="src/Plugins/jquery.colorselect.js" type="text/javascript"></script>    */
     


        $cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.alert.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.ifrmdailog.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/wdCalendar_lang_US.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.calendar.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/wdcal.js', CClientScript::POS_END);
        $cs->registerScript( 'absolute_datafeed_url', 'var absolute_datafeed_url="' . Yii::app()->controller->createAbsoluteUrl( '/wdcalendar/default/datafeed' ) . '";', CClientScript::POS_HEAD );
        $cs->registerScript( 'absolute_edit_url', 'var absolute_edit_url="' . Yii::app()->controller->createUrl( '/wdcalendar/default/edit' ) . '";', CClientScript::POS_HEAD );
        $cs->registerScript( 'absolute_default_url', 'var absolute_default_url="' . Yii::app()->controller->createUrl( '/wdcalendar/default/' ) . '";', CClientScript::POS_HEAD );
        $cs->registerScript( 'wd_url_separator', "var wd_url_separator='" . ( Yii::app()->urlManager->urlFormat == 'get' ? '&' : '?' ) ."';", CClientScript::POS_HEAD );

        // and finally let's load the calendar options
        $wd_options_out = '{';
            foreach( $this->module->getWdOptions() as $option => $val )
            {
                // JS: means we are passing a JS variable/function/callback etc
                if( preg_match( '/^JS:/', $val ) )
                {
                    $wd_options_out .= $option . ':' . str_replace( 'JS:', '', $val )  . ',';
                }
                else
                {
                    $wd_options_out .= "$option:\"$val\",";
                }
            }
        $wd_options_out = preg_replace( '/,$/','}', $wd_options_out );
        $cs->registerScript( 'wd_options', 'var wd_options=' . $wd_options_out . ';', CClientScript::POS_HEAD );

    }
}
