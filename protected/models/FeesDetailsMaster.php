<?php

/**
 * This is the model class for table "fees_details_master".
 *
 * The followings are the available columns in table 'fees_details_master':
 * @property integer $fees_details_master
 * @property string $fees_details_master_name
 * @property integer $created_by
 * @property string $creation_date
 * @property integer $organization_id
 */
class FeesDetailsMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FeesDetailsMaster the static model class
	 */
	public $organization_name;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fees_details_master';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'fees_details_master_name'
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
			array('fees_details_master_name', 'required','message'=>''),
			array('created_by, organization_id', 'numerical', 'integerOnly'=>true),
			array('fees_details_master_name', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fees_details_master, fees_details_master_name, created_by, creation_date, organization_id, organization_name', 'safe', 'on'=>'search'),
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
			'Rel_org'=>array(self::BELONGS_TO,'Organization','organization_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'fees_details_master' => 'Fees Details Master',
			'fees_details_master_name' => 'Fees Detail',
			'created_by' => 'Created By',
			'creation_date' => 'Creation Date',
			'organization_id' => 'Organization',
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
		$criteria->condition = 't.organization_id= :org_id';
	        $criteria->params = array(':org_id' => Yii::app()->user->getState('org_id'));
		$criteria->with = array('Rel_org');
		
		$criteria->compare('fees_details_master',$this->fees_details_master);
		$criteria->compare('fees_details_master_name',$this->fees_details_master_name,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('organization_id',$this->organization_id);
		$FeesDetailsMaster_records=new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		   $_SESSION['FeesDetailsMaster_records']=$FeesDetailsMaster_records;
	return $FeesDetailsMaster_records;
	}

}
