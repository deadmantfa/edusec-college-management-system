</br>
<?php 
echo CHtml::link('GO BACK',YII::app()->request->urlReferrer);
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-experience-trans-grid',
	'dataProvider'=>$employeeexperience->mysearch(),
	//'filter'=>$model,
	'columns'=>array(
		//'employee_experience_trans_id',
		//'employee_experience_trans_user_id',
		//'employee_experience_trans_emp_experience_id',
		array(
		'header'=>'SN.',
		'class'=>'IndexColumn',
		),
		array('name' => 'employee_experience_organization_name',
	              'value' => '$data->Rel_Emp_exp->employee_experience_organization_name',
                     ),
		array('name' => 'employee_experience_designation',
			'value' => '$data->Rel_Emp_exp->employee_experience_designation',
                     ),
		array('name' => 'employee_experience_from',
			'value' => 'date_format(date_create($data->Rel_Emp_exp->employee_experience_from), "d-m-Y")',
                    ),
		array('name' => 'employee_experience_to',
			'value' => 'date_format(date_create($data->Rel_Emp_exp->employee_experience_to), "d-m-Y")',
                     ),
		
		
		array('name' => 'employee_experience',
			'value' => '$data->Rel_Emp_exp->employee_experience',
                     ),
		array(
			'class'=>'CButtonColumn',
			'template' => '{update}{delete}',
			'buttons'=>array(
			'view' => array(
				'url'=>'Yii::app()->createUrl("employeeAcademicRecordTrans/view", array("id"=>$data->employee_academic_record_trans_id))',
                        ),
			'update' => array(
				'url'=>'Yii::app()->createUrl("employeeExperienceTrans/update", array("id"=>$data->employee_experience_trans_id))',
				'options'=>array('id'=>'update_exp'),
				
                        ),
			                        
                        'delete' => array(
				'url'=>'Yii::app()->createUrl("employeeExperienceTrans/delete", array("id"=>$data->employee_experience_trans_id))',
                        ),
		   ),
		),

	),
)); 

