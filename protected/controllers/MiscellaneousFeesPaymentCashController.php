<?php

class MiscellaneousFeesPaymentCashController extends Controller
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
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','recpt_list'),
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
	
	public function actionRecpt_list()
	{
		$this->layout='receipt_layout';
		$misc_fees_payment = MiscellaneousFeesPaymentCash::model()->findByPk($_REQUEST['id']);
		$model = StudentTransaction::model()->findByPk($misc_fees_payment->miscellaneous_fees_payment_cash_student_id);
		$stud_id = $model->student_transaction_student_id;
		$stud_model = StudentInfo::model()->findByPk($model->student_transaction_student_id);
		$acd_term = AcademicTermPeriod::model()->findByPk($model->student_academic_term_period_tran_id);
		$branch = Branch::model()->findByPk($model->student_transaction_branch_id);
		$test = Yii::app()->user->getState('org_id');
		$org = Organization::model()->findByPk($test)->organization_name;

		
		//print_r($_REQUEST['id']);
			//print "<br/>model".$misc_fees_payment->miscellaneous_fees_payment_cash_student_id;
		//print "<br/>reciept_no".$misc_fees_payment->miscellaneous_fees_payment_cash_receipt_id;
			//print "<br/>stud_id".$model->student_transaction_student_id;
		//print "<br/>curent date".date('d/m/y');
		//print "<br/>stud_model".$stud_model->student_first_name.''.$stud_model->student_middle_name.''.$stud_model->student_last_name;
		//print "<br/>dbdate".$misc_fees_payment->miscellaneous_fees_payment_cash_creation_date;
		//print "<br/>branch_name".$branch->branch_name;
		//print "<br/>academic_term".$acd_term->academic_terms_period_name;
		//print "</br>roll no".$stud_model->student_roll_no;	
		

		
		//exit;
		

		$this->render('recpt_list',array('model'=>$model,'org'=>$org,'stud_model'=>$stud_model,'acd_term'=>$acd_term,'branch'=>$branch,'misc_fees_payment'=>$misc_fees_payment));
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
//exit;
		$model=new MiscellaneousFeesPaymentCash;
		$receipt = new MiscellaneousFeesReceipt;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['MiscellaneousFeesPaymentCash']))
		{
			$model->attributes=$_POST['MiscellaneousFeesPaymentCash'];
			$model->miscellaneous_fees_payment_organization_id= Yii::app()->user->getState('org_id');
  			$last_receipt_id = Yii::app()->db->createCommand()
				->select('MAX(miscellaneous_fees_receipt_number) as lastid')
				->from('miscellaneous_fees_receipt')
				->where('miscellaneous_fees_receipt_org_id=:id', array(':id'=>Yii::app()->user->getState('org_id')))
				->queryRow();
			   	$receipt->miscellaneous_fees_receipt_number = $last_receipt_id['lastid'] + 1; 
				$receipt->miscellaneous_fees_receipt_org_id = Yii::app()->user->getState('org_id');

			$receipt->save();
			$model->miscellaneous_fees_payment_cash_student_id = $_REQUEST['id'];
			$model->miscellaneous_fees_payment_cash_receipt_id = $receipt->miscellaneous_fees_receipt_id;
			$model->miscellaneous_fees_payment_cash_created_by=Yii::app()->user->id;
			//$model->miscellaneous_fees_payment_cash_creation_date=new CDbExpression('NOW()');
			$date=$_POST['MiscellaneousFeesPaymentCash']['miscellaneous_fees_payment_cash_creation_date'];
			$new_date = date("Y-m-d", strtotime($date));
			$model->miscellaneous_fees_payment_cash_creation_date = $new_date;



			if($model->save())
				$this->redirect(array('/miscellaneousFeesPaymentTransaction/create','id'=>$model->miscellaneous_fees_payment_cash_student_id));

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

		if(isset($_POST['MiscellaneousFeesPaymentCash']))
		{
			$model->attributes=$_POST['MiscellaneousFeesPaymentCash'];
			$date=$_POST['MiscellaneousFeesPaymentCash']['miscellaneous_fees_payment_cash_creation_date'];
			$new_date = date("Y-m-d", strtotime($date));
			$model->miscellaneous_fees_payment_cash_creation_date = $new_date;
			
			if($model->save())
				$this->redirect(array('/miscellaneousFeesPaymentTransaction/create','id'=>$model->miscellaneous_fees_payment_cash_student_id));
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
/*		$dataProvider=new CActiveDataProvider('MiscellaneousFeesPaymentCash');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
		$model=new MiscellaneousFeesPaymentCash('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MiscellaneousFeesPaymentCash']))
			$model->attributes=$_GET['MiscellaneousFeesPaymentCash'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new MiscellaneousFeesPaymentCash('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MiscellaneousFeesPaymentCash']))
			$model->attributes=$_GET['MiscellaneousFeesPaymentCash'];

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
		$model=MiscellaneousFeesPaymentCash::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='miscellaneous-fees-payment-cash-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
