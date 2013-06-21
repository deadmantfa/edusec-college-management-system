<?php

/**
 * This is the model class for table "religion".
 *
 * The followings are the available columns in table 'religion':
 * @property integer $religion_id
 * @property string $religion_name
 * @property integer $religion_organization_id
 * @property integer $religion_created_by
 * @property string $religion_created_date
 */
class Religion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Religion the static model class
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
		return 'religion';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'religion_name'
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
			array('religion_name, religion_organization_id, religion_created_by, religion_created_date', 'required','message'=>''),
			array('religion_organization_id, religion_created_by', 'numerical', 'integerOnly'=>true),
			array('religion_name', 'length', 'max'=>30),
			array('religion_name', 'unique','message'=>'Already Exists.'),
			array('religion_name','CRegularExpressionValidator','pattern'=>'/^([A-Za-z  ]+)$/','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('religion_id, religion_name, religion_organization_id, religion_created_by, religion_created_date', 'safe', 'on'=>'search'),
			
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
		'Rel_org' => array(self::BELONGS_TO, 'Organization','religion_organization_id'),
		'Rel_user' => array(self::BELONGS_TO, 'User','religion_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'religion_id' => 'Religion',
			'religion_name' => 'Religion',
			'religion_organization_id' => 'Organization',
			'religion_created_by' => 'Created By',
			'religion_created_date' => 'Creation Date',
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

		//$criteria->condition = 'religion_organization_id = :religion_org_id';
	        //$criteria->params = array(':religion_org_id' => Yii::app()->user->getState('org_id'));


		$criteria->compare('religion_id',$this->religion_id);
		$criteria->compare('religion_name',$this->religion_name,true);
		$criteria->compare('religion_organization_id',$this->religion_organization_id);
		$criteria->compare('religion_created_by',$this->religion_created_by);
		$criteria->compare('religion_created_date',$this->religion_created_date,true);

		$religion_data =  new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		$_SESSION['religion_data']=$religion_data;
		return $religion_data;
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
            self::$_items[$model->religion_id]=$model->religion_name;
    }
}
