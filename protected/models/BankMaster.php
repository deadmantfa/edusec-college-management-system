<?php

/**
 * This is the model class for table "bank_master".
 *
 * The followings are the available columns in table 'bank_master':
 * @property integer $bank_id
 * @property string $bank_full_name
 * @property string $bank_short_name
 * @property integer $bank_organization_id 	
 */
class BankMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BankMaster the static model class
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
		return 'bank_master';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'bank_full_name'
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
			array('bank_full_name, bank_short_name', 'required','message'=>''),
			array('bank_full_name', 'length', 'max'=>60),
			array('bank_short_name', 'length', 'max'=>60),
			array('bank_organization_id','numerical', 'integerOnly'=>true),
			array('bank_full_name,bank_short_name', 'unique','message'=>'Already Exists.'),
			array('bank_full_name','CRegularExpressionValidator','pattern'=>'/^([A-Za-z  ]+)$/','message'=>''),
			array('bank_short_name','CRegularExpressionValidator','pattern'=>'/^([A-Za-z]+)$/','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('bank_id, bank_full_name, bank_short_name,bank_organization_id ', 'safe', 'on'=>'search'),
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
			'Rel_org' => array(self::BELONGS_TO, 'Organization','bank_organization_id'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'bank_id' => 'Bank',
			'bank_full_name' => 'Full Name',
			'bank_short_name' => 'Short Name',
			'bank_organization_id '=>'Organization',
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
		
		$criteria->compare('bank_id',$this->bank_id);
		$criteria->compare('bank_full_name',$this->bank_full_name,true);
		$criteria->compare('bank_short_name',$this->bank_short_name,true);
		$criteria->compare('bank_organization_id ',$this->bank_organization_id,true);
		$bankmaster_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		$_SESSION['bankmaster_data']=$bankmaster_data;
		return $bankmaster_data;
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
            self::$_items[$model->bank_id]=$model->bank_full_name;
    }
}
