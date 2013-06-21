<?php

/**
 * This is the model class for table "division".
 *
 * The followings are the available columns in table 'division':
 * @property integer $division_id
 * @property string $division_name
 * @property integer $division_organization_id
 * @property integer $division_created_by
 * @property string $division_creation_date
 */
class Division extends CActiveRecord
{
	public $branch_name,$academic_term_name,$academic_term_period;
	public $user;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Division the static model class
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
		return 'division';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'division_name'
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
			array('division_name, division_organization_id, division_created_by, division_creation_date, branch_id , academic_period_id, academic_name_id, division_code', 'required','message'=>''),
			array('division_organization_id, division_created_by, branch_id , academic_period_id, academic_name_id', 'numerical', 'integerOnly'=>true),
			array('division_name', 'length', 'max'=>60),
array('division_name','CRegularExpressionValidator','pattern'=>'/^[a-zA-Z1-9]+([-][a-zA-Z1-9]+)*$/','message'=>''),
			//array('division_name', 'unique','message'=>'Already Exist.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('division_id, division_name, division_organization_id, division_created_by, division_creation_date, branch_id , academic_period_id, academic_name_id, branch_name,academic_term_name,academic_term_period', 'safe', 'on'=>'search'),
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
		'Rel_Branch' => array(self::BELONGS_TO, 'Branch','branch_id'),
		'Rel_ac_term'=> array(self::BELONGS_TO, 'AcademicTerm','academic_name_id'),
		'Rel_ac_period'=> array(self::BELONGS_TO, 'AcademicTermPeriod','academic_period_id'),
		'Rel_org' => array(self::BELONGS_TO, 'Organization','division_organization_id'),
		'Rel_user' => array( self::BELONGS_TO, 'User','division_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'division_id' => 'Division',
			'division_name' => 'Division',
			'division_organization_id' => 'Organization',
			'division_created_by' => 'Created By',
			'division_creation_date' => 'Creation Date',
			'branch_id'=>'Branch Code/Alias',
			'academic_period_id'=>'Academic Year',
			'academic_name_id'=>'Semester',
			'division_code'=>'Division Code',
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

		//$criteria->condition = 'division_organization_id = :division_org_id';
	       // $criteria->params = array(':division_org_id' => Yii::app()->user->getState('org_id'));

		$acdm_terms = AcademicTerm::model()->findAll('current_sem=1 and academic_term_organization_id='.Yii::app()->user->getState('org_id'));
			
			$data = array();
			foreach($acdm_terms as $list)
			{
				$data[] = $list['academic_term_id'];
			}
			$criteria->addInCondition('academic_name_id', $data, 'OR');



		//$criteria->with = array('Rel_Branch');  /// Note: Define relation with related table....
		//$criteria->compare('Rel_Branch.branch_name',$this->branch_name,true);  // Note: Compare related table field with relation....

		$criteria->compare('division_id',$this->division_id);
		$criteria->compare('division_name',$this->division_name,true);
		$criteria->compare('division_organization_id',$this->division_organization_id);
		$criteria->compare('division_created_by',$this->division_created_by);
		$criteria->compare('division_creation_date',$this->division_creation_date,true);
		$criteria->compare('branch_id',$this->branch_id,true);
		$criteria->compare('academic_period_id',$this->academic_period_id);
		$criteria->compare('academic_name_id',$this->academic_name_id);
		$criteria->compare('division_code',$this->division_code);


		$division_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
				    'branch_name'=>array(
					'asc'=>'Rel_Branch.branch_name',
					'desc'=>'Rel_Branch.branch_name DESC',
				    ),
				 '*',
				   
				),
			    ),
		));
		$_SESSION['division_data'] = $division_data;
		return $division_data;
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
			$models=self::model()->findAll(array('condition'=>'division_organization_id='.Yii::app()->user->getState('org_id')));
			foreach($models as $model)
			self::$_items[$model->division_id]=$model->division_code;
		    }


//for checking already exist division

		public  function beforeSave()
		{
			if($this->isNewRecord)
			{
				$divname=strtolower($this->division_name);
				$division_name=Yii::app()->db->createCommand()
					    ->select('division_name')
					    ->from('division')
					    ->where('division_organization_id='.Yii::app()->user->getState('org_id').' and LOWER(division_name)="'.$divname.'" and branch_id='.$this->branch_id.' and  academic_period_id='.$this->academic_period_id.' and academic_name_id='.$this->academic_name_id)
				    	    ->queryAll();
				
				if($division_name)
				{
					$this->addError('division_name',"Already Exists.");	
					 return false;	
				}
				else
				{
					return true;
				}
			}
			else
			{
				$divname=strtolower($this->division_name);
				$division_name=Yii::app()->db->createCommand()
					    ->select('division_name')
					    ->from('division')
					    ->where('division_organization_id='.Yii::app()->user->getState('org_id').' and LOWER(division_name)="'.$divname.'" and branch_id='.$this->branch_id.' and  academic_period_id='.$this->academic_period_id.' and academic_name_id='.$this->academic_name_id.' and division_id<>'.$_REQUEST['id'])
				    	    ->queryAll();
				
				if($division_name)
				{
					$this->addError('division_name',"Already Exists.");	
					 return false;	
				}
				else
				{
					return true;
				}
				
			}
		}
}
