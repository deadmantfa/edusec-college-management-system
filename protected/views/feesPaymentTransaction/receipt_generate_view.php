<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<html>
<head>

<title>Receipt Wise Details
</title>
<?php include('NumbWordter.php'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sal.css" media="screen, print,projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="print" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/timetable.css" />
</head>
<body>



<?php for($j=$start;$j<=$end;$j++)
{
//echo $start;
//echo $end;

$data=FeesPaymentTransaction::model()->findByAttributes( array('fees_receipt_id'=>$j));
if($data)
{
?><button style="float:right" onclick="javascript:window.print()" id="printid1">Print</button><?php 	
	echo CHtml::link('GO BACK',Yii::app()->createUrl('feesPaymentTransaction/Receipt_generate_print'),array('id'=>"printid1"));
	break;
}
}
//$salurl = Yii::app()->request->baseUrl."/css/sal.css";
//echo $salurl;

//echo "</br>".CHtml::link('Export to pdf', array('RecieptGeneratePdf'));
?>


<?php 

$f = 1;
$k = 1;

foreach($fees_info as $my_list)
{
$org_id=Yii::app()->user->getState('org_id');
//echo $org_id;
//echo $end;
//echo $list['fees_receipt_id'].'<br >';
$data=FeesPaymentTransaction::model()->findByAttributes( array('fees_receipt_id'=>$my_list ,'fees_payment_transaction_organization_id'=>$org_id));
	$field1='-';
	$field2='-';
	$field3='-';
	$field4='-';
	$field5='CASH';
//var_dump($data);
	if($data)
	{
		
	$f=0;
	
	$stud_trans=StudentTransaction::model()->findByAttributes(array('student_transaction_id'=>$data['fees_student_id']));
	$stud_model=StudentInfo::model()->findByAttributes(array('student_id'=>$stud_trans['student_transaction_student_id']));
	$sem_name=AcademicTerm::model()->findByPk($data['fees_academic_term_id']);
	$branch=Branch::model()->findByPk($stud_trans['student_transaction_branch_id']);
	$acd_term=AcademicTermPeriod::model()->findByPk($data['fees_academic_period_id']);

	 if($data->fees_payment_method_id==1)
 	 {
		$cash_amt=FeesPaymentCash::model()->findByPk($data->fees_payment_cash_cheque_id);
		$amount=$cash_amt->fees_payment_cash_amount;
	}
	else
	{
		$cash_amt=FeesPaymentCheque::model()->findByPk($data->fees_payment_cash_cheque_id);
		$amount=$cash_amt->fees_payment_cheque_amount;
		$field1=$cash_amt->fees_payment_cheque_number;		
		$date = date_create($cash_amt->fees_payment_cheque_date);
		$field2=date_format($date, 'd-m-Y');
		$bank_name = BankMaster::model()->findByPk($cash_amt->fees_payment_cheque_bank);
		$field3=$bank_name->bank_short_name; 
		$field4=$cash_amt->fees_payment_cheque_branch;
		$field5='CHEQUE';
		
	}

//case receipt

?>
<div id="printable">	
<div id="firstlayer">
       <div class="part1">
            <!------------------------header part--------------------->
	   <div class="header" style="border-bottom:3px solid;   margin-left: -5px;padding-right: 10px;">
      		     <div class="logo" >
 			    <?php echo CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>Yii::app()->user->getState('org_id'))),'No Image',array('width'=>80,'height'=>55));
    ?>
 	            </div>

    		    <div class="address" style="font-size:12px;">
			    <?php
				$org_data = Organization::model()->findByPk(Yii::app()->user->getState('org_id'));

				echo $org_data->organization_name."</br>";
				echo $org_data->address_line1." ";
				echo $org_data->address_line2."</br>";
				echo City::model()->findBypk(Organization::model()->findByPk(Yii::app()->user->getState('org_id'))->city)->city_name.", ".State::model()->findBypk(Organization::model()->findByPk(Yii::app()->user->getState('org_id'))->state)->state_name.", ".Country::model()->findBypk(Organization::model()->findByPk(Yii::app()->user->getState('org_id'))->country)->name.".";
				?>   
    		   </div>
 		</div>

	   <!------------------------content part------------------------->
   	
	    <div class="contentpart1">
	     
	 <div class="receipt">receipt</div>
           <div class="receipt_header"></div>   
		<div class="rcp_info">
			<div class="rcp_rno">
				<div class="rno">Receipt no.</div>
                       	        <div class="rnoline">
                                <span class="number output"><?php echo FeesReceipt::model()->findByPk($my_list)->fees_receipt_number;  ?></span></div>
			</div>

			<div class="rcp_date">
				<div class="rdate">date</div>
				<div class="dateline">
				<span class="output"><?php echo date_format(new DateTime($data->fees_received_date), "d-m-Y"); ?></span></div>
			</div>
                        
		</div>
		
		<div class="rcp_info">
                	<span class="sname leftspace">Received from Mr./Ms.</span>
			<div class="nameline">
			<span class="output"><?php echo $stud_model->student_first_name.' '.$stud_model->student_middle_name.' '.$stud_model->student_last_name; ?></span></div>
		</div>
		<?php 

	
