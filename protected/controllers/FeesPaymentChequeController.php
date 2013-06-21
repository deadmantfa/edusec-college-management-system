<?php

class FeesPaymentChequeController extends RController
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
				'actions'=>array('index','view','cheque_search','search_result','my_update'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'),
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
		$model=new FeesPaymentCheque;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['FeesPaymentCheque']))
		{
			$model->attributes=$_POST['FeesPaymentCheque'];
			$model->fees_payment_cheque_organization_id = Yii::app()->user->getState('org_id');
			if($model->save())
				$this->redirect(array('view','id'=>$model->fees_payment_cheque_id));
		}

		$this->render('create',array(
			'model'=>$model,
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

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['FeesPaymentCheque']))
		{
			$model->attributes=$_POST['FeesPaymentCheque'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->fees_payment_cheque_id));
		}

		$this->render('update',array(
			'model'=>$model,
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
/*		$dataProvider=new CActiveDataProvider('FeesPaymentCheque');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		$model=new FeesPaymentCheque('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FeesPaymentCheque']))
			$model->attributes=$_GET['FeesPaymentCheque'];

		$this->render('admin',array(
			'model'=>$model,
		));*/

		$model=new FeesPaymentCheque;
		$fees_cheque = new FeesPaymentCheque;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['FeesPaymentCheque']))
		{			
			$no = $_POST['FeesPaymentCheque']['fees_payment_cheque_number'];
			//$fees_cheque = FeesPaymentCheque::model()->findBySql('SELECT * FROM `fees_payment_cheque` WHERE fees_payment_cheque_number='.$no);
			$fees_cheque=FeesPaymentCheque::model()->findByAttributes(array('fees_payment_cheque_number'=>$no));
											
		}

		$this->render('cheque_search',array(
			'model'=>$model,'fees_cheque'=>$fees_cheque,
		));	
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new FeesPaymentCheque('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FeesPaymentCheque']))
			$model->attributes=$_GET['FeesPaymentCheque'];

		$this->render('admin',array(
			'model'=>$model,
		));/*
		$fees_cheque = new FeesPaymentCheque;
		$model=new FeesPaymentCheque;
		if(isset($_POST['FeesPaymentCheque']))
		{			
			$no = $_POST['FeesPaymentCheque']['fees_payment_cheque_number'];
			
			$fees_cheque=FeesPaymentCheque::model()->findByAttributes(array('fees_payment_cheque_number'=>$no));
											
		}

		$this->render('cheque_search',array(
			'model'=>$model,'fees_cheque'=>$fees_cheque,
		));*/	
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=FeesPaymentCheque::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='fees-payment-cheque-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	

	public function actionCheque_search()
	{
		$model=new FeesPaymentCheque;
		$fees_cheque = new FeesPaymentCheque;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['FeesPaymentCheque']))
		{			
			$no = $_POST['FeesPaymentCheque']['fees_payment_cheque_number'];
			
			$fees_cheque=FeesPaymentCheque::model()->findByAttributes(array('fees_payment_cheque_number'=>$no));
											
		}

		$this->render('cheque_search',array(
			'model'=>$model,'fees_cheque'=>$fees_cheque,
		));	
	}

	public function actionCheque_result()
	{

		$model=new FeesPaymentCheque;
		$fees_cheque = new FeesPaymentCheque;
		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['FeesPaymentCheque']))
		{			
			$no = $_POST['FeesPaymentCheque']['fees_payment_cheque_number'];
		
			$fees_data = FeesPaymentCheque::model()->findByAttributes(array('fees_payment_cheque_number'=>$no,'fees_payment_cheque_organization_id'=>Yii::app()->user->getState('org_id')));

			if(isset($fees_data))		
			echo $this->renderPartial('search_result', array('model'=>$model,'fees_cheque'=>$fees_cheque,'no'=>$no));
			
			else
				echo $this->renderPartial('no_result', array());
		
			
											
		}
	}
	public function actioncheque_return()
	{
		$model=new FeesPaymentCheque('cheque_return');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FeesPaymentCheque']))
			$model->attributes=$_GET['FeesPaymentCheque'];

		$this->render('return_cheque',array(
			'model'=>$model,
		));
	}


	public function actionmy_update($id)
	{
		
		$model=$this->loadModel($id);
		$model->fees_payment_cheque_status=1;
		//$amt = FeesPaymentCheque::model()->findByPk($id)->fees_payment_cheque_amount;
		//$model->fees_payment_cheque_amount=0;
		$model->save();
		$this->redirect(array('feesPaymentCheque/view','id'=>$id));
		
	}

	
}
