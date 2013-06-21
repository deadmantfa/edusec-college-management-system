
<?php
/**
 * This is the model class for table "employee_info".
 *
 * The followings are the available columns in table 'employee_info':
 * @property integer $employee_id
 * @property string $title
 * @property string $employee_no
 * @property string $employee_first_name
 * @property string $employee_middle_name
 * @property string $employee_last_name
 * @property string $employee_name_alias
 * @property string $employee_dob
 * @property string $employee_birthplace
 * @property string $employee_gender
 * @property string $employee_type
 * @property string $employee_bloodgroup
 * @property string $employee_marital_status
 * @property string $employee_private_email
 * @property integer $employee_organization_mobile
 * @property integer $employee_private_mobile
 * @property string $employee_pancard_no
 * @property integer $employee_account_no
 * @property string $employee_joining_date
 * @property string $employee_probation_period
 * @property string $employee_hobbies
 * @property string $employee_technical_skills
 * @property string $employee_project_details
 * @property string $employee_curricular
 * @property string $employee_reference
 * @property string $employee_refer_designation
 * @property string $employee_guardian_name
 * @property string $employee_guardian_relation
 * @property string $employee_guardian_home_address
 * @property string $employee_guardian_qualification
 * @property string $employee_guardian_occupation
 * @property string $employee_guardian_income
 * @property string $employee_guardian_occupation_address
 * @property integer $employee_guardian_occupation_city
 * @property integer $employee_guardian_city_pin
 * @property integer $employee_guardian_phone_no
 * @property integer $employee_guardian_mobile1
 * @property integer $employee_guardian_mobile2
 * @property string $employee_faculty_of
 * @property string $employee_attendance_card_id
 * @property string $employee_tally_id
 * @property integer $employee_created_by
 * @property string $employee_creation_date
* @property string $employee_type
* @property string $employee_transaction_id
 *
 * The followings are the available model relations:
 * @property EmployeeTransaction[] $employeeTransactions
 */
class EmployeeInfo extends CActiveRecord
{

	const TYPE_MALE='MALE';
	const TYPE_FEMALE='FEMALE';
	const TYPE_APLUS='A+';
	const TYPE_AMINUS='A-';
	const TYPE_BPLUS='B+';
	const TYPE_BMINUS='B-';
	const TYPE_ABPLUS='AB+';
	const TYPE_ABMINUS='AB-';
	const TYPE_OPLUS='O+';
	const TYPE_OMINUS='O-';
	const TYPE_NPLUS='N+';
	const TYPE_MARRIED='MARRIED';
	const TYPE_UNMARRIED='UNMARRIED';
	const TYPE_MR='Mr.';
	const TYPE_MRS='Mrs.'; 
	const TYPE_MISS='Ms.';
	const TYPE_PROF='Prof.';


