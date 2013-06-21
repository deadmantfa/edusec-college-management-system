<?php
$this->breadcrumbs=array(
	'Organizations'=>array('admin'),
	$model->organization_name,
);

$this->menu=array(
//	array('label'=>'List Organization', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->organization_id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->organization_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Organization <?php //echo $model->organization_id; ?></h1>
<?php
		//	echo CHtml::image(Yii::app()->controller->createUrl('loadImage', array('id'=>$model->organization_id)),'alt',array('width'=>200,'height'=>100));

?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'organization_id',
		'organization_name',
		'address_line1',
		array(
		 'name'=>'address_line2',
                'value'=> ($model->address_line2 == null) ? 'Not Set' : $model->address_line2,
	          ),
		//'address_line2',
		array(
		 'name'=>'City',
                'value'=> $model->Rel_org_city->city_name,
	          ),		

		array(
		 'name'=>'State',
                'value'=> $model->Rel_org_state->state_name,
	          ),		

		array(
		 'name'=>'Country',
                'value'=> $model->Rel_org_country->name,
	          ),
		array(
		 'name'=>'Pincode',
                'value'=> $model->pin,
	          ),	
		array('name' => 'website',
	              'value' =>($model->website == null) ? 'Not Set' : $model->website,
                ),

		'email',
		array('name' => 'phone',
	              'value' =>($model->phone == 0) ? 'Not Set' : $model->phone,
                ),
		array('name' => 'fax_no',
	              'value' =>($model->fax_no == 0) ? 'Not Set' : $model->fax_no,
                ),
		
		array(
		 'name'=>'logo',
		'type'=>'raw',
                //'value'=> CHtml::image("../organisation_logo/$model->logo", "No Image"),
		'value'=>CHtml::image(Yii::app()->controller->createUrl('site/loadImage', array('id'=>$model->organization_id)), "No Image",array("width"=>"200px","height"=>"100px")) 		
                 ),
		'no_of_semester',
		//'organization_created_by',
		array('name'=>'organization_created_by',
			'value'=>User::model()->findByPk($model->organization_created_by)->user_organization_email_id,
		),
		//'organization_creation_date',
		array(
                'name'=>'organization_creation_date',
                'type'=>'raw',		
                'value'=>($model->organization_creation_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->organization_creation_date), 'd-m-Y'),
	        ),
	),
)); ?>
