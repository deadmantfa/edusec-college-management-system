<?php

/**
 * This is the model class for table "document_category_master".
 *
 * The followings are the available columns in table 'document_category_master':
 * @property integer $doc_category_id
 * @property string $doc_category_name
 * @property integer $created_by
 * @property string $creation_date
 * @property integer $docs_category_organization_id
 */
class DocumentCategoryMaster extends CActiveRecord
{
	public $academic_year,$sem,$branch,$document_category,$department;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DocumentCategoryMaster the static model class
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
		return 'document_category_master';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'doc_category_name'
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
			array('doc_category_name, created_by, creation_date, docs_category_organization_id', 'required','message'=>''),
			array('created_by, docs_category_organization_id', 'numerical', 'integerOnly'=>true),
array('academic_year,sem,branch,document_category','required','on'=>'studentDocumentsearch','message'=>''),
array('department,document_category','required','on'=>'documentsearch','message'=>''),
			array('doc_category_name', 'length', 'max'=>30),
			array('doc_category_name','CRegularExpressionValidator','pattern'=>'/^[a-zA-Z& ]+([-][a-zA-Z ]+)*$/','message'=>''),
			array('doc_category_name', 'unique','message'=>'Already Exists.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('doc_category_id, doc_category_name, created_by, creation_date, docs_category_organization_id', 'safe', 'on'=>'search'),
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
			'Rel_document_user' => array(self::BELONGS_TO, 'User', 'created_by'),
		       'Rel_document_org' => array(self::BELONGS_TO, 'Organization', 'docs_category_organization_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'doc_category_id' => 'Document Category',
			'doc_category_name' => 'Category Name',
			'created_by' => 'Created By',
			'creation_date' => 'Creation Date',
			'docs_category_organization_id' => 'Organization',
			'academic_year'=>'Academic Year',
			'sem'=>'Semester',
			'branch'=>'Branch',
			'document_category'=>'Document Category',
			'department'=>'Department',
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
		$criteria->condition = 'docs_category_organization_id = :org_id';
	        $criteria->params = array(':org_id' => Yii::app()->user->getState('org_id'));
		$criteria->compare('doc_category_id',$this->doc_category_id);
		$criteria->compare('doc_category_name',$this->doc_category_name,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('docs_category_organization_id',$this->docs_category_organization_id);

		$document = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		 $_SESSION['document']=$document;
		return $document;
	}
}
