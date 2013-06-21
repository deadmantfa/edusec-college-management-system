<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $user_id
 * @property string $user_organization_email_id
 * @property string $user_password
 * @property string $user_type
 * @property integer $user_created_by
 * @property string $user_creation_date
 * @property integer $user_organization_id
 */
class RightsUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RightsUser the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_organization_email_id, user_password, user_type, user_created_by, user_creation_date, user_organization_id', 'required'),
			array('user_created_by, user_organization_id', 'numerical', 'integerOnly'=>true),
			array('user_organization_email_id', 'length', 'max'=>60),
			array('user_password', 'length', 'max'=>150),
			array('user_type', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, user_organization_email_id, user_password, user_type, user_created_by, user_creation_date, user_organization_id', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'user_organization_email_id' => 'User Organization Email',
			'user_password' => 'User Password',
			'user_type' => 'User Type',
			'user_created_by' => 'User Created By',
			'user_creation_date' => 'User Creation Date',
			'user_organization_id' => 'User Organization',
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

		$criteria->condition = 'user_organization_id = :user_org_id';
	        $criteria->params = array(':user_org_id' => Yii::app()->user->getState('org_id'));

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_organization_email_id',$this->user_organization_email_id,true);
		$criteria->compare('user_password',$this->user_password,true);
		$criteria->compare('user_type',$this->user_type,true);
		$criteria->compare('user_created_by',$this->user_created_by);
		$criteria->compare('user_creation_date',$this->user_creation_date,true);
		$criteria->compare('user_organization_id',$this->user_organization_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
