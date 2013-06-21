<?php

/**
 * This is the model class for table "miscellaneous_fees_payment_cash".
 *
 * The followings are the available columns in table 'miscellaneous_fees_payment_cash':
 * @property integer $miscellaneous_fees_payment_cash_id
 * @property integer $miscellaneous_fees_payment_cash_master_id
 * @property integer $miscellaneous_fees_payment_cash_amount
 * @property integer $miscellaneous_fees_payment_cash_student_id
 * @property integer $miscellaneous_fees_payment_cash_receipt_id
 * @property integer $miscellaneous_fees_payment_cash_created_by
 * @property integer $miscellaneous_fees_payment_cash_creation_date
 * @property integer $miscellaneous_fees_payment_cash_creation_date
* @property integer $miscellaneous_fees_payment_organization_id
 */
class MiscellaneousFeesPaymentCash extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MiscellaneousFeesPaymentCash the static model class
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
		return 'miscellaneous_fees_payment_cash';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('miscellaneous_fees_payment_cash_amount, miscellaneous_fees_payment_cash_student_id, miscellaneous_fees_payment_cash_receipt_id, miscellaneous_fees_payment_cash_master_id', 'required', 'message'=>''),
			array('miscellaneous_fees_payment_cash_amount, miscellaneous_fees_payment_cash_student_id, miscellaneous_fees_payment_cash_receipt_id,miscellaneous_fees_payment_organization_id', 'numerical', 'integerOnly'=>true, 'message'=>''),
			array('miscellaneous_fees_payment_cash_amount','length', 'max'=>6),
		array('miscellaneous_fees_payment_cash_amount','CRegularExpressionValidator','pattern'=>'/^[1-9][0-9]*$/','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('miscellaneous_fees_payment_cash_amount','CRegularExpressionValidator','pattern'=>'/^([0-9]+)$/','message'=>''),
			array('miscellaneous_fees_payment_cash_id, miscellaneous_fees_payment_cash_amount,  miscellaneous_fees_payment_cash_student_id , miscellaneous_fees_payment_cash_receipt_id,miscellaneous_fees_payment_cash_created_by, miscellaneous_fees_payment_cash_creation_date, miscellaneous_fees_payment_cash_master_id,miscellaneous_fees_received_date', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'miscellaneous_fees_payment_cash_id' => 'Miscellaneous Fees Payment Cash',
			'miscellaneous_fees_payment_cash_master_id' => 'Miscellaneous Fees',
			'miscellaneous_fees_payment_cash_amount' => 'Fees Amount',
			'miscellaneous_fees_payment_cash_student_id' => 'Miscellaneous Fees Payment Cash Student',
			'miscellaneous_fees_payment_cash_receipt_id' => 'Cash Receipt No.',
			'miscellaneous_fees_payment_cash_created_by'=> 'Miscellaneous Fees Payment Cash Created By',
			'miscellaneous_fees_payment_cash_creation_date' => 'Fees Collect Date',
			'miscellaneous_fees_payment_organization_id'=>'Organization',
			'miscellaneous_fees_received_date'=> 'Fees Received Date',
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

		$criteria->compare('miscellaneous_fees_payment_cash_id',$this->miscellaneous_fees_payment_cash_id);
		$criteria->compare('miscellaneous_fees_payment_cash_master_id',$this->miscellaneous_fees_payment_cash_master_id);
		$criteria->compare('miscellaneous_fees_payment_cash_amount',$this->miscellaneous_fees_payment_cash_amount);
		$criteria->compare('miscellaneous_fees_payment_cash_student_id',$this->miscellaneous_fees_payment_cash_student_id);
		$criteria->compare('miscellaneous_fees_payment_cash_receipt_id',$this->miscellaneous_fees_payment_cash_receipt_id);
		$criteria->compare('miscellaneous_fees_payment_cash_created_by',$this->miscellaneous_fees_payment_cash_receipt_id);
		$criteria->compare('miscellaneous_fees_payment_cash_creation_date',$this->miscellaneous_fees_payment_cash_receipt_id);
		$criteria->compare('miscellaneous_fees_payment_organization_id',$this->miscellaneous_fees_payment_organization_id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function mysearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->condition = 'miscellaneous_fees_payment_cash_student_id = :studentid';
	        $criteria->params = array(':studentid' => $_REQUEST['id']);


		$criteria->compare('miscellaneous_fees_payment_cash_id',$this->miscellaneous_fees_payment_cash_id);
		$criteria->compare('miscellaneous_fees_payment_cash_master_id',$this->miscellaneous_fees_payment_cash_master_id);
		$criteria->compare('miscellaneous_fees_payment_cash_amount',$this->miscellaneous_fees_payment_cash_amount);
		$criteria->compare('miscellaneous_fees_payment_cash_student_id',$this->miscellaneous_fees_payment_cash_student_id);
		$criteria->compare('miscellaneous_fees_payment_cash_receipt_id',$this->miscellaneous_fees_payment_cash_receipt_id);
		$criteria->compare('miscellaneous_fees_payment_cash_created_by',$this->miscellaneous_fees_payment_cash_receipt_id);
		$criteria->compare('miscellaneous_fees_payment_cash_creation_date',$this->miscellaneous_fees_payment_cash_receipt_id);

		$criteria->compare('miscellaneous_fees_payment_organization_id',$this->miscellaneous_fees_payment_organization_id);
		$cash_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		$_SESSION['cash_data']=$cash_data;
		return $cash_data;
	}

}
