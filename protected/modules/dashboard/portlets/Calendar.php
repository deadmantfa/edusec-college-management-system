<?php
class Calendar extends DPortlet
{

  protected function renderContent()
  {
	
$nationalholiday = NationalHolidays::model()->findAll(array('condition'=>'national_holiday_org_id='.Yii::app()->user->getState('org_id')));
	$data = array();

	if($nationalholiday)
	{
		foreach($nationalholiday as $list)
		{
			$data[] = array(
					'title'=> $list->national_holiday_name,
                			'start'=> $list->national_holiday_date,
                			'color'=>'#000000'
					);
		}
	}

	//print_r($data); exit;
/*
	$data = array(
		array(
                'title'=> 'All Day Event',
                'start'=> '2012-12-02',
                'color'=>'#000000',
 
        	),
		array(
                'title'=> 'Karmraj',
                'start'=> '2012-12-02',
                'color'=>'#000000',
 
        	),
		array(
                'title'=> 'All Day Event',
                'start'=> '2012-12-14',
                'color'=>'#000000',
 
        	),
		array(
                'title'=> 'All Day Event',
                'start'=> '2012-12-15',
                'color'=>'#000000',
 
        	));

	print_r($data);exit;*/

	$this->widget('application.extensions.fullcalendar.FullcalendarGraphWidget', 
    array(
        'data'=>$data,
        'options'=>array(
            'editable'=>true,
        ),
        'htmlOptions'=>array(
               'style'=>'width:365px;margin: 0 auto;'
        ),
    )
);

  }
  
  protected function getTitle()
  {
    return 'Calendar';
  }
  
  protected function getClassName()
  {
    return __CLASS__;
  }
}
