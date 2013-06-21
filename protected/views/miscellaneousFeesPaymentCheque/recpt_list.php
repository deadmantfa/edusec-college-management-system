
<html>

<head>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mfees_print.css" media="screen, print, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sal.css" media="screen, print, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/timetable.css" />
<title>Miscellaneous Cheque Receipt</title>
</head>
<body>

	
<div class="rcpt_main">
	<div class="header" style="border-bottom:3px solid;   margin-left: 0px;padding-right: 1px;">
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
  
	<div class="rcpt_content">
		<div class="id_date">
			<div class="rcpt_no">
			    <span class="style2 rcpt_title">Receipt No.</span>
			    <span class="rcpt_id"><?php echo MiscellaneousFeesReceipt::model()->findByPk($misc_fees_payment->miscellaneous_fees_payment_cheque_receipt_id)->miscellaneous_fees_receipt_number; ?></span>
      			</div>	
			<div class="rcpt_date">
			    <span class="style2 rcpt_title">Date:</span>
			    <span class="rcpt_dt"><?php echo date_format(new DateTime( $misc_fees_payment->	miscellaneous_fees_payment_cheque_creation_date), "d-m-Y"); ?></span>
	  		</div>
		</div>
		<div class="rcpt_name">
		  <span class="rcpt_title">Received with thanks from Mr./Mrs./Ms.</span>  
		  <span class="rcpt_s_name"><?php echo $stud_model->student_first_name.' '.$stud_model->student_middle_name.' '.$stud_model->student_last_name; ?></span>
		</div>
		<div class="rcpt_dtl">
		  <span class="rcpt_title style2">by cheque no. </span>
		  <span class="rcpt_dd_no"><?php echo $misc_fees_payment->miscellaneous_fees_payment_cheque_number; ?></span>
		  <span class="style2 rcpt_title">dated</span>
		  <span class="rcpt_dd_dt"><?php echo date_format(date_create($misc_fees_payment->miscellaneous_fees_payment_cheque_date),"d-m-Y"); ?></span>
		  <span class="style2 rcpt_title">drawn on</span> 
		  <span class="rcpt_cash"><?php $bank_name = BankMaster::model()->findByPk($misc_fees_payment->miscellaneous_fees_payment_cheque_bank );
				echo $bank_name->bank_short_name; ?></span>    		
		</div>
		<div class="rcpt_sem_dtl">
		  <span class="style2 rcpt_title">of</span>
		  <span class="semester"><?php echo $acd_term->academic_terms_period_name; ?> </span>
		  <span class="style2 rcpt_title"> being payment of <?php echo MiscellaneousFeesMaster::model()->findByPk($misc_fees_payment->miscellaneous_fees_payment_cheque_master_id)->miscellaneous_fees_name; ?> towards</span>
		  <span class="style2 rcpt_title">Enrollment no. </span>
		  <span class="rno"><?php echo $stud_model->student_enroll_no;  ?></span>
		</div>
		<div class="rcpt_pd">
			<div class="rcpt_pd_left">
        			<div class="rcpt_amt_nmr style2">Rs.<?php echo $misc_fees_payment->miscellaneous_fees_payment_cheque_amount; ?>.00</div>
	  		</div>
			<div class="rcpt_pd_right">
        			<div class ="style9 rcpt_amt_for">FOR,<?php echo $org_data->organization_name;?></div>
  				<div class="rcpt_amt_tic">&nbsp;</div>
  	 		</div>
		</div>
	</div><!-- content div close -->
  
	<div class="rcpt_footer">
		<div class="rule1">* Subject to Ahmedabad Jurisdiction</div>
		<div class="rule2">* Payment by Cheque or Draft will be credited to your Account on Realisation.</div>
  	</div>
</div>


</body>
</html>
