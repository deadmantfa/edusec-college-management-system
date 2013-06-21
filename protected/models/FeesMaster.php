<?php

/**
 * This is the model class for table "fees_master".
 *
 * The followings are the available columns in table 'fees_master':
 * @property integer $fees_master_id
 * @property string $fees_master_name
 * @property integer $fees_master_created_by
 * @property string $fees_master_created_date
 * @property integer $fees_master_tally_id
 * @property integer $fees_organization_id
 * @property integer $fees_branch_id
 * @property integer $fees_academic_term_id
* @property integer $fees_academic_term_period_id
* @property integer $fees_academic_term_name_id

 * @property integer $fees_quota_id
 */
class FeesMaster extends CActiveRecord
{
	public $branch_name, $quota_name,$academic_term_name,$academic_period;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FeesMaster the static model class
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
		return 'fees_master';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'fees_master_name'
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
			array('fees_master_name, fees_organization_id, fees_branch_id, fees_academic_term_id, fees_academic_term_name_id, fees_quota_id', 'required','message'=>''),
			//array('fees_master_created_by, fees_master_tally_id, fees_organization_id, fees_branch_id, fees_academic_term_id, fees_academic_term_name_id, fees_quota_id, fees_master_total', 'numerical', 'integerOnly'=>true),
			array('fees_branch_id,fees_quota_id,fees_academic_term_name_id' ,'required' ,'on'=>'GenerateMultipleFees','message'=>''),
			array('fees_master_name', 'length', 'max'=>50),
			array('fees_master_name', 'unique','message'=>'Already Exist.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fees_master_id, fees_master_name, fees_master_created_by, fees_master_created_date, fees_master_tally_id, fees_organization_id, fees_branch_id, fees_academic_term_id, fees_academic_term_name_id, fees_quota_id, branch_name, quota_name', 'safe', 'on'=>'search'),
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
			/*
			'Rel_fees_org' => array(self::BELONGS_TO, 'Organization', 'fees_organization_id'),
			'Rel_fees_branch' => array(self::BELONGS_TO, 'Branch', 'fees_branch_id'),
			'Rel_fees_acmd' => array(self::BELONGS_TO, 'AcademicTermPeriod', 'fees_academic_term_id'),			
			'Rel_fees_acdm_term_name' => array(self::BELONGS_TO, 'AcademicTerm', 'fees_academic_term_name_id'),
			'Rel_fees_quota' => array(self::BELONGS_TO, 'Quota', 'fees_quota_id'),*/

			'Rel_fees_org' => array(self::BELONGS_TO, 'Organization', 'fees_organization_id'),
			'Rel_fees_branch' => array(self::BELONGS_TO, 'Branch', 'fees_branch_id'),
			'Rel_fees_acmd' => array(self::BELONGS_TO, 'AcademicTermPeriod', 'fees_academic_term_id'),			
			'Rel_fees_acdm_term_name' => array(self::BELONGS_TO, 'AcademicTerm', 'fees_academic_term_name_id'),
			'Rel_student_academic_terms_period_name' => array(self::BELONGS_TO, 'AcademicTermPeriod', 'student_academic_term_period_tran_id'),
			'Rel_fees_quota' => array(self::BELONGS_TO, 'Quota', 'fees_quota_id'),
			'Rel_user'=>array(self::BELONGS_TO, 'User', 'fees_master_created_by'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'fees_master_id' => 'Fees Master id',
			'fees_master_name' => 'Fees Category',
			'fees_master_created_by' => 'Created By',
			'fees_master_created_date' => 'Creation Date',
			'fees_master_tally_id' => 'Fees Master Tally',
			'fees_organization_id' => 'Organization',
			'fees_branch_id' => 'Branch',
			'fees_academic_term_id' => 'Academic Year',
			'fees_academic_term_name_id' => 'Semester',
			'fees_quota_id' => 'Fees Quota',
			'fees_master_total' => 'Total Fees',
			'academic_term_name'=>'Semester',
			'academic_term_period'=>'Academic Year',
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
		$acdm_terms = AcademicTerm::model()->findAll('current_sem=1 and academic_term_organization_id='.Yii::app()->user->getState('org_id'));
		
		$data = array();
		foreach($acdm_terms as $list)
		{
			$data[] = $list['academic_term_id'];
		}

		$criteria=new CDbCriteria;
		$criteria->with = array('Rel_fees_branch','Rel_fees_quota');

		$criteria->addInCondition('fees_academic_term_name_id', $data, 'OR');

		$criteria->compare('fees_master_id',$this->fees_master_id);
		$criteria->compare('fees_master_name',$this->fees_master_name,true);
		$criteria->compare('fees_master_created_by',$this->fees_master_created_by);
		$criteria->compare('fees_master_created_date',$this->fees_master_created_date,true);
		$criteria->compare('fees_master_tally_id',$this->fees_master_tally_id);
		$criteria->compare('fees_organization_id',$this->fees_organization_id);
		$criteria->compare('fees_branch_id',$this->fees_branch_id);
		$criteria->compare('fees_academic_term_id',$this->fees_academic_term_id);
		
		$criteria->compare('fees_academic_term_name_id',$this->fees_academic_term_name_id);
		$criteria->compare('fees_quota_id',$this->fees_quota_id);

		$criteria->compare('Rel_fees_branch.branch_name',$this->branch_name,true);
		$criteria->compare('Rel_fees_quota.quota_name',$this->quota_name,true);

		$data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		$_SESSION['fees_master'] = $data;
		return $data;
	}

