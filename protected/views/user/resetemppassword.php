<?php
$this->breadcrumbs=array(
	'Reset Employee Password',
	
);?>
<?php
/*
$this->breadcrumbs=array(
	'Employee Transactions'=>array('admin'),
	'Manage',
);*/

$this->menu=array(
//	array('label'=>'List EmployeeTransaction', 'url'=>array('index')),
	//array('label'=>'Reset Employee LoginID', 'url'=>array('/user/resetemploginid'),'linkOptions'=>array('class'=>'','title'=>'Create')),

	//array('label'=>'Reset Admin Password', 'url'=>array('/user/resetadminpassword'),'linkOptions'=>array('class'=>'','title'=>'Create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('employee-transaction-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Reset Employee Password</h1>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<div class="block-error">
		<?php echo Yii::app()->user->getFlash('resetemppassword'); ?>
	</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-transaction-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
//		'employee_transaction_id',
//		'employee_transaction_user_id',
//		'employee_transaction_employee_id',
//		'employee_transaction_emp_address_id',
//		'employee_transaction_branch_id',
//		'employee_transaction_category_id',
		array('name' => 'employee_no',
		     // 'filter' => CHtml::listData(TaskMaster::model()->findAll(), 'task_name', 'task_name'),  // Note: Put this line if you need dropdown in Grid 				for display list of entry from master table
	              'value' => '$data->Rel_Emp_Info->employee_no',
                     ),
		array('name' => 'employee_attendance_card_id',
		     // 'filter' => CHtml::listData(TaskMaster::model()->findAll(), 'task_name', 'task_name'),  // Note: Put this line if you need dropdown in Grid 				for display list of entry from master table
	              'value' => '$data->Rel_Emp_Info->employee_attendance_card_id',
                     ),		 
		array('name' => 'employee_first_name',
		     // 'filter' => CHtml::listData(TaskMaster::model()->findAll(), 'task_name', 'task_name'),  // Note: Put this line if you need dropdown in Grid 				for display list of entry from master table
	              'value' => '$data->Rel_Emp_Info->employee_first_name',
                     ),
		
		 array('name' => 'category_name',
		     // 'filter' => CHtml::listData(TaskMaster::model()->findAll(), 'task_name', 'task_name'),  // Note: Put this line if you need dropdown in Grid 				for display list of entry from master table
	              'value' => '($data->category_name == 0)? "Not Set" :$data->Rel_Category->category_name',
                     ),

		 array('name'=>'employee_transaction_department_id',
		'value'=>'Department::model()->findByPk($data->employee_transaction_department_id)->department_name',
			'filter' =>CHtml::listData(Department::model()->findAll(array('condition'=>'	department_organization_id='.Yii::app()->user->getState('org_id'))),'department_id','department_name'),

		), 
		array('name'=>'employee_transaction_shift_id',
			'value'=>'Shift::model()->findByPk($data->employee_transaction_shift_id)->shift_type',
			'filter' =>CHtml::listData(Shift::model()->findAll(array('condition'=>'	shift_organization_id='.Yii::app()->user->getState('org_id'))),'shift_id','shift_type'),

		), 
		array('name' => 'user_organization_email_id',
			      'value' => '$data->Rel_user1->user_organization_email_id',
                      ),

		array('class'=>'CButtonColumn',
			'template' => '{Reset Password}',
	                'buttons'=>array(
                        'Reset Password' => array(
                                'label'=>'Reset Password', 
				 'url'=>'Yii::app()->createUrl("user/update_emp_password", array("id"=>$data->employee_transaction_user_id))',
                                'imageUrl'=> Yii::app()->baseUrl.'/images/Reset Password.png',  // image URL of the button. If not set or false, a text link is used
                              
                        ),
		   ),

		),
	),
	'pager'=>array(
		'class'=>'AjaxList',
		//'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>
