<?php

/**
 * This is the model class for table "academic_term_trans".
 *
 * The followings are the available columns in table 'academic_term_trans':
 * @property integer $academic_term_trans_id
 * @property integer $academic_term_trans_terms_id
 * @property integer $academic_term_trans_academicterm_period_id
 */
class AcademicTermTrans extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AcademicTermTrans the static model class
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
		return 'academic_term_trans';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('academic_term_trans_terms_id, academic_term_trans_academicterm_period_id', 'required','message'=>''),
			array('academic_term_trans_terms_id, academic_term_trans_academicterm_period_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('academic_term_trans_id, academic_term_trans_terms_id, academic_term_trans_academicterm_period_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'academic_term_trans_id' => 'Academic Term Trans',
			'academic_term_trans_terms_id' => 'Academic Term Trans Terms',
			'academic_term_trans_academicterm_period_id' => 'Academic Term Trans Academicterm Period',
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

		$criteria->compare('academic_term_trans_id',$this->academic_term_trans_id);
		$criteria->compare('academic_term_trans_terms_id',$this->academic_term_trans_terms_id);
		$criteria->compare('academic_term_trans_academicterm_period_id',$this->academic_term_trans_academicterm_period_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
