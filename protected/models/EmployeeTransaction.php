<?php

/**
 * This is the model class for table "employee_transaction".
 *
 * The followings are the available columns in table 'employee_transaction':
 * @property integer $employee_transaction_id
 * @property integer $employee_transaction_user_id
 * @property integer $employee_transaction_employee_id
 * @property integer $employee_transaction_emp_address_id
 * @property integer $employee_transaction_branch_id
 * @property integer $employee_transaction_category_id
 * @property integer $employee_transaction_quota_id
 * @property integer $employee_transaction_religion_id
 * @property integer $employee_transaction_shift_id
 * @property integer $employee_transaction_designation_id
 * @property integer $employee_transaction_nationality_id
 * @property integer $employee_transaction_department_id
 * @property integer $employee_transaction_organization_id
 * @property integer $employee_transaction_languages_known_id
 * @property integer $employee_transaction_emp_photos_id
 *
 * The followings are the available model relations:
 * @property EmployeeInfo $employeeTransactionEmployee
 * @property User $employeeTransactionUser
 */
class EmployeeTransaction extends CActiveRecord
{
	public $month,$csvfile,$check;
	public $std_code,$landline,$fax_phone,$applointment,$gross_per_month,$appointment_type,$faculty_type,$payscale,$programme,$course,$salary_mode,$pf_number,$doctrate_degree,$pg_degree,$ug_degree,$area_specialization,$other_qualification,$research_exp,$total_exp,$teaching_exp,$bank_name,$bank_branch_name,$ifsc_code,$national_publication,$patent,$no_pg_prj_guided,$no_dr_prj_guided,$international_publication,$no_of_books_pub,$Physical_hd,$minority_indicator,$fy_teacher,$fy_common_teacher,$fy_common_subject,$expert_mem_aicte,$basic_pay_rs,$aicte_grant_apply,$da,$hra_rs,$other_allowance_rs,$res_phone,$phd,$master_degree,$bachelor_degree,$diploma,$other,$salary_type,$level;
	

	public $cat,$category_name, $employee_docs_path, $branch_name, $employee_first_name, $department_name, $shift_type, $quota_name,$employee_type,$user_organization_email_id,$employee_no,$employee_attendance_card_id,$employee_designation_name,$document_category_namem,$doc_category_id,$employee_last_name;

	public $employee_docs_desc,$title,$employee_docs_submit_date,$employee_private_mobile,$employee_private_email;

	/**
	 * Returns the static model of the specified AR class.
	 * @return EmployeeTransaction the static model class
	 */
	

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'employee_transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_transaction_shift_id, employee_transaction_designation_id, employee_transaction_department_id', 'required','message'=>''),

			array('employee_transaction_user_id, employee_transaction_employee_id, employee_transaction_emp_address_id, employee_transaction_branch_id, employee_transaction_category_id, employee_transaction_religion_id, employee_transaction_shift_id, employee_transaction_designation_id, employee_transaction_nationality_id, employee_transaction_department_id, employee_transaction_organization_id, employee_transaction_languages_known_id, employee_transaction_emp_photos_id', 'numerical', 'integerOnly'=>true),


			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('employee_transaction_id, employee_transaction_user_id, employee_transaction_employee_id, employee_transaction_emp_address_id, employee_transaction_branch_id, employee_transaction_category_id, employee_transaction_religion_id, employee_transaction_shift_id, employee_transaction_designation_id, employee_transaction_nationality_id, employee_transaction_department_id, employee_transaction_organization_id, employee_transaction_languages_known_id, employee_transaction_emp_photos_id, category_name, branch_name, employee_first_name, department_name, quota_name,title, shift_type,employee_type,user_organization_email_id,employee_no,employee_private_mobile,employee_private_email,employee_attendance_card_id,employee_last_name,employee_designation_name,employee_docs_submit_date', 'safe', 'on'=>'search,smssearch'),
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
			'Rel_Emp_Info' => array(self::BELONGS_TO, 'EmployeeInfo', 'employee_transaction_employee_id'),
			'Rel_Lang' => array(self::BELONGS_TO, 'LanguagesKnown', 'employee_transaction_languages_known_id'),


			'Rel_Branch' => array(self::BELONGS_TO, 'Branch', 'employee_transaction_branch_id'),
			'Rel_Category' => array(self::BELONGS_TO, 'Category', 'employee_transaction_category_id'),
			'Rel_Type' => array(self::BELONGS_TO, 'EmployeeInfo', 'employee_type'),
			'Rel_Quota' => array(self::BELONGS_TO, 'Quota', 'employee_transaction_quota_id'),
			'Rel_Religion' => array(self::BELONGS_TO, 'Religion', 'employee_transaction_religion_id'),
			'Rel_Shift' => array(self::BELONGS_TO, 'Shift', 'employee_transaction_shift_id'),
			'Rel_Designation' => array(self::BELONGS_TO, 'EmployeeDesignation', 'employee_transaction_designation_id'),
			'Rel_Nationality' => array(self::BELONGS_TO, 'Nationality', 'employee_transaction_nationality_id'),
			'Rel_Department' => array(self::BELONGS_TO, 'Department', 'employee_transaction_department_id'),
			'Rel_Organization' => array(self::BELONGS_TO, 'Organization', 'employee_transaction_organization_id'),
			'Rel_Photo' => array(self::BELONGS_TO, 'EmployeePhotos', 'employee_transaction_emp_photos_id'),
			'Rel_user1' => array(self::BELONGS_TO, 'User', 'employee_transaction_user_id'),
			'Rel_Employee_Address' => array(self::BELONGS_TO, 'EmployeeAddress', 'employee_transaction_emp_address_id'),	
