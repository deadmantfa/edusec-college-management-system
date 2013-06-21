<?php

/**
 * This is the model class for table "gtunotice".
 *
 * The followings are the available columns in table 'gtunotice':
 * @property integer $ID
 * @property string $Description
 * @property string $Link
 * @property string $Created_By
 * @property string $Created_date
 * @@property integer $gtunotice_organization_id
 */
class Gtunotice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Gtunotice the static model class
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
		return 'gtunotice';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'Description'
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
			array('Description, Link, Created_By, Created_date', 'required', 'message'=>''),
			array('Description', 'length', 'max'=>300, 'message'=>''),
			array('gtunotice_organization_id', 'numerical', 'integerOnly'=>true),
			array('Link', 'length', 'max'=>200, 'message'=>''),
			array('Link','CRegularExpressionValidator', 'pattern'=>"/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i",'message'=>'Invalid URL'),
			array('Created_By', 'length', 'max'=>30, 'message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, Description, Link, Created_By, Created_date,gtunotice_organization_id', 'safe', 'on'=>'search'),
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
			'Rel_org' => array(self::BELONGS_TO, 'Organization','gtunotice_organization_id'),
			'Rel_user' => array(self::BELONGS_TO, 'User','Created_By'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'Description' => 'Description',
			'Link' => 'Link',
			'Created_By' => 'Created By',
			'Created_date' => 'Creation Date',
			'gtunotice_organization_id'=>'Organization',
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

		$criteria->condition = 'gtunotice_organization_id = :gtunotice_org_id';
	        $criteria->params = array(':gtunotice_org_id' => Yii::app()->user->getState('org_id'));

		$criteria->compare('ID',$this->ID);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('Link',$this->Link,true);
		$criteria->compare('Created_By',$this->Created_By,true);
		
		$criteria->compare('Created_date',$this->dbDateSearch($this->Created_date),true);

		//$criteria->compare('gtunotice_organization_id',$this->gtunotice_organization_id,true);
		$gtu_notice_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		 $_SESSION['gtu_notice_records']=$gtu_notice_data;
		return $gtu_notice_data;
	}
	private function dbDateSearch($value)
        {
                if($value != "" && preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/', $value,$matches))
                return date("Y-m-d",strtotime($matches[0]));
            else
                return $value;
        }
}
