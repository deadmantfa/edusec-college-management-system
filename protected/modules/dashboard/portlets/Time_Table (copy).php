<?php
class Time_Table extends DPortlet
{

  protected function renderContent()
  {	
	
	$day = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
	if(Yii::app()->user->getState('stud_id')) // for student login
	{
		$date = date('Y-m-d');
		$ts = strtotime($date);
		$week_number = date('W', $ts);
		$year = date('Y');
		for($day1=1; $day1<7; $day1++)
		{
		    $alldate[] = date('d-m-Y', strtotime($year."W".$week_number.$day1));
		}
		
		$criteria = new CDbCriteria;
		//$criteria->select = 'academic_term_id'; // select fields which you want in output
		$criteria->condition = 'current_sem = 1 AND academic_term_organization_id = '.Yii::app()->user->getState('org_id');

		$semname = AcademicTerm::model()->findAll($criteria);

		$data = CHtml::listData($semname,'academic_term_id','academic_term_id');
		$stud_model=StudentTransaction::model()->findByPk(Yii::app()->user->getState('stud_id'));
		$check_sem = in_array($stud_model->student_academic_term_name_id, $data);
		//var_dump($check_sem); exit;
		$timetableid=0;

		if(!$check_sem)
		{
	
			echo "<h3 align=center style=color:red>Sorry, No timetable available for this student.</h3>";
		}
		else
		{

		   $check_timetable=TimeTableDetail::model()->findByAttributes(
			array(
			     'acdm_name_id' => $stud_model->student_academic_term_name_id,
			     'division_id' => $stud_model->student_transaction_division_id,
		   ));
			if(empty($check_timetable)) {
				echo "<h3 align=center style=color:red>Sorry, No timetable available for this student.</h3>";
			}
			else {
		
		   	$timetableid = $check_timetable->timetable_id;
			
			$model=TimeTable::model()->findByPk($timetableid);
			 
			$nooflec = $model->No_of_Lec;
			$sum = $nooflec;


			$lec_duration=LecDuration::model()->findAllByAttributes(array(),
								$condition  = 'timetable_id = :table_id ', 
								$params     = array(
									':table_id' => $timetableid,
									));
			$lec=array();
			foreach($lec_duration as $l)
			$lec[]=$l['duration'];
			$createdate = date_create($model->creation_date);
			$starti = 1;
			if($model->zero_lec==1)
			{
				$starti = 0;
			}
			$time=$model->clg_start_time;
			$time = date('H:i A',strtotime($time));
			$timestamp = strtotime($time);
			$time = date('g:i A', $timestamp);

?>

			<table id="time-table-struc" bgcolor="#CBE7ED"  border="2" style= width:auto;font-size:8px;border-collapse:collapse; height:auto;"  align="center">
			<th  align=center>
				Day/Time
			</th>

<?php
			$i=0;
			while($i < 6)
			{
				echo "<th>".$day[$i]."</br>(".$alldate[$i].")</th>";    
				$i++;
			}

			$break="";
			$l=0;

			$count =  array(
			  1=>0,
			  2=>0,
			  3=>0,
			  4=>0,
			  5=>0,
			  6=>0,
			);
			
			for($i=$starti;$i<=$nooflec;$i++)
			{
				$days=count($day);
				echo "<tr>";
				$duration = NoOfBreakTable::model()->findByAttributes(
									 array(
									'timetable_id' => $timetableid,
									'after_lec_break' => $i,
									));
				$dur = $duration['duration'];

				if($dur)
				$dur1=date('i',strtotime($dur));
		
				if($break)
				{
					echo "<td style=width:100px;>".$time."-</br>".date('g:i A', strtotime($time)+$dur1*60)."</td><td colspan=7 align=center><font color='green'><b>Break</b></font></td></tr>";
					$break="";
					$timestamp = strtotime($time) +$dur1*60;
					$time = date('g:i A', $timestamp);
					$i--;
					continue;
			
				}
				else
				{
		
					echo "<td style=width:100px;>".$time."-</br>".date('g:i A', strtotime($time) + 60*$lec[$l])."</td>";
					$timestamp = strtotime($time) + 60*$lec[$l];
					$l++;
					$time = date('g:i A', $timestamp);
				}

				for($j=1;$j<=$days;++$j)
				{
					$subname="";
					$room="";
					$faculty="";
					$batch="";
					
					if($count[$j]>0)
					{
						$count[$j]--;
						continue;
					}
					
		
				$result=TimeTableDetail::model()->findAllByAttributes(
					array(),
					$condition  = 'timetable_id = :table_id AND day = :day AND lec = :lec AND division_id = :div_id AND lecture_date = :lecdate and proxy_status <> :proxy_status',
					$params     = array(
					':table_id' => $timetableid,
					':day' => $j,
					':lec' => $i,
					':div_id' =>$stud_model->student_transaction_division_id,
					':lecdate'=>date('Y-m-d',strtotime($alldate[$j-1])),
					':proxy_status'=>2,
				));

					$break=NoOfBreakTable::model()->findAllByAttributes(
						array(),
						$condition  = 'timetable_id = :table_id  AND after_lec_break = :lec',
						$params     = array(
						':table_id' => $timetableid,
			 			':lec' => $i,
					));
		
					if($result)
					{	
						
						foreach($result as $list)
						{
							if($list['lect_hour']>1)
								$count[$j] = $list['lect_hour']-1;
							echo "<td rowspan=".$list['lect_hour']." align=center style=background:#C0CCCC; width:100px;>" ;				
						break;
						}
					
						foreach($result as $check)
						{
							if($check->batch_id != 0)
							$batch="(".Batch::model()->findByPk($check->batch_id)->batch_name.")";
							$subname = SubjectMaster::model()->findByPk($check->subject_id)->subject_master_alias;
							$room="(".RoomDetailsMaster::model()->findByPk($check->room_id)->room_name.")";	
							$faculty="(".EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$check->faculty_emp_id))->employee_name_alias.")";
							if($batch)
							echo "</br>".$subname."</br>".$batch."</br>".$room."</br>".$faculty;
							else
							echo "</br>".$subname."</br>".$room."</br>".$faculty;
						}
						echo "</td>";
					}
					else
					{
						echo "<td style=width:100px;>".$subname."</br>".$batch."</br>".$room."</br>".$faculty."</td>";
					}
		
	  			}
				echo "</tr>";
			}
			echo "</table>";
?>
<h5>Proxy details</h5>

<table id="time-table-struc" style="font-size:10px;">
<tr>
<th>Sr. No.</th>
<th>Employee Name</th>
<th>Proxy Employee Name</th>
<th>Subject</th>
<th>Lecture No.</th>
<th>Date</th>
</tr>
<?php
      $proxy_data=TimeTableDetail::model()->findAllByAttributes(
	array(),
	$condition  = 'timetable_id = :timetable_id and division_id = :div_id and lecture_date >= :start and lecture_date< :end and proxy_status = :proxy order by lec',
		$params = array(
			':timetable_id' => $timetableid,
			':div_id'=>$stud_model->student_transaction_division_id,
			':start'=>date('Y-m-d',strtotime($alldate[0])),
			':end'=>date('Y-m-d',strtotime($alldate[5])),
			':proxy'=>1,
			));
	$n = 0;
   foreach($proxy_data as $list) {
	$result = TimeTableDetail::model()->findByPk($list->proxy_id);
?>

<tr>
<td><?php echo ++$n; ?></td>
<td><?php echo EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$list->faculty_emp_id))->employee_first_name; ?></td>
<td><?php echo EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$result->faculty_emp_id))->employee_first_name; ?></td>
<td><?php echo SubjectMaster::model()->findByPk($result->subject_id)->subject_master_alias; ?></td>
<td><?php echo $result->lec; ?></td>
<td><?php echo date('d-m-Y',strtotime($result->lecture_date)); ?></td>
</tr>
<?php } ?>
</table>
<?php


		}//ELSE END
	    }
	?>
