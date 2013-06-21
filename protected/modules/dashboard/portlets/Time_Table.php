<?php
class Time_Table extends DPortlet
{

  protected function renderContent()
  {	
	$current_date = date('Y-m-d');
	
	if(Yii::app()->user->getState('stud_id')) // for student login
	{
		$criteria = new CDbCriteria;
		//$criteria->select = 'academic_term_id'; // select fields which you want in output
		$criteria->condition = 'current_sem = 1 AND academic_term_organization_id = '.Yii::app()->user->getState('org_id');

		$semname = AcademicTerm::model()->findAll($criteria);

		$data = CHtml::listData($semname,'academic_term_id','academic_term_id');
		$stud_model=StudentTransaction::model()->findByPk(Yii::app()->user->getState('stud_id'));
		$check_sem = in_array($stud_model->student_academic_term_name_id, $data);
		$timetableid=0;

		if(!$check_sem)
		{
	
			echo "<h3 align=center style=color:red>Sorry, No timetable available for this student.</h3>";
		}
		else
		{

		   $check_timetable=TimeTableDetail::model()->findAllByAttributes(
			array(
			     'acdm_name_id' => $stud_model->student_academic_term_name_id,
			     'division_id' => $stud_model->student_transaction_division_id,
			     'lecture_date'=>$current_date,
		   ),'proxy_status <> :status', array(':status'=>1));

			if(empty($check_timetable)) {
				echo "<h3 align=center style=color:red>Sorry, No timetable available for this student.</h3>";
			}
			else {
			$timetable = TimeTable::model()->findByPk($check_timetable[0]->timetable_id);

		  	$time1 = date('H:i A',strtotime($timetable['clg_start_time']));
		   
		   	if($timetable->zero_lec==1)
		   		$time[] = $time1;
		   	else
		   		$time[1] = $time1;
		   
			$lec_dur =  LecDuration::model()->findAll(array('condition'=>'timetable_id='.$timetable['timetable_id']));

			   foreach($lec_dur as $list)
			   {
				$break = NoOfBreakTable::model()->findByAttributes(array('after_lec_break'=>$list['lecture'],'timetable_id'=>$timetable['timetable_id']));
				if($break)
				{
					$dur1=date('i',strtotime($break['duration']));
					$timestamp = strtotime($time1) + 60*$dur1;
					$time1 = date('g:i A', $timestamp);  
				
					$timestamp = strtotime($time1) + 60*$list['duration'];
					$time1 = date('g:i A', $timestamp);    	
					$time [] = $time1 ;  		
				}
				else
				{
					$timestamp = strtotime($time1) + 60*$list['duration'];
					$time1 = date('g:i A', $timestamp);    	
					$time [] = $time1 ;
				}
			   }

			   print '<table id="time-table-struc" style="font-size:10px;">';
			   print '<tr>';
			   print '<th>Lecture No.</th>';
			   print '<th>Subject</th>';
			   print '<th>Faculty Name</th>';
			   print '<th>Room No.</th>';
			   print '<th>Time</th>';
			   foreach($check_timetable as $list) {
			   if($list->subject_type != 1 && $list->batch_id !=$stud_model->student_transaction_batch_id)
			   {
				continue;
			   }

			   print '<tr>';
			   print '<td>'.$list->lec.'</td>';	
			   print '<td>'.SubjectMaster::model()->findByPk($list->subject_id)->subject_master_alias.'</td>';	
			   print '<td>'.EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$list->faculty_emp_id))->employee_first_name.'</td>';	

			   print '<td>'.RoomDetailsMaster::model()->findByPk($list->room_id)->room_name.'</td>';	
			   print '<td>'.$time[$list->lec].'</td></tr>';			
			
	          	   }
		print '</table>';
		}
	    }

	}//if stud_id end
	else if(Yii::app()->user->getState('emp_id')) //for employee login
	{
		$criteria = new CDbCriteria;
		//$criteria->select = 'academic_term_id';
		$criteria->condition = 'current_sem = 1 AND academic_term_organization_id = '.Yii::app()->user->getState('org_id');

		$semname = AcademicTerm::model()->findAll($criteria);
		$data = CHtml::listData($semname,'academic_term_id','academic_term_id');
		$data_arr = implode(',',$data);

		$timetable_criteria = new CDbCriteria;
		$timetable_criteria->condition = 'acdm_name_id in ('.$data_arr.') AND faculty_emp_id = '.Yii::app()->user->getState('emp_id').' AND lecture_date = "'.date('Y-m-d').'"';
		$time_table_details = TimeTableDetail::model()->findAll($timetable_criteria);

		if($time_table_details) {

			$timetable = TimeTable::model()->findByPk($time_table_details[0]->timetable_id);

  			$time1 = date('H:i A',strtotime($timetable['clg_start_time']));
   
		   	if($timetable->zero_lec==1)
		   		$time[] = $time1;
		   	else
		   		$time[1] = $time1;
		   	$lec_dur =  LecDuration::model()->findAll(array('condition'=>'timetable_id='.$timetable['timetable_id']));

	   	   foreach($lec_dur as $list)
		   {
			$break = NoOfBreakTable::model()->findByAttributes(array('after_lec_break'=>$list['lecture'],'timetable_id'=>$timetable['timetable_id']));
			if($break)
			{
				$dur1=date('i',strtotime($break['duration']));
				$timestamp = strtotime($time1) + 60*$dur1;
				$time1 = date('g:i A', $timestamp);   

				$timestamp = strtotime($time1) + 60*$list['duration'];
				$time1 = date('g:i A', $timestamp);    	
				$time [] = $time1 ;
 		
			}
			else
			{
				$timestamp = strtotime($time1) + 60*$list['duration'];
				$time1 = date('g:i A', $timestamp);    	
				$time [] = $time1 ;
			}
		   }

			   print '<table id="time-table-struc" style="font-size:10px;">';
			   print '<tr>';
			   print '<th>Lecture No.</th>';
			   print '<th>Branch</th>';
			   print '<th>Sem</th>';
			   print '<th>Division</th>';
			   print '<th>Subject</th>';
			   print '<th>Room No.</th>';
			   print '<th>Time</th>';
			   foreach($time_table_details as $list) {
			   print '<tr>';
			   print '<td>'.$list->lec.'</td>';	
			   print '<td>'.Branch::model()->findByPk($list->branch_id)->branch_name.'</td>';	
			   print '<td>'.AcademicTerm::model()->findByPk($list->acdm_name_id)->academic_term_name.'</td>';	
			   print '<td>'.Division::model()->findByPk($list->division_id)->division_code.'</td>';	
			   print '<td>'.SubjectMaster::model()->findByPk($list->subject_id)->subject_master_alias.'</td>';
			   print '<td>'.RoomDetailsMaster::model()->findByPk($list->room_id)->room_name.'</td>';	
			   print '<td>'.$time[$list->lec].'</td></tr>';			
			
	          	   }
		print '</table>';

		}
	
		else
		{
			echo "<h3 align=center style=color:red>Sorry, No timetable available.</h3>";
	
		}
	}
  }
  
  protected function getTitle()
  {
    return 'TimeTable';
  }
  
  protected function getClassName()
  {
    return __CLASS__;
  }
}


