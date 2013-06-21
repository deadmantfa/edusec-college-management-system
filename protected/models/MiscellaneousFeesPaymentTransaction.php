<?php

/**
 * This is the model class for table "miscellaneous_fees_payment_transaction".
 *
 * The followings are the available columns in table 'miscellaneous_fees_payment_transaction':
 * @property integer $miscellaneous_trans_id
 * @property integer $miscellaneous_fees_id
 * @property integer $student_fees_id
 * @property integer $Amount
 */
class MiscellaneousFeesPaymentTransaction extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MiscellaneousFeesPaymentTransaction the static model class
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
		return 'miscellaneous_fees_payment_transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('miscellaneous_fees_id, student_fees_id, Amount', 'required','message'=>''),
			array('miscellaneous_fees_id, student_fees_id, Amount,miscellaneous_fees_payment_transaction_organization_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('miscellaneous_trans_id, miscellaneous_fees_id, student_fees_id, Amount,miscellaneous_fees_payment_transaction_organization_id', 'safe', 'on'=>'search'),
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
		'Rel_mfees' => array(self::BELONGS_TO, 'MiscellaneousFeesMaster', 'miscellaneous_fees_id'),
		'Rel_stud' => array(self::BELONGS_TO, 'StudentTransaction', 'student_fees_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'miscellaneous_trans_id' => 'Miscellaneous Trans',
			'miscellaneous_fees_id' => 'Miscellaneous Fees',
			'student_fees_id' => 'Student Name',
			'Amount' => 'Amount',
			'miscellaneous_fees_payment_transaction_organization_id'=>'Organization',
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

		$criteria->condition = 'miscellaneous_fees_payment_transaction_organization_id = :miscellaneous_fees_payment_transaction_organization_id';
	        $criteria->params = array(':miscellaneous_fees_payment_transaction_organization_id' => Yii::app()->user->getState('org_id'));



		$criteria->compare('miscellaneous_trans_id',$this->miscellaneous_trans_id);
		$criteria->compare('miscellaneous_fees_id',$this->miscellaneous_fees_id);
		$criteria->compare('student_fees_id',$this->student_fees_id);
		$criteria->compare('Amount',$this->Amount);
		$criteria->compare('miscellaneous_fees_payment_transaction_organization_id',$this->miscellaneous_fees_payment_transaction_organization_id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
