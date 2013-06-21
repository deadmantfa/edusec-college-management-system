<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-transaction-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	 'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php // echo $form->errorSummary(array($info,$model,$photo,$address,$lang)); ?>

<?php
        // create tabs
        $tab_1 = $this->renderPartial('tabs/_tab1', array('form'=>$form,'info'=>$info,'model'=>$model,'photo'=>$photo),true);
        $tab_2 = $this->renderPartial('tabs/_tab2', array('form'=>$form,'info'=>$info,'lang'=>$lang),true);
        $tab_3 = $this->renderPartial('tabs/_tab3', array('form'=>$form,'info'=>$info),true);
        $tab_4 = $this->renderPartial('tabs/_tab4', array('form'=>$form,'model'=>$model),true);
        $tab_5 = $this->renderPartial('tabs/_tab5', array('form'=>$form,'model'=>$model,'address'=>$address),true);

       
         $this->widget('zii.widgets.jui.CJuiTabs', array(
		'headerTemplate'=>'<li><a href="{url}" title="{title}">{title}</a></li>',
                'tabs'=>array(
                   'Personal Info' =>array('content'=>$tab_1),
                   'Guardian Info' =>array('content'=>$tab_3),
                   'Other Info' =>array('content'=>$tab_2),
                   'Address Info' =>array('content'=>$tab_5),


                ),
                // additional javascript options for the tabs plugin
                'options'=>array(
                        'collapsible'=>false,
                ),
		'htmlOptions'=>array(
                     'class'=>'employee-final-form'),
		
        ));


     
?>

<?php $this->endWidget(); ?>

</div><!-- form -->
