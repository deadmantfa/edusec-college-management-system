<?php

/**
 * This is the model class for table "student_transaction".
 *
 * The followings are the available columns in table 'student_transaction':
 * @property integer $student_transaction_id
 * @property integer $student_transaction_user_id
 * @property integer $student_transaction_student_id
 * @property integer $student_transaction_branch_id
 * @property integer $student_transaction_category_id
 * @property integer $student_transaction_organization_id
 * @property integer $student_transaction_student_address_id
 * @property integer $student_transaction_nationality_id
 * @property integer $student_transaction_quota_id
 * @property integer $student_transaction_religion_id
 * @property integer $student_transaction_shift_id
 * @property integer $student_transaction_languages_known_id
 * @property integer $student_transaction_student_photos_id
 * @property integer $student_transaction_division_id
 * @property integer $student_transaction_batch_id
 * @property integer $student_academic_term_period_tran_id
* @property integer $student_transaction_detain_student_flag
 */
class StudentTransaction extends CActiveRecord
{
	public $year1,$year2,$year3,$year4,$year5,$program,$level,$admission,$course,$reserve_category,$phy_hand,$econ_back,$hostel_fees,$gate_score,$gate_exam_number,$gate_score_validfrom,$gate_score_validto,$aadharcard,$institute_fees;
	/**
	 * Returns the static model of the specified AR class.
	 * @return StudentTransaction the static model class
	 */

	public $branch_name, $student_first_name, $division_name, $quota_name, $academic_terms_period_name, $academic_term_name,$student_enroll_no,$student_roll_no,$student_middle_name,$student_last_name,$academic_term_period,$user_organization_email_id,$feedback_category_master_id,$student_docs_desc,$student_docs_path,$doc_category_id,$student_docs_trans,$student_docs_trans_user_id,$student_transaction_id,$cat_id,$title,$student_docs_submit_date,$student_dtod_regular_status,$organization_name,$student_living_status;


