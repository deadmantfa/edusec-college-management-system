<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $user_id
 * @property string $user_organization_email_id
 * @property string $user_password
 * @property integer $user_created_by
 * @property string $user_creation_date
 * @property integer user_organization_id
 */
class User extends CActiveRecord
{
	public $organization_name;
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
	 */

	public $current_pass,$new_pass,$retype_pass;

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
			array('user_organization_email_id, user_password, user_created_by, user_creation_date,user_organization_id', 'required','message'=>''),
			array('current_pass, new_pass, retype_pass', 'required','on'=>'change','message'=>''),
			array('user_created_by', 'numerical', 'integerOnly'=>true),
			array('user_organization_email_id', 'email','message'=>''),
			array('user_organization_email_id', 'unique' ,'message'=>'Email ID must be unique.'),
			array('retype_pass', 'compare','compareAttribute'=>'new_pass'),
			array('user_organization_email_id', 'length', 'max'=>60,'message'=>''),
			array('user_organization_email_id','CRegularExpressionValidator','pattern'=>'/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]+)$/','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('current_pass','checkOldPassword','on'=>'change','message'=>''),
			array('user_id,user_type,user_organization_email_id, user_password, user_created_by, user_creation_date, user_organization_id', 'safe', 'on'=>'search'),
			array('current_pass, new_pass, retype_pass,organization_name', 'safe','message'=>''),
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
			'rel_user_organization' => array(self::BELONGS_TO, 'Organization','user_organization_id'),
			'rel_user_email' => array(self::BELONGS_TO, 'User','user_created_by'),
		);
	}

	public function checkOldPassword($attribute,$params)
	{
	    $record=User::model()->findByAttributes(array('user_password'=>md5($this->current_pass.$this->current_pass)));

	    if($record===null){
		$this->addError($attribute, 'Invalid password');
	    }
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'user_organization_email_id' => 'Username',
			'user_password' => 'Password',
			'user_created_by' => 'Created By',
			'user_creation_date' => 'Creation Date',
			'current_pass' => 'Current Password',
			'new_pass' => 'New Password',
			'retype_pass' => 'Retype Password',
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

		$criteria->condition = 'user_type = :usertype1';
	        $criteria->params = array(':usertype1' => 'admin');

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_organization_email_id',$this->user_organization_email_id,true);
		$criteria->compare('user_password',$this->user_password,true);
		$criteria->compare('user_created_by',$this->user_created_by);
		$criteria->compare('user_creation_date',$this->user_creation_date,true);
		$criteria->compare('user_organization_id',$this->user_organization_id);
		

		$user_data = new CActiveDataProvider(get_class($this),array(
			'criteria'=>$criteria,
		));
		$_SESSION['user_data'] = $user_data;
		return $user_data;
	}

	public function resetadminpasswordsearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->condition = 'user_type = :usertype1';
	        $criteria->params = array(':usertype1' => 'admin');

		$criteria->with = array('rel_user_organization');  /// Note: Define relation with related table....
		$criteria->compare('rel_user_organization.organization_name',$this->organization_name,true);  // Note: Compare related table

		

/*
		$criteria->condition ="user_organization_id = :user_organization_id && user_type = :usertype1";
		$criteria->params = array (
		':user_organization_id' => Yii::app()->user->getState('org_id'),
		':usertype1'=>'admin',
		);*/


		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_organization_email_id',$this->user_organization_email_id,true);
		$criteria->compare('user_password',$this->user_password,true);
		$criteria->compare('user_created_by',$this->user_created_by);
		$criteria->compare('user_type',$this->user_type,true);
		$criteria->compare('user_creation_date',$this->user_creation_date,true);
		$criteria->compare('user_organization_id',$this->user_organization_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'user_id DESC',),
		));
	}

	public function resetstudloginidsearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		//$criteria->condition = 'user_type = :usertype1';
	        //$criteria->params = array(':usertype1' => 'student');


		$criteria->condition ="user_organization_id = :user_organization_id && user_type = :usertype1";
		$criteria->params = array (
		':user_organization_id' => Yii::app()->user->getState('org_id'),
		':usertype1'=>'student',
		);


		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_organization_email_id',$this->user_organization_email_id,true);
		$criteria->compare('user_password',$this->user_password,true);
		$criteria->compare('user_created_by',$this->user_created_by);
		$criteria->compare('user_type',$this->user_type,true);
		$criteria->compare('user_creation_date',$this->user_creation_date,true);
		$criteria->compare('user_organization_id',$this->user_organization_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'user_id DESC',),
		));
	}
	public function resetemploginidsearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		//$criteria->condition = 'user_type = :usertype1';
	        //$criteria->params = array(':usertype1' => 'employee');

		$criteria->condition ="user_organization_id = :user_organization_id && user_type = :usertype1";
		$criteria->params = array (
		':user_organization_id' => Yii::app()->user->getState('org_id'),
		':usertype1'=>'employee',
		);

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_organization_email_id',$this->user_organization_email_id,true);
		$criteria->compare('user_password',$this->user_password,true);
		$criteria->compare('user_created_by',$this->user_created_by);
		$criteria->compare('user_type',$this->user_type,true);
		$criteria->compare('user_creation_date',$this->user_creation_date,true);
		$criteria->compare('user_organization_id',$this->user_organization_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'user_id DESC',),
		));
	}
	    private static $_items=array();

            public static function items()
            {
		    if(isset(self::$_items))
		    self::loadItems();
		    return self::$_items;
            }

	    public static function item($code)
	    {
		if(!isset(self::$_items))
		    self::loadItems();
		return isset(self::$_items[$code]) ? self::$_items[$code] : false;
	    }

	    private static function loadItems()
	    {
		self::$_items=array();
		$models=self::model()->findAll();
		foreach($models as $model)
		    self::$_items[$model->user_id]=$model->user_organization_email_id;
	    }


}
