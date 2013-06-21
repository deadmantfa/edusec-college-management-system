<title>Employee List</title>
<?php
$this->breadcrumbs=array('Report',
	'Employee Info',
	
);?>
<?php
echo "&nbsp;";
//echo CHtml::link('GO BACK',Yii::app()->createUrl('report/EmployeeInfoReport'),array());
$gobackimage = CHtml::image('../images/Goback.png', 'No Image', array('height'=>'40','width'=>40));

echo CHtml::link($gobackimage,Yii::app()->createUrl('report/EmployeeInfoReport'),array('title'=>'Go Back'));  
echo "&nbsp;";
$_SESSION['query']=$query;
$_SESSION['selected_list']=$selected_emp_list;

$pdfimage = CHtml::image('../images/pdf.png', 'No Image', array('height'=>'40','width'=>40));

echo CHtml::link($pdfimage,Yii::app()->createUrl('report/SelectedEmployeeList',array('employeelistexport'=>'employeelistpdf')),array('title'=>'Export to PDF')); 

echo "&nbsp;";
$excelimage = CHtml::image('../images/excel.png', 'No Image', array('height'=>'40','width'=>40));
//echo $image;
echo CHtml::link($excelimage,Yii::app()->createUrl('report/SelectedEmployeeList',array('employeelistexcelexport'=>'employeelistexcel')),array('title'=>'Export to Excel'));
?>
<br><br>

<?php
if($emp_data)
{
?>
<div style= "max-height:700px;width:100%; overflow-x:scroll; overflow-y:scroll; ">
<?php	
//	print_r($selected_list);
	//echo CHtml::label('student first name','student_first_name');
	$emp_info=new EmployeeInfo;
	$add=new EmployeeAddress;
	$cat=new Category;
	$city=new City;
	$dept = new Department;
	
	echo "<table align=left style=\"width:200px; font: 10pt Arial,Helvetica,sans-serif; \" class=\"table_data\" >";
	echo "<th colspan=\"12\" style=\"font-size: 18px; color: rgb(255, 255, 255);\">";
	echo "Employee List";
        echo "</th>";
	echo "<tr class=\"table_header\"><th>SI No.</th>";
	foreach($selected_emp_list as $s)
	{
		//echo $s;
		if($s=='department_name')
			echo "<th style='text-align:center;'>Department</th>";
		else if($s=='employee_address_c_line1')
			echo "<th style='text-align:center;'>Current Address</th>";
		else if($s=='employee_address_p_line1')
			echo "<th style='text-align:center;'>Permenent Address</th>";
		else if($s=='category_name')
			echo "<th style='text-align:center;'>Category</th>";
		else if($s=='city')
			echo "<th style='text-align:center;'>City</th>";
		else if($s=='employee_bloodgroup_bloodgroup')
			echo "<th style='text-align:center;'>Blood Group</th>";
		else if($s=='employee_refer_designation')
			echo "<th style='text-align:center;'>Designation</th>";
		
		else
			echo "<th style='text-align:center;'>".CHtml::activeLabel($emp_info,$s)." </th>";
		
		
		
	}

	echo "</tr>";
	$i = 1;
	$m=1;
	foreach($emp_data as $t=>$sd)
	{ 
		
		if(($m%2) == 0)
		{
		  $class = "odd";
		}
		else
		{
		  $class = "even";
		}
		echo "<tr class=".$class.">";
		echo "<td style='text-align:center;'>".$i."</td>";
		foreach($selected_emp_list as $s)
		{
			if($s=='department_name')
				echo "<td style='text-align:center;'>".Department::model()->findByPk($sd['employee_transaction_department_id'])->department_name."</td>";
			else if($s=='category_name')
			{
				if($sd['employee_transaction_category_id'] !=0)
				echo "<td style='text-align:center;'>".Category::model()->findByPk($sd['employee_transaction_category_id'])->category_name."</td>";
				else
				echo "<td>&nbsp;</td>";
			}
			else if($s=='city')
			{
				if($sd['employee_transaction_emp_address_id'] !=0)
				{
					$add = EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id']);
					if($add->employee_address_c_city != null)
					echo "<td style='text-align:center;'>".City::model()->findByPk($add->employee_address_c_city)->city_name."</td>";			
					else
					echo "<td>&nbsp;</td>";
				}
				else
				echo "<td>&nbsp;</td>";
			}
			else if($s=='employee_refer_designation')
				echo "<td style='text-align:center;'>".EmployeeDesignation::model()->findByPk($sd['employee_transaction_designation_id'])->employee_designation_name."</td>";
			else	
			{		
				echo "<td style='text-align:center;'>".$sd[$s]."</td>";
			}

		}
		$i++;
		$m++;
		echo "</tr>";
	}
	
echo "</table>";
echo "</div>";
}
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
} ?>
