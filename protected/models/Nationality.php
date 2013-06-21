<?php

/**
 * This is the model class for table "nationality".
 *
 * The followings are the available columns in table 'nationality':
 * @property integer $nationality_id
 * @property string $nationality_name
 * @property integer $nationality_organization_id
 * @property integer $nationality_created_by
 * @property string $nationality_created_date
 *
 * The followings are the available model relations:
 * @property EmployeeTransaction[] $employeeTransactions
 */
class Nationality extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Nationality the static model class
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
		return 'nationality';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'nationality_name'
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
			array('nationality_name, nationality_organization_id, nationality_created_by, nationality_created_date', 'required','message'=>''),
			array('nationality_organization_id, nationality_created_by', 'numerical', 'integerOnly'=>true,'message'=>''),
			array('nationality_name', 'length', 'max'=>30),
			array('nationality_name','CRegularExpressionValidator','pattern'=>'/^([a-zA-Z ]+)$/','message'=>''),
			array('nationality_name', 'unique','message'=>'Already Exists.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('nationality_id, nationality_name, nationality_organization_id, nationality_created_by, nationality_created_date', 'safe', 'on'=>'search'),
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

			'Rel_org'=>array(self::BELONGS_TO, 'Organization','nationality_organization_id'),
			'Rel_user' => array(self::BELONGS_TO, 'User','nationality_created_by'),

			'employeeTransactions' => array(self::HAS_MANY, 'EmployeeTransaction', 'employee_transaction_nationality_id'),
		);

	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nationality_id' => 'Nationality',
			'nationality_name' => 'Nationality',
			'nationality_organization_id' => 'Organization',
			'nationality_created_by' => 'Created By',
			'nationality_created_date' => 'Creation
 Date',
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

		$criteria->compare('nationality_id',$this->nationality_id);
		$criteria->compare('nationality_name',$this->nationality_name,true);
		$criteria->compare('nationality_organization_id',$this->nationality_organization_id);
		$criteria->compare('nationality_created_by',$this->nationality_created_by);
		$criteria->compare('nationality_created_date',$this->nationality_created_date,true);

		$nationality_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		
		$_SESSION['nationality_records'] = $nationality_data;
		return $nationality_data;
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
            self::$_items[$model->nationality_id]=$model->nationality_name;
    }
}
