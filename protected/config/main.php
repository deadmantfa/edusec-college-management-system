<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Secure Education Management System',
	
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.extensions.jtogglecolumn.*',
		
		'application.extensions.AjaxList.AjaxList',
		'application.components.*',

		'application.modules.rights.*',
		'application.modules.rights.components.*',

		 'application.modules.notification.models.*',
		//'application.modules.hrms.components.*',
		'application.modules.mailbox.*',
		'application.modules.mailbox.models.*',
		//'application.modules.importation.models.*',
		'application.extensions.html2pdf.*',
		'application.extensions.crontab.*',
			
	),
		
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'secure',
			'generatorPaths'=>array(
					'ext.gii-extended',
				),
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1','192.168.0.163'),
		),
		'notification',
		'webservice',
		'rights'=>array(
			'install'=>false,
			'superuserName'=>'SuperAdmin',
			'authenticatedName'=>'Authenticated',
			'userIdColumn'=>'user_id',
			'userNameColumn'=>'user_organization_email_id',
			'userTypeColumn'=>'user_type',
			'enableBizRule'=>true,
			'enableBizRuleData'=>false,
			'displayDescription'=>true,
			'flashSuccessKey'=>'RightsSuccess',
			'flashErrorKey'=>'RightsError',
			'baseUrl'=>'/rights',
			'layout'=>'rights.views.layouts.main',
			'appLayout'=>'application.views.layouts.main',
			'cssFile'=>'rights.css',
			'debug'=>false,
			),

	    'dashboard' => array(
	      'debug' => true,
	      'portlets' => array(
		'Time_Table' => array('class' => 'Time_Table', 'visible' => true, 'weight' => 1),
		'Attendance' => array('class' => 'Attendance', 'visible' => true, 'weight' => 2),		
		'Calendar' => array('class' => 'Calendar', 'visible' => true, 'weight' => 4),
		'Important_notice' => array('class' => 'Important_notice', 'visible' => true, 'weight' => 5), 
		'GTU_Notice' => array('class' => 'GTUNotice', 'visible' => true, 'weight' => 6), 
	      ),
			
	    ),

	'mailbox'=>
		    array(  
		    'userClass' => 'User',
		  //  'userIdColumn' => 'id',
		    'userIdColumn' => 'user_id',
		    'usernameColumn' => 'user_organization_email_id',
		    //'usernameColumn' => 'username',
		    //'superuserColumn'=>'user_type',
		   // 'pageSize' => 50,
		    'newsUserId' => 'admin@rudrasoftech.com',
		      ),

	'wdcalendar'    => //array( 'admin' => 'install' ),
			array( 
				'embed'=>true,
                                'wd_options' => array(  
                                    'view' => 'month',
                                   // 'readonly' => 'JS:true' // execute JS
                                ) 
                           ),
	  

	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class'=>'RWebUser',
		),

		'phpThumb'=>array(
		    'class'=>'ext.EPhpThumb.EPhpThumb',
		    
		),

		'authManager'=>array(
		'class'=>'RDbAuthManager',
		),
		
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
		
				
			 'gii'=>'gii',
		         'gii/<controller:\w+>'=>'gii/<controller>',
		         'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',

			//'<controller:(c1|c2|c3|gii)/>/<action:\w+>' => '<controller>/<action>',	
			'<controller:\w+>/<id:\d+>'=>'<controller>/view',
			'<controller:\w+>/<action:\w+>/<id:\d+>/*'=>'<controller>/<action>',

			'<controller:\w+>/<action:\w+>'=>'<controller>/<action>', 
                        
                         array('webservice/api/login', 'pattern'=>'webservice/api/<model:\w+>', 'verb'=>'POST'),				
			 array('webservice/api/list', 'pattern'=>'webservice/api/<model:\w+>/<uid:\d+>', 'verb'=>'GET'),
			 array('webservice/api/view', 'pattern'=>'webservice/api/<model:\w+>/<id:\d+>/<uid:\d+>', 'verb'=>'GET'),
			 array('webservice/api/update', 'pattern'=>'webservice/api/<model:\w+>/<id:\d+>', 'verb'=>'PUT'),
			 array('webservice/api/delete', 'pattern'=>'webservice/api/<model:\w+>/<id:\d+>', 'verb'=>'DELETE'),
			 array('webservice/api/create', 'pattern'=>'webservice/api/<model:\w+>', 'verb'=>'POST'),       		
			
        
			'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			'<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',


			),
			'showScriptName'=>false,
		),
		/*
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database



/*
	
		'db'=>array(
			'connectionString'=>'mysql:host=localhost;dbname=hansaba_hrms_test',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'ubuntu',
			'charset' => 'utf8',	
			'tablePrefix' => 'tbl_',		

		),
*/		'db'=>require('db.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
				    'errorAction'=>'site/error',
				),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, trace, info',
					'categories'=>'system.*',

				),
//				array(
//				    'class'=>'CEmailLogRoute',
//				    'levels'=>'error, warning',
//				    'emails'=>'karmraj@rudrasoftech.com',
//				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
               // this is used in contact page
               'adminEmail'=>'webmaster@example.com',
               'pageSize'=>25,
               'webRoot' => dirname(dirname(__FILE__).DIRECTORY_SEPARATOR.'..')
       ),
);
