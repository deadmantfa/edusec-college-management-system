<?php

/**
 * This is the model class for table "branch".
 *
 * The followings are the available columns in table 'branch':
 * @property integer $branch_id
 * @property string $branch_name
 * @property string $branch_tag_id
 * @property integer $branch_organization_id
 * @property integer $branch_created_by
 * @property string $branch_creation_date
 *@property string $branch_alias
 *@property string $branch_code
 */
class Branch extends CActiveRecord
{
	public $branch_tag_name;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Branch the static model class
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
		return 'branch';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'branch_name'
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
			array('branch_name, branch_created_by, branch_creation_date, branch_code,branch_alias,branch_tag_id', 'required','message'=>''),
			array('branch_organization_id, branch_created_by,branch_tag_id', 'numerical', 'integerOnly'=>true),
			array('branch_name', 'length', 'max'=>60),
			array('branch_alias', 'length', 'max'=>20),
			array('branch_code', 'length', 'max'=>5),
			array('branch_name', 'checkbranch'),
			array('branch_name,branch_alias','CRegularExpressionValidator', 'pattern'=>'/^([A-Za-z& ]+)$/','message'=>''),
			array('branch_code','CRegularExpressionValidator', 'pattern'=>'/^([0-9]+)$/','message'=>''),			
// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('branch_id, branch_name, branch_organization_id, branch_created_by, branch_creation_date ,branch_code,branch_alias, branch_tag_id', 'safe', 'on'=>'search'),
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

			'Rel_Branch_Tag' => array(self::BELONGS_TO, 'BranchPassoutsemTagTable','branch_tag_id'),
			'Rel_org'=>array(self::BELONGS_TO, 'Organization','branch_organization_id'),
			'Rel_user' => array(self::BELONGS_TO, 'User','branch_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'branch_id' => 'Branch',
			'branch_name' => 'Name',
			'branch_tag_id' => 'Tag Name',
			'branch_organization_id' => 'Organization',
			'branch_created_by' => 'Created By',
			'branch_creation_date' => 'Creation Date',
			'branch_code' => 'Code',
			'branch_alias' => 'Alias',
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

		$criteria->condition = 'branch_organization_id = :branch_org_id';
	        $criteria->params = array(':branch_org_id' => Yii::app()->user->getState('org_id'));

		//$criteria->with = array('Rel_Branch_Tag');  /// Note: Define relation with related table....
		//$criteria->compare('Rel_Branch_Tag.branch_tag_name',$this->branch_tag_name,true);  // Note: Compare related table field with relation....
		$criteria->compare('branch_tag_id',$this->branch_tag_id,true);
		$criteria->compare('branch_id',$this->branch_id);
		$criteria->compare('branch_name',$this->branch_name,true);
		$criteria->compare('branch_organization_id',$this->branch_organization_id);
		$criteria->compare('branch_created_by',$this->branch_created_by);
		$criteria->compare('branch_creation_date',$this->branch_creation_date,true);
		$criteria->compare('branch_code',$this->branch_code);
		$criteria->compare('branch_alias',$this->branch_alias);
		$branch_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		$_SESSION['branch_records']=$branch_data;
		return $branch_data;
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
        $models=self::model()->findAll(array('condition'=>'branch_organization_id='.Yii::app()->user->getState('org_id')));
        foreach($models as $model)
            self::$_items[$model->branch_id]=$model->branch_name;
    }


/* for code */	
private static $_bcode=array();

        public static function code()
        {
            if(isset(self::$_bcode))
                self::loadItems1();
            return self::$_bcode;
        }

    public static function item1($code)
    {
        if(!isset(self::$_bcode))
            self::loadItems1();
        return isset(self::$_bcode[$code]) ? self::$_bcode[$code] : false;
    }

    private static function loadItems1()
    {
        self::$_bcode=array();
        $models=self::model()->findAll(array('condition'=>'branch_organization_id='.Yii::app()->user->getState('org_id')));
        foreach($models as $model)
            self::$_bcode[$model->branch_id]=$model->branch_alias;
    }


/* before save for uniqueness of branch name */

	public function checkbranch()
		{
			if($this->isNewRecord)
			{
				$bname='"'.strtolower($this->branch_name).'"';
				$branch_name=Yii::app()->db->createCommand()
					    ->select('branch_name')
					    ->from('branch')
					    ->where('branch_organization_id='.Yii::app()->user->getState('org_id').' and LOWER(branch_name)='.$bname)
				    	    ->queryAll();
				if($branch_name)
				  {
				 	$this->addError('branch_name',"Already Exists.");	
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
				$bname='"'.strtolower($this->branch_name).'"';
				$orgid=Yii::app()->user->getState('org_id');
				$branch_name=Yii::app()->db->createCommand()
					    ->select('branch_name')
					    ->from('branch')
					    ->where('branch_id <>'.$bid.' and branch_organization_id='.$orgid.' and LOWER(branch_name)='.$bname)
				    	    ->queryAll();
				
				if($branch_name)
				  {
				 	$this->addError('branch_name',"Already Exists.");	
					 return false;	
				  }
				else
			          {
					return true;
				  }
				
			}
			
		}

}
