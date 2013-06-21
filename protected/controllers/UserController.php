<?php

class UserController extends RController
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
	*/
/*	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','change','Changestudpassword','Changeemppassword','Updateloginid'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','change'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','change'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
*/
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
		$model=new User;
		$ass_comp = new assignCompanyUserTable;
		$model->setScenario('create');

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->user_password=md5($model->user_password.$model->user_password);
			$model->user_type='admin';
			$model->user_organization_id = Yii::app()->user->getState('org_id');
			$model->user_created_by=Yii::app()->user->id;
			$model->user_creation_date=new CDbExpression('NOW()');
			if($model->save())
			{
				/*$ass_comp->assign_user_id = $model->user_id;
				$ass_comp->assign_role_id = 2;
				$ass_comp->assign_org_id = Yii::app()->user->getState('org_id');
				$ass_comp->assign_created_by = Yii::app()->user->id;
				$ass_comp->assign_creation_date = new CDbExpression('NOW()');
				$ass_comp->save();*/

				//$this->redirect(array('view','id'=>$model->user_id));
				$this->redirect(array('admin'));
			}
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

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('admin'));//$this->redirect(array('view','id'=>$model->user_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionUpdateemploginid($id)
	{
		$model=$this->loadModel($id);
		

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->user_organization_email_id = strtolower($_POST['User']['user_organization_email_id']);
			if($model->save())
				$this->redirect(array('resetemploginid'));//$this->redirect(array('view','id'=>$model->user_id));
		}

		$this->render('updateemploginid',array(
			'model'=>$model,
		));
	}
	public function actionUpdatestudloginid($id)
	{
		$model=$this->loadModel($id);
		

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->user_organization_email_id = strtolower($_POST['User']['user_organization_email_id']);
			if($model->save())
				$this->redirect(array('resetstudloginid'));//$this->redirect(array('view','id'=>$model->user_id));
		}

		$this->render('updateloginid',array(
			'model'=>$model,
		));
	}
	public function actionChange()
	{
		$model=$this->loadModel(Yii::app()->user->id);
		$model->setScenario('change');

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$user = User::model()->findByPk(Yii::app()->user->id);
			$model->user_password = md5($model->new_pass.$model->new_pass);
			if($model->save())
				$this->redirect(array('/site/newdashboard'));
		}

		$this->render('change',array(
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
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		*/
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));


	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionResetadminpassword()
	{
		$model=new User('resetadminpasswordsearch');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('resetadminpassword',array(
			'model'=>$model,
		));
	}
	public function actionResetstudloginid()
	{
		$model=new User('resetstudloginidsearch');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('resetstudloginid',array(
			'model'=>$model,
		));
	}
	public function actionResetemploginid()
	{
		$model=new User('resetemploginidsearch');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('resetemploginid',array(
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
		$model=User::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionResetstudpassword()
	{
		$model=new StudentTransaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentTransaction']))
			$model->attributes=$_GET['StudentTransaction'];

		$this->render('resetstudpassword',array(
			'model'=>$model,
		));
	}
	public function actionResetemppassword()
	{
		$model=new EmployeeTransaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeTransaction']))
			$model->attributes=$_GET['EmployeeTransaction'];

		$this->render('resetemppassword',array(
			'model'=>$model,
		));
	}
	public function actionUpdate_stud_password($id)
	{
		$model=$this->loadModel($id);
		//$stud_email=StudentInfo::model()->findByPk($_REQUEST['id'])->student_email_id_1;
		$student_data = StudentTransaction::model()->findByAttributes(array('student_transaction_user_id'=>$_REQUEST['id']));
		$student_info = StudentInfo::model()->findByPk($student_data->student_transaction_student_id)->student_first_name;
		$model->user_password=MD5($model->user_organization_email_id.$model->user_organization_email_id);
		$model->save();
		Yii::app()->user->setFlash('resetstudpassword',$student_info.' '."Password is Reset");
		$this->redirect(array('user/resetstudpassword'));
		
	}
	public function actionUpdate_emp_password($id)
	{
		$model=$this->loadModel($id);
		//$emp_email=EmployeeInfo::model()->findByPk($_REQUEST['id'])->employee_private_email;
		$emp_data = EmployeeTransaction::model()->findByAttributes(array('employee_transaction_user_id'=>$_REQUEST['id']));		
		$emp_info = EmployeeInfo::model()->findByPk($emp_data->employee_transaction_employee_id)->employee_first_name;
		$model->user_password=MD5($model->user_organization_email_id.$model->user_organization_email_id);
		$model->save();		
		Yii::app()->user->setFlash('resetemppassword', $emp_info.' '."Password is Reset");
		$this->redirect(array('user/resetemppassword'));
		
	}
	public function actionUpdate_admin_password($id)
	{
		$model=$this->loadModel($id);
		$admin_password = User::model()->findByPk($_REQUEST['id'])->user_organization_email_id;
		$model->user_password=MD5($model->user_organization_email_id.$model->user_organization_email_id);
		$model->save();
		Yii::app()->user->setFlash('resetadminpassword',"Password is Reset");
		$this->redirect(array('user/resetadminpassword'));
		
	}

}
