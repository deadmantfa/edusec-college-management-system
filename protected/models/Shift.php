<?php

/**
 * This is the model class for table "shift".
 *
 * The followings are the available columns in table 'shift':
 * @property integer $shift_id
 * @property string $shift_type
 * @property integer $shift_organization_id
 * @property string $shift_start_time
 * @property string $shift_end_time
 * @property integer $shift_created_by
 * @property string $shift_created_date
 */
class Shift extends CActiveRecord
{

	/**
	 * Returns the static model of the specified AR class.
	 * @return Shift the static model class
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
		return 'shift';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('shift_type, shift_organization_id, shift_start_time, shift_end_time, shift_created_by, shift_created_date', 'required','message'=>''),
			array('shift_organization_id, shift_created_by', 'numerical', 'integerOnly'=>true),
			array('shift_type', 'length', 'max'=>15),
			array('shift_type', 'checkshift'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('shift_id, shift_type, shift_organization_id, shift_start_time, shift_end_time, shift_created_by, shift_created_date', 'safe', 'on'=>'search'),
			array('shift_type', 'CRegularExpressionValidator', 'pattern'=>'/^([A-Za-z0-9  ]+)$/','message'=>''),
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
		'Rel_org' => array(self::BELONGS_TO, 'Organization','shift_organization_id'),
		'Rel_user' => array(self::BELONGS_TO, 'User','shift_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'shift_id' => 'Shift',
			'shift_type' => 'Shift',
			'shift_organization_id' => 'Organization',
			'shift_start_time' => 'Start Time',
			'shift_end_time' => 'End Time',
			'shift_created_by' => 'Created By',
			'shift_created_date' => 'Creation Date',
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

		$criteria->condition = 'shift_organization_id = :shift_org_id';
	        $criteria->params = array(':shift_org_id' => Yii::app()->user->getState('org_id'));

		$criteria->compare('shift_id',$this->shift_id);
		$criteria->compare('shift_type',$this->shift_type,true);
		$criteria->compare('shift_organization_id',$this->shift_organization_id);
		$criteria->compare('shift_start_time',$this->shift_start_time,true);
		$criteria->compare('shift_end_time',$this->shift_end_time,true);
		$criteria->compare('shift_created_by',$this->shift_created_by);
		$criteria->compare('shift_created_date',$this->shift_created_date,true);

		$shift_data =  new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		$_SESSION['shift_data']=$shift_data;
		return $_SESSION['shift_data'];
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
		$models=self::model()->findAll(array('condition'=>'shift_organization_id='.Yii::app()->user->getState('org_id')));
		foreach($models as $model)
		    self::$_items[$model->shift_id]=$model->shift_type;
	    }
	
	/* before save for uniqueness of shift name */

	public function checkshift()
		{
			if($this->isNewRecord)
			{
				$sname='"'.strtolower($this->shift_type).'"';
				$shift_name=Yii::app()->db->createCommand()
					    ->select('shift_type')
					    ->from('shift')
					    ->where('shift_organization_id='.Yii::app()->user->getState('org_id').' and LOWER(shift_type)='.$sname)
				    	    ->queryAll();
				
				if($shift_name)
				{
					$this->addError('shift_type',"Already Exists.");	
					 return false;	
				}
				else
				{
					return true;
				}
			}
			else
			{
				$sid=$_REQUEST['id'];
				$sname='"'.strtolower($this->shift_type).'"';
				$orgid=Yii::app()->user->getState('org_id');
				$shift_name=Yii::app()->db->createCommand()
					    ->select('shift_type')
					    ->from('shift')
					    ->where('shift_id <>'.$sid.' and shift_organization_id='.$orgid.' and LOWER(shift_type)='.$sname)
				    	    ->queryAll();
				
				if($shift_name)
				  {
				 	$this->addError('shift_type',"Already Exists.");	
					 return false;	
				  }
				else
			          {
					return true;
				  }
			}	

		}
	public function beforeSave()
	{

		  if($this->shift_start_time == $this->shift_end_time)
		  {
				$this->addError("shift_end_time","Select Unique End Time");       
				$this->addError("shift_start_time","Select Unique Start Time ");       
			    	return false;	
		  }
		  else
		  {

				return true;
		  }
	 
	}

}
