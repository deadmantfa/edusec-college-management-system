<div class="forgotPass-wrapper">

<h1>Forgot Password</h1>
<p>Please enter your email address to receive new password.</p>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'focus'=>array($model,'username'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div>
	    <div class="block-error">
		<?php echo Yii::app()->user->getFlash('block'); ?>
	    </div>
	</div>


	
	<table cellspacing="0" cellpadding="0" border="0" width="100%">
	  <tr>
		<td>
		<div>
		<?php echo CHtml::label(Yii::t('email', 'Email: <span class="required">*</span>'), 'Email');
 ?> 
            	<?php  echo $form->textField($model,'username'); ?><span class="new-status">&nbsp;</span>
		<?php echo $form->error($model,'username'); ?>
		</div>
		</td>
          </tr>

        <tr style="margin-top:10px; width:100%; float:left;">
            <td >
		<?php echo CHtml::submitButton('Reset',array('align'=>'center','class'=>'submit','id'=>'login-button')); ?>
		<?php echo CHtml::link('Back',array('site/login'), array('style'=>"color:#FFF; margin-left:20px;")); ?>
	    </td>
        </tr>
</table>

<?php $this->endWidget(); ?>
</div>
