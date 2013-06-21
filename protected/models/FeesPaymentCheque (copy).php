<?php

/**
 * This is the model class for table "fees_payment_cheque".
 *
 * The followings are the available columns in table 'fees_payment_cheque':
 * @property integer $fees_payment_cheque_id
 * @property integer $fees_payment_cheque_number
 * @property string $fees_payment_cheque_date
 * @property integer $fees_payment_cheque_bank
 * @property integer $fees_payment_cheque_amount
 * @property integer $fees_payment_cheque_status
 */
class FeesPaymentCheque extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FeesPaymentCheque the static model class
	 */
	public $student_first_name,$student_roll_no,$student_enroll_no;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fees_payment_cheque';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fees_payment_cheque_number, fees_payment_cheque_date, fees_payment_cheque_bank, fees_payment_cheque_branch, fees_payment_cheque_amount', 'required', 'message'=>''),
			array('fees_payment_cheque_number, fees_payment_cheque_bank, fees_payment_cheque_amount, fees_payment_cheque_status,fees_payment_cheque_organization_id', 'numerical', 'integerOnly'=>true, 'message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fees_payment_cheque_id, fees_payment_cheque_number, fees_payment_cheque_date, fees_payment_cheque_bank, fees_payment_cheque_branch, fees_payment_cheque_amount, fees_payment_cheque_status,fees_payment_cheque_organization_id', 'safe', 'on'=>'search'),
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
			'fees_payment_cheque_id' => 'Fees Payment Cheque',
			'fees_payment_cheque_number' => 'Cheque Number',
			'fees_payment_cheque_date' => 'Cheque Date',
			'fees_payment_cheque_bank' => 'Cheque Bank',
			'fees_payment_cheque_branch' => 'Cheque Branch',
			'fees_payment_cheque_amount' => 'Cheque Amount',
			'fees_payment_cheque_status' => 'Cheque Status',
			'fees_payment_cheque_organization_id'=>'Organization',
			'student_first_name'=> 'Student first name',
			'student_roll_no'=> 'Student roll no',
			'student_enroll_no'=> 'Student enroll no',
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
		
		$criteria->compare('fees_payment_cheque_id',$this->fees_payment_cheque_id);
		$criteria->compare('fees_payment_cheque_number',$this->fees_payment_cheque_number);
		$criteria->compare('fees_payment_cheque_date',$this->fees_payment_cheque_date,true);
		$criteria->compare('fees_payment_cheque_bank',$this->fees_payment_cheque_bank);
		$criteria->compare('fees_payment_cheque_branch',$this->fees_payment_cheque_branch);
		$criteria->compare('fees_payment_cheque_amount',$this->fees_payment_cheque_amount);
		$criteria->compare('fees_payment_cheque_status',$this->fees_payment_cheque_status);
		$criteria->compare('fees_payment_cheque_organization_id',$this->fees_payment_cheque_organization_id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function cheque_search($no)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'fees_payment_cheque_number = :cheque_no AND fees_payment_cheque_organization_id = :org_id';
		$criteria->params = array(':cheque_no' =>$no,':org_id'=>Yii::app()->user->getState('org_id'));
		$criteria->compare('fees_payment_cheque_id',$this->fees_payment_cheque_id);
		$criteria->compare('fees_payment_cheque_number',$this->fees_payment_cheque_number);
		$criteria->compare('fees_payment_cheque_date',$this->fees_payment_cheque_date,true);
		$criteria->compare('fees_payment_cheque_bank',$this->fees_payment_cheque_bank);
		$criteria->compare('fees_payment_cheque_branch',$this->fees_payment_cheque_branch);
		$criteria->compare('fees_payment_cheque_amount',$this->fees_payment_cheque_amount);
		$criteria->compare('fees_payment_cheque_status',$this->fees_payment_cheque_status);
		$criteria->compare('fees_payment_cheque_organization_id',$this->fees_payment_cheque_organization_id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforesave()
	{
		//echo Yii::app()->user->getState('student_id');
		if(Yii::app()->controller->action->id != 'my_update')
		{

			$my_date =  date("Y-m-d");
				
		
			$date = date("Y-m-d");
			$newdate = strtotime ( '-3 month' , strtotime ( $date ) ) ;
			$future_date = strtotime ( '+3 month' , strtotime ( $date ) ) ;
			$newdate = date ( 'Y-m-d' , $newdate );
			$future_date = date ( 'Y-m-d' , $future_date );
			

		
		if($this->fees_payment_cheque_date >= $newdate && $this->fees_payment_cheque_date <= $future_date)

		{

			$criteria = new CDbCriteria;
			$criteria -> condition = 'fees_student_id ='.Yii::app()->user->getState('student_id');

			$listofid = FeesPaymentTransaction::model()->findAll($criteria);
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
				{	//$cheque_total = $cheque_total + FeesPaymentCheque::model()->findByPk($list->fees_payment_cash_cheque_id)->fees_payment_cheque_amount;

				$amount = FeesPaymentCheque::model()->findByAttributes(array('fees_payment_cheque_status'=>0,'fees_payment_cheque_id'=>$list->fees_payment_cash_cheque_id));
					$cheque_total = $cheque_total + $amount['fees_payment_cheque_amount'];
				}
				}

				echo "<div class='total-amount'><h4>Total Paid Fees : <b>".$total = $cash_total + $cheque_total .'</b></h4></div>';
				$total_fees_amount = FeesMaster::model()->findByPk($list->fees_payment_master_id)->fees_master_total;

				if($this->isNewRecord)
				{
					$grand_total = $total + $this->fees_payment_cheque_amount;
					
				}
				else
				{
					$update_total = FeesPaymentCheque::model()->findByPk($_REQUEST['id'])->fees_payment_cheque_amount;
					$grand_total = ($total - $update_total) + $this->fees_payment_cheque_amount;
					
				
				}

				if($total_fees_amount < $grand_total)
				{
					$this->addError('fees_payment_cheque_amount','You can not take an advance fees for student.');
					return false;
				}
				else
					return true;
		}
		else
		{
			
			$total_fees_amount = FeesMaster::model()->findByPk(Yii::app()->user->getState('fees_master_id'))->fees_master_total;
			if($this->fees_payment_cheque_amount > $total_fees_amount)
			{
				$this->addError('fees_payment_cheque_amount','You can not take an advance fees for student.');
				return false;
			}
			else
				return true;
			
		}

	}
		else
		{

		    if($this->isNewRecord) {

		    $this->addError("fees_payment_cheque_date","Cheque date must be between -3 or +3 month  from current date");       
		    return false;
		    }
		    else
		    {
			return true;
		    }
		}
	}
		return true;
		
			
	}
}
