<?php
	echo '<br />';
	echo '<br />';
	echo "Receipt not available between this range.<br /><br />";
	echo CHtml::link('GO BACK',Yii::app()->createUrl('feesPaymentTransaction/Receipt_generate_print'));
?>
