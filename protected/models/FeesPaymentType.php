<?php

/**
 * This is the model class for table "fees_payment_type".
 *
 * The followings are the available columns in table 'fees_payment_type':
 * @property integer $id
 * @property string $fees_type_name
 */
class FeesPaymentType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FeesPaymentType the static model class
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
		return 'fees_payment_type';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'fees_type_name'
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
			array('fees_type_name', 'required', 'message'=>''),
			array('fees_type_name', 'length', 'max'=>25, 'message'=>''),
			array('fees_type_name', 'unique','message'=>'Already Exists.'),
			array('fees_payment_type_organization_id', 'numerical', 'integerOnly'=>true, 'message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fees_type_name', 'safe', 'on'=>'search'),
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
			'Rel_org' => array(self::BELONGS_TO, 'Organization','fees_payment_type_organization_id'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fees_type_name' => 'Fees Payment Type',
			'fees_payment_type_organization_id'=>'Organization',
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

	//	$criteria->condition = 'fees_payment_type_organization_id = :fees_payment_type_organization_id';
//	        $criteria->params = array(':fees_payment_type_organization_id' => Yii::app()->user->getState('org_id'));


		$criteria->compare('id',$this->id);
		$criteria->compare('fees_type_name',$this->fees_type_name,true);

		$criteria->compare('fees_payment_type_organization_id',$this->fees_payment_type_organization_id,true);
		$paytype_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		$_SESSION['fees_pay_type_records']=$paytype_data;
		return $paytype_data;
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
		self::$_items[$model->id]=$model->fees_type_name;
	}
}
