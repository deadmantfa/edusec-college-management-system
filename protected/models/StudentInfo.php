<?php

/**
 * This is the model class for table "student_info".
 *
 * The followings are the available columns in table 'student_info':
 * @property integer $student_id
 * @property string $title 
 * @property string $student_roll_no
 * @property string $student_merit_no
 * @property string $student_enroll_no
 * @property integer $student_gr_no
 * @property string $student_first_name
 * @property string $student_middle_name
 * @property string $student_last_name
 * @property string $student_father_name
 * @property string $student_mother_name
 * @property string $student_living_status
 * @property string $student_adm_date
 * @property string $student_dob
 * @property string $student_birthplace
 * @property string $student_gender
 * @property string $student_guardian_name
 * @property string $student_guardian_relation
 * @property string $student_guardian_qualification
 * @property string $student_guardian_occupation
 * @property string $student_guardian_income
 * @property string $student_guardian_occupation_address
 * @property integer $student_guardian_occupation_city
 * @property integer $student_guardian_city_pin
 * @property string $student_guardian_home_address
 * @property integer $student_guardian_phoneno
 * @property integer $student_guardian_mobile
 * @property string $student_email_id_1
 * @property string $student_email_id_2
 * @property string $student_bloodgroup
 * @property integer $student_tally_id
 * @property integer $student_created_by
 * @property string $student_creation_date
  * @property string $student_dtod_regular_status
* @property string $student_info_transaction_id
 */
