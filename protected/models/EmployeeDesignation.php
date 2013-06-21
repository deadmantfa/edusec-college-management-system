<?php

/**
 * This is the model class for table "employee_designation".
 *
 * The followings are the available columns in table 'employee_designation':
 * @property integer $employee_designation_id
 * @property string $employee_designation_name
 * @property integer $employee_designation_organization_id
 * @property integer $employee_designation_level
 * @property integer $employee_designation_created_by
 * @property string $employee_designation_created_date
	
 */
class EmployeeDesignation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return EmployeeDesignation the static model class
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
		return 'employee_designation';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'employee_designation_name'
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
			array('employee_designation_name, employee_designation_organization_id, employee_designation_created_by, employee_designation_created_date,employee_designation_level', 'required','message'=>''),
			array('employee_designation_organization_id, employee_designation_level, employee_designation_created_by', 'numerical', 'integerOnly'=>true,'message'=>''),
			array('employee_designation_name', 'length', 'max'=>60),
			array('employee_designation_name', 'checkemployeedesignation'),
			array('employee_designation_name','CRegularExpressionValidator','pattern'=>'/^[a-zA-Z&. ]+([ -][a-zA-Z. ]+)*$/','message'=>''),
			array('employee_designation_level','CRegularExpressionValidator','pattern'=>'/^([0-9]+)$/','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('employee_designation_id, employee_designation_name, employee_designation_organization_id, employee_designation_created_by, employee_designation_created_date,employee_designation_level', 'safe', 'on'=>'search'),
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
			'Rel_org' => array(self::BELONGS_TO, 'Organization','employee_designation_organization_id'),
			'Rel_user' => array(self::BELONGS_TO, 'User','employee_designation_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employee_designation_id' => 'Employee Designation',
			'employee_designation_name' => 'Designation',
			'employee_designation_organization_id' => 'Employee Designation Organization',
			'employee_designation_created_by' => 'Created By',
			'employee_designation_created_date' => 'Creation Date',
			'employee_designation_level' => 'Designation Level',
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

		$criteria->condition = 'employee_designation_organization_id = :employee_designation_org_id';
	        $criteria->params = array(':employee_designation_org_id' => Yii::app()->user->getState('org_id'));

		$criteria->compare('employee_designation_id',$this->employee_designation_id);
		$criteria->compare('employee_designation_name',$this->employee_designation_name,true);
		$criteria->compare('employee_designation_organization_id',$this->employee_designation_organization_id);
		$criteria->compare('employee_designation_level',$this->employee_designation_level,true);
		$criteria->compare('employee_designation_created_by',$this->employee_designation_created_by);
		$criteria->compare('employee_designation_created_date',$this->employee_designation_created_date,true);

		$designation_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'employee_designation_id DESC',
				),
		));
		$_SESSION['designation_records']=$designation_data;
		return $designation_data;
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
        $models=self::model()->findAll('employee_designation_organization_id='.Yii::app()->user->getState('org_id'));
        foreach($models as $model)
            self::$_items[$model->employee_designation_id]=$model->employee_designation_name;
    }

    /* before save for uniqueness of employee designation name */

	public function checkemployeedesignation()
		{
			if($this->isNewRecord)
			{
				$empdname='"'.strtolower($this->employee_designation_name).'"';
				$emp_designation_name=Yii::app()->db->createCommand()
					    ->select('employee_designation_name')
					    ->from('employee_designation')
					    ->where('employee_designation_organization_id='.Yii::app()->user->getState('org_id').' and LOWER(employee_designation_name)='.$empdname)
				    	    ->queryAll();
				
				if($emp_designation_name)
				{
					$this->addError('employee_designation_name',"Already Exists.");	
					 return false;	
				}
				else
				{
					return true;
				}
			}
			else
			{
				$empdid=$_REQUEST['id'];
				$empdname='"'.strtolower($this->employee_designation_name).'"';
				$orgid=Yii::app()->user->getState('org_id');
				$emp_designation_name=Yii::app()->db->createCommand()
					    ->select('employee_designation_name')
					    ->from('employee_designation')
					    ->where('employee_designation_id <>'.$empdid.' and employee_designation_organization_id='.$orgid.' and LOWER(employee_designation_name)='.$empdname)
				    	    ->queryAll();
				
				if($emp_designation_name)
				  {
				 	$this->addError('employee_designation_name',"Already Exists.");	
					 return false;	
				  }
				else
			          {
					return true;
				  }
			}	
		}

}
