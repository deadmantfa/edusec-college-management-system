<?php

/**
 * This is the model class for table "miscellaneous_fees_master".
 *
 * The followings are the available columns in table 'miscellaneous_fees_master':
 * @property integer $miscellaneous_fees_id
 * @property string $miscellaneous_fees_name
 * @property integer $created_by
 * @property string $created
 * @property integer $miscellaneous_organization_id
 */
class MiscellaneousFeesMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MiscellaneousFeesMaster the static model class
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
		return 'miscellaneous_fees_master';
	}

	public function defaultScope() 
	{
       		return array(
           		'order' => 'miscellaneous_fees_name'
	        );
  	}
	public $organization_name,$user_organization_email_id;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('miscellaneous_fees_name', 'required', 'message'=>''),
			//array('created_by', 'numerical', 'integerOnly'=>true),
			array('miscellaneous_fees_name', 'length', 'max'=>50, 'message'=>''),
			array('miscellaneous_fees_name','CRegularExpressionValidator','pattern'=>'/^[a-zA-Z0-9_& ]+([-][a-zA-Z0-9_ ]+)*$/','message'=>''),
			
			array('miscellaneous_fees_name', 'checkmiscellaneousfeesname'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('miscellaneous_fees_id,miscellaneous_organization_id, miscellaneous_fees_name, created_by, creation_date', 'safe', 'on'=>'search'),
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
		'Rel_org' => array(self::BELONGS_TO, 'Organization','miscellaneous_organization_id'),
		'Rel_user' => array(self::BELONGS_TO, 'User','created_by'),	
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'miscellaneous_fees_id' => 'Miscellaneous Fees id',
			'miscellaneous_fees_name' => 'Miscellaneous Fees',
			'created_by' => 'Created By',
			'creation_date' => 'Creation Date',
			'miscellaneous_organization_id'=>'organization',
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
		$criteria->condition = 'miscellaneous_organization_id = :miscellaneous_org_id';
	        $criteria->params = array(':miscellaneous_org_id' => Yii::app()->user->getState('org_id'));

		$criteria->compare('miscellaneous_fees_id',$this->miscellaneous_fees_id);
		$criteria->compare('miscellaneous_fees_name',$this->miscellaneous_fees_name,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('miscellaneous_organization_id',$this->miscellaneous_organization_id,true);
		
		$miscellaneousfees_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		$_SESSION['miscellaneousfees_data']=$miscellaneousfees_data;
		return $miscellaneousfees_data;
	}

	/* before save for uniqueness of MiscellaneousFeesName */

	public function checkmiscellaneousfeesname()
		{
			if($this->isNewRecord)
			{
				$mfname='"'.strtolower($this->miscellaneous_fees_name).'"';
				$miscellaneous_fees_name=Yii::app()->db->createCommand()
					    ->select('miscellaneous_fees_name')
					    ->from('miscellaneous_fees_master')
					    ->where('miscellaneous_organization_id='.Yii::app()->user->getState('org_id').' and LOWER(miscellaneous_fees_name)='.$mfname)
				    	    ->queryAll();
				
				if($miscellaneous_fees_name)
				{
					$this->addError('miscellaneous_fees_name',"Already Exists.");	
					 return false;	
				}
				else
				{
					return true;
				}
			}
			else
			{
				$mfid=$_REQUEST['id'];
				$mfname='"'.strtolower($this->miscellaneous_fees_name).'"';
				$orgid=Yii::app()->user->getState('org_id');
				$miscellaneous_fees_name=Yii::app()->db->createCommand()
					    ->select('miscellaneous_fees_name')
					    ->from('miscellaneous_fees_master')
					    ->where('miscellaneous_fees_id <>'.$mfid.' and miscellaneous_organization_id ='.$orgid.' and LOWER(miscellaneous_fees_name)='.$mfname)
				    	    ->queryAll();
				
				if($miscellaneous_fees_name)
				  {
				 	$this->addError('miscellaneous_fees_name',"Already Exists.");	
					 return false;	
				  }
				else
			          {
					return true;
	  			  }
			}	

		}


}
