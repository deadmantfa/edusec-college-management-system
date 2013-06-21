<?php

class DivisionController extends RController
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
		$model=new Division;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Division']))
		{
			$model->attributes=$_POST['Division'];
		
			$divname = $model->division_name;
			$branch_code = Branch::model()->findByPk($model->branch_id)->branch_alias;
			$acdm_name = AcademicTerm::model()->findByPk($model->academic_name_id)->academic_term_name;
			//echo $branch_code;
			//echo $acdm_name;
			//echo $divname;
			$concatdivname = $divname.'-'.$branch_code.'-'.$acdm_name;
			//exit;
			$model->division_code = $concatdivname;
			$model->division_organization_id = Yii::app()->user->getState('org_id');
			$model->division_created_by=Yii::app()->user->id;
			$model->division_creation_date=new CDbExpression('NOW()');
			if($model->save())
				//$this->redirect(array('view','id'=>$model->division_id));
				$this->redirect(array('admin'));
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

		if(isset($_POST['Division']))
		{
			$model->attributes=$_POST['Division'];
			$model->division_code = '';
			$divname = $model->division_name;
			$branch_code = Branch::model()->findByPk($model->branch_id)->branch_alias;
			$acdm_name = AcademicTerm::model()->findByPk($model->academic_name_id)->academic_term_name;
			
			$concatdivname = $divname.'-'.$branch_code.'-'.$acdm_name;
		
			$model->division_code = $concatdivname;

			if($model->save())
				$this->redirect(array('admin'));//$this->redirect(array('view','id'=>$model->division_id));
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
		/*
		$dataProvider=new CActiveDataProvider('Division');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		*/
		$model=new Division('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Division']))
			$model->attributes=$_GET['Division'];

		$this->render('admin',array(
			'model'=>$model,
		));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Division('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Division']))
			$model->attributes=$_GET['Division'];

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
		$model=Division::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='division-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
/*	public function actiongetItemName()
        {
            $data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id',
		 array(':academic_term_period_id'=>(int) $_REQUEST['Division']['academic_period_id']));
                  
            $data=CHtml::listData($data,'academic_term_id','academic_term_name');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode($name),true);
            }
         }*/
}
