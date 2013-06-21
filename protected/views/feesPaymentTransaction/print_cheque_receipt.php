<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<html>
<head>
<title>Cheque Reciept</title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sal.css" media="screen, print, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/timetable.css" />

</head>
<body>
   

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
                                <span class="number output"><?php echo FeesReceipt::model()->findByPk($fees_payment->fees_receipt_id)->fees_receipt_number; ?></span></div>
			</div>

			<div class="rcp_date">
				<div class="rdate">date</div>
				<div class="dateline">
				<span class="output"><?php echo date_format(new DateTime($fees_payment->fees_received_date), "d-m-Y"); ?></span></div>
			</div>
                        
		</div>
		
		<div class="rcp_info">
                	<span class="sname leftspace">Received from Mr./Ms.</span>
			<div class="nameline">
			<span class="output"><?php echo $stud_model->student_first_name.' '.$stud_model->student_middle_name.' '.$stud_model->student_last_name; ?></span></div>
		</div>
                <div class="rcp_info">
 			<div class="sem">of </div>
			<div class="semline sem_no">
			<span class="output">Sem-<?php echo $sem_name->academic_term_name; ?></span></div>
		        <span class="sem">in</span>
			<div class="semline branch_name">
                        <span class="output"></span><?php echo $branch->branch_name; ?></div>
			<span class="sem">on account of following vide</span>
                </div>
		<div class="rcp_info">
			<span class="dd">Cheque/DD No.</span>
			<div class="ddline">
		        <span class="output"><?php echo $cheque_amt->fees_payment_cheque_number; ?></span></div>
			<span class="dd">dated</span>
                        <div class="ddline">
			<span class="output"><?php $date = date_create($cheque_amt->fees_payment_cheque_date);
			echo date_format($date, 'd-m-Y'); ?></span></div>
			<span class="dd">drawn on</span>
                        <div class="ddline drawn_on">
			<span class="output"><?php $bank_name = BankMaster::model()->findByPk($cheque_amt->fees_payment_cheque_bank);
				echo $bank_name->bank_short_name; ?></span></div>
                        
		</div>
		
		
           
	   <div class="rcp_info">
			<span class="branch">branch</span>
			<div class="branchline">
			<span class="output"><?php echo $cheque_amt->fees_payment_cheque_branch; ?></span></div>

			<span class="branch">being payment towards</span>
			
			<span class="branch">Following fees</span>
			<span class="branch">Enrollment no.</span> 
			<div class="branchline branch_on">
			<span class="output"><?php echo $stud_model->student_enroll_no; ?></span></div>

		
					
		</div>
		<div class="rcp_info">

			<span class="semperiod space">Year</span>
			<div class="periodline">
			<span class="output"><?php echo $acd_term->academic_term_period ?></span></div>
		</div>
		


      <div class="tablepart1">

      <table>
          <tr>
             <th width="5%">Sr No.</th>
             <th>Particulars</th>
             <th>Amount(Rs.)</th>
	  	</tr>
<?php 
	$student_fees = StudentFeesMaster::model()->findAll('fees_master_table_id = :fees_master_id AND student_fees_master_student_transaction_id = :student_id', array(':fees_master_id'=>$fees_payment->fees_payment_master_id,':student_id'=>$model->student_transaction_id));
		
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
				<td id="purticular1">CHEQUE</td>
             			<td><?php echo $cheque_amt->fees_payment_cheque_amount; ?></td>
	  		</tr>				
					 		  
	
	
	
       </table>

	</div>
	</div>
<?php include('NumbWordter.php'); ?>
	    <div class="footerpart1">
		
		<div class="rcp_info">
                	<span class="rsinword space">in word Rs :</span>
				<div class="rsline">
				<span class="output">
				<?php 
					$amt = $cheque_amt->fees_payment_cheque_amount;
					$myConverter = new NumbWordter(); //initialize
					$text=$myConverter->convert($cheque_amt->fees_payment_cheque_amount); //pass the number you want to convert
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
</body>
</html>
