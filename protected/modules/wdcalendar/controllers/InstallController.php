<?php

class InstallController extends Controller
{
    public $layout = '/layouts/install';

    public function filters()
    {
        return array( 'debug' );
    }

    public function filterDebug( $filterChain )
    {
        // we only let the installation run, if Yii is in debug mode
        // for security reasons ...
        if( YII_DEBUG && $this->module->admin == 'install' )
        {
            $filterChain->run();
        }
        else
        {
            throw new CHttpException(403,"You are not authorized to perform this action.");
        }
    }

	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionStep()
    {
        $step = Yii::app()->request->getParam( 'n', 1 );
        $errors = array();
    
        switch( $step )
        {
            case 1:
                    try
                    {
                        $db = Yii::app()->db;
                        $sql = 'SET FOREIGN_KEY_CHECKS=0';
                        $command = Yii::app()->db->createCommand( $sql );
                        $command->execute();

                        $sql = <<<SQL
DROP TABLE IF EXISTS jqcalendar;
CREATE TABLE IF NOT EXISTS jqcalendar (
  Id int(11) NOT NULL AUTO_INCREMENT,
  `Subject` varchar(1000) DEFAULT NULL,
  Location varchar(200) DEFAULT NULL,
  Description varchar(255) DEFAULT NULL,
  StartTime datetime DEFAULT NULL,
  EndTime datetime DEFAULT NULL,
  IsAllDayEvent smallint(6) NOT NULL,
  Color varchar(200) DEFAULT NULL,
  RecurringRule varchar(500) DEFAULT NULL,
  PRIMARY KEY (Id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
SQL;
                        $command->setText( $sql );
                        $command->execute();
                    }
                    catch( Exception $e )
                    {
                        $errors[] = $e->getMessage();
                    }
                    break;
            case 2:
                    break;
            default: 
                $this->forward( 'index' );
        }

        $this->render( 'step_' . $step, array( 'errors' => $errors ) );
    }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
