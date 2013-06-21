<?php

/**
 * This is the model class for table "fees_payment_method".
 *
 * The followings are the available columns in table 'fees_payment_method':
 * @property integer $fees_payment_method_id
 * @property string $fees_payment_method_name
 *
 * The followings are the available model relations:
 * @property FeesPaymentTransaction[] $feesPaymentTransactions
 */
class FeesPaymentMethod extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FeesPaymentMethod the static model class
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
		return 'fees_payment_method';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'fees_payment_method_name'
	        );
  	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fees_payment_method_name', 'required'),
			array('fees_payment_method_name', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fees_payment_method_id, fees_payment_method_name', 'safe', 'on'=>'search'),
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
			'feesPaymentTransactions' => array(self::HAS_MANY, 'FeesPaymentTransaction', 'fees_payment_method_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'fees_payment_method_id' => 'Fees Payment Method',
			'fees_payment_method_name' => 'Fees Payment Method Name',
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

		$criteria->compare('fees_payment_method_id',$this->fees_payment_method_id);
		$criteria->compare('fees_payment_method_name',$this->fees_payment_method_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