	public $status_name,$student_mobile_no,$student_email_id_1,$csvfile;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'student_transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_transaction_branch_id, student_academic_term_period_tran_id, student_academic_term_name_id, student_transaction_division_id,student_transaction_student_photos_id, student_transaction_quota_id, student_transaction_shift_id', 'required','message'=>''),

			//array('student_transaction_user_id, student_transaction_student_id, student_transaction_branch_id, student_transaction_category_id, student_transaction_organization_id, student_transaction_student_address_id, student_transaction_nationality_id, student_transaction_quota_id, student_transaction_religion_id, student_transaction_languages_known_id, student_transaction_student_photos_id, student_transaction_division_id, student_academic_term_period_tran_id, student_academic_term_name_id,student_transaction_detain_student_flag, student_transaction_shift_id,','required','message'=>'','on'=>'update'),




			array('student_transaction_user_id, student_transaction_student_id, student_transaction_branch_id, student_transaction_category_id, student_transaction_organization_id, student_transaction_student_address_id, student_transaction_nationality_id, student_transaction_quota_id, student_transaction_religion_id, student_transaction_languages_known_id, student_transaction_student_photos_id, student_transaction_division_id, student_academic_term_period_tran_id, student_academic_term_name_id,student_transaction_detain_student_flag, student_transaction_shift_id, student_transaction_batch_id', 'numerical', 'integerOnly'=>true,'message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('student_transaction_id, student_transaction_user_id, student_transaction_student_id, student_transaction_branch_id, student_transaction_category_id, student_transaction_organization_id, student_transaction_student_address_id, student_transaction_nationality_id, student_transaction_quota_id, student_transaction_religion_id, student_transaction_languages_known_id, student_transaction_student_photos_id, student_transaction_division_id, student_transaction_batch_id, student_academic_term_period_tran_id, student_academic_term_name_id, branch_name, student_first_name, division_name, quota_name, academic_terms_period_name, academic_term_name,student_enroll_no, student_middle_name,title, student_last_name,academic_term_period, user_organization_email_id, student_transaction_detain_student_flag, status_name,student_roll_no,student_dtod_regular_status,student_living_status,student_mobile_no,student_email_id_1', 'safe', 'on'=>'search,leftStudentSearch,hostelsearch,smssearch,transportsearch'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'Rel_Stud_Info' => array(self::BELONGS_TO, 'StudentInfo', 'student_transaction_student_id'),
			'Rel_Branch' => array(self::BELONGS_TO, 'Branch', 'student_transaction_branch_id'),
			'Rel_Category' => array(self::BELONGS_TO, 'Category', 'student_transaction_category_id'),
			'Rel_Quota' => array(self::BELONGS_TO, 'Quota', 'student_transaction_quota_id'),
			'Rel_Religion' => array(self::BELONGS_TO, 'Religion', 'student_transaction_religion_id'),
			'Rel_Shift' => array(self::BELONGS_TO, 'Shift', 'student_transaction_shift_id'),
			'Rel_Batch' => array(self::BELONGS_TO, 'Batch', 'student_transaction_batch_id'),
			'Rel_Nationality' => array(self::BELONGS_TO, 'Nationality', 'student_transaction_nationality_id'),
			'Rel_Department' => array(self::BELONGS_TO, 'Department', 'student_transaction_department_id'),
			'Rel_Organization' => array(self::BELONGS_TO, 'Organization', 'student_transaction_organization_id'),
			'Rel_Division' => array(self::BELONGS_TO, 'Division', 'student_transaction_division_id'),
			'Rel_Photos' => array(self::BELONGS_TO, 'StudentPhotos','student_transaction_student_photos_id'),
			'Rel_Student_Address' => array(self::BELONGS_TO, 'StudentAddress', 'student_transaction_student_address_id'),
			'Rel_student_academic_terms_period_name' => array(self::BELONGS_TO, 'AcademicTermPeriod', 'student_academic_term_period_tran_id'),	

			'Rel_student_academic_terms_name' => array(self::BELONGS_TO, 'AcademicTerm', 'student_academic_term_name_id'),
			'Rel_user' => array(self::BELONGS_TO, 'User', 'student_transaction_user_id'),
			'Rel_language' => array(self::BELONGS_TO, 'LanguagesKnown', 'student_transaction_languages_known_id'),		

			//'Rel_student_academic_terms_name' => array(self::BELONGS_TO, 'AcademicTerm', 'student_academic_term_name_id'),	
			'Rel_languages_known' => array(self::BELONGS_TO, 'LanguagesKnown','student_transaction_languages_known_id'),	
			'Rel_Status' => array(self::BELONGS_TO, 'Studentstatusmaster','student_transaction_detain_student_flag'),
			'docs_trans' => array(self::BELONGS_TO, 'StudentDocsTrans','', 'on'=>'student_transaction_id = student_docs_trans_user_id'),	
			'docs' => array(self::BELONGS_TO, 'StudentDocs','','on'=>'student_docs_id= docs_trans.	student_docs_trans_stud_docs_id'),	
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'student_transaction_id' => 'Student Transaction',
			'student_transaction_user_id' => 'Student Transaction User',
			'student_transaction_student_id' => 'Student Transaction Student',
			'student_transaction_branch_id' => 'Branch',
			'student_transaction_category_id' => 'Category',
			'student_transaction_organization_id' => 'Organization',
			'student_transaction_student_address_id' => 'Student Address',
			'student_transaction_nationality_id' => 'Nationality',
			'student_transaction_quota_id' => 'Quota',
			'student_transaction_religion_id' => 'Religion',
			'student_transaction_shift_id' => 'Shift',
			'student_transaction_languages_known_id' => 'Languages Known',
			'student_transaction_student_photos_id' => 'Student Photos',
			'student_transaction_division_id' => 'Division',
			'student_transaction_batch_id' => 'Batch',
			'student_academic_term_period_tran_id' => 'Academic Year',
			'student_academic_term_name_id' => 'Semester',
			'student_roll_no' => 'Roll No',
			'student_merit_no' => 'Student Merit No',
			'student_enroll_no' => 'Enroll No',
			'student_college_id' => 'Student College',
			'student_first_name' => 'Name',
			'student_middle_name' => 'Husband/Father Name',
			'student_last_name' => 'Surname',
			'student_father_name' => 'Father Name',
			'student_mother_name' => 'Mother Name',
			'student_adm_date' => 'Student Adm Date',
			'student_dob' => 'Student Dob',
			'student_birthplace' => 'Student Birthplace',
			'student_gender' => 'Student Gender',
			'student_guardian_name' => 'Student Guardian Name',
			'student_guardian_relation' => 'Student Guardian Relation',
			'student_guardian_qualification' => 'Student Guardian Qualification',
			'student_guardian_occupation' => 'Student Guardian Occupation',
			'student_guardian_income' => 'Student Guardian Income',
			'student_guardian_occupation_address' => 'Student Guardian Occupation Address',
			'student_guardian_occupation_city' => 'Student Guardian Occupation City',
			'student_guardian_city_pin' => 'Student Guardian City Pin',
			'student_guardian_home_address' => 'Student Guardian Home Address',
			'student_guardian_phoneno' => 'Student Guardian Phoneno',
			'student_guardian_mobile' => 'Student Guardian Mobile',
			'student_email_id_1' => 'Student Email Id 1',
			'student_email_id_2' => 'Student Email Id 2',
			'student_bloodgroup' => 'Student Bloodgroup',
			'student_tally_ledger_name' => 'Tally Ledger',
			'student_dtod_regular_status'=>'DTOD/Regular Status',
			'status_name'=>'Regular/Detain Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$acdm_terms = AcademicTerm::model()->findAll('current_sem=1 and academic_term_organization_id='.Yii::app()->user->getState('org_id'));
		//print_r($acdm_terms);exit;
		$data = array();
		foreach($acdm_terms as $list)
		{
			$data[] = $list['academic_term_id'];
		}
		//$a = array('3', '13', '24', '53', '69');
		//print_r($data);exit;
		$criteria=new CDbCriteria;

		$criteria->with = array('Rel_Stud_Info','Rel_Status', 'Rel_Division','Rel_language','Rel_user');

		//$criteria->condition = 'student_transaction_organization_id = :student_transaction_org_id';

	      //  $criteria->params = array(':student_transaction_org_id' => Yii::app()->user->getState('org_id'));

		

		$criteria->addInCondition('student_academic_term_name_id', $data, 'OR');
		$criteria->addNotInCondition('student_transaction_detain_student_flag', array('1','2'));
		//$criteria->condition ="student_transaction_organization_id = :student_transaction_org_id && student_transaction_detain_student_flag <> :student_transaction_detain_student_flag";
		//$criteria->params = array (
		//':student_transaction_org_id' => Yii::app()->user->getState('org_id'),
		//':student_transaction_detain_student_flag'=>3,	
		//);

		$criteria->compare('student_transaction_id',$this->student_transaction_id);
		$criteria->compare('student_transaction_detain_student_flag',$this->student_transaction_detain_student_flag);
		$criteria->compare('student_transaction_user_id',$this->student_transaction_user_id);
		$criteria->compare('student_transaction_student_id',$this->student_transaction_student_id);
		$criteria->compare('student_transaction_branch_id',$this->student_transaction_branch_id,true);
		$criteria->compare('student_transaction_category_id',$this->student_transaction_category_id);
		$criteria->compare('student_transaction_organization_id',$this->student_transaction_organization_id);
		$criteria->compare('student_transaction_student_address_id',$this->student_transaction_student_address_id);
		$criteria->compare('student_transaction_nationality_id',$this->student_transaction_nationality_id);
		$criteria->compare('student_transaction_quota_id',$this->student_transaction_quota_id);
		$criteria->compare('student_transaction_religion_id',$this->student_transaction_religion_id);
		$criteria->compare('student_transaction_shift_id',$this->student_transaction_shift_id);
		$criteria->compare('student_transaction_languages_known_id',$this->student_transaction_languages_known_id);
		$criteria->compare('student_transaction_student_photos_id',$this->student_transaction_student_photos_id);
		$criteria->compare('student_transaction_division_id',$this->student_transaction_division_id);
		$criteria->compare('student_transaction_batch_id',$this->student_transaction_batch_id);
		$criteria->compare('student_academic_term_period_tran_id',$this->student_academic_term_period_tran_id);

		$criteria->compare('student_academic_term_name_id',$this->student_academic_term_name_id);

		$criteria->compare('Rel_user.user_organization_email_id',$this->user_organization_email_id,true);
		//$criteria->compare('Rel_Branch.branch_name',$this->branch_name,true);
		$criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
		$criteria->compare('Rel_Stud_Info.student_living_status',$this->student_living_status,true);
		$criteria->compare('Rel_Stud_Info.student_enroll_no',$this->student_enroll_no,true);
		$criteria->compare('Rel_Stud_Info.student_roll_no',$this->student_roll_no,true);
		$criteria->compare('Rel_Stud_Info.student_middle_name',$this->student_middle_name,true);
		$criteria->compare('Rel_Stud_Info.student_last_name',$this->student_last_name,true);
		$criteria->compare('Rel_Stud_Info.student_dtod_regular_status',$this->student_dtod_regular_status,true);
		
		$criteria->compare('Rel_Division.division_name',$this->division_name,true);
		//$criteria->compare('Rel_Quota.quota_name',$this->quota_name,true);
		//$criteria->compare('Rel_student_academic_terms_period_name.academic_term_period',$this->academic_term_period,true);
		//$criteria->compare('Rel_student_academic_terms_name.academic_term_name',$this->academic_term_name,true);
		$criteria->compare('Rel_Status.status_name',$this->status_name,true);
		$criteria->compare('Rel_Stud_Info.student_mobile_no',$this->student_mobile_no,true);
		$criteria->compare('Rel_Stud_Info.student_email_id_1',$this->student_email_id_1,true);

		$stud_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'student_transaction_id DESC',
				),
			));
		
		$_SESSION['Student_records']=$stud_data;
		return $stud_data;
	} 
	public function smssearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$acdm_terms = AcademicTerm::model()->findAll('current_sem=1 and academic_term_organization_id='.Yii::app()->user->getState('org_id'));
		//print_r($acdm_terms);exit;
		$data = array();
		foreach($acdm_terms as $list)
		{
			$data[] = $list['academic_term_id'];
		}
		//$a = array('3', '13', '24', '53', '69');
		//print_r($data);exit;
		$criteria=new CDbCriteria;

		$criteria->with = array('Rel_Stud_Info','Rel_Status', 'Rel_Division','Rel_language','Rel_user');

		//$criteria->condition = 'student_transaction_organization_id = :student_transaction_org_id';

	      //  $criteria->params = array(':student_transaction_org_id' => Yii::app()->user->getState('org_id'));

		

		$criteria->addInCondition('student_academic_term_name_id', $data, 'OR');
		$criteria->addNotInCondition('student_transaction_detain_student_flag', array('1','2'));
		//$criteria->condition ="student_transaction_organization_id = :student_transaction_org_id && student_transaction_detain_student_flag <> :student_transaction_detain_student_flag";
		//$criteria->params = array (
		//':student_transaction_org_id' => Yii::app()->user->getState('org_id'),
		//':student_transaction_detain_student_flag'=>3,	
		//);

		$criteria->compare('student_transaction_id',$this->student_transaction_id);
		$criteria->compare('student_transaction_detain_student_flag',$this->student_transaction_detain_student_flag);
		$criteria->compare('student_transaction_user_id',$this->student_transaction_user_id);
		$criteria->compare('student_transaction_student_id',$this->student_transaction_student_id);
		$criteria->compare('student_transaction_branch_id',$this->student_transaction_branch_id,true);
		$criteria->compare('student_transaction_category_id',$this->student_transaction_category_id);
		$criteria->compare('student_transaction_organization_id',$this->student_transaction_organization_id);
		$criteria->compare('student_transaction_student_address_id',$this->student_transaction_student_address_id);
		$criteria->compare('student_transaction_nationality_id',$this->student_transaction_nationality_id);
		$criteria->compare('student_transaction_quota_id',$this->student_transaction_quota_id);
		$criteria->compare('student_transaction_religion_id',$this->student_transaction_religion_id);
		$criteria->compare('student_transaction_shift_id',$this->student_transaction_shift_id);
		$criteria->compare('student_transaction_languages_known_id',$this->student_transaction_languages_known_id);
		$criteria->compare('student_transaction_student_photos_id',$this->student_transaction_student_photos_id);
		$criteria->compare('student_transaction_division_id',$this->student_transaction_division_id);
		$criteria->compare('student_transaction_batch_id',$this->student_transaction_batch_id);
		$criteria->compare('student_academic_term_period_tran_id',$this->student_academic_term_period_tran_id);

		$criteria->compare('student_academic_term_name_id',$this->student_academic_term_name_id);

		$criteria->compare('Rel_user.user_organization_email_id',$this->user_organization_email_id,true);
		//$criteria->compare('Rel_Branch.branch_name',$this->branch_name,true);
		$criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
		$criteria->compare('Rel_Stud_Info.student_living_status',$this->student_living_status,true);
		$criteria->compare('Rel_Stud_Info.student_enroll_no',$this->student_enroll_no,true);
		$criteria->compare('Rel_Stud_Info.student_roll_no',$this->student_roll_no,true);
		$criteria->compare('Rel_Stud_Info.student_middle_name',$this->student_middle_name,true);
		$criteria->compare('Rel_Stud_Info.student_last_name',$this->student_last_name,true);
		$criteria->compare('Rel_Stud_Info.student_dtod_regular_status',$this->student_dtod_regular_status,true);
		
		$criteria->compare('Rel_Division.division_name',$this->division_name,true);
		//$criteria->compare('Rel_Quota.quota_name',$this->quota_name,true);
		//$criteria->compare('Rel_student_academic_terms_period_name.academic_term_period',$this->academic_term_period,true);
		//$criteria->compare('Rel_student_academic_terms_name.academic_term_name',$this->academic_term_name,true);
		$criteria->compare('Rel_Status.status_name',$this->status_name,true);
		$criteria->compare('Rel_Stud_Info.student_mobile_no',$this->student_mobile_no,true);
		$criteria->compare('Rel_Stud_Info.student_email_id_1',$this->student_email_id_1,true);

		$stud_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'Rel_Stud_Info.student_first_name ASC',
				),
			));
		
		return $stud_data;
	} 

	
	public function leftStudentSearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with = array('Rel_Branch', 'Rel_Status' ,'Rel_Stud_Info', 'Rel_Division', 'Rel_Quota', 'Rel_student_academic_terms_period_name', 'Rel_student_academic_terms_name','Rel_language','Rel_user');


		$criteria->condition ="student_transaction_organization_id = :student_transaction_org_id && (student_transaction_detain_student_flag = :student_transaction_detain_student_flag   || student_transaction_detain_student_flag = :rejoin_student)";

		$criteria->params = array (
		':student_transaction_org_id' => Yii::app()->user->getState('org_id'),
		':student_transaction_detain_student_flag'=>5,
		':rejoin_student'=>6,
		
		);
		$criteria->compare('student_transaction_id',$this->student_transaction_id);
		$criteria->compare('student_transaction_detain_student_flag',$this->student_transaction_detain_student_flag);
		$criteria->compare('student_transaction_user_id',$this->student_transaction_user_id);
		$criteria->compare('student_transaction_student_id',$this->student_transaction_student_id);
		$criteria->compare('student_transaction_branch_id',$this->student_transaction_branch_id);
		$criteria->compare('student_transaction_category_id',$this->student_transaction_category_id);
		$criteria->compare('student_transaction_organization_id',$this->student_transaction_organization_id);
		$criteria->compare('student_transaction_student_address_id',$this->student_transaction_student_address_id);
		$criteria->compare('student_transaction_nationality_id',$this->student_transaction_nationality_id);
		$criteria->compare('student_transaction_quota_id',$this->student_transaction_quota_id);
		$criteria->compare('student_transaction_religion_id',$this->student_transaction_religion_id);
		$criteria->compare('student_transaction_shift_id',$this->student_transaction_shift_id);
		$criteria->compare('student_transaction_languages_known_id',$this->student_transaction_languages_known_id);
		$criteria->compare('student_transaction_student_photos_id',$this->student_transaction_student_photos_id);
		$criteria->compare('student_transaction_division_id',$this->student_transaction_division_id);
		$criteria->compare('student_transaction_batch_id',$this->student_transaction_batch_id);
		$criteria->compare('student_academic_term_period_tran_id',$this->student_academic_term_period_tran_id);

		$criteria->compare('student_academic_term_name_id',$this->student_academic_term_name_id);

		$criteria->compare('Rel_user.user_organization_email_id',$this->user_organization_email_id,true);
		$criteria->compare('Rel_Branch.branch_name',$this->branch_name,true);
		$criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
		$criteria->compare('Rel_Stud_Info.student_enroll_no',$this->student_enroll_no,true);
		$criteria->compare('Rel_Stud_Info.student_roll_no',$this->student_roll_no,true);
		$criteria->compare('Rel_Stud_Info.student_middle_name',$this->student_middle_name,true);
		$criteria->compare('Rel_Stud_Info.student_last_name',$this->student_last_name,true);
		
		$criteria->compare('Rel_Division.division_name',$this->division_name,true);
		$criteria->compare('Rel_Quota.quota_name',$this->quota_name,true);
		$criteria->compare('Rel_student_academic_terms_period_name.academic_term_period',$this->academic_term_period,true);
		$criteria->compare('Rel_student_academic_terms_name.academic_term_name',$this->academic_term_name,true);
		$criteria->compare('Rel_Status.status_name',$this->status_name,true);

		$left = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'student_transaction_id DESC',
				),
		));
		 $_SESSION['left'] = $left;
		return $left;
	}
		
	public function findcity($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$name = City::model()->findByPk($id);
		return $name->city_name;
		
	}
	public function findcountry($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$name = Country::model()->findByPk($id);
		return $name->name;
		
	}

	public function findstate($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$name = State::model()->findByPk($id);
		return $name->state_name;
		
	}
	public function beforeDelete()
	{
		$id = $this->student_transaction_id;
		$fees_check = FeesPaymentTransaction::model()->findAll(array('condition'=>'fees_student_id='.$id));
		$att_check = Attendence::model()->findAll(array('condition'=>'st_id='.$id));
		$mis_fees = MiscellaneousFeesPaymentTransaction::model()->findAll(array('condition'=>'student_fees_id='.$id));
		$left_check = LeftDetainedPassStudentTable::model()->findAll(array('condition'=>'student_id='.$id));
		$st_archive = StudentArchiveTable::model()->findAll(array('condition'=>'student_archive_stud_tran_id='.$id));

		if(!empty($fees_check) || !empty($att_check) || !empty($mis_fees) || !empty($left_check) || !empty($st_archive))
		{
			Yii::app()->user->setFlash('error',"You can not delete this record because it is used in another table.");
			return false;
		}	
        	else
		{				
			Yii::app()->user->setFlash('success',"Deleted Sucessfully");
			return true;
		}


    	}
	public function newsearch($branch_id,$cat_id,$acdm_period,$sem)
	{
		
		$criteria=new CDbCriteria;
		$criteria->compare('student_transaction_id',$this->student_transaction_id);
		$criteria->compare('student_first_name',$this->student_first_name,true);
		$criteria->select = 'student_transaction_id,student_roll_no,student_enroll_no,student_first_name,student_docs.title,student_docs_submit_date,student_docs_desc,student_docs_path,doc_category_id';
		$criteria->alias = 'st';
		$criteria->join='INNER JOIN student_docs_trans  ON student_docs_trans.student_docs_trans_user_id =st.student_transaction_id INNER JOIN student_info ON student_info.student_id =st.student_transaction_student_id INNER JOIN student_docs ON student_docs.student_docs_id = student_docs_trans.student_docs_trans_stud_docs_id';



		$criteria->condition ="st.student_transaction_branch_id =".$branch_id." AND st.student_academic_term_period_tran_id=".$acdm_period." AND st.student_academic_term_name_id=".$sem." AND student_docs.doc_category_id=".$cat_id;

		$stu_data =  new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'student_transaction_id DESC',
				),
		));

		return $stu_data;
	}
	public function hostelsearch()
	{
		$criteria=new CDbCriteria;

		$criteria->with = array('Rel_Branch', 'Rel_Status' ,'Rel_Stud_Info', 'Rel_Division', 'Rel_Quota', 'Rel_student_academic_terms_period_name', 'Rel_student_academic_terms_name','Rel_language','Rel_user');		

		$criteria->condition ="student_transaction_organization_id = :student_transaction_org_id && student_transaction_detain_student_flag <> :student_transaction_detain_student_flag && Rel_Stud_Info.student_living_status = :student_living_status";
		$criteria->params = array (
		':student_transaction_org_id' => Yii::app()->user->getState('org_id'),
		':student_transaction_detain_student_flag'=>1,	
		':student_living_status'=>'HOME',
		);

		$criteria->compare('student_transaction_id',$this->student_transaction_id);
		$criteria->compare('student_transaction_detain_student_flag',$this->student_transaction_detain_student_flag);
		$criteria->compare('student_transaction_user_id',$this->student_transaction_user_id);
		$criteria->compare('student_transaction_student_id',$this->student_transaction_student_id);
		$criteria->compare('student_transaction_branch_id',$this->student_transaction_branch_id);
		$criteria->compare('student_transaction_category_id',$this->student_transaction_category_id);
		$criteria->compare('student_transaction_organization_id',$this->student_transaction_organization_id);
		$criteria->compare('student_transaction_student_address_id',$this->student_transaction_student_address_id);
		$criteria->compare('student_transaction_nationality_id',$this->student_transaction_nationality_id);
		$criteria->compare('student_transaction_quota_id',$this->student_transaction_quota_id);
		$criteria->compare('student_transaction_religion_id',$this->student_transaction_religion_id);
		$criteria->compare('student_transaction_shift_id',$this->student_transaction_shift_id);
		$criteria->compare('student_transaction_languages_known_id',$this->student_transaction_languages_known_id);
		$criteria->compare('student_transaction_student_photos_id',$this->student_transaction_student_photos_id);
		$criteria->compare('student_transaction_division_id',$this->student_transaction_division_id);
		$criteria->compare('student_transaction_batch_id',$this->student_transaction_batch_id);
		$criteria->compare('student_academic_term_period_tran_id',$this->student_academic_term_period_tran_id);

		$criteria->compare('student_academic_term_name_id',$this->student_academic_term_name_id);

		$criteria->compare('Rel_user.user_organization_email_id',$this->user_organization_email_id,true);
		$criteria->compare('Rel_Branch.branch_name',$this->branch_name,true);
		$criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
		$criteria->compare('Rel_Stud_Info.student_living_status',$this->student_living_status,true);
		$criteria->compare('Rel_Stud_Info.student_enroll_no',$this->student_enroll_no,true);
		$criteria->compare('Rel_Stud_Info.student_roll_no',$this->student_roll_no,true);
		$criteria->compare('Rel_Stud_Info.student_middle_name',$this->student_middle_name,true);
		$criteria->compare('Rel_Stud_Info.student_last_name',$this->student_last_name,true);
		$criteria->compare('Rel_Stud_Info.student_dtod_regular_status',$this->student_dtod_regular_status,true);
		
		$criteria->compare('Rel_Division.division_name',$this->division_name,true);
		$criteria->compare('Rel_Quota.quota_name',$this->quota_name,true);
		$criteria->compare('Rel_student_academic_terms_period_name.academic_term_period',$this->academic_term_period,true);
		$criteria->compare('Rel_student_academic_terms_name.academic_term_name',$this->academic_term_name,true);
		$criteria->compare('Rel_Status.status_name',$this->status_name,true);

		$stud_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'student_transaction_id DESC',
				),
		));
		$_SESSION['Student_records']=$stud_data;
		return $stud_data;
	} 
	public function transportsearch()
    {
        $criteria=new CDbCriteria;

        $criteria->with = array('Rel_Branch', 'Rel_Status' ,'Rel_Stud_Info', 'Rel_Division', 'Rel_Quota', 'Rel_student_academic_terms_period_name', 'Rel_student_academic_terms_name','Rel_language','Rel_user');       

        $transportregisterstudent = TransportStudentRegistration::model()->findAll('organization_id='.Yii::app()->user->getState('org_id'));

        $data = array();
        foreach($transportregisterstudent as $list)
        {
            $data[] = $list['transport_student_transaction_id'];
        }
       
        $criteria->condition ="student_transaction_organization_id = :student_transaction_org_id && student_transaction_detain_student_flag <> :student_transaction_detain_student_flag";
        $criteria->params = array (
        ':student_transaction_org_id' => Yii::app()->user->getState('org_id'),
        ':student_transaction_detain_student_flag'=>1,   
        );
   
        $criteria->addNotInCondition('student_transaction_id',$data);       
        $criteria->compare('student_transaction_id',$this->student_transaction_id);
        $criteria->compare('student_transaction_detain_student_flag',$this->student_transaction_detain_student_flag);
        $criteria->compare('student_transaction_user_id',$this->student_transaction_user_id);
        $criteria->compare('student_transaction_student_id',$this->student_transaction_student_id);
        $criteria->compare('student_transaction_branch_id',$this->student_transaction_branch_id);
        $criteria->compare('student_transaction_category_id',$this->student_transaction_category_id);
        $criteria->compare('student_transaction_organization_id',$this->student_transaction_organization_id);
        $criteria->compare('student_transaction_student_address_id',$this->student_transaction_student_address_id);
        $criteria->compare('student_transaction_nationality_id',$this->student_transaction_nationality_id);
        $criteria->compare('student_transaction_quota_id',$this->student_transaction_quota_id);
        $criteria->compare('student_transaction_religion_id',$this->student_transaction_religion_id);
        $criteria->compare('student_transaction_shift_id',$this->student_transaction_shift_id);
        $criteria->compare('student_transaction_languages_known_id',$this->student_transaction_languages_known_id);
        $criteria->compare('student_transaction_student_photos_id',$this->student_transaction_student_photos_id);
        $criteria->compare('student_transaction_division_id',$this->student_transaction_division_id);
        $criteria->compare('student_transaction_batch_id',$this->student_transaction_batch_id);
        $criteria->compare('student_academic_term_period_tran_id',$this->student_academic_term_period_tran_id);

        $criteria->compare('student_academic_term_name_id',$this->student_academic_term_name_id);

        $criteria->compare('Rel_user.user_organization_email_id',$this->user_organization_email_id,true);
        $criteria->compare('Rel_Branch.branch_name',$this->branch_name,true);
        $criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
        $criteria->compare('Rel_Stud_Info.student_living_status',$this->student_living_status,true);
        $criteria->compare('Rel_Stud_Info.student_enroll_no',$this->student_enroll_no,true);
        $criteria->compare('Rel_Stud_Info.student_roll_no',$this->student_roll_no,true);
        $criteria->compare('Rel_Stud_Info.student_middle_name',$this->student_middle_name,true);
        $criteria->compare('Rel_Stud_Info.student_last_name',$this->student_last_name,true);
        $criteria->compare('Rel_Stud_Info.student_dtod_regular_status',$this->student_dtod_regular_status,true);
       
        $criteria->compare('Rel_Division.division_name',$this->division_name,true);
        $criteria->compare('Rel_Quota.quota_name',$this->quota_name,true);
        $criteria->compare('Rel_student_academic_terms_period_name.academic_term_period',$this->academic_term_period,true);
        $criteria->compare('Rel_student_academic_terms_name.academic_term_name',$this->academic_term_name,true);
        $criteria->compare('Rel_Status.status_name',$this->status_name,true);

        $transportstud_data = new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>array(
            'defaultOrder'=>'student_transaction_id DESC',
                ),
        ));
        $_SESSION['transportStudent_records']=$transportstud_data;
        return $transportstud_data;
    }
}
