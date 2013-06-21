<?php

/**
 * This is the model class for table "mainmenu".
 *
 * The followings are the available columns in table 'mainmenu':
 * @property integer $menu_id
 * @property string $menu_name
 * @property string $link
 * @property string $image
 * @property string $status
 * @property integer $created_by
 * @property integer $created_date
 */
class Mainmenu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Mainmenu the static model class
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
		return 'mainmenu';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'menu_name'
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
			array('menu_name, link, image, status, created_by, created_date', 'required','message'=>''),
			array('created_by, created_date', 'numerical', 'integerOnly'=>true,'message'=>''),
			array('menu_name', 'length', 'max'=>30),
			array('link, image', 'length', 'max'=>100),
			array('status', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('menu_id, menu_name, link, image, status, created_by, created_date', 'safe', 'on'=>'search'),
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
			'menu_id' => 'Menu',
			'menu_name' => 'Menu Name',
			'link' => 'Link',
			'image' => 'Image',
			'status' => 'Status',
			'created_by' => 'Created By',
			'created_date' => 'Created Date',
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

		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('menu_name',$this->menu_name,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('created_date',$this->created_date);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
