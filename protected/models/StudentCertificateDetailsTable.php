<?php

/**
 * This is the model class for table "student_certificate_details_table".
 *
 * The followings are the available columns in table 'student_certificate_details_table':
 * @property integer $student_certificate_details_table_id
 * @property integer $student_certificate_details_table_student_id
 * @property integer $student_certificate_type_id
 * @property integer $student_certificate_created_by
 * @property string $student_certificate_creation_date
 * @property integer $student_certificate_org_id
 */
class StudentCertificateDetailsTable extends CActiveRecord
{

	public $student_first_name,$certificate_title;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudentCertificateDetailsTable the static model class
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
		return 'student_certificate_details_table';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_certificate_details_table_student_id, student_certificate_type_id, student_certificate_created_by, student_certificate_creation_date, student_certificate_org_id', 'required','message'=>''),
			array('student_certificate_details_table_student_id, student_certificate_type_id, student_certificate_created_by, student_certificate_org_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('student_certificate_details_table_id, student_certificate_details_table_student_id, student_certificate_type_id, student_certificate_created_by, student_certificate_creation_date, student_certificate_org_id,student_first_name,certificate_title', 'safe', 'on'=>'search'),
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
			'cer_student_id' => array(self::BELONGS_TO, 'StudentInfo','', 'on' => 'student_certificate_details_table_student_id=student_info_transaction_id'),
			'stu_certificate_user' => array(self::BELONGS_TO, 'User', 'student_certificate_created_by'),
			'stu_certificate_org' => array(self::BELONGS_TO, 'Organization','student_certificate_org_id'),	
			'stu_certificate_name' => array(self::BELONGS_TO, 'Certificate','student_certificate_type_id'),	

		);
	}

	/** 0
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'student_certificate_details_table_id' => 'Student Certificate Details Table',
			'student_certificate_details_table_student_id' => 'Student Name',
			'student_certificate_type_id' => 'Certificate Type',
			'student_certificate_created_by' => 'Created By',
			'student_certificate_creation_date' => 'Creation Date',
			'student_certificate_org_id' => 'Organization',
			'student_first_name'=>'Name',
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

		$criteria->condition = 'student_certificate_org_id = :student_certificate_org_id';
	        $criteria->params = array(':student_certificate_org_id' => Yii::app()->user->getState('org_id'));
		
		$criteria->with = array('cer_student_id');
		$criteria->compare('cer_student_id.student_first_name',$this->student_first_name,true);
		//$criteria->compare('stu_certificate_name.certificate_title',$this->certificate_title,true);


		$criteria->compare('student_certificate_details_table_id',$this->student_certificate_details_table_id);
		$criteria->compare('student_certificate_details_table_student_id',$this->student_certificate_details_table_student_id);
		$criteria->compare('student_certificate_type_id',$this->student_certificate_type_id);
		$criteria->compare('student_certificate_created_by',$this->student_certificate_created_by);
		$criteria->compare('student_certificate_creation_date',$this->student_certificate_creation_date,true);
		$criteria->compare('student_certificate_org_id',$this->student_certificate_org_id);
		$StudentCertificateDetailsTable_records=new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'student_certificate_details_table_id DESC',
				),
		));
		   $_SESSION['StudentCertificateDetailsTable_records']=$StudentCertificateDetailsTable_records;
	return $StudentCertificateDetailsTable_records;
	}
	public function Studentsearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		if(Yii::app()->user->getState('stud_id'))
		{
		$criteria->condition = 'student_certificate_details_table_student_id = :student_certificate_details_table_student_id';
			$criteria->params = array(':student_certificate_details_table_student_id' => Yii::app()->user->getState('stud_id'));
		}
		else
		{
		$criteria->condition = 'student_certificate_details_table_student_id = :student_certificate_details_table_student_id';
			$criteria->params = array(':student_certificate_details_table_student_id' => $_REQUEST['id']);
		}
		$criteria->with = array('cer_student_id');
		$criteria->compare('cer_student_id.student_first_name',$this->student_first_name,true);
		//$criteria->compare('stu_certificate_name.certificate_title',$this->certificate_title,true);


		$criteria->compare('student_certificate_details_table_id',$this->student_certificate_details_table_id);
		$criteria->compare('student_certificate_details_table_student_id',$this->student_certificate_details_table_student_id);
		$criteria->compare('student_certificate_type_id',$this->student_certificate_type_id);
		$criteria->compare('student_certificate_created_by',$this->student_certificate_created_by);
		$criteria->compare('student_certificate_creation_date',$this->student_certificate_creation_date,true);
		$criteria->compare('student_certificate_org_id',$this->student_certificate_org_id);
		
		$StudentCertificateDetailsTable_records=new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		   $_SESSION['StudentCertificateDetailsTable_records']=$StudentCertificateDetailsTable_records;
	return $StudentCertificateDetailsTable_records;
	}

}
