<?php

/**
 * This is the model class for table "fees_master_transaction".
 *
 * The followings are the available columns in table 'fees_master_transaction':
 * @property integer $fees_id
 * @property integer $fees_master_id
 * @property integer $fees_desc_id
 */
class FeesMasterTransaction extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FeesMasterTransaction the static model class
	 */
	
	public $fees_details_name;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fees_master_transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fees_master_id, fees_desc_id', 'required','message'=>''),
			array('fees_master_id, fees_desc_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fees_id, fees_master_id, fees_desc_id, fees_details_name', 'safe', 'on'=>'search'),
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
			'Rel_Fees_Details' => array(self::BELONGS_TO, 'FeesDetailsTable','fees_desc_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'fees_id' => 'Fees',
			'fees_master_id' => 'Fees Master',
			'fees_desc_id' => 'Fees Desc',
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

		$criteria->compare('fees_id',$this->fees_id);
		$criteria->compare('fees_master_id',$this->fees_master_id);
		$criteria->compare('fees_desc_id',$this->fees_desc_id);
		
		$criteria->compare('Rel_Fees_Details.fees_details_name',$this->fees_details_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function mysearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->condition = 'fees_master_id = :feesid';
	        $criteria->params = array(':feesid' => $_REQUEST['id']);  /// Note: Pass perameter to get recored related to perticular condition...

		$criteria->compare('fees_id',$this->fees_id);
		$criteria->compare('fees_master_id',$this->fees_master_id);
		$criteria->compare('fees_desc_id',$this->fees_desc_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