<?php


	}//if stud_id end
	else if(Yii::app()->user->getState('emp_id')) //for employee login
	{
		$timetableid=0;
		$date = date('Y-m-d');
		$ts = strtotime($date);
		$week_number = date('W', $ts);
		$alldate[0]='No';
		$year = date('Y');
		for($day2=1; $day2<7; $day2++)
		{
		    $alldate[$day2] = date('d-m-Y', strtotime($year."W".$week_number.$day2));
		}
		$semname=AcademicTerm::model()->findAllByAttributes(array(),
									$condition  = 'current_sem = :current_sem and academic_term_organization_id=:org_id', 
									$params     = array(
										':current_sem' =>1,
										':org_id'=>Yii::app()->user->getState('org_id'),
									));
		foreach($semname as $s)
		{	
			$semid = $s['academic_term_id'];
			$check=TimeTableDetail::model()->findByAttributes(
									array(
										'acdm_name_id' => $semid,
										'faculty_emp_id' => Yii::app()->user->getState('emp_id'),
									   ));
			if($check)
			{
				$timetableid=$check['timetable_id'];
				break;
			}
		}
		
		if(!empty($timetableid))
		{
			$day = array(" ","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
			$model=TimeTable::model()->findByPk($timetableid);
			$nooflec = $model->No_of_Lec;
			$sum = $nooflec;
			
			$lec_duration=LecDuration::model()->findAllByAttributes(array(),
								$condition  = 'timetable_id = :table_id ', 
								$params     = array(
									':table_id' => $timetableid,
									));
			$lec=array();
			foreach($lec_duration as $l)
			$lec[]=$l['duration'];
			$starti = 1;
			if($model->zero_lec==1)
			{
				$starti = 0;
			}
			$time=$model->clg_start_time;
			$time = date('H:i A',strtotime($time));
			$createdate = date_create($model->creation_date);
?>

			<table id="time-table-struc" bgcolor="#CBE7ED" border="2" style="width:auto;font-size:9px;border-collapse:collapse; height:auto;" >
			<th>
				Day/Time
			</th>

			<?php
			$i=0;
			while($i < 7)
			{
				echo "<th style='font-size:8px'>".$day[$i]."</br>(".$alldate[$i].")</th>";    		
				$i++;
			}
			$l=0;
			$break="";
			$dur1=0;

			$count =  array(
			  1=>0,
			  2=>0,
			  3=>0,
			  4=>0,
			  5=>0,
			  6=>0,
			);
			for($i=$starti;$i<=$nooflec;$i++)
			{
				$days=count($day);
				echo "<tr>";

				$duration = NoOfBreakTable::model()->findByAttributes(
									 array(
										'timetable_id' => $timetableid,
										'after_lec_break' => $i,
										));
				if($duration)
				{
					$dur = $duration['duration'];
					$dur1=date('i',strtotime($dur));
				}		
		
				if($break)
				{
					echo "<td style=width:100px;>".$time."-</br>".date('g:i A', strtotime($time)+$dur1*60)."</td><td colspan=7 align=center ><font color='green'><b>Break</b></font></td></tr>";
					$break="";
					$timestamp = strtotime($time) +$dur1*60;
					$time = date('g:i A', $timestamp);
					$i--;
					continue;
			
				}
				else
				{
		
					echo "<td style=width:100px;>".$time."-</br>".date('g:i A', strtotime($time) + 60*$lec[$l])."</td><td style=width:25px;><b>".$i."</b></td>";
					$timestamp = strtotime($time) + 60*$lec[$l];
					$l++;
					$time = date('g:i A', $timestamp);
				}
				
				for($j=1;$j<=$days-1;++$j)
				{
					$subname="";
					$room="";
					$faculty="";
					$batch="";
					
					if($count[$j]>0)
					{
						$count[$j]--;
						continue;
					}
					
		
					$result=TimeTableDetail::model()->findAllByAttributes(
						array(),
						$condition  = 'day = :day AND lec = :lec AND faculty_emp_id = :emp_id AND timetable_id=:table_id AND lecture_date =:lecdate and proxy_status <> :status',
						$params     = array(
							':table_id' => $timetableid,
							':day' => $j,
				 			':lec' => $i,
							':emp_id'=>Yii::app()->user->getState('emp_id'),
							':lecdate'=>date('Y-m-d',strtotime($alldate[$j])),	
							':status'=>2,		
							));
					$break=NoOfBreakTable::model()->findAllByAttributes(
									array(),
									$condition  = 'after_lec_break = :lec AND timetable_id=:table_id',
									$params     = array(
										':table_id' => $timetableid,
							 			':lec' => $i,
										));
		
					if($result)
					{	
						
						foreach($result as $list)
						{
							if($list['lect_hour']>1)
								$count[$j] = $list['lect_hour']-1;
							echo "<td rowspan=".$list['lect_hour']." align=center style=background:#C0CCCC; border-color:black; width:150px;>" ;				
						break;
						}
					
						foreach($result as $check)
						{
							if($check->batch_id != 0)
							$batch="(".Batch::model()->findByPk($check->batch_id)->batch_name.")";	
							$subname = SubjectMaster::model()->findByPk($check->subject_id)->subject_master_alias;
							$room="(".RoomDetailsMaster::model()->findByPk($check->room_id)->room_name.")";	
							$div=Division::model()->findByPk($check->division_id)->division_code;
							//$faculty="(".EmployeeInfo::model()->findByPk($check->faculty_emp_id)->employee_name_alias.")";
							if($batch)
							echo $subname."</br>".$batch."</br>".$room;
							
							else
							echo $subname."</br>"."(".$div.")"."</br>".$room;
							
						}
						echo "</td>";
					}
					else
					{
						echo "<td style=width:150px;>".$subname."</br>".$batch."</br>".$room."</td>";		
			
					}
		
		  		}//for j end
				echo "</tr>";
			}//for i end
			echo "</table>";
?>
<h5>Proxy Lectures</h5>

<table id="time-table-struc" border="1" style="font-size:10px;">
<tr>
<th>Sr. No.</th>
<th>Employee Name</th>
<th>Division</th>
<th>Subject</th>
<th>Room</th>
<th>Lecture No.</th>
<th>Date</th>
</tr>
<?php
      $proxy_data=TimeTableDetail::model()->findAllByAttributes(
	array(),
	$condition  = 'timetable_id = :timetable_id and proxy_employee_id = :emp_id and lecture_date >= :start and lecture_date< :end and proxy_status = :proxy order by lec',
		$params = array(
			':timetable_id' => $timetableid,
			':emp_id'=>Yii::app()->user->getState('emp_id'),
			':start'=>date('Y-m-d',strtotime($alldate[0])),
			':end'=>date('Y-m-d',strtotime($alldate[5])),
			':proxy'=>1,
			));
	$n = 0;
   foreach($proxy_data as $list) {
	$result = TimeTableDetail::model()->findByPk($list->proxy_id);
?>

<tr>
<td><?php echo ++$n; ?></td>
<td><?php echo EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$list->faculty_emp_id))->employee_first_name; ?></td>
<td><?php echo Division::model()->findByPk($result->division_id)->division_code; ?></td>
<td><?php echo SubjectMaster::model()->findByPk($result->subject_id)->subject_master_alias; ?></td>
<td><?php echo RoomDetailsMaster::model()->findByPk($result->room_id)->room_name; ?></td>
<td><?php echo $result->lec; ?></td>
<td><?php echo date('d-m-Y',strtotime($result->lecture_date)); ?></td>
</tr>
<?php } ?>
</table>		

<?php		}
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


