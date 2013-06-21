<?php

/**
 * This is the model class for table "miscellaneous_fees_payment_cheque".
 *
 * The followings are the available columns in table 'miscellaneous_fees_payment_cheque':
 * @property integer $miscellaneous_fees_payment_cheque_id
 * @property integer $miscellaneous_fees_payment_cheque_master_id
 * @property integer $miscellaneous_fees_payment_cheque_number
 * @property string $miscellaneous_fees_payment_cheque_date
 * @property integer $miscellaneous_fees_payment_cheque_bank
 * @property string $miscellaneous_fees_payment_cheque_branch
 * @property integer $miscellaneous_fees_payment_cheque_amount
 * @property integer $miscellaneous_fees_payment_cheque_status
 * @property integer $miscellaneous_fees_payment_cheque_draft_status
 * @property integer $miscellaneous_fees_payment_cheque_student_id
 * @property integer $miscellaneous_fees_payment_cheque_receipt_id
 * @property integer $miscellaneous_fees_payment_cheque_created_by
 * @property integer $miscellaneous_fees_payment_cheque_creation_date
* @property integer $miscellaneous_fees_payment_cheque_organization_id 	
 */
class MiscellaneousFeesPaymentCheque extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MiscellaneousFeesPaymentCheque the static model class
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
		return 'miscellaneous_fees_payment_cheque';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('miscellaneous_fees_payment_cheque_master_id, miscellaneous_fees_payment_cheque_number, miscellaneous_fees_payment_cheque_date, miscellaneous_fees_payment_cheque_bank, miscellaneous_fees_payment_cheque_branch, miscellaneous_fees_payment_cheque_amount, miscellaneous_fees_payment_cheque_status, miscellaneous_fees_payment_cheque_draft_status, miscellaneous_fees_payment_cheque_student_id, miscellaneous_fees_payment_cheque_receipt_id', 'required', 'message'=>''),

			array('miscellaneous_fees_payment_cheque_amount,miscellaneous_fees_payment_cheque_number','length', 'max'=>6),
			array('miscellaneous_fees_payment_cheque_number, miscellaneous_fees_payment_cheque_bank, miscellaneous_fees_payment_cheque_amount, miscellaneous_fees_payment_cheque_status, miscellaneous_fees_payment_cheque_student_id, miscellaneous_fees_payment_cheque_receipt_id,miscellaneous_fees_payment_cheque_organization_id', 'numerical', 'integerOnly'=>true, 'message'=>''),
			array('miscellaneous_fees_payment_cheque_branch', 'length', 'max'=>50, 'message'=>''),
			array('miscellaneous_fees_payment_cheque_amount','CRegularExpressionValidator','pattern'=>'/^[1-9][0-9]*$/','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('miscellaneous_fees_payment_cheque_amount','CRegularExpressionValidator','pattern'=>'/^([0-9]+)$/','message'=>''),
			array('miscellaneous_fees_payment_cheque_master_id, miscellaneous_fees_payment_cheque_id, miscellaneous_fees_payment_cheque_number, miscellaneous_fees_payment_cheque_date, miscellaneous_fees_payment_cheque_bank, miscellaneous_fees_payment_cheque_branch, miscellaneous_fees_payment_cheque_amount, miscellaneous_fees_payment_cheque_status, miscellaneous_fees_payment_cheque_draft_status, miscellaneous_fees_payment_cheque_student_id, miscellaneous_fees_payment_cheque_receipt_id, miscellaneous_fees_payment_cheque_created_by, miscellaneous_fees_payment_cheque_creation_date,miscellaneous_fees_payment_cheque_organization_id,	miscellaneous_fees_cheque_received_date', 'safe', 'on'=>'search'),
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

			'miscellaneous_fees_payment_cheque_id' => 'Miscellaneous Fees Payment Cheque',
			'miscellaneous_fees_payment_cheque_master_id' => 'Miscellaneous Fees',
			'miscellaneous_fees_payment_cheque_number' => 'Cheque Number',
			'miscellaneous_fees_payment_cheque_date' => 'Cheque Date',
			'miscellaneous_fees_payment_cheque_bank' => 'Cheque Bank',
			'miscellaneous_fees_payment_cheque_branch' => 'Cheque Branch',
			'miscellaneous_fees_payment_cheque_amount' => 'Cheque Amount',
			'miscellaneous_fees_payment_cheque_status' => 'Miscellaneous Fees Payment Cheque Status',

			'miscellaneous_fees_payment_cheque_draft_status' => 'Miscellaneous Fees Payment Cheque Draft Status',

			'miscellaneous_fees_payment_cheque_student_id' => 'Miscellaneous Fees Payment Cheque Student',
			'miscellaneous_fees_payment_cheque_receipt_id' => 'Cheque Receipt No.',
			'miscellaneous_fees_payment_cheque_created_by' => 'Miscellaneous Fees Payment Cheque Created By',
			'miscellaneous_fees_payment_cheque_creation_date' => 'Fees Collect Date',
			'miscellaneous_fees_payment_cheque_organization_id'=>'Organization',
			'miscellaneous_fees_cheque_received_date' => 'Cheque Received Date'
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

		$criteria->compare('miscellaneous_fees_payment_cheque_master_id',$this->miscellaneous_fees_payment_cheque_master_id);
		$criteria->compare('miscellaneous_fees_payment_cheque_id',$this->miscellaneous_fees_payment_cheque_id);
		$criteria->compare('miscellaneous_fees_payment_cheque_number',$this->miscellaneous_fees_payment_cheque_number);
		$criteria->compare('miscellaneous_fees_payment_cheque_date',$this->dbDateSearch($this->miscellaneous_fees_payment_cheque_date),true);
		$criteria->compare('miscellaneous_fees_payment_cheque_bank',$this->miscellaneous_fees_payment_cheque_bank);
		$criteria->compare('miscellaneous_fees_payment_cheque_branch',$this->miscellaneous_fees_payment_cheque_branch,true);
		$criteria->compare('miscellaneous_fees_payment_cheque_amount',$this->miscellaneous_fees_payment_cheque_amount);
		$criteria->compare('miscellaneous_fees_payment_cheque_status',$this->miscellaneous_fees_payment_cheque_status);
		$criteria->compare('miscellaneous_fees_payment_cheque_draft_status',$this->miscellaneous_fees_payment_cheque_draft_status);
		$criteria->compare('miscellaneous_fees_payment_cheque_student_id',$this->miscellaneous_fees_payment_cheque_student_id);
		$criteria->compare('miscellaneous_fees_payment_cheque_receipt_id',$this->miscellaneous_fees_payment_cheque_receipt_id);

		$criteria->compare('miscellaneous_fees_payment_cheque_organization_id',$this->miscellaneous_fees_payment_cheque_organization_id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	private function dbDateSearch($value)
        {
                if($value != "" && preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/', $value,$matches))
                return date("Y-m-d",strtotime($matches[0]));
            else
                return $value;
        }
	public function mysearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
	
		$criteria->condition ="miscellaneous_fees_payment_cheque_student_id = :studentid && miscellaneous_fees_payment_cheque_status = :miscellaneous_fees_payment_cheque_status && miscellaneous_fees_payment_cheque_draft_status = :miscellaneous_fees_payment_cheque_draft_status";
		$criteria->params = array (
		':studentid' => $_REQUEST['id'],
		':miscellaneous_fees_payment_cheque_status' => 0,
		':miscellaneous_fees_payment_cheque_draft_status' => 1,
		);

		$criteria->compare('miscellaneous_fees_payment_cheque_master_id',$this->miscellaneous_fees_payment_cheque_master_id);
		$criteria->compare('miscellaneous_fees_payment_cheque_id',$this->miscellaneous_fees_payment_cheque_id);
		$criteria->compare('miscellaneous_fees_payment_cheque_number',$this->miscellaneous_fees_payment_cheque_number);
		$criteria->compare('miscellaneous_fees_payment_cheque_date',$this->dbDateSearch($this->miscellaneous_fees_payment_cheque_date),true);
		$criteria->compare('miscellaneous_fees_payment_cheque_bank',$this->miscellaneous_fees_payment_cheque_bank);
		$criteria->compare('miscellaneous_fees_payment_cheque_branch',$this->miscellaneous_fees_payment_cheque_branch,true);
		$criteria->compare('miscellaneous_fees_payment_cheque_amount',$this->miscellaneous_fees_payment_cheque_amount);
		$criteria->compare('miscellaneous_fees_payment_cheque_status',$this->miscellaneous_fees_payment_cheque_status);
		$criteria->compare('miscellaneous_fees_payment_cheque_draft_status',$this->miscellaneous_fees_payment_cheque_draft_status);
		$criteria->compare('miscellaneous_fees_payment_cheque_student_id',$this->miscellaneous_fees_payment_cheque_student_id);
		$criteria->compare('miscellaneous_fees_payment_cheque_receipt_id',$this->miscellaneous_fees_payment_cheque_receipt_id);
		$criteria->compare('miscellaneous_fees_payment_cheque_organization_id',$this->miscellaneous_fees_payment_cheque_organization_id);
		$cheque_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		$_SESSION['cheque_data']=$cheque_data;
		return $cheque_data;
	}

	public function beforesave()
	{
		//echo Yii::app()->user->getState('student_id');
		$my_date = date("Y-m-d");
		$receipt = new MiscellaneousFeesReceipt;
		
		if($this->isNewRecord)
		{
			if($this->miscellaneous_fees_payment_cheque_date > $my_date)
			{
				$last_receipt_id = Yii::app()->db->createCommand()
				->select('MAX(miscellaneous_fees_receipt_number) as lastid')
				->from('miscellaneous_fees_receipt')
				->where('miscellaneous_fees_receipt_org_id=:id', array(':id'=>Yii::app()->user->getState('org_id')))
				->queryRow();
			   	$receipt->miscellaneous_fees_receipt_number = $last_receipt_id['lastid'] + 1; 
				$receipt->miscellaneous_fees_receipt_org_id = Yii::app()->user->getState('org_id');

			
			
				$receipt->save();
				$this->miscellaneous_fees_payment_cheque_receipt_id = $receipt->miscellaneous_fees_receipt_id;
		    		return true;
			}
			else
			{
		    		$this->addError("miscellaneous_fees_payment_cheque_date","Cheque Date Must Be After Current Date");       
		    		return false;
			}
		}
		else
		{
			 $result=MiscellaneousFeesPaymentCheque::model()->findByPk($this->miscellaneous_fees_payment_cheque_id);
			 if($this->miscellaneous_fees_payment_cheque_date == $result['miscellaneous_fees_payment_cheque_date'])
			 {
				return true;
			 }
			 else
			 {
				if($this->miscellaneous_fees_payment_cheque_date > $my_date)
				{
		    			return true;
				}
				else
				{
		    			$this->addError("miscellaneous_fees_payment_cheque_date","Cheque Date Must Be After Current Date");       
		    			return false;
				}
				return false;
			}
		}

	}

	public function mydraftsearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		/*
		$criteria->condition = 'miscellaneous_fees_payment_cheque_student_id = :studentid';
	        $criteria->params = array(':studentid' => $_REQUEST['id']);
		$criteria->condition = 'miscellaneous_fees_payment_cheque_draft_status = 2';*/

		$criteria->condition = "miscellaneous_fees_payment_cheque_student_id = :studentid && miscellaneous_fees_payment_cheque_draft_status = :miscellaneous_fees_payment_cheque_draft_status";
		$criteria->params = array (
		':studentid' => $_REQUEST['id'],
		':miscellaneous_fees_payment_cheque_draft_status' => 2,
		);




		$criteria->compare('miscellaneous_fees_payment_cheque_master_id',$this->miscellaneous_fees_payment_cheque_master_id);
		$criteria->compare('miscellaneous_fees_payment_cheque_id',$this->miscellaneous_fees_payment_cheque_id);
		$criteria->compare('miscellaneous_fees_payment_cheque_number',$this->miscellaneous_fees_payment_cheque_number);
		$criteria->compare('miscellaneous_fees_payment_cheque_date',$this->miscellaneous_fees_payment_cheque_date,true);
		$criteria->compare('miscellaneous_fees_payment_cheque_bank',$this->miscellaneous_fees_payment_cheque_bank);
		$criteria->compare('miscellaneous_fees_payment_cheque_branch',$this->miscellaneous_fees_payment_cheque_branch,true);
		$criteria->compare('miscellaneous_fees_payment_cheque_amount',$this->miscellaneous_fees_payment_cheque_amount);
		$criteria->compare('miscellaneous_fees_payment_cheque_status',$this->miscellaneous_fees_payment_cheque_status);
		$criteria->compare('miscellaneous_fees_payment_cheque_draft_status',$this->miscellaneous_fees_payment_cheque_draft_status);
		$criteria->compare('miscellaneous_fees_payment_cheque_student_id',$this->miscellaneous_fees_payment_cheque_student_id);
		$criteria->compare('miscellaneous_fees_payment_cheque_receipt_id',$this->miscellaneous_fees_payment_cheque_receipt_id);

		$draft_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		$_SESSION['draft_data']=$draft_data;
		return $draft_data;
	}

}
