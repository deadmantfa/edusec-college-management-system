<?php

/**
 * This is the model class for table "assign_company_user_table".
 *
 * The followings are the available columns in table 'assign_company_user_table':
 * @property integer $id
 * @property integer $assign_user_id
 * @property integer $assign_role_id
 * @property integer $assign_org_id
 * @property integer $assign_created_by
 * @property integer $assign_creation_date
 */
class assignCompanyUserTable extends CActiveRecord
{

	public $user_organization_email_id,$organization_name;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return assignCompanyUserTable the static model class
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
		return 'assign_company_user_table';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('assign_user_id, assign_org_id', 'required','message'=>''),
			array('assign_user_id, assign_role_id, assign_org_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, assign_user_id, assign_role_id, assign_org_id,user_organization_email_id,organization_name', 'safe', 'on'=>'search'),
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
			'Rel_ass_role' => array(self::BELONGS_TO, 'RoleMaster', 'assign_role_id'),
			'Rel_ass_org' => array(self::BELONGS_TO, 'Organization', 'assign_org_id'),
			'Rel_ass_user' => array(self::BELONGS_TO, 'User', 'assign_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID :',
			'assign_user_id' => 'Assign User',
			'assign_role_id' => 'Assign Role',
			'assign_org_id' => 'Organization',
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

		$criteria->select = 'assign_user_id , assign_org_id';
		$criteria->condition = 'assign_org_id = '.Yii::app()->user->getState('org_id');
		$criteria->with = array('Rel_ass_user','Rel_ass_org');
		$criteria->compare('Rel_ass_user.user_organization_email_id',$this->user_organization_email_id,true);
		$criteria->compare('Rel_ass_org.organization_name',$this->organization_name,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('assign_user_id',$this->assign_user_id);
		$criteria->compare('assign_role_id',$this->assign_role_id);
		$criteria->compare('assign_org_id',$this->assign_org_id);

		$company_data = new CActiveDataProvider(get_class($this),array(
			'criteria'=>$criteria,
		));
		$_SESSION['company_data'] = $company_data;
		return $company_data;
	}

	public function beforeSave()
	{
		    if($this->isNewRecord)
		    {
		        $result=assignCompanyUserTable::model()->findByAttributes(array('assign_user_id'=>$this->assign_user_id,'assign_org_id'=>$this->assign_org_id));

		        if(count($result))
		        {
		            $this->addErrors(array(
		            'assign_user_id'=>'Record already exist with this criteria',
		            'assign_org_id'=>'Record already exist with this criteria'));
		            return false;

		        }
		        else
		        {
		            return true;   
		        }
		    }
		   
		    else
		    {
		        $temp=assignCompanyUserTable::model()->findByPk($this->id);
		        if($this->assign_user_id == $temp['assign_user_id'] && $this->assign_org_id == $temp['assign_org_id'])
		        {
		            return true;
		        }
		        else
		        {
		           
				   $result=assignCompanyUserTable::model()->findByAttributes(array('assign_user_id'=>$this->assign_user_id,'assign_org_id'=>$this->assign_org_id));

				if(count($result))
				{
				    $this->addErrors(array(
				    'assign_user_id'=>'Record already exist with this criteria',
				    'assign_org_id'=>'Record already exist with this criteria'));
				    return false;

				}
				else
				{
				    return true;   
				}
		        }
		   
		    }
		}
}
