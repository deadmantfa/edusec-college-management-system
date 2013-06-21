<?php

/**
 * This is the model class for table "student_fees_master".
 *
 * The followings are the available columns in table 'student_fees_master':
 * @property integer $student_fees_master_id
 * @property integer $student_fees_master_student_transaction_id
 * @property integer $fees_master_table_id
 * @property integer $student_fees_master_details_id
 * @property integer $fees_details_amount
 * @property integer $student_fees_master_org_id
 * @property integer $student_fees_master_created_by
 * @property string $student_fees_master_creation_date
 */
class StudentFeesMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudentFeesMaster the static model class
	 */
	public $fees_master_name, $student_first_name, $student_enroll_no,$student_roll_no;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'student_fees_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_fees_master_student_transaction_id, fees_master_table_id, student_fees_master_details_id, fees_details_amount, student_fees_master_org_id, student_fees_master_created_by, student_fees_master_creation_date', 'required'),
			array('student_fees_master_student_transaction_id, fees_master_table_id, student_fees_master_details_id, fees_details_amount, student_fees_master_org_id, student_fees_master_created_by', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('student_fees_master_id, student_fees_master_student_transaction_id, fees_master_table_id, student_fees_master_details_id, fees_details_amount, student_fees_master_org_id, student_fees_master_created_by, student_fees_master_creation_date, fees_master_name,student_enroll_no,student_roll_no, student_first_name', 'safe', 'on'=>'search'),
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
			//'fees_master_ref' => array(self::BELONGS_TO, 'FeesMaster', 'fees_master_table_id'),
			

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'student_fees_master_id' => 'Student Fees Master',
			'student_fees_master_student_transaction_id' => 'Student',
			'fees_master_table_id' => 'Fees Master',
			'student_fees_master_details_id' => 'Fees Details',
			'fees_details_amount' => 'Amount',
			'student_fees_master_org_id' => 'Student Fees Master Org',
			'student_fees_master_created_by' => 'Created By',
			'student_fees_master_creation_date' => 'Creation Date',
			'fees_master_name'=>'Fees Category', 
			'student_first_name'=>'Name', 
			'student_enroll_no'=>'Enroll No.',
			'student_roll_no'=>'Roll No.',

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

		$criteria=new CDbCriteria;

	        $criteria->select = array('distinct(student_fees_master_student_transaction_id), fees_master_table_id, student_info.student_enroll_no,student_info.student_roll_no,student_info.student_enroll_no,student_info.student_first_name,fees_master.fees_master_name');
		$criteria->join = 'LEFT JOIN student_info ON (student_info.student_info_transaction_id = t.student_fees_master_student_transaction_id) LEFT JOIN fees_master ON (fees_master.fees_master_id = t.fees_master_table_id) ';

		$criteria->addInCondition('fees_master.fees_academic_term_name_id',$data,'OR');

		//$criteria->condition = 'fees_master.fees_academic_term_name_id in ('.$data.')';
//	        $criteria->params = array(':academic_term_org_id' => Yii::app()->user->getState('org_id'));

		$criteria->compare('student_fees_master_id',$this->student_fees_master_id);
		$criteria->compare('student_fees_master_student_transaction_id',$this->student_fees_master_student_transaction_id);
		$criteria->compare('student_info.student_first_name',$this->student_first_name, true);
		$criteria->compare('student_info.student_enroll_no',$this->student_enroll_no, true);
		$criteria->compare('student_info.student_roll_no',$this->student_roll_no, true);
		$criteria->compare('fees_master_table_id',$this->fees_master_table_id);
		$criteria->compare('fees_master.fees_master_name',$this->fees_master_name,true);

		$criteria->compare('student_fees_master_details_id',$this->student_fees_master_details_id);
		$criteria->compare('fees_details_amount',$this->fees_details_amount);
		$criteria->compare('student_fees_master_org_id',$this->student_fees_master_org_id);
		$criteria->compare('student_fees_master_created_by',$this->student_fees_master_created_by);
		$criteria->compare('student_fees_master_creation_date',$this->student_fees_master_creation_date,true);

		$dp = new CActiveDataProvider($this, array('criteria'=>$criteria,
					'sort'=>array(
					'defaultOrder'=>'student_fees_master_id DESC',
				),
		));
		$dp->setTotalItemCount(count($this->findAll($criteria)));
		return $dp;
		
	}

	public function student_details_search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		
/************************************Ravi B************************************************/
		$student_trans=StudentTransaction::model()->findByPk($_REQUEST['student_id']);
		$fees_master = FeesMaster::model()->findByAttributes(array('fees_academic_term_name_id'=>$student_trans->student_academic_term_name_id,'fees_quota_id'=>$student_trans->student_transaction_quota_id,'fees_branch_id'=>$student_trans->student_transaction_branch_id)); 
			
		$criteria->condition = 'student_fees_master_student_transaction_id = :student_id AND fees_master_table_id=:fees_master';
	        $criteria->params = array(':student_id' => $_REQUEST['student_id'],':fees_master'=>$fees_master->fees_master_id);
/******************************************************************************************/
		$criteria->compare('student_fees_master_id',$this->student_fees_master_id);
		$criteria->compare('student_fees_master_student_transaction_id',$this->student_fees_master_student_transaction_id);
		$criteria->compare('fees_master_table_id',$this->fees_master_table_id);
		$criteria->compare('student_fees_master_details_id',$this->student_fees_master_details_id);
		$criteria->compare('fees_details_amount',$this->fees_details_amount);
		$criteria->compare('student_fees_master_org_id',$this->student_fees_master_org_id);
		$criteria->compare('student_fees_master_created_by',$this->student_fees_master_created_by);
		$criteria->compare('student_fees_master_creation_date',$this->student_fees_master_creation_date,true);

		$dp = new CActiveDataProvider($this, array('criteria'=>$criteria));
		$dp->setTotalItemCount(count($this->findAll($criteria)));
		return $dp;
		
	}
/*By Ravi Bhalodiya for student fees report */

	public function student_details_fees($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		
/************************************Ravi B************************************************/
		$student_trans=StudentTransaction::model()->findByPk($id);
		$fees_master = FeesMaster::model()->findByAttributes(array('fees_academic_term_name_id'=>$student_trans->student_academic_term_name_id,'fees_quota_id'=>$student_trans->student_transaction_quota_id,'fees_branch_id'=>$student_trans->student_transaction_branch_id)); 
			
		$criteria->condition = 'student_fees_master_student_transaction_id = :student_id AND fees_master_table_id=:fees_master';
	        $criteria->params = array(':student_id' => $id,':fees_master'=>$fees_master->fees_master_id);
/******************************************************************************************/
		
		$dp = new CActiveDataProvider($this, array('criteria'=>$criteria));
		$dp->setTotalItemCount(count($this->findAll($criteria)));
		return $dp;
		
	}


}
