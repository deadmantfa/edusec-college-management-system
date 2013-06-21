<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sal.css" media="screen, print, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/timetable.css" />
<title>Cash Reciept</title>
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
			<span class="output"><?php echo $stud_model->student_first_name.' '.$stud_model->student_middle_name .' '.$stud_model->student_last_name; ?></span></div>
		</div>
                <div class="rcp_info">
 			<div class="sem">of </div>
			<div class="semline sem_no">
			<span class="output">Sem-<?php echo $sem_name->academic_term_name; ?></span></div>
		        <span class="sem">in</span>
			<div class="semline branch_name">
                        <span class="output"></span><?php echo $branch->branch_name; ?></div>
			<span class="sem">on account of Following vide</span>
                </div>
		
		<div class="rcp_info">
			<span class="dd">Cheque/DD no.</span>
			<div class="ddline">
		        <span class="output">-</span></div>
			<span class="dd">dated</span>
                        <div class="ddline">
			<span class="output">-</span></div>
			<span class="dd">drawn on</span>
                        <div class="ddline drawn_on">
			<span class="output">-</span></div>
                        
		</div>


		
           
	   <div class="rcp_info">
			<span class="branch">branch</span>
			<div class="branchline">
			<span class="output">-</span></div>

			<span class="branch">being payment towards</span>
			
			<span class="branch">Following fees</span>-
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
      			 	 <td id="purticular1">CASH</td>
       				<td><?php echo $cash_amt->fees_payment_cash_amount; ?></td>
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
					$amt = $cash_amt->fees_payment_cash_amount;

					$myConverter = new NumbWordter(); //initialize
					$text=$myConverter->convert($amt); //pass the number you want to convert
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
<?php
/*
function convertNumber($num)
{
   /*list($num, $dec) = explode(".", $num);

   

   if($num{0} == "-")
   {
      $output = "negative ";
      $num = ltrim($num, "-");
   }
   else if($num{0} == "+")
   {
      $output = "positive ";
      $num = ltrim($num, "+");
   }
   
   if($num{0} == "0")
   {
      $output .= "zero";
   }
   else
   {

      $output = "";
      $num = str_pad($num, 36, "0", STR_PAD_LEFT);
      $group = rtrim(chunk_split($num, 3, " "), " ");
      $groups = explode(" ", $group);

      $groups2 = array();
      foreach($groups as $g) $groups2[] = convertThreeDigit($g{0}, $g{1}, $g{2});

      for($z = 0; $z < count($groups2); $z++)
      {
         if($groups2[$z] != "")
         {
            $output .= $groups2[$z].convertGroup(11 - $z).($z < 11 && !array_search('', array_slice($groups2, $z + 1, -1))
             && $groups2[11] != '' && $groups[11]{0} == '0' ? " and " : ", ");
         }
      }

      $output = rtrim($output, ", ");
   /*}

   if($dec > 0)
   {
      $output .= " point";
      for($i = 0; $i < strlen($dec); $i++) $output .= " ".convertDigit($dec{$i});
   }

   return $output;
}

function convertGroup($index)
{
   switch($index)
   {
      case 11: return " decillion";
      case 10: return " nonillion";
      case 9: return " octillion";
      case 8: return " septillion";
      case 7: return " sextillion";
      case 6: return " quintrillion";
      case 5: return " quadrillion";
      case 4: return " trillion";
      case 3: return " billion";
      case 2: return " million";
      case 1: return " thousand";
      case 0: return "";
   }
}

function convertThreeDigit($dig1, $dig2, $dig3)
{
   $output = "";

   if($dig1 == "0" && $dig2 == "0" && $dig3 == "0") return "";

   if($dig1 != "0")
   {
      $output .= convertDigit($dig1)." hundred";
      if($dig2 != "0" || $dig3 != "0") $output .= " and ";
   }

   if($dig2 != "0") $output .= convertTwoDigit($dig2, $dig3);
   else if($dig3 != "0") $output .= convertDigit($dig3);

   return $output;
}

function convertTwoDigit($dig1, $dig2)
{
   if($dig2 == "0")
   {
      switch($dig1)
      {
         case "1": return "ten";
         case "2": return "twenty";
         case "3": return "thirty";
         case "4": return "forty";
         case "5": return "fifty";
         case "6": return "sixty";
         case "7": return "seventy";
         case "8": return "eighty";
         case "9": return "ninety";
      }
   }
   else if($dig1 == "1")
   {
      switch($dig2)
      {
         case "1": return "eleven";
         case "2": return "twelve";
         case "3": return "thirteen";
         case "4": return "fourteen";
         case "5": return "fifteen";
         case "6": return "sixteen";
         case "7": return "seventeen";
         case "8": return "eighteen";
         case "9": return "nineteen";
      }
   }
   else
   {
      $temp = convertDigit($dig2);
      switch($dig1)
      {
         case "2": return "twenty-$temp";
         case "3": return "thirty-$temp";
         case "4": return "forty-$temp";
         case "5": return "fifty-$temp";
         case "6": return "sixty-$temp";
         case "7": return "seventy-$temp";
         case "8": return "eighty-$temp";
         case "9": return "ninety-$temp";
      }
   }
}
      
function convertDigit($digit)
{
   switch($digit)
   {
      case "0": return "zero";
      case "1": return "one";
      case "2": return "two";
      case "3": return "three";
      case "4": return "four";
      case "5": return "five";
      case "6": return "six";
      case "7": return "seven";
      case "8": return "eight";
      case "9": return "nine";
   }
}*/
?>
