<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<html>
<head>

<title>Range Receipt
</title>
<?php include('NumbWordter.php'); 
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=".Yii::app()->request->baseUrl."/css/sal.css\" media=\"screen, print,projection\" />";
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=".Yii::app()->request->baseUrl."/css/screen.css\" media=\"print\" />";
?>
</head>
<body>



<?php for($j=$start;$j<=$end;$j++)
{
//echo $start;
//echo $end;

$data=FeesPaymentTransaction::model()->findByAttributes( array('fees_receipt_id'=>$j));

}

?>


<?php 
echo "</br>".CHtml::link('Export to pdf', array('RecieptGeneratePdf'));
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
	$sem_name=AcademicTerm::model()->findByPk($stud_trans['student_academic_term_name_id']);
	$branch=Branch::model()->findByPk($stud_trans['student_transaction_branch_id']);
	$acd_term=AcademicTermPeriod::model()->findByPk($stud_trans['student_academic_term_period_tran_id']);

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
	
<div id="firstlayer">
       <div class="part1">
            <!------------------------header part--------------------->
	    <div class="headerpart1">
              <div class="receipt-logo">
			<?php
			$test = Yii::app()->user->getState('org_id');
			if(isset($test))	
			{
			 //echo CHtml::image(Yii::app()->request->baseUrl."/organisation_logo/" .Organization::model()->findByPk(Yii::app()->user->getState('org_id'))->logo, "No Image"); 
			echo CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>Yii::app()->user->getState('org_id'))),'No Image',array('width'=>114,'height'=>100));

			}
			?>
</div>

              <!-- <div class="institutename"><span id="firstletter">S</span>AL <span id="firstletter">I</span>NSTITUTE OF   <span id="firstletter">T</span>ECHNOLOGY &</div> 
               <div class="engineering"><span id="firstletter">e</span>nginerring <span id="firstletter">r</span>esearch</div>  -->
                  <div class="institutename"></div> 
               <div class="title">
		<?php $org_data = Organization::model()->findByPk(Yii::app()->user->getState('org_id'));
		      echo $org_data->organization_name; ?></div>
	       <div class="address"><?php echo $org_data->address_line1.' '.City::model()->findByPk($org_data->city)->city_name.', '.State::model()->findByPk($org_data->state)->state_name.', '.Country::model()->findByPk($org_data->country)->name; ?></div>
            </div>

	   <!------------------------content part------------------------->
   	
	    <div class="contentpart1">
	     
	 <div class="receipt">receipt</div>
           <div class="receipt_header"></div>   
		<div class="rcp_info">
			<div class="rcp_rno">
				<div class="rno">Receipt no.</div>
                       	        <div class="rnoline">
                                <span class="number output"><?php echo $my_list; ?></span></div>
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