	public function previousfeesdata()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
		$criteria->with = array('Rel_fees_branch');
		$acdm_terms = AcademicTerm::model()->findAll('current_sem=0 and academic_term_organization_id='.Yii::app()->user->getState('org_id'));
		
		$data = array();
		foreach($acdm_terms as $list)
		{
			$data[] = $list['academic_term_id'];
		}
		$criteria->addInCondition('fees_academic_term_name_id', $data, 'OR');

		//$criteria->condition = 'fees_organization_id = :org_id';
	      //  $criteria->params = array(':org_id' => Yii::app()->user->getState('org_id'));

		$criteria->compare('fees_master_id',$this->fees_master_id);
		$criteria->compare('fees_master_name',$this->fees_master_name,true);
		$criteria->compare('fees_master_created_by',$this->fees_master_created_by);
		$criteria->compare('fees_master_created_date',$this->fees_master_created_date,true);
		$criteria->compare('fees_master_tally_id',$this->fees_master_tally_id);
		$criteria->compare('fees_organization_id',$this->fees_organization_id);
		$criteria->compare('fees_branch_id',$this->fees_branch_id);
		$criteria->compare('fees_academic_term_id',$this->fees_academic_term_id);
		
		$criteria->compare('fees_academic_term_name_id',$this->fees_academic_term_name_id);
		$criteria->compare('fees_quota_id',$this->fees_quota_id);

		$criteria->compare('Rel_fees_branch.branch_name',$this->branch_name,true);
		//$criteria->compare('Rel_fees_quota.quota_name',$this->quota_name,true);

		$data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		$_SESSION['fees_master'] = $data;
		return $data;
	}



	/*public function beforeSave()
	{
		    if($this->isNewRecord)
		    {
		        $result=FeesMaster::model()->findByAttributes(array('fees_branch_id'=>$this->fees_branch_id,'fees_academic_term_id'=>$this->fees_academic_term_id,'fees_academic_term_name_id'=>$this->fees_academic_term_name_id,'fees_quota_id'=>$this->fees_quota_id));

		        if(count($result))
		        {
		            $this->addErrors(array(
		            'fees_quota_id'=>'Record already exist with this criteria',
		            'fees_branch_id'=>'Record already exist with this criteria',
		            'fees_academic_term_id'=>'Record already exist with this criteria',
		            'fees_academic_term_name_id'=>'Record already exist with this criteria'));
		            return false;

		        }
		        else
		        {
		            return true;   
		        }
		    }
		   
		    else
		    {
		        $temp=FeesMaster::model()->findByPk($this->fees_master_id);
		        if($this->fees_branch_id == $temp['fees_branch_id'] && $this->fees_academic_term_id == $temp['fees_academic_term_id'] && $this->fees_academic_term_name_id == $temp['fees_academic_term_name_id'] && $this->fees_quota_id == $temp['fees_quota_id'])
		        {
		            return true;
		        }
		        else
		        {
		           
		            $result=FeesMaster::model()->findByAttributes(array('fees_branch_id'=>$this->fees_branch_id,'fees_academic_term_id'=>$this->fees_academic_term_id,'fees_academic_term_name_id'=>$this->fees_academic_term_name_id,'fees_quota_id'=>$this->fees_quota_id));

		            if(count($result))
		            {
		                $this->addErrors(array(
		            'fees_quota_id'=>'Record already exist with this criteria',
		            'fees_branch_id'=>'Record already exist with this criteria',
		            'fees_academic_term_id'=>'Record already exist with this criteria',
		            'fees_academic_term_name_id'=>'Record already exist with this criteria'));
		           
		                return false;

		            }
		            else
		            {
		                return true;   
		            }
		        }
		   
		    }
		}
		*/
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
			$models=self::model()->findAll(array('condition'=>'fees_organization_id='.Yii::app()->user->getState('org_id')));
			foreach($models as $model)
		    self::$_items[$model->fees_master_id]=$model->fees_master_name;
	    	}

		

}
