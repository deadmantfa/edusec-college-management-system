<?php $this->pageTitle=Yii::app()->name; ?>
<div>&nbsp;</div>


<!--main menu-->


<h3 class="pop-menu-link">
<?php echo CHtml::link("","", array('onClick'=>'$("#menuwindow").dialog("open");return false;'
                                ));?></h3>

<div class="menu1">
<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/menu1.png', 'menu'); ?>

<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/menu3.png', 'menu'); ?>
<div class="cal">
<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/cal.png', 'menu'); ?>
</div>
<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/menu2.png', 'menu'); ?>

<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/menu4.png', 'menu'); ?>
<div class="cal">
<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/Stud_graph.png', 'menu'); ?>
</div>
</div>


<!--menu window-->
<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'menuwindow',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Main Menu',
		'autoOpen'=>false,
		'modal'=>true,	
                'height'=>'200',
                'width'=>300,
                'resizable'=>false,
                'draggable'=>true,
		
	),
));
?>
<!--<h3 class="pop-home-link a">
<b><?php echo CHtml::link("",array('/site/index'));?></b></h3>-->

<p>
<h3 class="pop-mainorg-link">
<?php
echo CHtml::link("Create Organization",array('organization/index'));
?></h3>

<h3 class="pop-mainadmin-link">
<?php
echo CHtml::link("Create Admin",array('user/index'));

?></h3>

<h3 class="pop-mainpanel-link"><?php echo CHtml::link("","", array('onClick'=>'$("#master").dialog("open");return false;'
                                ));
?></h3></p>



<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<!--masters-->
<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'master',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Control Panel',
		'autoOpen'=>false,
		'modal'=>true,	
                'height'=>'410',
                'width'=>430,
                'resizable'=>false,
                'draggable'=>true,
		
	),
));
?>

<!--<?php CHtml::link('<img alt = "/site/page/master" src ="' . Yii::app()->request->baseUrl.'/images/Configuration_mgnt.png');?>-->

<!--<h3 class="pop-back-link a">
<b><?php echo CHtml::link("",array('site/page', 'view'=>'mainmenu'));?></b></h3>-->

<!--<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/Employee_info.png', 'Employee'); ?>-->
<div class="master1">
<div class="pop-master-link">
<p><?php echo CHtml::link("Master","", array('onClick'=>'$("#master1").dialog("open");return false;'
                                ));?>
</div>


<div class="pop-emp-link">
<p><?php echo CHtml::link("Employee",array('employeeTransaction/create'));?></p>
</div>
</div>
<div class="master1">
<div class="pop-stud-link">
<p><?php echo CHtml::link("Student","", array('onClick'=>'$("#stud").dialog("open");return false;'
                                ));?></p>
</div>

<div class="pop-fee-link">
<p><?php echo CHtml::link("Fees","", array('onClick'=>'$("#fees").dialog("open");return false;'
                                ));?></p></h3>
</div>
</div>

<h3 class="pop-inward-link"><?php echo CHtml::link("Inward",array('inward/create'));?></h3></p>


<h3 class="pop-visitor-link"><?php echo CHtml::link("Visitor",array('visitorPass/create'));?></h3></p>

<h3 class="pop-subject-link"><?php echo CHtml::link("Subject",array('subjectMaster/create'));?></h3></p>

<h3 class="pop-subject-type-link"><?php echo CHtml::link("Subject Type",array('subjectType/create'));?></h3></p>

<h3 class="pop-assignSubject-link"><?php echo CHtml::link("Assign Subject",array('assignSubject/create'));?></h3></p>

<h3 class="pop-outward-link"><?php echo CHtml::link("Outward",array('outward/admin'));?></h3></p>

<h3 class="pop-assign-org-link">
<?php
echo CHtml::link("Assign Organization",array('assignCompanyUserTable/admin'));

?></h3></p>

<h3 class="pop-send-sms-link"><?php echo CHtml::link("Send SMS",array('site/send_sms'));?></h3></p>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>


<!--student info-->

<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'stud',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Student Information',
		'autoOpen'=>false,
		'modal'=>true,	
                'height'=>190,
                'width'=>270,
                'resizable'=>false,
                'draggable'=>true,
	),
));
?>
<!--<h3 class="pop-back-link a">
<?php echo CHtml::link("BACK",array('site/page', 'view'=>'menuwindow'));?></h3>-->
<p><h3 class="pop-studadd-link"><?php echo CHtml::link("Add Student",array('studentTransaction/create'));?></p></h3>
<p><h3 class="pop-studaddfee-link"><?php echo CHtml::link("Add Student Fees",array('studentTransaction/admin'));?></p></h3>


<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>


<!--fees info-->
<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'fees',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Fees Management',
		'autoOpen'=>false,
		'modal'=>true,	
                'height'=>190,
                'width'=>270,
                'resizable'=>false,
                'draggable'=>true,
	),
));
?>
<!--<h3 class="pop-back-link a">
<?php echo CHtml::link("",array('site/page', 'view'=>'menuwindow'));?></h3>-->
<p><h3 class="pop-feemaster-link"><?php echo CHtml::link("Fees Master",array('feesMaster/create'));?></p></h3>
<p><h3 class="pop-feetype-link"><?php echo CHtml::link("Fees Type",array('feesPaymentType/create'));?></p></h3>


<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<!--masters2-->


<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'master1',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Master',
		'autoOpen'=>false,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>470,
                'resizable'=>false,
                'draggable'=>true,
	),
));
?>
<!--<h3 class="pop-back-link a">
<?php echo CHtml::link("",array('site/page', 'view'=>'menuwindow'));?></h3>-->
<div class="master1">

<p><h4 class="pop-batch-link"><?php echo CHtml::link("Batch",array('batch/admin'));?></p></h4>


<p><h4 class="pop-branch-link"><?php echo CHtml::link("Branch",array('branch/admin'));?></p></h4>


<p><h4 class="pop-category-link"><?php echo CHtml::link("Category",array('category/admin'));?></p></h4>


<p><h4 class="pop-department-link"><?php echo CHtml::link("Department",array('department/admin'));?></p></h4>

</div>

<div class="master2">



<p><h4 class="pop-division-link"><?php echo CHtml::link("Division",array('division/admin'));?></p></h4>



<p><h4 class="pop-empdesi-link"><?php echo CHtml::link("Employee Designation",array('employeeDesignation/admin'));?></p></h4>



<p><h4 class="pop-nationality-link"><?php echo CHtml::link("Nationality",array('nationality/admin'));?></p></h4>



<p><h4 class="pop-quota-link"><?php echo CHtml::link("Quota",array('quota/admin'));?></p></h4>



<p><h4 class="pop-religion-link"><?php echo CHtml::link("Religion",array('religion/admin'));?></p></h4>



<p><h4 class="pop-shift-link"><?php echo CHtml::link("Shift",array('shift/admin'));?></p></h4>

<p><h4 class="pop-city-link"><?php echo CHtml::link("City",array('city/admin'));?></p></h4>

<p><h4 class="pop-state-link"><?php echo CHtml::link("State",array('state/admin'));?></p></h4>

<p><h4 class="pop-country-link"><?php echo CHtml::link("Country",array('country/admin'));?></p></h4>

<p><h4 class="pop-bankMaster-link"><?php echo CHtml::link("Bank Master",array('bankMaster/admin'));?></p></h4>

<p><h4 class="pop-language-link"><?php echo CHtml::link("Languages",array('languages/admin'));?></p></h4>





<p><h4 class="pop-academicTermPeriod-link"><?php echo CHtml::link("Academic Term Period",array('academicTermPeriod/admin'));?></p></h4>

</div>

<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

