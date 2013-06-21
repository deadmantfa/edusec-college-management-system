<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $category_id
 * @property string $category_name
 * @property integer $category_organization_id
 * @property integer $category_created_by
 * @property string $category_created_date
 */
class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Category the static model class
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
		return 'category';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'category_name'
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
			array('category_name, category_organization_id, category_created_by, category_created_date', 'required','message'=>''),
			array('category_organization_id, category_created_by', 'numerical', 'integerOnly'=>true),
			array('category_name', 'length', 'max'=>60),
			array('category_name', 'unique','message'=>'Already Exists.'),
			array('category_name','CRegularExpressionValidator','pattern'=>'/^([A-Za-z.\/ ]+)$/','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('category_id, category_name, category_organization_id, category_created_by, category_created_date', 'safe', 'on'=>'search'),
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
			'Rel_org' => array(self::BELONGS_TO, 'Organization','category_organization_id'),
		'Rel_user' => array(self::BELONGS_TO, 'User','category_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'category_id' => 'Category',
			'category_name' => 'Category',
			'category_organization_id' => 'Organization',
			'category_created_by' => 'Created By',
			'category_created_date' => 'Creation Date',
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

	//	$criteria->condition = 'category_organization_id = :category_org_id';
	//        $criteria->params = array(':category_org_id' => Yii::app()->user->getState('org_id'));


		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('category_name',$this->category_name,true);
		$criteria->compare('category_organization_id',$this->category_organization_id);
		$criteria->compare('category_created_by',$this->category_created_by);
		$criteria->compare('category_created_date',$this->category_created_date,true);

		$category_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		$_SESSION['category_records']=$category_data;
		return $category_data;
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
            self::$_items[$model->category_id]=$model->category_name;
    }
}
