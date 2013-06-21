<?php

/**
 * This is the model class for table "feedback_category_master".
 *
 * The followings are the available columns in table 'feedback_category_master':
 * @property integer $feedback_category_master_id
 * @property string $feedback_category_name
 * @property integer $feedback_category_created_by
 * @property string $feedback_category_creation_date
 * @property integer $feedback_category_organizaton_id
 */
class FeedbackCategoryMaster extends CActiveRecord
{
	public $organization_name,$user_organization_email_id;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FeedbackCategoryMaster the static model class
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
		return 'feedback_category_master';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'feedback_category_name'
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
			array('feedback_category_name, feedback_category_created_by, feedback_category_creation_date, feedback_category_organizaton_id', 'required','message'=>''),
			array('feedback_category_created_by, feedback_category_organizaton_id', 'numerical', 'integerOnly'=>true,'message'=>''),
			array('feedback_category_name','CRegularExpressionValidator','pattern'=>'/^([A-Za-z  ]+)$/','message'=>''),
			array('feedback_category_name', 'unique','message'=>'Already Exists.'),
			array('feedback_category_name', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('feedback_category_master_id, feedback_category_name, feedback_category_created_by, feedback_category_creation_date, feedback_category_organizaton_id,organization_name,user_organization_email_id', 'safe', 'on'=>'search'),
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
			'Rel_org_feedback' => array(self::BELONGS_TO, 'Organization','feedback_category_organizaton_id'),
			'Rel_user_feedback' => array(self::BELONGS_TO, 'User','feedback_category_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'feedback_category_master_id' => 'Feedback Category Master',
			'feedback_category_name' => 'Category',
			'feedback_category_created_by' => 'Created By',
			'feedback_category_creation_date' => 'Creation Date',
			'feedback_category_organizaton_id' => 'Organizaton',
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

		$criteria->condition = 'feedback_category_organizaton_id = :feedback_category_organizaton_id';
	        $criteria->params = array(':feedback_category_organizaton_id' => Yii::app()->user->getState('org_id'));

		$criteria->compare('feedback_category_master_id',$this->feedback_category_master_id);
		$criteria->with = array('Rel_org_feedback');  /// Note: Define relation with related table....
		$criteria->compare('Rel_org_feedback.organization_name',$this->organization_name,true);  // Note: Compare related table field with relation....
		$criteria->compare('feedback_category_name',$this->feedback_category_name,true);
		$criteria->compare('feedback_category_created_by',$this->feedback_category_created_by);
		$criteria->compare('feedback_category_creation_date',$this->feedback_category_creation_date,true);
		$criteria->compare('feedback_category_organizaton_id',$this->feedback_category_organizaton_id);

		$feedbackcategory = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		$_SESSION['feedbackcategory']=$feedbackcategory;
		return $feedbackcategory;
	}
}
