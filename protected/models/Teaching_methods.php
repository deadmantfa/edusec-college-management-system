<?php

/**
 * This is the model class for table "teaching_methods".
 *
 * The followings are the available columns in table 'teaching_methods':
 * @property integer $teaching_methods_id
 * @property string $teaching_methods_name
 * @property string $teaching_methods_alias
 * @property string $remarks
 * @property integer $teaching_methods_created_by
 * @property string $teaching_methods_created_date
 */
class Teaching_methods extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Teaching_methods the static model class
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
		return 'teaching_methods';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('teaching_methods_name, teaching_methods_alias, remarks, teaching_methods_created_by, teaching_methods_created_date', 'required','message'=>''),
			array('teaching_methods_created_by', 'numerical', 'integerOnly'=>true),
			array('teaching_methods_name, remarks', 'length', 'max'=>50),
			array('teaching_methods_alias', 'length', 'max'=>10),
			array('teaching_methods_name', 'unique','message'=>'Already Exists.'),
			array('teaching_methods_name','CRegularExpressionValidator', 'pattern'=>'/^([A-Za-z  ]+)$/','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('teaching_methods_id, teaching_methods_name, teaching_methods_alias, remarks, teaching_methods_created_by, teaching_methods_created_date', 'safe', 'on'=>'search'),
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
			'Rel_user_teaching' => array(self::BELONGS_TO, 'User','teaching_methods_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'teaching_methods_id' => 'Teaching Methods',
			'teaching_methods_name' => 'Name',
			'teaching_methods_alias' => 'Alias Name',
			'remarks' => 'Remarks',
			'teaching_methods_created_by' => 'Created By',
			'teaching_methods_created_date' => 'Creation Date',
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

		$criteria->compare('teaching_methods_id',$this->teaching_methods_id);
		$criteria->compare('teaching_methods_name',$this->teaching_methods_name,true);
		$criteria->compare('teaching_methods_alias',$this->teaching_methods_alias,true);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('teaching_methods_created_by',$this->teaching_methods_created_by);
		$criteria->compare('teaching_methods_created_date',$this->teaching_methods_created_date,true);

		$teachingdata = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		 $_SESSION['teachingdata']=$teachingdata;
		return $teachingdata;
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
          		  self::$_items[$model->teaching_methods_id]=$model->teaching_methods_name;
    	 }
}
