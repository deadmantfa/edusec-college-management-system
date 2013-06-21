<?php

class StudentFeesMasterController extends RController
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
				'users'=>array('admin'),
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

        public function actionMyfees($id)
	{
		$org = Yii::app()->user->getState('org_id');

		$remaining = Yii::app()->db->createCommand()
                                ->select('*')
                                ->from('student_transaction st')
				->join('fees_master f','f.fees_branch_id=st.student_transaction_branch_id')
                                ->where('st.student_transaction_id  not in(select student_fees_master_student_transaction_id from student_fees_master where student_fees_master_org_id='.$org.') and f.fees_quota_id = st.student_transaction_quota_id and st.student_transaction_organization_id='.$org.' and f.fees_academic_term_name_id=st.student_academic_term_name_id and st.student_transaction_id='.$id)
                                ->queryAll();
		if($remaining)
			$this->render('errorpage',array('id'=>$id));
		else
			$this->redirect(array('view','student_id'=>$id));

	}


	public function actionView()
	{
		
		$model=new StudentFeesMaster('student_details_search');
		
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new StudentFeesMaster;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['StudentFeesMaster']))
		{
			$model->attributes=$_POST['StudentFeesMaster'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->student_fees_master_id));
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
		// $this->performAjaxValidation($model);

		if(isset($_POST['StudentFeesMaster']))
		{
			$model->attributes=$_POST['StudentFeesMaster'];
			if($model->save())
				$this->redirect(array('view','student_id'=>$model->student_fees_master_student_transaction_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}


/***********************************By Ravi Bhalodiya *****************************************************/
	public function actionFeesassign($id)
	{
		$student_trans=StudentTransaction::model()->findByPk($id);
		$fees_master = FeesMaster::model()->findByAttributes(array('fees_academic_term_name_id'=>$student_trans->student_academic_term_name_id,'fees_quota_id'=>$student_trans->student_transaction_quota_id,'fees_branch_id'=>$student_trans->student_transaction_branch_id)); 
			
		$model=new StudentFeesMaster;
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['amounts']))
		{
			foreach($_POST['amounts'] as $index=>$value){
				
				if($value !=null)
				{
				$model->student_fees_master_student_transaction_id = $id;
				$model->fees_master_table_id = $fees_master['fees_master_id'];
				$model->student_fees_master_details_id = $index; 
				$model->fees_details_amount = $value;
				$model->student_fees_master_org_id = Yii::app()->user->getState('org_id');
				$model->student_fees_master_created_by = Yii::app()->user->id;
				$model->student_fees_master_creation_date =  new CDbExpression('NOW()');			
				$model->setIsNewRecord(true);	
				$model->student_fees_master_id =null ;	
				$model->save();
				}
			}
			$this->redirect(array('assignFeesStudent'));

		}
		else
		{
			if($fees_master)
			{
				
				$remaining = Yii::app()->db->createCommand()
                                ->select('fees_details_master,fees_details_master_name')
                                ->from('fees_details_master')
                                ->where('organization_id='.Yii::app()->user->getState('org_id'))
                                ->queryAll();
				
				$this->render('add_other_fees',array(
			'model'=>$model,'fees_head_array'=>$remaining,
		));
			}
		
		}
	}	



	public function actionAssignFeesStudent()
	{
		$model = new StudentFeesMaster;
		$org = Yii::app()->user->getState('org_id');

		$remaining = Yii::app()->db->createCommand()
                                ->select('*')
                                ->from('student_transaction st')
				->join('student_info inf','inf.student_id=st.student_transaction_student_id')
				->join('fees_master f','f.fees_branch_id=st.student_transaction_branch_id')
                                ->where('st.student_transaction_id  not in(select student_fees_master_student_transaction_id from student_fees_master where student_fees_master_org_id='.$org.') and f.fees_quota_id = st.student_transaction_quota_id and st.student_transaction_organization_id='.$org.' and f.fees_academic_term_name_id=st.student_academic_term_name_id')
                                ->queryAll();
		
		$this->render('assign_fees_student',array(
			'remaining'=>$remaining,
		));	
	}

	public function actionAddotherfees($id)
	{

		$student_trans=StudentTransaction::model()->findByPk($id);
		$fees_master = FeesMaster::model()->findByAttributes(array('fees_academic_term_name_id'=>$student_trans->student_academic_term_name_id,'fees_quota_id'=>$student_trans->student_transaction_quota_id,'fees_branch_id'=>$student_trans->student_transaction_branch_id)); 
			
		$model=new StudentFeesMaster;
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['amounts']))
		{
			foreach($_POST['amounts'] as $index=>$value){

				if($value!=null){
				$model->student_fees_master_student_transaction_id = $id;
				$model->fees_master_table_id = $fees_master['fees_master_id'];
				$model->student_fees_master_details_id = $index; 
				$model->fees_details_amount = $value;
				$model->student_fees_master_org_id = Yii::app()->user->getState('org_id');
				$model->student_fees_master_created_by = Yii::app()->user->id;
				$model->student_fees_master_creation_date =  new CDbExpression('NOW()');			
				$model->setIsNewRecord(true);	
				$model->student_fees_master_id =null ;	
				$model->save();	
				}		
			}
			$this->redirect(array('view','student_id'=>$id));

		}
		else
		{
			if($fees_master)
			{
				$student_fees = StudentFeesMaster::model()->findAll(array('condition'=>'fees_master_table_id='.$fees_master->fees_master_id.' and student_fees_master_student_transaction_id='.$id));


				if(!empty($student_fees))
				{
			
				$details_array = array();	
				foreach($student_fees as $fees_data)
					$details_array[] = $fees_data['student_fees_master_details_id'];
				$details = implode(',',$details_array);
				
				
				$remaining = Yii::app()->db->createCommand()
                                ->select('fees_details_master,fees_details_master_name')
                                ->from('fees_details_master')
                                ->where('fees_details_master not in('.$details.') and organization_id='.Yii::app()->user->getState('org_id'))
                                ->queryAll();
				
				$this->render('add_other_fees',array(
			'model'=>$model,'fees_head_array'=>$remaining,
			));
				}
				else
					$this->redirect(array('/studentFeesMaster/feesassign/'.$id));
			}
		
		}
	}

/************************************************************************************************************/
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
//************************************Ravi Bhalodiya******************************************/
	public function actionDeleteFees()
	{
		StudentFeesMaster::model()->deleteAll( 
				$condition  = 'fees_master_table_id = :master_id AND student_fees_master_student_transaction_id = :student_id',
				$params     = array(
					':master_id' => $_REQUEST['fees_master_id'], 
					':student_id' => $_REQUEST['student_id'],
				));
			
	}


	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		/*$dataProvider=new CActiveDataProvider('StudentFeesMaster');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
		$model=new StudentFeesMaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentFeesMaster']))
			$model->attributes=$_GET['StudentFeesMaster'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new StudentFeesMaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentFeesMaster']))
			$model->attributes=$_GET['StudentFeesMaster'];

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
		$model=StudentFeesMaster::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-fees-master-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