/***************************** TEST RELATION BY KARMRAJ *************************************/
			'docs_trans' => array(self::BELONGS_TO, 'EmployeeDocsTrans','', 'on'=>'employee_transaction_id = employee_docs_trans_user_id'),	
			'docs' => array(self::BELONGS_TO, 'EmployeeDocs','','on'=>'employee_docs_id= docs_trans.employee_docs_trans_emp_docs_id'),	

	
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employee_transaction_id' => 'Employee Transaction',
			'employee_transaction_user_id' => 'Employee Transaction User',
			'employee_transaction_employee_id' => 'Employee Transaction Employee',
			'employee_transaction_emp_address_id' => 'Employee Transaction Emp Address',
			'employee_transaction_branch_id' => 'Branch',
			'employee_transaction_category_id' => 'Category',
			//'employee_transaction_quota_id' => 'Quota',
			'employee_transaction_religion_id' => 'Religion',
			'employee_transaction_shift_id' => 'Shift',
			'employee_transaction_designation_id' => 'Designation',
			'employee_transaction_nationality_id' => 'Nationality',
			'employee_transaction_department_id' => 'Department',
			'employee_transaction_organization_id' => 'Organization',
			'employee_transaction_languages_known_id' => 'Languages Known',
			'employee_transaction_emp_photos_id' => 'Photos',
			'employee_no' => 'Employee No',
			'employee_first_name' => 'Employee First Name',
			'employee_middle_name' => 'Employee Middle Name',
			'employee_last_name' => 'Employee Last Name',
			'employee_name_alias' => 'Employee Name Alias',
			'employee_dob' => 'Employee Dob',
			'employee_birthplace' => 'Employee Birth Place',
			'employee_gender' => 'Employee Gender',
			'employee_bloodgroup' => 'Employee Blood Group',
			'employee_marital_status' => 'Employee Marital Status',
			'employee_private_email' => 'Employee Private Email',
			'employee_organization_mobile' => 'Employee Organization Mobile',
			'employee_private_mobile' => 'Employee Private Mobile',
			'employee_pancard_no' => 'Employee Pancard No',
			'employee_account_no' => 'Employee Account No',
			'employee_joining_date' => 'Employee Joining Date',
			'employee_probation_period' => 'Employee Probation Period',
			'employee_hobbies' => 'Employee Hobbies',
			'employee_technical_skills' => 'Employee Technical Skills',
			'employee_project_details' => 'Employee Project Details',
			'employee_curricular' => 'Employee Curricular',
			'employee_reference' => 'Employee Reference',
			'employee_refer_designation' => 'Employee Refer Designation',
			'employee_guardian_name' => 'Employee Guardian Name',
			'employee_guardian_relation' => 'Employee Guardian Relation',
			'employee_guardian_home_address' => 'Employee Guardian Home Address',
			'employee_guardian_qualification' => 'Employee Guardian Qualification',
			'employee_guardian_occupation' => 'Employee Guardian Occupation',
			'employee_guardian_income' => 'Employee Guardian Income',
			'employee_guardian_occupation_address' => 'Employee Guardian Occupation Address',
			'employee_guardian_occupation_city' => 'Employee Guardian Occupation City',
			'employee_guardian_city_pin' => 'Employee Guardian City Pin',
			'employee_guardian_phone_no' => 'Employee Guardian Phone No',
			'employee_guardian_mobile1' => 'Employee Guardian Mobile1',
			'employee_guardian_mobile2' => 'Employee Guardian Mobile2',
			'employee_faculty_of' => 'Employee Faculty Of',
			'employee_attendance_card_id' => 'Employee Attendance Card',
			'employee_tally_id' => 'Employee Tally',
			'employee_type' => 'Employee Type',
			'employee_attendence_card_id'=> 'Attendence card number',
			'employee_designation_name'=> 'Employee Designation', 
			
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

		$criteria=new CDbCriteria;

		$criteria->condition = 'employee_transaction_organization_id = :orgid';
	        $criteria->params = array(':orgid' => Yii::app()->user->getState('org_id'));  /// Note: Pass perameter to get recored related to perticular condition...
		
		$criteria->distinct = true;

		$criteria->with = array('Rel_Category'=>array(
						'select'=>'category_name'
					),'Rel_Branch' ,'Rel_Emp_Info','Rel_Quota', 'Rel_user1');
		
		$criteria->compare('employee_transaction_id',$this->employee_transaction_id);
		$criteria->compare('employee_transaction_user_id',$this->employee_transaction_user_id);
		$criteria->compare('employee_transaction_employee_id',$this->employee_transaction_employee_id);
		$criteria->compare('employee_transaction_emp_address_id',$this->employee_transaction_emp_address_id);
		$criteria->compare('employee_transaction_branch_id',$this->employee_transaction_branch_id);
		$criteria->compare('employee_transaction_category_id',$this->employee_transaction_category_id);
		//$criteria->compare('employee_transaction_quota_id',$this->employee_transaction_quota_id);
		$criteria->compare('employee_transaction_religion_id',$this->employee_transaction_religion_id);
		$criteria->compare('employee_transaction_shift_id',$this->employee_transaction_shift_id);
		$criteria->compare('employee_transaction_designation_id',$this->employee_transaction_designation_id);
		$criteria->compare('employee_transaction_nationality_id',$this->employee_transaction_nationality_id);
		$criteria->compare('employee_transaction_department_id',$this->employee_transaction_department_id);
		$criteria->compare('employee_transaction_organization_id',$this->employee_transaction_organization_id);
		$criteria->compare('employee_transaction_languages_known_id',$this->employee_transaction_languages_known_id);
		$criteria->compare('employee_transaction_emp_photos_id',$this->employee_transaction_emp_photos_id);


		$criteria->compare('Rel_Category.category_name',$this->category_name,true);
		$criteria->compare('Rel_Branch.branch_name',$this->branch_name,true);
		$criteria->compare('Rel_Emp_Info.employee_first_name',$this->employee_first_name,true);
		$criteria->compare('Rel_Emp_Info.employee_last_name',$this->employee_last_name,true);
		$criteria->compare('Rel_user1.user_organization_email_id',$this->user_organization_email_id,true);
		//$criteria->compare('Rel_Department.department_name',$this->department_name,true);

		$criteria->compare('Rel_Emp_Info.employee_no',$this->employee_no,true);
		$criteria->compare('Rel_Emp_Info.employee_attendance_card_id',$this->employee_attendance_card_id,true);

		$criteria->compare('Rel_Quota.quota_name',$this->quota_name,true);
		//$criteria->compare('Rel_Shift.shift_type',$this->shift_type,true);
		$criteria->compare('Rel_Emp_Info.employee_type',$this->employee_type,true);
		//$criteria->compare('Rel_Designation.employee_designation_name',$this->employee_designation_name,true);
		$criteria->compare('Rel_Emp_Info.employee_private_mobile',$this->employee_private_mobile,true);
		$criteria->compare('Rel_Emp_Info.employee_private_email',$this->employee_private_email,true);

		$emp_data =  new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
					
			'sort'=>array(
				    'defaultOrder'=>'employee_transaction_id DESC',
				),
		));
		$_SESSION['employee_records']=$emp_data;
		return $emp_data;
	}
	
	public function newsearch($department_id,$category_id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

                /*$criteria=new CDbCriteria(array(
                        'select'=>'employee_transaction_id',
                        'with'=>array('docs_trans','docs'),
			'condition'=>'employee_transaction_department_id ='.$department_id.' AND docs.doc_category_id = '.$category_id,
			'together'=>false,

                        
                ));*/

		$criteria=new CDbCriteria;
		$criteria->compare('employee_transaction_id',$this->employee_transaction_id);
		$criteria->compare('employee_first_name',$this->employee_first_name,true);
		$criteria->select = 'employee_transaction_id,employee_first_name,employee_attendance_card_id,employee_docs.title,employee_docs_submit_date,employee_docs_path,employee_docs_desc,doc_category_id';
		$criteria->alias = 'et';
		$criteria->join='INNER JOIN employee_docs_trans ON employee_docs_trans.employee_docs_trans_user_id =et.employee_transaction_id INNER JOIN employee_info ON employee_info.employee_id =et.employee_transaction_employee_id INNER JOIN employee_docs ON employee_docs.employee_docs_id = employee_docs_trans.employee_docs_trans_emp_docs_id';

		$criteria->condition= 'et.employee_transaction_department_id ='.$department_id.' AND employee_docs.doc_category_id = '.$category_id;

		$emp_data =  new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'employee_transaction_id DESC',
				),
		));

		return $emp_data;
	}
	public function smssearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->condition = 'employee_transaction_organization_id = :orgid';
	        $criteria->params = array(':orgid' => Yii::app()->user->getState('org_id'));  /// Note: Pass perameter to get recored related to perticular condition...
		
		$criteria->distinct = true;

		$criteria->with = array('Rel_Category'=>array(
						'select'=>'category_name'
					),'Rel_Branch' ,'Rel_Emp_Info','Rel_Quota', 'Rel_user1');
		
		$criteria->compare('employee_transaction_id',$this->employee_transaction_id);
		$criteria->compare('employee_transaction_user_id',$this->employee_transaction_user_id);
		$criteria->compare('employee_transaction_employee_id',$this->employee_transaction_employee_id);
		$criteria->compare('employee_transaction_emp_address_id',$this->employee_transaction_emp_address_id);
		$criteria->compare('employee_transaction_branch_id',$this->employee_transaction_branch_id);
		$criteria->compare('employee_transaction_category_id',$this->employee_transaction_category_id);
		//$criteria->compare('employee_transaction_quota_id',$this->employee_transaction_quota_id);
		$criteria->compare('employee_transaction_religion_id',$this->employee_transaction_religion_id);
		$criteria->compare('employee_transaction_shift_id',$this->employee_transaction_shift_id);
		$criteria->compare('employee_transaction_designation_id',$this->employee_transaction_designation_id);
		$criteria->compare('employee_transaction_nationality_id',$this->employee_transaction_nationality_id);
		$criteria->compare('employee_transaction_department_id',$this->employee_transaction_department_id);
		$criteria->compare('employee_transaction_organization_id',$this->employee_transaction_organization_id);
		$criteria->compare('employee_transaction_languages_known_id',$this->employee_transaction_languages_known_id);
		$criteria->compare('employee_transaction_emp_photos_id',$this->employee_transaction_emp_photos_id);


		$criteria->compare('Rel_Category.category_name',$this->category_name,true);
		$criteria->compare('Rel_Branch.branch_name',$this->branch_name,true);
		$criteria->compare('Rel_Emp_Info.employee_first_name',$this->employee_first_name,true);
		$criteria->compare('Rel_Emp_Info.employee_last_name',$this->employee_last_name,true);
		$criteria->compare('Rel_user1.user_organization_email_id',$this->user_organization_email_id,true);
		//$criteria->compare('Rel_Department.department_name',$this->department_name,true);

		$criteria->compare('Rel_Emp_Info.employee_no',$this->employee_no,true);
		$criteria->compare('Rel_Emp_Info.employee_attendance_card_id',$this->employee_attendance_card_id,true);

		$criteria->compare('Rel_Quota.quota_name',$this->quota_name,true);
		//$criteria->compare('Rel_Shift.shift_type',$this->shift_type,true);
		$criteria->compare('Rel_Emp_Info.employee_type',$this->employee_type,true);
		//$criteria->compare('Rel_Designation.employee_designation_name',$this->employee_designation_name,true);
		$criteria->compare('Rel_Emp_Info.employee_private_mobile',$this->employee_private_mobile,true);
		$criteria->compare('Rel_Emp_Info.employee_private_email',$this->employee_private_email,true);

		$emp_data =  new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
					
			'sort'=>array(
				 'defaultOrder'=>'Rel_Emp_Info.employee_first_name ASC',
				),
		));
		$_SESSION['employee_records']=$emp_data;
		return $emp_data;
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
		$id = $this->employee_transaction_id;
		$emp_leave = EmployeeLeaveMaster::model()->findAll(array('condition'=>'empid='.$id));
		$att_check = Attendence::model()->findAll(array('condition'=>'employee_id='.$id));
		$emp_att = Employee_attendence::model()->findAll(array('condition'=>'employee_id='.$id));
		$emp_leave_app = EmployeeLeaveApplication::model()->findAll(array('condition'=>'employee_leave_application_employee_code='.$id.' OR employee_leave_application_approved_by_code='.$id.' OR employee_leave_application_approved_by_code_2='.$id));
		$emp_rep = EmployeeReportingTable::model()->findAll(array('condition'=>'emp_reporting_table_user_id='.$id.' OR emp_reporting_table_reporting_level_1='.$id.' OR emp_reporting_table_reporting_level_2='.$id));
		$emp_sal = EmployeeSalaryStructure::model()->findAll(array('condition'=>'employee_id='.$id));
		$ass_sub = AssignSubject::model()->findAll(array('condition'=>'subject_faculty_id='.$id));
		$time_table = TimeTableDetail::model()->findAll(array('condition'=>'faculty_emp_id='.$id));
		

		if(!empty($emp_leave) || !empty($att_check) || !empty($emp_att) || !empty($emp_leave_app) || !empty($emp_rep) || !empty($emp_sal) || !empty($ass_sub)|| !empty($time_table))
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
	
	
	

}
