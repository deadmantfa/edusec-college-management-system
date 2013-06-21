<?php

class EmployeeTransactionController extends RController
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
	public function behaviors()
	{
		return array(
		    'eexcelview'=>array(
			'class'=>'ext.eexcelview.EExcelBehavior',
		    ),
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
				'actions'=>array('index','new_view','final_view'),
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
	public function actionNew_view($id)
	{
		$this->render('new_view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionFinal_view($id)
	{

		$emp_doc=new EmployeeDocsTrans('mysearch');
		$emp_doc->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeDocsTrans']))
			$emp_doc->attributes=$_GET['EmployeeDocsTrans'];

		$emp_exp=new EmployeeExperienceTrans('mysearch');
		$emp_exp->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeExperienceTrans']))
			$emp_exp->attributes=$_GET['EmployeeDocsTrans'];

		$emp_record=new EmployeeAcademicRecordTrans('mysearch');
		$emp_record->unsetAttributes();  // clear any default values

		if(isset($_GET['EmployeeAcademicRecordTrans']))
			$emp_record->attributes=$_GET['EmployeeAcademicRecordTrans'];


		$this->render('final_view',array(
			'model'=>$this->loadModel($id),'emp_doc'=>$emp_doc,'emp_exp'=>$emp_exp,'emp_record'=>$emp_record,
		));
		
	}


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new EmployeeTransaction;
		$info=new EmployeeInfo;
		$user =new User;
		$photo =new EmployeePhotos;
		$address=new EmployeeAddress;
		$lang=new LanguagesKnown;
		$ass_comp = new assignCompanyUserTable;
		$auth_assign = new AuthAssignment;


		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation(array($info,$model,$user));

		if(!empty($_POST['EmployeeTransaction']) || !empty($_POST['EmployeeInfo']))
		{
			$model->attributes=$_POST['EmployeeTransaction'];
			$info->attributes=$_POST['EmployeeInfo'];
			$user->attributes=$_POST['User'];			

			$doa = $info->employee_joining_date;
			$dateofadmission = date("Y-m-d", strtotime($doa));
			$info->employee_joining_date = $dateofadmission;
			
			/** fix the attendece id card length */
			$cardid_length = strlen((string) $info->employee_attendance_card_id);
			
			$cardid = $info->employee_attendance_card_id;
			$digit = 0;
			$diff = 10-$cardid_length;
			for($i=1;$i<=$diff;$i++)
			{
				$cardid = $digit.$cardid;
			}
			$info->employee_attendance_card_id = $cardid;
			$info->employee_private_email =strtolower($user->user_organization_email_id); 
			$info->employee_created_by = Yii::app()->user->id;
            		$info->employee_creation_date = new CDbExpression('NOW()');
			  $user->user_organization_email_id = $info->employee_private_email;
			  $user->user_password =  md5($info->employee_private_email.$info->employee_private_email);
			  $user->user_created_by =  Yii::app()->user->id;
			  $user->user_creation_date = new CDbExpression('NOW()');
			  $user->user_organization_id = Yii::app()->user->getState('org_id');
			  $user->user_type = "employee";
			  if($info->save(false))  
			  {  
			        $user->save(false);
				$address->save(false);
				$lang->save(false);			
				$photo->employee_photos_path = "no-images" ;
				$photo->save(false);
			  }
			$model->employee_transaction_employee_id = $info->employee_id;
			$model->employee_transaction_user_id = $user->user_id;
			$model->employee_transaction_emp_photos_id = $photo->employee_photos_id;
	                $model->employee_transaction_emp_address_id = $address->employee_address_id;
			$model->employee_transaction_languages_known_id=$lang->languages_known_id;
			$model->employee_transaction_organization_id = Yii::app()->user->getState('org_id');

	        	$model->save(false); // not false because it hasn't been validated
		EmployeeInfo::model()->updateByPk($model->employee_transaction_employee_id, array('employee_info_transaction_id'=>$model->employee_transaction_id));
			$auth_assign->itemname = 'Employee';
			$auth_assign->userid = $user->user_id;
			$auth_assign->save();

			// Assign company to user...

			$ass_comp->assign_user_id = $user->user_id;
			$ass_comp->assign_role_id = 3;
			$ass_comp->assign_org_id = Yii::app()->user->getState('org_id');
			$ass_comp->assign_created_by = Yii::app()->user->id;
			$ass_comp->assign_creation_date = new CDbExpression('NOW()');
			$ass_comp->save();

				        $this->redirect(array('update','id'=>$model->employee_transaction_id));

	 	}			 
		else
		{
			$this->render('create',array(
			'model'=>$model,'info'=>$info,'user'=>$user,
		));
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		$info = EmployeeInfo::model()->findByPk($model->employee_transaction_employee_id);
		$address = EmployeeAddress::model()->findByPk($model->employee_transaction_emp_address_id);
		$photo = EmployeePhotos::model()->findByPk($model->employee_transaction_emp_photos_id);
		$lang = LanguagesKnown::model()->findByPk($model->employee_transaction_languages_known_id);

		$emp_doc = new EmployeeDocsTrans;
		$emp_record = new EmployeeAcademicRecordTrans;
		$emp_exp = new EmployeeExperienceTrans;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation(array($info,$model,$photo,$address,$lang));
		
		if(Yii::app()->user->getState('emp_id') && !Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData'))
		{
			$this->render('profile_form',array(
			'model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'lang'=>$lang,'emp_doc'=>$emp_doc,'emp_record'=>$emp_record,'emp_exp'=>$emp_exp,'flag'=>0,
		));
		}
		else if(Yii::app()->user->getState('emp_id') && Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData'))
		{
			$this->render('update',array(
			'model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'lang'=>$lang,'emp_doc'=>$emp_doc,'emp_record'=>$emp_record,'emp_exp'=>$emp_exp,'flag'=>1,
		));
		}
		else {
			$this->render('update',array(
			'model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'lang'=>$lang,'emp_doc'=>$emp_doc,'emp_record'=>$emp_record,'emp_exp'=>$emp_exp,'flag'=>1,
			));
		}	    	
	
	}
	public function actionUpdateprofiletab1($id)
	{		
		$emp_trans = EmployeeTransaction::model()->findByPk($id);
		if(isset($_POST['EmployeeTransaction'])) {
		EmployeeTransaction::model()->updateByPk($id,array(
			'employee_transaction_designation_id'=>$_POST['EmployeeTransaction']['employee_transaction_designation_id'],
			'employee_transaction_department_id'=>$_POST['EmployeeTransaction']['employee_transaction_department_id'],
			'employee_transaction_shift_id'=>$_POST['EmployeeTransaction']['employee_transaction_shift_id'],
			'employee_transaction_nationality_id'=>$_POST['EmployeeTransaction']['employee_transaction_nationality_id'],
			'employee_transaction_religion_id'=>$_POST['EmployeeTransaction']['employee_transaction_religion_id'],
			'employee_transaction_category_id'=>$_POST['EmployeeTransaction']['employee_transaction_category_id'],
			
		));
		
		if($_POST['EmployeeInfo']['employee_dob']!="")
		{
		$dateofbirth = date("Y-m-d", strtotime($_POST['EmployeeInfo']['employee_dob']));		
		}
		else
		   $dateofbirth = NULL;
		$mobile = $_POST['EmployeeInfo']['employee_organization_mobile']; 
		if($_POST['EmployeeInfo']['employee_organization_mobile'] == null)
		   $mobile = null;
		
		EmployeeInfo::model()->updateByPk($emp_trans->employee_transaction_employee_id,array(
			'employee_no'=>$_POST['EmployeeInfo']['employee_no'],
			'employee_name_alias'=>$_POST['EmployeeInfo']['employee_name_alias'],
			'employee_aicte_id'=>$_POST['EmployeeInfo']['employee_aicte_id'],
			'employee_gtu_id'=>$_POST['EmployeeInfo']['employee_gtu_id'],
			'employee_joining_date'=>date("Y-m-d", strtotime($_POST['EmployeeInfo']['employee_joining_date'])),
			'employee_probation_period'=>$_POST['EmployeeInfo']['employee_probation_period'],
			'title'=>$_POST['EmployeeInfo']['title'],
			'employee_first_name'=>$_POST['EmployeeInfo']['employee_first_name'],
			'employee_middle_name'=>$_POST['EmployeeInfo']['employee_middle_name'],
			'employee_last_name'=>$_POST['EmployeeInfo']['employee_last_name'],
			'employee_mother_name'=>$_POST['EmployeeInfo']['employee_mother_name'],
			'employee_dob'=>$dateofbirth,
			'employee_birthplace'=>$_POST['EmployeeInfo']['employee_birthplace'],
			'employee_gender'=>$_POST['EmployeeInfo']['employee_gender'],
			'employee_bloodgroup'=>$_POST['EmployeeInfo']['employee_bloodgroup'],
			'employee_marital_status'=>$_POST['EmployeeInfo']['employee_marital_status'],
			'employee_pancard_no'=>$_POST['EmployeeInfo']['employee_pancard_no'],
			'employee_account_no'=>$_POST['EmployeeInfo']['employee_account_no'],
			'employee_type'=>$_POST['EmployeeInfo']['employee_type'],
			'employee_organization_mobile'=>$mobile,
			'employee_private_mobile'=>$_POST['EmployeeInfo']['employee_private_mobile'],
			'employee_private_email'=>$_POST['EmployeeInfo']['employee_private_email'],
		));
		}
		$this->redirect(array('update','id'=>$id));		
	}

	public function actionUpdateprofiletab2($id)
	{
		$emp_trans = EmployeeTransaction::model()->findByPk($id);
		if(isset($_POST['EmployeeInfo']))
		{
		EmployeeInfo::model()->updateByPk($emp_trans-> 	employee_transaction_employee_id,array(
			'employee_guardian_name'=>$_POST['EmployeeInfo']['employee_guardian_name'],
			'employee_guardian_relation'=>$_POST['EmployeeInfo']['employee_guardian_relation'],
			'employee_guardian_qualification'=>$_POST['EmployeeInfo']['employee_guardian_qualification'],
			'employee_guardian_occupation'=>$_POST['EmployeeInfo']['employee_guardian_occupation'],
			'employee_guardian_phone_no'=>$_POST['EmployeeInfo']['employee_guardian_phone_no'],
			'employee_guardian_income'=>$_POST['EmployeeInfo']['employee_guardian_income'],
			'employee_guardian_mobile1'=>$_POST['EmployeeInfo']['employee_guardian_mobile1'],
			'employee_guardian_mobile2'=>$_POST['EmployeeInfo']['employee_guardian_mobile2'],
			'employee_guardian_home_address'=>$_POST['EmployeeInfo']['employee_guardian_home_address'],
			'employee_guardian_occupation_address'=>$_POST['EmployeeInfo']['employee_guardian_occupation_address'],
			'employee_guardian_occupation_city'=>$_POST['EmployeeInfo']['employee_guardian_occupation_city'],
			'employee_guardian_city_pin'=>$_POST['EmployeeInfo']['employee_guardian_city_pin'],
		));
		}
		$this->redirect(array('update','id'=>$id));
		
	}

	public function actionUpdateprofiletab3($id)
	{
		$emp_trans = EmployeeTransaction::model()->findByPk($id);
		if(!empty($_POST['EmployeeInfo']))
		{
		if(!empty($_POST['EmployeeInfo']['employee_attendance_card_id']))
		{

		$cardid_length = strlen((string) $_POST['EmployeeInfo']['employee_attendance_card_id']);

			
			$cardid = $_POST['EmployeeInfo']['employee_attendance_card_id'];
			$digit = 0;
			$diff = 10-$cardid_length;
			for($i=1;$i<=$diff;$i++)
			{
				$cardid = $digit.$cardid;
			}
		}
		else
			$cardid=0;
		EmployeeInfo::model()->updateByPk($emp_trans->employee_transaction_employee_id,array(
			'employee_attendance_card_id'=>$cardid,
			'employee_faculty_of'=>$_POST['EmployeeInfo']['employee_faculty_of'],
			'employee_curricular'=>$_POST['EmployeeInfo']['employee_curricular'],
			'employee_project_details'=>$_POST['EmployeeInfo']['employee_project_details'],
			'employee_technical_skills'=>$_POST['EmployeeInfo']['employee_technical_skills'],
			'employee_hobbies'=>$_POST['EmployeeInfo']['employee_hobbies'],
			'employee_reference'=>$_POST['EmployeeInfo']['employee_reference'],
			'employee_refer_designation'=>$_POST['EmployeeInfo']['employee_refer_designation'],
		));
		LanguagesKnown::model()->updateByPk($emp_trans->employee_transaction_languages_known_id,array(
			'languages_known1'=>$_POST['LanguagesKnown']['languages_known1'],
			'languages_known2'=>$_POST['LanguagesKnown']['languages_known2'],
			'languages_known3'=>$_POST['LanguagesKnown']['languages_known3'],
			'languages_known4'=>$_POST['LanguagesKnown']['languages_known4'],

		));
		}
		$this->redirect(array('update','id'=>$id));
		
	}

	public function actionUpdateprofiletab4($id)
	{
		$emp_trans = EmployeeTransaction::model()->findByPk($id);
		$chbox_value = $_POST['EmployeeAddress']['address_chkbox'];
		if($chbox_value == 1)
		{
			EmployeeAddress::model()->UpdateByPk($emp_trans->employee_transaction_emp_address_id,array(
			'employee_address_c_line1'=>$_POST['EmployeeAddress']['employee_address_c_line1'],
			'employee_address_c_line2'=>$_POST['EmployeeAddress']['employee_address_c_line2'],
			'employee_address_c_taluka'=>$_POST['EmployeeAddress']['employee_address_c_taluka'],
			'employee_address_c_district'=>$_POST['EmployeeAddress']['employee_address_c_district'],
			'employee_address_c_country'=>$_POST['EmployeeAddress']['employee_address_c_country'],
			'employee_address_c_state'=>$_POST['EmployeeAddress']['employee_address_c_state'],
			'employee_address_c_city'=>$_POST['EmployeeAddress']['employee_address_c_city'],
			'employee_address_c_pincode'=>$_POST['EmployeeAddress']['employee_address_c_pincode'],
			'address_chkbox'=>$_POST['EmployeeAddress']['address_chkbox'],
			'employee_address_p_line1'=>$_POST['EmployeeAddress']['employee_address_c_line1'],
			'employee_address_p_line2'=>$_POST['EmployeeAddress']['employee_address_c_line2'],
			'employee_address_p_taluka'=>$_POST['EmployeeAddress']['employee_address_c_taluka'],
			'employee_address_p_district'=>$_POST['EmployeeAddress']['employee_address_c_district'],
			'employee_address_p_country'=>$_POST['EmployeeAddress']['employee_address_c_country'],
			'employee_address_p_state'=>$_POST['EmployeeAddress']['employee_address_c_state'],
			'employee_address_p_city'=>$_POST['EmployeeAddress']['employee_address_c_city'],
			'employee_address_p_pincode'=>$_POST['EmployeeAddress']['employee_address_c_pincode'],
			
		));
		}
		else
		{
		EmployeeAddress::model()->UpdateByPk($emp_trans->employee_transaction_emp_address_id,array(
			'employee_address_c_line1'=>$_POST['EmployeeAddress']['employee_address_c_line1'],
			'employee_address_c_line2'=>$_POST['EmployeeAddress']['employee_address_c_line2'],
			'employee_address_c_taluka'=>$_POST['EmployeeAddress']['employee_address_c_taluka'],
			'employee_address_c_district'=>$_POST['EmployeeAddress']['employee_address_c_district'],
			'employee_address_c_country'=>$_POST['EmployeeAddress']['employee_address_c_country'],
			'employee_address_c_state'=>$_POST['EmployeeAddress']['employee_address_c_state'],
			'employee_address_c_city'=>$_POST['EmployeeAddress']['employee_address_c_city'],
			'employee_address_c_pincode'=>$_POST['EmployeeAddress']['employee_address_c_pincode'],
			'address_chkbox'=>$_POST['EmployeeAddress']['address_chkbox'],
			'employee_address_p_line1'=>$_POST['EmployeeAddress']['employee_address_p_line1'],
			'employee_address_p_line2'=>$_POST['EmployeeAddress']['employee_address_p_line2'],
			'employee_address_p_taluka'=>$_POST['EmployeeAddress']['employee_address_p_taluka'],
			'employee_address_p_district'=>$_POST['EmployeeAddress']['employee_address_p_district'],
			'employee_address_p_country'=>$_POST['EmployeeAddress']['employee_address_p_country'],
			'employee_address_p_state'=>$_POST['EmployeeAddress']['employee_address_p_state'],
			'employee_address_p_city'=>$_POST['EmployeeAddress']['employee_address_p_city'],
			'employee_address_p_pincode'=>$_POST['EmployeeAddress']['employee_address_p_pincode'],
			
		));
		}
		$this->redirect(array('update','id'=>$id));	
	}

	public function actionUpdateprofilephoto($id)
    	{
		$emp_trans = EmployeeTransaction::model()->findByPk($id);
		$info = EmployeeInfo::model()->findByPk($emp_trans->employee_transaction_employee_id);
		$model = EmployeePhotos::model()->findByPk($emp_trans->employee_transaction_emp_photos_id);

        
         $this->performAjaxValidation($model);

        if(isset($_POST['EmployeePhotos']))
        {
	    $old_photo = $model->employee_photos_path;
            $model->employee_photos_path = CUploadedFile::getInstance($model,'employee_photos_path');
            if($model->employee_photos_path == null)
            {
                $valid_photo = true;
            }
            else
            {
                $valid_photo = $model->validate();
            }
            
            if($valid_photo)
            {
		
                if($model->employee_photos_path!=null)
                {    $newfname = '';
                    $ext= substr(strrchr($model->employee_photos_path,'.'),1);
                    
                    
                    //following thing done for deleting previously uploaded photo
                    $photo = $old_photo;
                    $dir1 = Yii::getPathOfAlias('webroot').'/emp_images/';
                    
                   if(file_exists($dir1.$photo) && $photo!='no-images'){
                    unlink($dir1.$photo);        
                    }       
                    if($ext!=null)
                    {                
                        $newfname = $info->employee_attendance_card_id.'.'.$ext;
                        $model->employee_photos_path->saveAs(Yii::getPathOfAlias('webroot').'/emp_images/'.$model->employee_photos_path = $newfname);
                    }
                               
                    Yii::import("ext.EPhpThumb.EPhpThumb");
                    $thumb=new EPhpThumb();
                    $thumb->init(); //this is needed
                    $thumb->create(Yii::getPathOfAlias('webroot').'/emp_images/'.$model->employee_photos_path=$newfname)->resize(500,500)->save(Yii::getPathOfAlias('webroot').'/emp_images/'.$model->employee_photos_path);
		    $model->save(false);                
		}
                $this->redirect(array('update','id'=>$id));
            }
            
        }

        $this->render('photo_form',array(
            'model'=>$model,
        ));
		}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	/*
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
	*/
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model = $this->loadModel($id);
			$employee_info = EmployeeInfo::model()->findByPk($model->employee_transaction_employee_id);
			if($model->employee_transaction_emp_address_id != null)
			$address = EmployeeAddress::model()->findByPk($model->employee_transaction_emp_address_id);
			$emp_photo = EmployeePhotos::model()->findByPk($model->employee_transaction_emp_photos_id);	
			if($model->employee_transaction_languages_known_id != null)	
			$lang_known = LanguagesKnown::model()->findByPk($model->employee_transaction_languages_known_id);
			$ass_comp  = assignCompanyUserTable::model()->findByAttributes(array('assign_user_id'=>$model->employee_transaction_user_id));
			
			//$assign_comp_model = assignCompanyUserTable::model()->findByPk($ass_comp->id);
			
			$dir1 = Yii::getPathOfAlias('webroot').'/emp_images/';
			if($dh = opendir($dir1))
			{
				if($emp_photo->employee_photos_path == "no-images")
				{

				}
				else
				{
					if(file_exists($dir1.$emp_photo->employee_photos_path))
					{
						chmod($dir1.$emp_photo->employee_photos_path, 777);
						unlink($dir1.$emp_photo->employee_photos_path);				
					}
				}
			}
			closedir($dh);
			if($this->loadModel($id)->delete()){
			$use_model = User::model()->findByPk($model->employee_transaction_user_id)->delete();
			$emp_photo->delete();
			$employee_info->delete();
			if($model->employee_transaction_emp_address_id != null)
			$address->delete();
			if($model->employee_transaction_languages_known_id != null)	
			$lang_known->delete();
			$ass_comp->delete();
			}
			

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/** Delete Photo of update profile*/
	public function actionPhotoDelete($id)
	{
		$model = $this->loadModel($id);
		$emp_photo = EmployeePhotos::model()->findByPk($model->employee_transaction_emp_photos_id);
		$dir1 = Yii::getPathOfAlias('webroot').'/emp_images/';
			if($dh = opendir($dir1))
			{
				if($emp_photo->employee_photos_path == "no-images")
				{

				}
				else
				{
					if(file_exists($dir1.$emp_photo->employee_photos_path))
					{
						//chmod($dir1.$emp_photo->employee_photos_path, 777);
						unlink($dir1.$emp_photo->employee_photos_path);	
						$emp_photo->employee_photos_path = "no-images";
						$emp_photo->save();						
					}
					else
					{
						$emp_photo->employee_photos_path = "no-images";
						$emp_photo->save();
					}
				}
			}
			closedir($dh);
		$this->redirect(array('EmployeeTransaction/update','id'=>$model->employee_transaction_id));
		
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
/*		$dataProvider=new CActiveDataProvider('EmployeeTransaction',array(
		    'criteria'=>array(
		    'condition'=>'employee_transaction_organization_id='.Yii::app()->user->getState('org_id')),

		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/

		$model=new EmployeeTransaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeTransaction']))
			$model->attributes=$_GET['EmployeeTransaction'];

		$this->render('admin',array(
			'model'=>$model,
		));


	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EmployeeTransaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeTransaction']))
			$model->attributes=$_GET['EmployeeTransaction'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionimportationinstruction()
	{
		$model = new EmployeeTransaction;

		$this->render('importinstruction',array(
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
		$model=EmployeeTransaction::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='employee-transaction-form')
		{
			echo CActiveForm::validate($models);
			Yii::app()->end();
		}
	}
	 public function actionUpdateCStates()
	    {
		    
		    $data = State::model()->findAll(array('condition'=>'country_id='.(int) $_REQUEST['EmployeeAddress']['employee_address_c_country']));
		    $data = CHtml::listData($data,'state_id','state_name');
		    //echo "<option value=''>Select State</option>";
		    foreach($data as $value=>$name)
			{
		        echo CHtml::tag('option', 
				array('value'=>$value),CHtml::encode($name),true);
	 		}
		    
	    }
	 
	    public function actionUpdateCCities()
	    {
		    $data = City::model()->findAll('state_id=:state_id', array(':state_id'=>(int) $_REQUEST['EmployeeAddress']['employee_address_c_state']));
		    $data = CHtml::listData($data,'city_id','city_name');
		    //echo "<option value=''>Select City</option>";
		    foreach($data as $value=>$name)
			echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	    }

	    public function actionUpdatePStates()
	    {
		    
		    $data = State::model()->findAll('country_id=:country_id', array(':country_id'=>(int) $_REQUEST['EmployeeAddress']['employee_address_p_country']));
		    $data = CHtml::listData($data,'state_id','state_name');
		    //echo "<option value=''>Select State</option>";
		    foreach($data as $value=>$name)
			{
		        echo CHtml::tag('option', 
				array('value'=>$value),CHtml::encode($name),true);
	 		}
		    
	    }
	 
	    public function actionUpdatePCities()
	    {
		    $data = City::model()->findAll('state_id=:state_id', array(':state_id'=>(int) $_REQUEST['EmployeeAddress']['employee_address_p_state']));
		    $data = CHtml::listData($data,'city_id','city_name');
		    //echo "<option value=''>Select City</option>";
		    foreach($data as $value=>$name)
		        echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	    }
		

	 

}