	/**
	 * Returns the static model of the specified AR class.
	 * @return EmployeeInfo the static model class
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
		return 'employee_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('title, employee_first_name,employee_middle_name, employee_last_name,employee_type, employee_private_mobile, employee_joining_date, employee_name_alias, employee_private_email, employee_attendance_card_id', 'required','message'=>''),

			array('employee_guardian_income,employee_aicte_id,employee_gtu_id, employee_guardian_city_pin, employee_guardian_phone_no, employee_guardian_mobile1, employee_guardian_mobile2,employee_organization_mobile,employee_private_mobile,employee_organization_mobile, employee_private_mobile, employee_account_no, employee_guardian_occupation_city, employee_guardian_city_pin, employee_guardian_phone_no, employee_guardian_mobile1, employee_guardian_mobile2, employee_created_by','numerical', 'integerOnly'=>true ,'message'=>''),

			
			
                        array('employee_mother_name, employee_first_name, employee_middle_name, employee_last_name, employee_name_alias', 'CRegularExpressionValidator', 'pattern'=>'/^([A-Za-z]+)$/','message'=>''),

                        array('employee_guardian_relation,employee_guardian_name, employee_guardian_occupation, employee_birthplace, employee_refer_designation, employee_reference', 'CRegularExpressionValidator', 'pattern'=>'/^([A-Za-z ]+)$/','message'=>''),
			

			array('employee_private_email','unique', 'message'=>'email id must be unique'),

			array('employee_attendance_card_id','chkunique'),

			
			array('employee_no, employee_marital_status, employee_probation_period', 'length', 'max'=>10),

			array('employee_no,employee_probation_period','CRegularExpressionValidator','pattern'=>'/^([A-Za-z0-9 ]+)$/','message'=>''),
			
			
			array('employee_name_alias, employee_first_name, employee_middle_name, employee_last_name, employee_birthplace, employee_reference', 'length', 'max'=>25),
			array('employee_hobbies, employee_technical_skills, employee_project_details, employee_curricular', 'length', 'max'=>200, 'message'=>''),
			array('employee_gender', 'length', 'max'=>6),
			array('employee_bloodgroup', 'length', 'max'=>3),
		
			array('employee_private_email','CRegularExpressionValidator','pattern'=>'/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]+)$/','message'=>''),
			array('employee_private_email', 'length', 'max'=>60, 'message'=>''),
			array('employee_guardian_city_pin', 'length', 'max'=>8),
			array('employee_account_no', 'length', 'max'=>20),
			array('employee_organization_mobile,employee_private_mobile,employee_guardian_mobile1, employee_guardian_mobile2','CRegularExpressionValidator','pattern'=>'/^([0-9]+)$/','message'=>''),
			array('employee_pancard_no','CRegularExpressionValidator','pattern'=>'/^([0-9A-za-z]+)$/','message'=>''),
			array('employee_attendance_card_id','CRegularExpressionValidator','pattern'=>'/^([0-9]+)$/','message'=>''),
			array('employee_hobbies','CRegularExpressionValidator','pattern'=>'/^([a-zA-z,]+)$/','message'=>''),
			
			array('employee_aicte_id,employee_gtu_id','CRegularExpressionValidator','pattern'=>'/^([0-9]+)$/','message'=>''),
			array('employee_aicte_id,employee_gtu_id','length', 'max'=>5,'message'=>''),
			array('employee_organization_mobile,employee_private_mobile,employee_guardian_mobile1, employee_guardian_mobile2','length', 'max'=>15, 'min'=>10),
			array('employee_guardian_phone_no, employee_guardian_mobile1, employee_guardian_mobile2, employee_pancard_no', 'length', 'max'=>15),
			array('employee_refer_designation, employee_guardian_relation', 'length', 'max'=>20),
			array('employee_guardian_home_address, employee_guardian_occupation_address, employee_guardian_name', 'length', 'max'=>100),
			array('employee_guardian_qualification, employee_guardian_occupation, employee_faculty_of', 'length', 'max'=>50),
			array('employee_guardian_qualification','CRegularExpressionValidator','pattern'=>'/^[a-zA-Z\/]+([.][a-zA-Z\/]+)*$/','message'=>''),
			array('employee_guardian_income', 'length', 'max'=>15),
			array('employee_attendance_card_id', 'length', 'max'=>10, 'message'=>'CardId should be less than 5 character.'),
			array('employee_tally_id', 'length', 'max'=>9),

			array('employee_joining_date','chkjoindate'),
			array('employee_dob','chkbdate'),
			// Please remove those attributes that should not be searched.
			array('employee_id, employee_no, employee_first_name, employee_middle_name, employee_last_name, employee_name_alias, employee_mother_name, employee_dob, employee_birthplace, employee_gender, employee_bloodgroup, employee_marital_status, employee_private_email, employee_organization_mobile, employee_private_mobile, employee_pancard_no, employee_account_no, employee_joining_date, employee_probation_period, employee_hobbies, employee_technical_skills, employee_project_details, employee_curricular, employee_reference, employee_refer_designation, employee_guardian_name, employee_guardian_relation, employee_guardian_home_address, employee_guardian_qualification, employee_guardian_occupation, employee_guardian_income, employee_guardian_occupation_address, employee_guardian_occupation_city, employee_guardian_city_pin, employee_guardian_phone_no, employee_guardian_mobile1, employee_guardian_mobile2, employee_faculty_of, employee_attendance_card_id, employee_tally_id, employee_created_by,employee_aicte_id,employee_gtu_id, employee_creation_date,employee_type', 'safe', 'on'=>'search'),
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
			'Rel_g_city'=>array(self::BELONGS_TO, 'City', 'employee_guardian_occupation_city'),
//			'employeeTransactions' => array(self::HAS_MANY, 'EmployeeTransaction', 'employee_transaction_employee_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employee_id' => 'Id',
			'title' => 'Title',
			'employee_no' => 'Employee No',
			'employee_first_name' => 'Name',
			'employee_middle_name' => 'Husband/Father Name',
			'employee_last_name' => 'Surname',
			'employee_name_alias' => 'Name Alias',
			'employee_mother_name' => 'Mother Name',
			'employee_dob' => 'Date of Birth',
			'employee_birthplace' => 'Birth Place',
			'employee_gender' => 'Gender',
			'employee_type'=>'Type',
			'employee_bloodgroup' => 'Blood Group',
			'employee_marital_status' => 'Marital Status',
			'employee_private_email' => 'Private Email',
			'employee_organization_mobile' => 'Organization Mobile',
			'employee_private_mobile' => 'Private Mobile No.',
			'employee_pancard_no' => 'Pancard No',
			'employee_account_no' => 'Bank Account No',
			'employee_joining_date' => 'Joining Date',
			'employee_probation_period' => 'Probation Period',
			'employee_hobbies' => 'Hobbies',
			'employee_technical_skills' => 'Technical Skills',
			'employee_project_details' => 'Project Details',
			'employee_curricular' => 'Curricular',
			'employee_reference' => 'Reference',
			'employee_refer_designation' => 'Reference Designation',
			'employee_guardian_name' => 'Name',
			'employee_guardian_relation' => 'Relation',
			'employee_guardian_home_address' => 'Home Address',
			'employee_guardian_qualification' => 'Qualification',
			'employee_guardian_occupation' => 'Occupation',
			'employee_guardian_income' => 'Income',
			'employee_guardian_occupation_address' => 'Occupation Address',
			'employee_guardian_occupation_city' => 'Occupation City',
			'employee_guardian_city_pin' => 'City Pin Code',
			'employee_guardian_phone_no' => 'Phone No',
			'employee_guardian_mobile1' => 'Mobile No 1',
			'employee_guardian_mobile2' => 'Mobile No 2',
			'employee_faculty_of' => 'Course Name',
			'employee_attendance_card_id' => 'Attendance Card',
			'employee_tally_id' => 'Tally',
			'employee_created_by' => 'Created By',
			'employee_creation_date' => 'Creation Date',
			'employee_aicte_id' => 'AICTE ID',
			'employee_gtu_id' => 'GTU ID',
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

		$criteria->compare('employee_id',$this->employee_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('employee_no',$this->employee_no,true);
		$criteria->compare('employee_first_name',$this->employee_first_name,true);
		$criteria->compare('employee_middle_name',$this->employee_middle_name,true);
		$criteria->compare('employee_last_name',$this->employee_last_name,true);
		$criteria->compare('employee_name_alias',$this->employee_name_alias,true);
		$criteria->compare('employee_mother_name',$this->employee_mother_name,true);
		$criteria->compare('employee_dob',$this->employee_dob,true);
		$criteria->compare('employee_birthplace',$this->employee_birthplace,true);
		$criteria->compare('employee_gender',$this->employee_gender,true);
		$criteria->compare('employee_bloodgroup',$this->employee_bloodgroup,true);
		$criteria->compare('employee_marital_status',$this->employee_marital_status,true);
		$criteria->compare('employee_private_email',$this->employee_private_email,true);
		$criteria->compare('employee_organization_mobile',$this->employee_organization_mobile);
		$criteria->compare('employee_private_mobile',$this->employee_private_mobile);
		$criteria->compare('employee_pancard_no',$this->employee_pancard_no,true);
		$criteria->compare('employee_account_no',$this->employee_account_no);
		$criteria->compare('employee_joining_date',$this->employee_joining_date,true);
		$criteria->compare('employee_probation_period',$this->employee_probation_period,true);
		$criteria->compare('employee_hobbies',$this->employee_hobbies,true);
		$criteria->compare('employee_technical_skills',$this->employee_technical_skills,true);
		$criteria->compare('employee_project_details',$this->employee_project_details,true);
		$criteria->compare('employee_curricular',$this->employee_curricular,true);
		$criteria->compare('employee_reference',$this->employee_reference,true);
		$criteria->compare('employee_refer_designation',$this->employee_refer_designation,true);
		$criteria->compare('employee_guardian_name',$this->employee_guardian_name,true);
		$criteria->compare('employee_guardian_relation',$this->employee_guardian_relation,true);
		$criteria->compare('employee_guardian_home_address',$this->employee_guardian_home_address,true);
		$criteria->compare('employee_guardian_qualification',$this->employee_guardian_qualification,true);
		$criteria->compare('employee_guardian_occupation',$this->employee_guardian_occupation,true);
		$criteria->compare('employee_guardian_income',$this->employee_guardian_income,true);
		$criteria->compare('employee_guardian_occupation_address',$this->employee_guardian_occupation_address,true);
		$criteria->compare('employee_guardian_occupation_city',$this->employee_guardian_occupation_city);
		$criteria->compare('employee_guardian_city_pin',$this->employee_guardian_city_pin);
		$criteria->compare('employee_guardian_phone_no',$this->employee_guardian_phone_no);
		$criteria->compare('employee_guardian_mobile1',$this->employee_guardian_mobile1);
		$criteria->compare('employee_guardian_mobile2',$this->employee_guardian_mobile2);
		$criteria->compare('employee_faculty_of',$this->employee_faculty_of,true);
		$criteria->compare('employee_attendance_card_id',$this->employee_attendance_card_id,true);
		$criteria->compare('employee_tally_id',$this->employee_tally_id,true);
		$criteria->compare('employee_created_by',$this->employee_created_by);
		$criteria->compare('employee_creation_date',$this->employee_creation_date,true);
		$criteria->compare('employee_type',$this->employee_type,true);
		$criteria->compare('employee_aicte_id',$this->employee_aicte_id);
		$criteria->compare('employee_gtu_id',$this->employee_gtu_id);
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	public function getGenderOptions()
	{
		return array(
		self::TYPE_MALE=>'MALE',
		self::TYPE_FEMALE=>'FEMALE',
		);
	}

	public function getBloodGroup()
	{
		return array(
		self::TYPE_APLUS=>'A+',
		self::TYPE_AMINUS=>'A-',
		self::TYPE_BPLUS=>'B+',
		self::TYPE_BMINUS=>'B-',
		self::TYPE_ABPLUS=>'AB+',
		self::TYPE_ABMINUS=>'AB-',
		self::TYPE_OPLUS=>'O+',
		self::TYPE_OMINUS=>'O-',
		self::TYPE_NPLUS=>'N+',
		);
	}

	public function getMaritialStatus()
	{
		return array(
		self::TYPE_MARRIED=>'MARRIED',
		self::TYPE_UNMARRIED=>'UNMARRIED',
		);
	}
	
	public function getTitleOptions()
		{
			return array(
			self::TYPE_MR=>'Mr.',
			self::TYPE_MRS=>'Mrs.', 
			self::TYPE_MISS=>'Ms.',
			self::TYPE_PROF=>'Prof.',
			);
		}

	private static $_items=array();

        public static function items()
        {
            if(isset(self::$_items))
                self::loadItems();
            return self::$_items;
        }

	    public static function item($code)
	    {
		if(!isset(self::$_items))
		    self::loadItems();
		return isset(self::$_items[$code]) ? self::$_items[$code] : false;
	    }

	    private static function loadItems()
	    {
		self::$_items=array();
		$models=self::model()->findAll();
		foreach($models as $model)
		    self::$_items[$model->employee_id]=$model->employee_first_name;
	    }

	
    public function chkjoindate()
    {

			$curr_date = date('d-m-Y');

			if(strtotime($this->employee_joining_date) > strtotime($curr_date))
			{					
					$this->addError('employee_joining_date',"Joining date must be less than current date.");	
					 return false;	
			}
			else
					return true;
     }

    public function chkbdate()
    {
			if(empty($this->employee_joining_date)) {
				//$this->addError('employee_dob',"Select Joining date first");	
				return true;
			}
			else {
				
			$curr_date = date('d-m-Y');

			if(strtotime($this->employee_dob) > strtotime($this->employee_joining_date))
			{
				$this->addError('employee_dob',"Birthdate must be less than current date and Joining date.");	
					 return false;	
			}
			else
					return true;
			}
     }
   public function chkunique()
   {
		$cardid_length = strlen((string) $this->employee_attendance_card_id);
			
		$cardid = $this->employee_attendance_card_id;
		$digit = 0;
		$diff = 10-$cardid_length;
		for($i=1;$i<=$diff;$i++)
		{
			$cardid = $digit.$cardid;
		}
		if($this->isNewRecord)
		$empcardid = EmployeeInfo::model()->findAll('employee_attendance_card_id='.$cardid);
		
		else
		$empcardid = EmployeeInfo::model()->findAll('employee_attendance_card_id='.$cardid.' and employee_info_transaction_id<>'.$_REQUEST['id']);
		
		if($empcardid)
		{
			$this->addError('employee_attendance_card_id',"Employee IdCard must be unique.");	
			return false;	
		}
		else
			return true;
   }

}
