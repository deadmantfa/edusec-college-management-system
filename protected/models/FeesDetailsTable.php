<?php

/**
 * This is the model class for table "fees_details_table".
 *
 * The followings are the available columns in table 'fees_details_table':
 * @property integer $fees_details_id
 * @property string $fees_details_name
 * @property integer $fees_details_amount
 * @property integer $fees_details_created_by
 * @property string $fees_details_created_date
 * @property integer $fees_details_tally_id
 */
class FeesDetailsTable extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FeesDetailsTable the static model class
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
		return 'fees_details_table';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'fees_details_name'
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
			array('fees_details_name, fees_details_amount', 'required', 'message'=>''),
			array('fees_details_amount, fees_details_created_by, fees_details_tally_id', 'numerical', 'integerOnly'=>true, 'message'=>''),
			array('fees_details_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fees_details_id, fees_details_name, fees_details_amount, fees_details_created_by, fees_details_created_date, fees_details_tally_id', 'safe', 'on'=>'search'),
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
			'fees_details_id' => 'Fees Details',
			'fees_details_name' => 'Fees Details Name',
			'fees_details_amount' => 'Fees Details Amount',
			'fees_details_created_by' => 'Created By',
			'fees_details_created_date' => 'Creation Date',
			'fees_details_tally_id' => 'Fees Details Tally',
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

		$criteria->compare('fees_details_id',$this->fees_details_id);
		$criteria->compare('fees_details_name',$this->fees_details_name,true);
		$criteria->compare('fees_details_amount',$this->fees_details_amount);
		$criteria->compare('fees_details_created_by',$this->fees_details_created_by);
		$criteria->compare('fees_details_created_date',$this->fees_details_created_date,true);
		$criteria->compare('fees_details_tally_id',$this->fees_details_tally_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}
