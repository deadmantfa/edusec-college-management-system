<?php

class FeesMasterTransactionController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		//$fees_details = new FeesDetailsTable;
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new FeesMasterTransaction;
		$fees_details=new FeesDetailsTable;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation(array($model,$fees_details));

		if(isset($_POST['FeesDetailsTable']))
		{
			//$model->attributes=$_POST['FeesMasterTransaction'];
			$fees_details->attributes=$_POST['FeesDetailsTable'];

			$fees_details->fees_details_created_by =  Yii::app()->user->id;
			$fees_details->fees_details_created_date = new CDbExpression('NOW()');

			$fees_details->save();
			if(isset($_REQUEST['id']))
			$model->fees_master_id = $_REQUEST['id'];
			$model->fees_desc_id = $fees_details->fees_details_id;
			if($model->save())
				$this->redirect(array('feesMaster/view','id'=>$model->fees_master_id));
		}

		$this->render('create',array(
			'model'=>$model,'fees_details'=>$fees_details,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$fees_details=FeesDetailsTable::model()->findByPk($model->fees_desc_id);

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation(array($model,$fees_details));

		if(isset($_POST['FeesDetailsTable']))
		{
			$fees_details->attributes=$_POST['FeesDetailsTable'];
			if($fees_details->save())
				$this->redirect(array('feesMaster/view','id'=>$model->fees_master_id));
		}

		$this->render('update',array(
			'model'=>$model,'fees_details'=>$fees_details,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
/*		$dataProvider=new CActiveDataProvider('FeesMasterTransaction');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
		$model=new FeesMasterTransaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FeesMasterTransaction']))
			$model->attributes=$_GET['FeesMasterTransaction'];


		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new FeesMasterTransaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FeesMasterTransaction']))
			$model->attributes=$_GET['FeesMasterTransaction'];


		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=FeesMasterTransaction::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($models)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='fees-master-transaction-form')
		{
			echo CActiveForm::validate($models);
			Yii::app()->end();
		}
	}
}
