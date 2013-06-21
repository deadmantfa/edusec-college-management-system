<?php

/**
 * This is the model class for table "item_category".
 *
 * The followings are the available columns in table 'item_category':
 * @property integer $id
 * @property string $cat_name
* @property integer $created_by
 * @property string $creation_date
 */
class ItemCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ItemCategory the static model class
	 */
	public $organization_name,$user_organization_email_id;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'item_category';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'cat_name'
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
			array('cat_name', 'required','message'=>''),
			array('cat_name', 'length', 'max'=>60),
			array('cat_name','CRegularExpressionValidator','pattern'=>'/^([A-Za-z  ]+)$/','message'=>''),
			array('cat_name', 'unique','message'=>'Already Exists.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cat_name', 'safe', 'on'=>'search'),
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
			//'Rel_org'=>array(self::BELONGS_TO,'Organization','academic_terms_period_organization_id'),
			'Rel_user' => array(self::BELONGS_TO, 'User','created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Item Category id',
			'cat_name' => 'Item Category',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('cat_name',$this->cat_name,true);

		$itemcategory_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		$_SESSION['itemcategory_data']=$itemcategory_data;
		return $itemcategory_data;
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
            self::$_items[$model->id]=$model->cat_name;
    	}
}