class StudentInfo extends CActiveRecord
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
	const TYPE_MR='Mr.';
	const TYPE_MRS='Mrs.'; 
	const TYPE_MISS='Ms.';
        const TYPE_HOSTEL='HOSTEL';
	const TYPE_HOME='HOME';
	const TYPE_REGULAR='Regular';
	const TYPE_DTOD='DTOD';

	//public $student_living_status;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudentInfo the static model class
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
		return 'student_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title,student_mobile_no, student_roll_no, student_enroll_no, student_first_name, student_last_name ,student_middle_name, student_adm_date, student_created_by, student_creation_date, student_dtod_regular_status, student_email_id_1', 'required','message'=>''),

		
		/*array('title,student_mobile_no, student_roll_no, student_enroll_no, student_first_name, student_last_name ,student_middle_name,student_created_by, student_creation_date, student_dtod_regular_status, student_email_id_1,student_mother_name,student_birthplace,student_gr_no, student_guardian_occupation_city, student_guardian_city_pin, student_guardian_phoneno, student_guardian_mobile, student_tally_id, student_created_by,student_mobile_no,student_guardian_income,student_merit_no,student_dtod_regular_status,
student_gender,student_living_status,student_adm_date,student_dob,student_guardian_name,student_guardian_relation,
student_guardian_qualification,student_guardian_occupation,student_guardian_income,student_guardian_occupation_city,
student_guardian_home_address,student_guardian_occupation_address,student_email_id_2,student_bloodgroup', 'required','message'=>'','on'=>'update'),*/



			array('student_gr_no, student_guardian_occupation_city, student_guardian_city_pin, student_guardian_phoneno, student_guardian_mobile,  student_created_by,student_mobile_no,student_guardian_income,student_merit_no', 'numerical', 'integerOnly'=>true,'message'=>''),
			array('student_roll_no,student_gr_no', 'length', 'max'=>15),
			array('student_roll_no', 'CRegularExpressionValidator', 'pattern'=>'/^\w*[A-Za-z0-9\/_-]*[0-9]+$/','message'=>''),
			array('student_gr_no,student_merit_no', 'CRegularExpressionValidator', 'pattern'=>'/^\w*[0-9]+$/','message'=>''),

			array('student_enroll_no', 'length', 'max'=>12, 'min'=>12,'message'=>'Enrollment Number should be 12 chareacter'),

			array('student_first_name, student_middle_name, student_last_name, student_father_name, student_mother_name, student_birthplace', 'length', 'max'=>25),
			array('student_guardian_name', 'length', 'max'=>100),
			array('student_enroll_no','CRegularExpressionValidator', 'pattern'=>'/^\w([0-9]+)$/','message'=>''),
			array('student_gender', 'length', 'max'=>6),
			array('student_email_id_1, student_email_id_2', 'email','message'=>'Email shoud ne in E-mail format'),
			array('student_email_id_1, student_email_id_2','unique', 'message'=>'email id must be unique'),
			array('student_enroll_no','unique', 'message'=>'Enrollment number must be unique'),
			array('student_guardian_relation', 'length', 'max'=>20),
			array('student_mobile_no', 'length', 'max'=>15,'min'=>10),
			array('student_guardian_qualification, student_guardian_occupation', 'length', 'max'=>50),
			array('student_guardian_occupation_address, student_guardian_home_address', 'length', 'max'=>100),

			array('student_dob','chkbirthdate'),
			array('student_adm_date','chkacpcdate'),

			array('student_email_id_1, student_email_id_2', 'length', 'max'=>60, 'message'=>''),
			array('student_bloodgroup', 'length', 'max'=>3),
			
			array('student_living_status', 'length', 'max'=>20),
			
			array('student_guardian_name,student_guardian_relation,student_birthplace', 
				'CRegularExpressionValidator', 'pattern'=>'/^([A-Za-z  ]+)$/','message'=>''),
			array('student_first_name,student_middle_name,student_last_name,
                               student_father_name,student_mother_name', 
				'CRegularExpressionValidator', 'pattern'=>'/^([A-Za-z]+)$/','message'=>''),
			array('student_guardian_occupation','CRegularExpressionValidator','pattern'=>'/^([A-Za-z-.  ]+)$/','message'=>''),
			array('student_email_id_1, student_email_id_2','CRegularExpressionValidator','pattern'=>'/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]+)$/','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('student_id, student_roll_no, student_merit_no, student_enroll_no, student_gr_no, student_first_name, student_middle_name, student_last_name, student_father_name, student_mother_name, student_adm_date, student_dob, student_birthplace, student_gender, student_guardian_name, student_guardian_relation, student_guardian_qualification, student_guardian_occupation, student_guardian_income, student_guardian_occupation_address, student_guardian_occupation_city, student_guardian_city_pin, student_guardian_home_address, student_guardian_phoneno, student_guardian_mobile, student_email_id_1, student_email_id_2, student_bloodgroup, student_created_by, student_creation_date,student_tally_ledger_name, student_dtod_regular_status', 'safe', 'on'=>'search'),

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
		'Rel_gardian_city' => array(self::BELONGS_TO, 'City', 'student_guardian_occupation_city'),
		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'student_id' => 'Student',
			'title' => 'Title',
			'student_roll_no' => 'Roll No',
			'student_mobile_no' => 'Mobile No',
			'student_merit_no' => 'Merit No',
			'student_enroll_no' => 'Enrollment No',
			'student_gr_no' => 'GR No',
			'student_first_name' => 'Name',
			'student_middle_name' => 'Husband/Father Name',
			'student_last_name' => 'Surname',
			'student_father_name' => 'Father Name',
			'student_mother_name' => 'Mother Name',
			'student_living_status' => 'Resident Status',
			'student_adm_date' => 'ACPC Admission Date',
			'student_dob' => 'Date of Birth',
			'student_birthplace' => 'Birth / Native Place',
			'student_gender' => 'Gender',
			'student_guardian_name' => 'Name',
			'student_guardian_relation' => 'Relation',
			'student_guardian_qualification' => 'Qualification',
			'student_guardian_occupation' => 'Occupation',
			'student_guardian_income' => 'Income',
			'student_guardian_occupation_address' => 'Occupation Address',
			'student_guardian_occupation_city' => 'Occupation City',
			'student_guardian_city_pin' => 'City Pin',
			'student_guardian_home_address' => 'Home Address',
			'student_guardian_phoneno' => 'Guardian Phone',
			'student_guardian_mobile' => 'Guardian Mobile',
			'student_email_id_1' => 'College Email ID',
			'student_email_id_2' => 'Private Email ID',
			'student_bloodgroup' => 'Blood Group',
			'student_tally_ledger_name' => 'Tally',
			'student_created_by' => 'Student Created By',
			'student_creation_date' => 'Student Creation Date',
			'student_dtod_regular_status'=>'DTOD/Regular Status',
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

		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('student_roll_no',$this->student_roll_no,true);
		$criteria->compare('student_mobile_no',$this->student_mobile_no,true);
		$criteria->compare('student_merit_no',$this->student_merit_no,true);
		$criteria->compare('student_enroll_no',$this->student_enroll_no,true);
		$criteria->compare('student_gr_no',$this->student_gr_no);
		$criteria->compare('student_first_name',$this->student_first_name,true);
		$criteria->compare('student_middle_name',$this->student_middle_name,true);
		$criteria->compare('student_last_name',$this->student_last_name,true);
		$criteria->compare('student_father_name',$this->student_father_name,true);
		$criteria->compare('student_mother_name',$this->student_mother_name,true);
		$criteria->compare('student_living_status',$this->student_living_status,true);
		$criteria->compare('student_adm_date',$this->student_adm_date,true);
		$criteria->compare('student_dob',$this->student_dob,true);
		$criteria->compare('student_birthplace',$this->student_birthplace,true);
		$criteria->compare('student_gender',$this->student_gender,true);
		$criteria->compare('student_guardian_name',$this->student_guardian_name,true);
		$criteria->compare('student_guardian_relation',$this->student_guardian_relation,true);
		$criteria->compare('student_guardian_qualification',$this->student_guardian_qualification,true);
		$criteria->compare('student_guardian_occupation',$this->student_guardian_occupation,true);
		$criteria->compare('student_guardian_income',$this->student_guardian_income,true);
		$criteria->compare('student_guardian_occupation_address',$this->student_guardian_occupation_address,true);
		$criteria->compare('student_guardian_occupation_city',$this->student_guardian_occupation_city);
		$criteria->compare('student_guardian_city_pin',$this->student_guardian_city_pin);
		$criteria->compare('student_guardian_home_address',$this->student_guardian_home_address,true);
		$criteria->compare('student_guardian_phoneno',$this->student_guardian_phoneno);
		$criteria->compare('student_guardian_mobile',$this->student_guardian_mobile);
		$criteria->compare('student_email_id_1',$this->student_email_id_1,true);
		$criteria->compare('student_email_id_2',$this->student_email_id_2,true);
		$criteria->compare('student_bloodgroup',$this->student_bloodgroup,true);
		$criteria->compare('student_dtod_regular_status',$this->student_dtod_regular_status,true);
		$criteria->compare('student_tally_ledger_name',$this->student_tally_ledger_name);
		$criteria->compare('student_created_by',$this->student_created_by);
		$criteria->compare('student_creation_date',$this->student_creation_date,true);
			

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function chkbirthdate()
    {
			$curr_date = date('d-m-Y');
			if(empty($this->student_adm_date)) {
				//$this->addError('student_dob',"Select Admission date first");	
				return true;
			}
			else {
					$dob = date('Y-m-d',strtotime($this->student_dob));
					$adm = date('Y-m-d',strtotime($this->student_adm_date));
					$diff = $adm-$dob;
				if($diff <= 14) 	{
					
						$this->addError('student_dob',"Birth date must be less than Admission date.");	
						 return false;	
			
				}

				else
						return true;
			}
     }

    public function chkacpcdate()
    {

			$curr_date = date('d-m-Y');

			if(strtotime($this->student_adm_date) > strtotime($curr_date))
			{					
					$this->addError('student_adm_date',"Admission date must be less than current date.");	
					 return false;	
			}
			else
					return true;
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
		self::TYPE_NPLUS=>'NA',
		);
	}

	public function getGenderOptions()
	{
		return array(
		self::TYPE_MALE=>'MALE',
		self::TYPE_FEMALE=>'FEMALE',
		);
	}

	public function getTitleOptions()
	{
		return array(
		self::TYPE_MR=>'Mr.',
		self::TYPE_MRS=>'Mrs.', 
		self::TYPE_MISS=>'Ms.',
		);
	}
		
	public function getLivingOptions()
	{
		return array(
		self::TYPE_HOSTEL=>'HOSTEL',
		self::TYPE_HOME=>'HOME',
		);
	}
	public function getStatusOptions()
	{
		return array(
		self::TYPE_REGULAR=>'Regular',
		self::TYPE_DTOD=>'DTOD',
		);
	}

}
