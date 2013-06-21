<?php

/**
 * This is the model class for table "quota".
 *
 * The followings are the available columns in table 'quota':
 * @property integer $quota_id
 * @property string $quota_name
 * @property integer $quota_organization_id
 * @property integer $quota_created_by
 * @property string $quota_created_date
 */
class Quota extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Quota the static model class
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
		return 'quota';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'quota_name'
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
			array('quota_name, quota_organization_id, quota_created_by, quota_created_date', 'required','message'=>''),
			array('quota_organization_id, quota_created_by', 'numerical', 'integerOnly'=>true),
			array('quota_name', 'length', 'max'=>60),
			array('quota_name', 'checkquota'),
			array('quota_name','CRegularExpressionValidator','pattern'=>'/^([A-Za-z ]+)$/','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('quota_id, quota_name, quota_organization_id, quota_created_by, quota_created_date', 'safe', 'on'=>'search'),
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
		'Rel_org' => array(self::BELONGS_TO, 'Organization','quota_organization_id'),
		'Rel_user' => array(self::BELONGS_TO, 'User','quota_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'quota_id' => 'Quota',
			'quota_name' => 'Quota',
			'quota_organization_id' => 'Organization',
			'quota_created_by' => 'Created By',
			'quota_created_date' => 'Creation Date',
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

		$criteria->condition = 'quota_organization_id = :quota_org_id';
	        $criteria->params = array(':quota_org_id' => Yii::app()->user->getState('org_id'));

		$criteria->compare('quota_id',$this->quota_id);
		$criteria->compare('quota_name',$this->quota_name,true);
		$criteria->compare('quota_organization_id',$this->quota_organization_id);
		$criteria->compare('quota_created_by',$this->quota_created_by);
		$criteria->compare('quota_created_date',$this->quota_created_date,true);

		$quota_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		$_SESSION['quota_records']=$quota_data;
		return $quota_data;
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
        $models=self::model()->findAll(array('condition'=>'quota_organization_id='.Yii::app()->user->getState('org_id')));
        foreach($models as $model)
            self::$_items[$model->quota_id]=$model->quota_name;
    }
	/* before save for uniqueness of quota name */

	public function checkquota()
		{
			if($this->isNewRecord)
			{
				$qname='"'.strtolower($this->quota_name).'"';
				$quota_name=Yii::app()->db->createCommand()
					    ->select('quota_name')
					    ->from('quota')
					    ->where('quota_organization_id='.Yii::app()->user->getState('org_id').' and LOWER(quota_name)='.$qname)
				    	    ->queryAll();
				
				if($quota_name)
				{
					$this->addError('quota_name',"Already Exists.");	
					 return false;	
				}
				else
				{
					return true;
				}
			}
			else
			{
				$quotaid=$_REQUEST['id'];
				$qname='"'.strtolower($this->quota_name).'"';
				$orgid=Yii::app()->user->getState('org_id');
				$quota_name=Yii::app()->db->createCommand()
					    ->select('quota_name')
					    ->from('quota')
					    ->where('quota_id <>'.$quotaid.' and quota_organization_id='.$orgid.' and LOWER(quota_name)='.$qname)
				    	    ->queryAll();
				
				if($quota_name)
				  {
				 	$this->addError('quota_name',"Already Exists.");	
					 return false;	
				  }
				else
			          {
					return true;
				  }
			}	
		}

}
