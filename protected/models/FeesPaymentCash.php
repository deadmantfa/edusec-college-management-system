<?php

/**
 * This is the model class for table "fees_payment_cash".
 *
 * The followings are the available columns in table 'fees_payment_cash':
 * @property integer $fees_payment_cash_id
 * @property integer $fees_payment_cash_amount
 *
 * The followings are the available model relations:
 * @property CurrencyTransaction[] $currencyTransactions
 */
class FeesPaymentCash extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FeesPaymentCash the static model class
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
		return 'fees_payment_cash';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fees_payment_cash_amount', 'required', 'message'=>''),
			array('fees_payment_cash_amount', 'numerical', 'integerOnly'=>true, 'message'=>''),
			array('fees_payment_cash_amount','CRegularExpressionValidator','pattern'=>'/^[1-9][0-9]*$/','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fees_payment_cash_id, fees_payment_cash_amount', 'safe', 'on'=>'search'),
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
			'currencyTransactions' => array(self::HAS_MANY, 'CurrencyTransaction', 'fees_payment_cash_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'fees_payment_cash_id' => 'Fees Payment Cash',
			'fees_payment_cash_amount' => 'Cash Amount',
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

		$criteria->compare('fees_payment_cash_id',$this->fees_payment_cash_id);
		$criteria->compare('fees_payment_cash_amount',$this->fees_payment_cash_amount);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			
		));
	}

	public function beforesave()
	{
		$student_id = $_REQUEST['student_id'];

		$criteria = new CDbCriteria;
		$stud_trans = StudentTransaction::model()->findByPk($student_id);
		

		$criteria->condition = 'fees_student_id ='.$student_id.' AND fees_academic_period_id='.$stud_trans['student_academic_term_period_tran_id'].' AND fees_academic_term_id='.$stud_trans['student_academic_term_name_id'];
		
		$listofid = FeesPaymentTransaction::model()->findAll($criteria);

		$total_fees_amount = 0;
		$fees_stru = Yii::app()->db->createCommand()
			    ->select('fees.fees_master_id , fees.fees_master_name , fees.fees_branch_id , stud.student_transaction_branch_id , stud.student_transaction_organization_id , fees.fees_organization_id , stud.student_transaction_quota_id , fees.fees_quota_id ,stud.student_academic_term_period_tran_id , fees.fees_academic_term_id, fees.fees_academic_term_name_id, fees.fees_master_total')
			    ->from('student_transaction stud')
			    ->join('fees_master fees','stud.student_transaction_branch_id = fees.fees_branch_id
		AND stud.student_academic_term_period_tran_id = fees.fees_academic_term_id
		AND stud.student_academic_term_name_id = fees.fees_academic_term_name_id 	
		AND stud.student_transaction_organization_id = fees.fees_organization_id
		AND stud.student_transaction_quota_id = fees.fees_quota_id')
			    ->where('stud.student_transaction_id=:id', array(':id'=>$student_id))
			    ->queryRow();

		$student_fees = StudentFeesMaster::model()->findAll('fees_master_table_id = :fees_master_id AND student_fees_master_student_transaction_id = :student_id', array(':fees_master_id'=>$fees_stru['fees_master_id'],':student_id'=>$student_id));
		
		foreach($student_fees as $fees_data)
			$total_fees_amount += $fees_data->fees_details_amount;

		$cash_total = 0;
		$cheque_total = 0;
		$total = 0;
		
		if($listofid != null)
		{
			foreach($listofid as $list)
			{
				if($list->fees_payment_method_id == 1)
					$cash_total = $cash_total + FeesPaymentCash::model()->findByPk($list->fees_payment_cash_cheque_id)->fees_payment_cash_amount;
				else
				{
					$amount = FeesPaymentCheque::model()->findByAttributes(array('fees_payment_cheque_status'=>0,'fees_payment_cheque_id'=>$list->fees_payment_cash_cheque_id));
					$cheque_total = $cheque_total + $amount['fees_payment_cheque_amount'];
				}
			}

				echo "<div class='total-amount'><h4>Total Paid Fees : <b>".$total = $cash_total + $cheque_total .'</b></h4></div>';


				//$total_fees_amount = FeesMaster::model()->findByPk($list->fees_payment_master_id)->fees_master_total;

				if($this->isNewRecord)
				{
					$grand_total = $total + $this->fees_payment_cash_amount;
					
				}
				else
				{
					$update_total = FeesPaymentCash::model()->findByPk($_REQUEST['id'])->fees_payment_cash_amount;
					
					$grand_total = ($total - $update_total) + $this->fees_payment_cash_amount;
				
				}

				if($total_fees_amount < $grand_total)
				{
					$this->addError('fees_payment_cash_amount','You can not take an advance fees for student.');
					return false;
				}
				else
					return true;
		}
		else
		{
			if($this->fees_payment_cash_amount > $total_fees_amount)
			{
				$this->addError('fees_payment_cash_amount','You can not take an advance fees for student.');
				return false;
			}
			else
				return true;
			
		}
			
		
		
	}
}