?>
                <div class="rcp_info">
 			<div class="sem">of </div>
			<div class="semline sem_no">
			<span class="output">Sem-<?php echo $sem_name->academic_term_name; ?></span></div>
		        <span class="sem">in</span>
			<div class="semline branch_name">
                        <span class="output"></span><?php echo $branch->branch_name;  ?></div>
			<span class="sem">on account of following vide</span>
                </div>
		
		
		<div class="rcp_info">
			<span class="dd">Cheque/DD no.</span>
			<div class="ddline">
		        <span class="output"><?php echo $field1; ?></span></div>
			<span class="dd">dated</span>
                        <div class="ddline">
			<span class="output"><?php echo $field2; ?></span></div>
			<span class="dd">drawn on</span>
                        <div class="ddline drawn_on">
			<span class="output"><?php echo $field3; ?></span></div>
                        
		</div>


		
           
	   <div class="rcp_info">
			<span class="branch">branch</span>
			<div class="branchline">
			<span class="output"><?php echo $field4; ?></span></div>

			<span class="branch">being payment towards</span>
			
			<span class="branch">Following fees</span>-
			<span class="branch">Enrollment no.</span> 
			<div class="branchline branch_on">
			<span class="output"><?php echo $stud_model->student_enroll_no; ?></span></div>

		
					
		</div>
		<div class="rcp_info">

			<span class="semperiod space">Year</span>
			<div class="periodline">
			<span class="output"><?php echo $acd_term->academic_term_period;  ?></span></div>
		</div>
		


      <div class="tablepart1">

      <table>
          <tr>
             <th width="5%">Sr No.</th>
             <th>Particulars</th>
             <th>Amount(Rs.)</th>
	  	</tr>
<?php 
	$student_fees = StudentFeesMaster::model()->findAll('fees_master_table_id = :fees_master_id AND student_fees_master_student_transaction_id = :student_id', array(':fees_master_id'=>$data->fees_payment_master_id,':student_id'=>$data['fees_student_id']));
		
		$i = 1; $total_fees_amount = 0;
	foreach($student_fees as $list)
	{
?>
		<tr id="purticular">
		<td class="sr-number"><?php echo $i;?>
            	<td id="purticular">
			<?php if(!empty($list))
			{
				echo FeesDetailsMaster::model()->findByPk($list->student_fees_master_details_id)->fees_details_master_name;
				?>
				</td>
          			<td><?php echo $list->fees_details_amount; 
				$i++;
			} ?></td>
			  	</tr>
	
	<?php $total_fees_amount += $list->fees_details_amount;
	} ?>         
		 
                 <tr id="purticular">
             <td>-</td>
             <td id="total">TOTAL</td>

	 <td><?php echo $total_fees_amount; ?></td>
			 
	</tr>
      		
</table>
        <br />
        <br />
        <br />

	<div class="tablepart2">
	<table>
	<tr>
	<th width="5%" colspan="2">Details</th>
	</tr>	
          <tr>
               <th width="40%">Payment Method</th>
	     <th width="40%">Amount.(Rs)</th>		  
	</tr> 
	 		<tr>
      			 	 <td id="purticular1"><?php echo $field5; ?></td>
       				<td><?php echo $amount; ?></td>
	  		</tr>				
					 		  
	
	
	
       </table>

	</div>
	</div>

	    <div class="footerpart1">
		
		<div class="rcp_info">
                	<span class="rsinword space">in word Rs :</span>
				<div class="rsline">
				<span class="output">
				<?php 
					//$amt = $cash_amt->fees_payment_cash_amount;
					$myConverter = new NumbWordter(); //initialize
					$text=$myConverter->convert($amount); //pass the number you want to convert
					echo $text; //will print the words
				?>
				 Only</span></div>
		</div>
				<div class="rcp_info">
         				<span class="payment">The above payments are : </span>
                  </div>   
<div class="rcp_info">	
<span class="payment">
<?php

		
$term = FeesTermsAndCondition::model()->findAll();
foreach ($term as $t )
{
	echo '<li>';
	echo $t->term;
	echo '</br>';
}
?>
</span>
</div>                
			<div class="deposite">N.B. Deposit will be refunded after completion of the course on production of original receipt.</div>
                      <div class="right-corner">
		        <div class="ins_eng">AUTHORISED SIGNATORY</div>
			<div class="outer-div"><div class="rcpt_amt_tic">&nbsp;</div></div>

			 <div class="sign"></div>
			</div>
		        <div class="ins_eng">FOR, <?php echo $org_data->organization_name;?></div>
                         
	    </div>
	 
       </div>
   </div>
   </div>
</div>



<?php 	
	$k++;	}// if end
	} //for loop end
if($f==1)
{
	$this->layout='//layouts/column2';

		
	echo "<br><br><br>";
	echo "No receipt available with this criteria";

	//feesPaymentTransaction/Receipt_generate_print
}
?>
</body>
</html>


