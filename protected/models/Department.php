<?php

/**
 * This is the model class for table "department".
 *
 * The followings are the available columns in table 'department':
 * @property integer $department_id
 * @property string $department_name
 * @property integer $department_organization_id
 * @property integer $department_created_by
 * @property string $department_created_date
 */
class Department extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Department the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'department_name'
	        );
  	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'department';
	}
	

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('department_name, department_organization_id, department_created_by, department_created_date', 'required','message'=>''),
			array('department_organization_id, department_created_by', 'numerical', 'integerOnly'=>true),
			array('department_name', 'length', 'max'=>60),
			array('department_name', 'checkdepartment'),
			//array('department_name','CRegularExpressionValidator', 'pattern'=>'/^([A-Za-z&-.\/_  ]+)$/','message'=>''),
array('department_name','CRegularExpressionValidator','pattern'=>'/^[a-zA-Z& ]+([.][a-zA-Z ]+)*$/','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('department_id, department_name, department_organization_id, department_created_by, department_created_date', 'safe', 'on'=>'search'),
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
			'Rel_org'=>array(self::BELONGS_TO, 'Organization','department_organization_id'),
			'Rel_user' => array(self::BELONGS_TO, 'User','department_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'department_id' => 'Department',
			'department_name' => 'Department',
			'department_organization_id' => 'Department Organization',
			'department_created_by' => 'Created By',
			'department_created_date' => 'Creation Date',
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

		$criteria->condition = 'department_organization_id = :department_org_id';
	        $criteria->params = array(':department_org_id' => Yii::app()->user->getState('org_id'));


		$criteria->compare('department_id',$this->department_id);
		$criteria->compare('department_name',$this->department_name,true);
		$criteria->compare('department_organization_id',$this->department_organization_id);
		$criteria->compare('department_created_by',$this->department_created_by);
		$criteria->compare('department_created_date',$this->department_created_date,true);

		$department_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		$_SESSION['department_records']=$department_data;
		return $department_data;
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
        $models=self::model()->findAll(array('condition'=>'department_organization_id='.Yii::app()->user->getState('org_id')));
        foreach($models as $model)
            self::$_items[$model->department_id]=$model->department_name;
    }

/* before save for uniqueness of department name */

	public function checkdepartment()
		{
			if($this->isNewRecord)
			{
				$dname='"'.strtolower($this->department_name).'"';
				$department_name=Yii::app()->db->createCommand()
					    ->select('department_name')
					    ->from('department')
					    ->where('department_organization_id='.Yii::app()->user->getState('org_id').' and LOWER(department_name)='.$dname)
				    	    ->queryAll();
				
				if($department_name)
				{
					$this->addError('department_name',"Already Exists.");	
					 return false;	
				}
				else
				{
					return true;
				}
			}
			else
			{
				$did=$_REQUEST['id'];
				$dname='"'.strtolower($this->department_name).'"';
				$orgid=Yii::app()->user->getState('org_id');
				$department_name=Yii::app()->db->createCommand()
					    ->select('department_name')
					    ->from('department')
					    ->where('department_id <>'.$did.' and department_organization_id='.$orgid.' and LOWER(department_name)='.$dname)
				    	    ->queryAll();
				
				if($department_name)
				  {
				 	$this->addError('department_name',"Already Exists.");	
					 return false;	
				  }
				else
			          {
					return true;
				  }
			}	
		}

}
