</br>
<?php 
echo CHtml::link('GO BACK',YII::app()->request->urlReferrer); 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'feedback-details-table-grid',
	'dataProvider'=>$studentperormance->mysearch(),
	//'filter'=>$model,
	'enableSorting'=>false,
	'columns'=>array(
		
		array(
		'header'=>'SN.',
		'class'=>'IndexColumn',
		),
		array('name'=>'feedback_category_master_id',
			'value'=>'FeedbackCategoryMaster::model()->findByPk($data->feedback_category_master_id)->feedback_category_name',
		),
		'feedback_details_remarks',
		array(
                'name'=>'feedback_details_table_creation_date',
                'value'=>'date_format(new DateTime($data->feedback_details_table_creation_date), "d-m-Y")',
	        ),
		array('name'=>'feedback_details_table_created_by',
		      'value'=>'EmployeeTransaction::model()->findByAttributes(array("employee_transaction_user_id"=>$data->feedback_details_table_created_by)) == NULL ? "admin" : EmployeeInfo::model()->findByPk(EmployeeTransaction::model()->findByAttributes(array("employee_transaction_user_id"=>$data->feedback_details_table_created_by))->employee_transaction_employee_id)->employee_first_name',

		),
		array(
			'class'=>'CButtonColumn',
			'template' => '{update}{delete}',
	                'buttons'=>array(
				/*'view' => array(
					'url'=>'Yii::app()->createUrl("feedbackDetailsTable/view", array("id"=>$data->feedback_details_table_id))',
		                ),*/
				'update' => array(
					'url'=>'Yii::app()->createUrl("feedbackDetailsTable/update", array("id"=>$data->feedback_details_table_id))',
					'options'=>array('id'=>'update-feedback'),
		                ),
				'delete' => array(
					'url'=>'Yii::app()->createUrl("feedbackDetailsTable/delete", array("id"=>$data->feedback_details_table_id))',
		                ),
			),
		),
	),
)); 
