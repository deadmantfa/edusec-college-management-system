<?php

/**
 * This is the model class for table "submenu".
 *
 * The followings are the available columns in table 'submenu':
 * @property integer $mainmenu_id
 * @property integer $submenu_id
 * @property string $title
 * @property string $link
 * @property string $status
 * @property integer $created_by
 * @property integer $created_date
 */
class Submenu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Submenu the static model class
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
		return 'submenu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mainmenu_id, title, link, status, created_by, created_date', 'required','message'=>''),
			array('mainmenu_id, created_by, created_date', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>30),
			array('link', 'length', 'max'=>100),
			array('status', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('mainmenu_id, submenu_id, title, link, status, created_by, created_date', 'safe', 'on'=>'search'),
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
			'mainmenu_id' => 'Mainmenu',
			'submenu_id' => 'Submenu',
			'title' => 'Title',
			'link' => 'Link',
			'status' => 'Status',
			'created_by' => 'Created By',
			'created_date' => 'Creation Date',
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

		$criteria->compare('mainmenu_id',$this->mainmenu_id);
		$criteria->compare('submenu_id',$this->submenu_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('created_date',$this->created_date);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
