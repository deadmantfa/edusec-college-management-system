<?php

/**
 * This is the model class for table "login_user".
 *
 * The followings are the available columns in table 'login_user':
 * @property integer $id
 * @property integer $user_id
 * @property integer $status
 * @property string $log_in_time
 * @property string $log_out_time
*  @property string $user_ip_address
* @property integer $login_organization_id
 */
class LoginUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LoginUser the static model class
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
		return 'login_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, status, log_in_time','required','message'=>''),
			array('user_id, status, login_organization_id', 'numerical', 'integerOnly'=>true),
			array('log_out_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, status, log_in_time, log_out_time, login_organization_id', 'safe', 'on'=>'search'),
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
			'login_org' => array(self::BELONGS_TO, 'Organization', 'login_organization_id'),
			'login_user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'status' => 'Status',
			'log_in_time' => 'Log In Time',
			'log_out_time' => 'Log Out Time',
			//'user_ip_address' => 'User Ip Address'
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

		$criteria->condition = 'login_organization_id = :login_organization_id';
	        $criteria->params = array(':login_organization_id' => Yii::app()->user->getState('org_id'));

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('log_in_time',$this->log_in_time,true);
		$criteria->compare('log_out_time',$this->log_out_time,true);
		//$criteria->compare('user_ip_address',$this->user_ip_address,true);
		$login_data = new CActiveDataProvider(get_class($this),array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'id DESC',
				),
		));
		$_SESSION['login_data'] = $login_data;
		return $login_data;
	}
	public function total_user()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->condition = 'login_organization_id = :login_organization_id';
	        $criteria->params = array(':login_organization_id' => Yii::app()->user->getState('org_id'));
		
		//$criteria->condition = 'status=1';
		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('log_in_time',$this->log_in_time,true);
		$criteria->compare('log_out_time',$this->log_out_time,true);
		//$criteria->compare('user_ip_address',$this->user_ip_address,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
