<?php

/**
 * This is the model class for table "branch_passoutsem_tag_table".
 *
 * The followings are the available columns in table 'branch_passoutsem_tag_table':
 * @property integer $id
 * @property string $branch_tag_name
 * @property integer $pass_out_sem
 * @property integer $created_by
 * @property string $creation_date
 * @property integer $organization_id
 */
class BranchPassoutsemTagTable extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BranchPassoutsemTagTable the static model class
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
		return 'branch_passoutsem_tag_table';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'branch_tag_name'
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
			array('branch_tag_name, pass_out_sem, created_by, creation_date, organization_id', 'required','message'=>""),
			array('pass_out_sem, created_by, organization_id', 'numerical', 'integerOnly'=>true,'message'=>""),
			array('branch_tag_name','CRegularExpressionValidator','pattern'=>'/^([a-zA-Z ]+)$/','message'=>''),
			
			array('branch_tag_name', 'length', 'max'=>20),
			//array('branch_tag_name', 'unique','message'=>'Already Exist.'),
			array('branch_tag_name', 'checkbranch'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, branch_tag_name, pass_out_sem, created_by, creation_date, organization_id', 'safe', 'on'=>'search'),
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
			'Rel_org'=>array(self::BELONGS_TO,'Organization','organization_id'),
			'Rel_user'=>array(self::BELONGS_TO, 'User','created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'branch_tag_name' => 'Branch Tag',
			'pass_out_sem' => 'Pass Out Sem',
			'created_by' => 'Created By',
			'creation_date' => 'Creation Date',
			'organization_id' => 'Organization',
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

		$criteria->condition = 'organization_id = :organization_id';
	        $criteria->params = array(':organization_id' => Yii::app()->user->getState('org_id'));

		$criteria->compare('id',$this->id);
		$criteria->compare('branch_tag_name',$this->branch_tag_name,true);
		$criteria->compare('pass_out_sem',$this->pass_out_sem);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('organization_id',$this->organization_id);

		$branch_tag_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		$_SESSION['branch_tag_records']=$branch_tag_data;
		return $branch_tag_data;
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
        	$models=self::model()->findAll(array('condition'=>'organization_id='.Yii::app()->user->getState('org_id')));
        	foreach($models as $model)
            self::$_items[$model->id]=$model->branch_tag_name;
    	}

/* before save for uniqueness of branch tag name */

	public function checkbranch()
		{
			if($this->isNewRecord)
			{
				$bname='"'.strtolower($this->branch_tag_name).'"';
				$branch_name=Yii::app()->db->createCommand()
					    ->select('branch_tag_name')
					    ->from('branch_passoutsem_tag_table')
					    ->where('organization_id='.Yii::app()->user->getState('org_id').' and LOWER(branch_tag_name)='.$bname)
				    	    ->queryAll();
				if($branch_name)
				  {
				 	$this->addError('branch_tag_name',"Already Exists.");	
					 return false;	
				  }
				else
			          {
					return true;
				  }
				
			}
			else
			{
				$bid=$_REQUEST['id'];
				$bname='"'.strtolower($this->branch_tag_name).'"';
				$orgid=Yii::app()->user->getState('org_id');
				$branch_name=Yii::app()->db->createCommand()
					    ->select('branch_tag_name')
					    ->from('branch_passoutsem_tag_table')
					    ->where('id <>'.$bid.' and organization_id='.$orgid.' and LOWER(branch_tag_name)='.$bname)
				    	    ->queryAll();
				
				if($branch_name)
				  {
				 	$this->addError('branch_tag_name',"Already Exists.");	
					 return false;	
				  }
				else
			          {
					return true;
				  }
				
			}
			
		}
}
