<?php
$this->breadcrumbs=array(
	'Fees Category'=>array('admin'),
	$model->fees_master_name,
);

$this->menu=array(
	//array('label'=>'List FeesMaster', 'url'=>array('index')),
	//array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	//array('label'=>'', 'url'=>array('update', 'id'=>$model->fees_master_id),'linkOptions'=>array('class'=>'Edit','title'=>'Update')),
	//array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->fees_master_id),'confirm'=>'Are you sure you want to delete this item?','class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
	//array('label'=>'', 'url'=>array('feesMasterTransaction/create', 'id'=>$model->fees_master_id),'linkOptions'=>array('class'=>'Fees_detail','title'=>'Add Fees Details')),
);
?>

<h1>View Fees Category <?php //echo $model->fees_master_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'fees_master_id',
		'fees_master_name',
//		'fees_master_created_by',
//		'fees_master_created_date',
//		'fees_master_tally_id',
		
		 array('name' => 'branch_name',
	              'value' => $model->Rel_fees_branch->branch_name,
                     ),

		array('name' => 'Academic Year',
		      'header'=>'Academic Year',
	              'value' => $model->Rel_fees_acmd->academic_term_period,
                     ),
		array('name' => 'Semester',
			'header'=>'Semester',
	              'value' => $model->Rel_fees_acdm_term_name->academic_term_name,
                     ),
		 array('name' => 'quota_name',
	              'value' => $model->Rel_fees_quota->quota_name,
                     ),
		/* array('name' => 'organization_name',
	              'value' => $model->Rel_fees_org->organization_name,
                     ),
		*/
		//'fees_master_total',
		//'fees_branch_id',
		//'fees_academic_term_id',
		//'fees_quota_id',
	),
)); ?>

<?php /******************************* CHANGED BY KARMRAJ ZALA ********************************************/ ?>

<?php  $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'fees-details-table-grid',
	'dataProvider'=>$fees_details->mysearch(),
//	'filter'=>$model,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		//'fees_id',
//		'fees_master_id',
//		'fees_desc_id',
		array(
			'name'=>'fees_details_name',
			'value'=>'FeesDetailsMaster::model()->findByPk(FeesDetailsTable::model()->findByPk($data->fees_desc_id)->fees_details_name)->fees_details_master_name',
		),
		array(
			'name'=>'fees_details_amount',
			'value'=>'FeesDetailsTable::model()->findByPk($data->fees_desc_id)->fees_details_amount',
		),

		array(
			'class'=>'CButtonColumn',
			'template' => '{update}{delete}',
			'buttons'=>array(
				'delete' => array(
		                        'label'=>'Delete Fees', // text label of the button
					'url'=>'Yii::app()->createUrl("feesMasterTransaction/delete", array("id"=>$data->fees_id))',
						),
		                'update' => array(
		                        'label'=>'Update Fees', // text label of the button
					'url'=>'Yii::app()->createUrl("feesMasterTransaction/update", array("id"=>$data->fees_id))',
		                       		),
					),
		),
	),
));  ?>
