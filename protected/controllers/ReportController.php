<?php

class ReportController extends RController
{
	public function actionView()
	{
		$this->render('view');
	}
	
	public $layout='//layouts/column2';
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}

	/*public function actionStudInfoReport()
	{
		$model=new StudentTransaction;
		$branch = null;
		$acdm_period = null;
		$selected_list=null;
		if(!empty($_POST['StudentTransaction']['student_transaction_branch_id'])&&!empty($_POST['StudentTransaction']['student_academic_term_period_tran_id']))
		{

			$branch=$_POST['StudentTransaction']['student_transaction_branch_id'];
			$acdm_period=$_POST['StudentTransaction']['student_academic_term_period_tran_id'];
		
		}
		//else
		//{
		$this->render('studinfo_dyanamic_report_form',array(
               'model'=>$model,'selected_list'=>$selected_list,'branch'=>$branch,'acdm_period'=>$acdm_period,
       		));
		//}
	
	}
	public function actionSelectedList()
	{
		//echo "Hello";
		//$p=$_POST['stud_info'];
		$model=new StudentTransaction;
		$branch=$_POST['StudentTransaction']['branch'];
		$acdm_period=$_POST['StudentTransaction']['acdm_period'];
				
		if(!empty($_POST['stud_info']))
		{
		//print_r($_POST['stud_info']);
			$student_data=StudentTransaction::model()->findAll(array('condition'=>'student_transaction_branch_id='.$branch.' and 	student_academic_term_period_tran_id='.$acdm_period));
		
		$this->render('stud_report_view',array(
               'model'=>$model,'branch'=>$branch,'acdm_period'=>$acdm_period,'stud_data'=>$student_data,'selected_list'=>$_POST['stud_info'],
       		));
		}
		else
		{
			$this->render('studinfo_dyanamic_report_form',array(
               'model'=>$model,'branch'=>$branch,'acdm_period'=>$acdm_period,
       		));	
		}	
	}

	*/

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

	public function actionStudInfoReport()
	{

		$selected_list=null;
		
		$query=null;	
		$baseUrl = Yii::app()->baseUrl; 
  		$cs = Yii::app()->getClientScript();
  		$cs->registerCssFile($baseUrl.'/css/report.css');
		

		if((!empty($_POST['branch']) || !empty($_POST['acdm_period']) || !empty($_POST['quota']) || !empty($_POST['gender']) || !empty($_POST['city']) || !empty($_POST['category']) || !empty($_POST['bg']) || !empty($_POST['sem'])) && !empty($_POST['stud_info']))
		{
			//echo "i m here.."; exit;
			
	if(!empty($_POST['branch']))
	{
		$query .="stud.student_transaction_branch_id=".$_POST['branch']. " AND ";
	}
	if(!empty($_POST['acdm_period']))
	{
		$query .="stud.student_academic_term_period_tran_id=".$_POST['acdm_period']. " AND ";
	}
	
	if(!empty($_POST['quota']))
	{
		$query .="stud.student_transaction_quota_id=".$_POST['quota']. " AND ";
	}
	if(!empty($_POST['category']))
	{
		$query .="stud.student_transaction_category_id=".$_POST['category']. " AND ";
	}
	if(!empty($_POST['city']))
	{
		$query .="add.student_address_c_city=".$_POST['city']. " AND ";			
	}

	if(!empty($_POST['gender']))
	{
		$query .="stud_info.student_gender='".$_POST['gender']."' AND ";
		
	}
	if(!empty($_POST['bg']))
	{
		$query .="stud_info.student_bloodgroup='".$_POST['bg']."' AND ";
		
	}
	if(!empty($_POST['sem']))
	{
		$query .="stud.student_academic_term_name_id=".$_POST['sem']. " AND ";
	}

			$selected_list=$_POST['stud_info'];  
			
			$student_data =Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->leftJoin('student_address add', 'add.student_address_id = stud.student_transaction_student_address_id')
					->where($query.' stud.student_transaction_organization_id='.Yii::app()->user->getState('org_id'))
					->queryAll();


				//$this->layout='timetable_layout';	
						
				$this->render('stud_report_view',array(
			      		'stud_data'=>$student_data,'selected_list'=>$selected_list,'query'=>$query,
		       		));
				
				break;		
			}
				
		$this->render('studinfo_dyanamic_report_form1',array(
               'selected_list'=>$selected_list, 'query' => $query,
       		));
	
	}

	public function actionSelectedList()
	{
		if(!empty($_REQUEST['studentlistexport']))
		{
		$query= $_SESSION['query'];
		$selected_list=$_SESSION['selected_list'];
		$student_data =Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->leftJoin('student_address add', 'add.student_address_id = stud.student_transaction_student_address_id')
					->where($query.' and stud.student_transaction_organization_id='.Yii::app()->user->getState('org_id'))
					->queryAll();
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');
		
		$html = $this->renderPartial('stud_report_view_pdf', array(
			'stud_data'=>$student_data, 
			'selected_list'=>$selected_list,
		), true);
		
		ob_clean();
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('StudentList Report');
		$pdf->SetSubject('StudentList Report');
		$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "Student Info Report", '');
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Example Report by ".Yii::app()->name, "");
		$pdf->setHeaderFont(Array('helvetica', '', 8));
		$pdf->setFooterFont(Array('helvetica', '', 6));
		$pdf->SetMargins(15, 18, 15);
		$pdf->SetHeaderMargin(5);
		$pdf->SetFooterMargin(10);
		$pdf->SetAutoPageBreak(TRUE, 15);
		$pdf->SetFont('dejavusans', '', 7);
		
		$resolution= array(150, 150);
		$pdf->AddPage('P', $resolution);
		
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->LastPage();
		$pdf->Output("StudentInfoReport.pdf", "I");
	
		}
		else if(!empty($_REQUEST['studentlistexcelexport']))
		{
		$query= $_SESSION['query'];
		$selected_list=$_SESSION['selected_list'];
		$student_data =Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->leftJoin('student_address add', 'add.student_address_id = stud.student_transaction_student_address_id')

					->where($query.' and stud.student_transaction_organization_id='.Yii::app()->user->getState('org_id'))
					->queryAll();
		  
		  Yii::app()->request->sendFile(date('YmdHis').'.xlsx',
			    $this->renderPartial('stud_report_view_excel', array(
				'stud_data'=>$student_data, 
				'selected_list'=>$selected_list,
			    ), true)
			);
		}		
		else
		{		
		$query=$_POST['query'];
		$selected_list=null;
		}
		
		$baseUrl = Yii::app()->baseUrl; 
  		$cs = Yii::app()->getClientScript();
  		$cs->registerCssFile($baseUrl.'/css/report.css');		
		

	}
/* for print student id card */
	public function actionStudentid()
	{
		$model = new IdcardFieldFormat;
		$model->scenario = 'studentid';
		$this->performAjaxValidation($model);
		
		if(!empty($_POST['acdm_period']) || !empty($_POST['branch_name']) || !empty($_POST['enroll_no']) || !empty($_POST['roll_no']) && !empty($_POST['IdcardFieldFormat']['template_name']))
		{
			//var_dump($_POST['IdcardFieldFormat']['template_name']);
			//print_r($_POST); exit;

			$this->layout='timetable_layout';
			$query=null;
			$s = array();
			$selected_list = array();
			$student_data1 = array();
			if(!empty($_POST['acdm_period']))
			{
			$query .="stud.student_academic_term_period_tran_id=".$_POST['acdm_period'];	
			}
			
			if(!empty($_POST['branch_name']))
			{
				if(!empty($_POST['div_name']))
				{
					if(!empty($_POST['acdm_period']))
					{
						if(!empty($_POST['acdm_name']))
						{
							$query .=" and stud.student_transaction_branch_id=".$_POST['branch_name']." and stud.student_transaction_division_id=".$_POST['div_name']." and stud.student_academic_term_name_id =".$_POST['acdm_name'];
						}
						else
						{
							$query .=" and stud.student_transaction_branch_id=".$_POST['branch_name']." and stud.student_transaction_division_id=".$_POST['div_name'];
						}
					}
					else
					{
					$query .="stud.student_transaction_branch_id=".$_POST['branch_name']." and stud.student_transaction_division_id=".$_POST['div_name'];
					}
				}
				else
				{
					if(!empty($_POST['acdm_period']))
					{
					$query .=" and stud.student_transaction_branch_id=".$_POST['branch_name'];
					}
					else
					{
					$query .="stud.student_transaction_branch_id=".$_POST['branch_name'];
					}
				}
			}
			
			if(!empty($_POST['enroll_no']))
			{
				if(!empty($_POST['acdm_period']) || !empty($_POST['branch_name']))
				{
				$query .=" and stud_info.student_enroll_no='".$_POST['enroll_no']."'";
				}
				else
				{
				$query .="stud_info.student_enroll_no='".$_POST['enroll_no']."'";
				}
			}
			
			if(!empty($_POST['roll_no']))
			{
				if(!empty($_POST['acdm_period']) || !empty($_POST['branch_name']) || !empty($_POST['enroll_no']))
				{
				$query .=" and stud_info.student_roll_no='".$_POST['roll_no']."'";
				}
				else
				{
				$query .="stud_info.student_roll_no='".$_POST['roll_no']."'";
				}
			}
				$cardfield = Yii::app()->db->createCommand()
						->select('*')
						->from('idcard_field_format')
						->where('idtemplate_name="'.$_POST['IdcardFieldFormat']['template_name'].'" and idcard_org_id='.Yii::app()->user->getState('org_id'))
						->order('label_priority')
						->queryAll();
			
				foreach($cardfield as $card)
				{
					$selectedfieldname[] = $card['selected_field_name'];
					$selectedfieldlabel[] = $card['selected_field_label'];
				}
				foreach($selectedfieldname as $index=>$name)
				{
					$selected_list[$name]= $selectedfieldlabel[$index];
				}
			
			
			$student_data1 =Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->where($query.' and stud.student_transaction_organization_id='.Yii::app()->user->getState('org_id'))
					->queryAll();
			
		$this->render('print_idcard',array(
      		'student_data1'=>$student_data1,'selected_list'=>$selected_list,
		));

		}
		else
		{
		$this->render('stud_idgenration',array('model'=>$model));
       		}	
	}
	
/* for print employee id card */	
	
	public function actionEmployeeid()
	{
		$model = new IdcardFieldFormat;
		$model->scenario = 'employeeid';
		$this->performAjaxValidation($model);

	        if(!empty($_POST['department']) || !empty($_POST['employee_card_id']) && !empty($_POST['IdcardFieldFormat']['template_name']))
		{
		  //echo $_POST['employee_card_id'];exit;
		 $this->layout='timetable_layout';
		 $query=null;
		 $employee_data1 = array();
		 $selected_list = array();
		if(!empty($_POST['department']))
			{
			$query .="emp.employee_transaction_department_id=".$_POST['department'];
			}
	
		
		if(!empty($_POST['employee_card_id']))
			{
				if(!empty($_POST['department']))
				{
				$query .=" and emp_info.employee_attendance_card_id='".$_POST['employee_card_id']."'";
				}
				else
				{
				$query .="emp_info.employee_attendance_card_id='".$_POST['employee_card_id']."'";
				}
			}
		if(!empty($_POST['IdcardFieldFormat']['template_name']))
			{
				$cardfield = Yii::app()->db->createCommand()
						->select('*')
						->from('idcard_field_format')
						->where('idtemplate_name="'.$_POST['IdcardFieldFormat']['template_name'].'" and idcard_org_id='.Yii::app()->user->getState('org_id'))
						->order('label_priority')
						->queryAll();
			
				foreach($cardfield as $card)
				{
					$selectedfieldname[] = $card['selected_field_name'];
					$selectedfieldlabel[] = $card['selected_field_label'];
				}
				foreach($selectedfieldname as $index=>$name)
				{
					$selected_list[$name]= $selectedfieldlabel[$index];
				}
			}

		$employee_data1 =Yii::app()->db->createCommand()
					->select('*')
					->from('employee_transaction emp')
					->join('employee_info emp_info', 'emp_info.employee_id = emp.employee_transaction_employee_id')
					->leftJoin('employee_address add', 'add.employee_address_id = emp.employee_transaction_emp_address_id')
					->where($query.' and emp.employee_transaction_organization_id='.Yii::app()->user->getState('org_id'))
					->queryAll();	

				
		$this->render('print_emp_idcard',array(
      		'employee_data1'=>$employee_data1,'selected_list'=>$selected_list,
		));
	
		}
		
		else
		{
		$this->render('emp_idgeneration',array('model'=>$model));
       		}
	}
	public function actionEmployeeInfoReport()
	{
		$selected_list=null;
		
		$query=null;	
		$baseUrl = Yii::app()->baseUrl; 
  		$cs = Yii::app()->getClientScript();
  		$cs->registerCssFile($baseUrl.'/css/report.css');
		
    if((!empty($_POST['department'])||!empty($_POST['gender'])||!empty($_POST['city'])||!empty($_POST['category'])||!empty($_POST['bg'])) && !empty($_POST['emp_info']))
	{
			
	if(!empty($_POST['department']))
	{
		$query .="emp.employee_transaction_department_id=".$_POST['department']. " AND ";
	}
	
	if(!empty($_POST['category']))
	{
		$query .="emp.employee_transaction_category_id=".$_POST['category']. " AND ";
	}
	if(!empty($_POST['city']))
	{
		$query .="add.employee_address_c_city=".$_POST['city']. " AND ";
	}

	if(!empty($_POST['gender']))
	{
		
		$query .="emp_info.employee_gender='".$_POST['gender']."' AND ";
		
	}
	if(!empty($_POST['bg']))
	{
		$query .="emp_info.employee_bloodgroup='".$_POST['bg']."' AND ";
		
	}
			$selected_list = $_POST['emp_info'];
			$employee_data =Yii::app()->db->createCommand()
					->select('*')
					->from('employee_transaction emp')
					->join('employee_info emp_info', 'emp_info.employee_id = emp.employee_transaction_employee_id')
					->leftJoin('employee_address add', 'add.employee_address_id = emp.employee_transaction_emp_address_id')

					->where($query.' emp.employee_transaction_organization_id='.Yii::app()->user->getState('org_id'))
					->queryAll();
		//$this->layout='timetable_layout';
												
		$this->render('emp_report_view',array(
              		'emp_data'=>$employee_data,'selected_emp_list'=>$selected_list,'query'=>$query,
       		));
			
			
		}
		else		
		$this->render('empinfo_dyanamic_report_form',array('selected_list'=>$selected_list,'query'=>$query));
	
	}

	public function actionSelectedEmployeeList()
	{
		if(!empty($_REQUEST['employeelistexport']))
		{
		$query= $_SESSION['query'];
		$selected_list=$_SESSION['selected_list'];
		$employee_data =Yii::app()->db->createCommand()
					->select('*')
					->from('employee_transaction emp')
					->join('employee_info emp_info', 'emp_info.employee_id = emp.employee_transaction_employee_id')
					->leftJoin('employee_address add', 'add.employee_address_id = emp.employee_transaction_emp_address_id')

					->where($query.' and emp.employee_transaction_organization_id='.Yii::app()->user->getState('org_id'))
					->queryAll();
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');
		
		$html = $this->renderPartial('emp_report_view_pdf', array(
			'emp_data'=>$employee_data, 
			'selected_emp_list'=>$selected_list,
		), true);
		
		ob_clean();
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('EmployeeList Report');
		$pdf->SetSubject('EmployeeList Report');
		$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "Employee Info Report", '');
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Example Report by ".Yii::app()->name, "");
		$pdf->setHeaderFont(Array('helvetica', '', 8));
		$pdf->setFooterFont(Array('helvetica', '', 6));
		$pdf->SetMargins(15, 18, 15);
		$pdf->SetHeaderMargin(5);
		$pdf->SetFooterMargin(10);
		$pdf->SetAutoPageBreak(TRUE, 15);
		$pdf->SetFont('dejavusans', '', 7);
		
		$resolution= array(150, 150);
		$pdf->AddPage('P', $resolution);
		
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->LastPage();
		$pdf->Output("EmployeeInfoReport.pdf", "I");
	
		}
		else if(!empty($_REQUEST['employeelistexcelexport']))
		{
		$query= $_SESSION['query'];
		$selected_list=$_SESSION['selected_list'];
		$employee_data =Yii::app()->db->createCommand()
					->select('*')
					->from('employee_transaction emp')
					->join('employee_info emp_info', 'emp_info.employee_id = emp.employee_transaction_employee_id')
					->leftJoin('employee_address add', 'add.employee_address_id = emp.employee_transaction_emp_address_id')

					->where($query.' and emp.employee_transaction_organization_id='.Yii::app()->user->getState('org_id'))
					->queryAll();
		 Yii::app()->request->sendFile(date('YmdHis').'.xlsx',
			    $this->renderPartial('emp_report_view_excel', array(
				'emp_data'=>$employee_data, 
				'selected_emp_list'=>$selected_list,
			    ), true)
			);
		}		
		else
		{		
		$query=$_POST['query'];
		$selected_list=null;
		}
		
		$baseUrl = Yii::app()->baseUrl; 
  		$cs = Yii::app()->getClientScript();
  		$cs->registerCssFile($baseUrl.'/css/report.css');					
	}

	//By Ravi Bhalodiya

	public function actionDocumentsearch()
	{
		$model = new DocumentCategoryMaster;
		$model->scenario = 'documentsearch';
		$this->performAjaxValidation($model);	
		if(isset($_POST['DocumentCategoryMaster']))
		{
			$this->redirect(array('documentsearchview','dept_id'=>$_POST['DocumentCategoryMaster']['department'],'cat_id'=>$_POST['DocumentCategoryMaster']['document_category']));	
		}
		$this->render('document_search',array('model'=>$model));

	}
	public function actionDocumentsearchview($dept_id,$cat_id)
	{
		$model=new EmployeeTransaction('newsearch');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeTransaction'])) {
			$model->employee_transaction_id=$_GET['EmployeeTransaction']['employee_transaction_id'];
			$model->employee_first_name=$_GET['EmployeeTransaction']['employee_first_name'];
			
		}
		$this->render('document_search_view',array('model'=>$model,'department_id'=>$dept_id,'category_id'=>$cat_id));
	}
	public function actionStudentDocumentsearch()
	{
		$model = new DocumentCategoryMaster;
		$model->scenario = 'studentDocumentsearch';
		$this->performAjaxValidation($model);		
		if(!empty($_POST['DocumentCategoryMaster']['branch']) && !empty($_POST['DocumentCategoryMaster']['academic_year']) && !empty($_POST['DocumentCategoryMaster']['sem']) && !empty($_POST['DocumentCategoryMaster']['document_category']))
		{
			$this->redirect(array('studentdocumentsearchview','branch_id'=>$_POST['DocumentCategoryMaster']['branch'],'cat_id'=>$_POST['DocumentCategoryMaster']['document_category'],'acdm_period'=>$_POST['DocumentCategoryMaster']['academic_year'],'sem'=>$_POST['DocumentCategoryMaster']['sem']));	
		}
		$this->render('student_document_search',array('model'=>$model));
	}
	public function actionStudentdocumentsearchview($branch_id,$cat_id,$acdm_period,$sem)
	{
		
		$model=new StudentTransaction('newsearch');
		
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['StudentTransaction']))
 		{
		
			$model->student_transaction_id=$_GET['StudentTransaction']['student_transaction_id'];
			$model->student_first_name=$_GET['StudentTransaction']['student_first_name'];
			
		}
		
		$this->render('student_document_search_view',array('model'=>$model,'branch_id'=>$branch_id,'cat_id'=>$cat_id,'acdm_period'=>$acdm_period,'sem'=>$sem));
	}

	public function actionStudenthistory()
	{
		if(!empty($_POST['roll_no']) || !empty($_POST['en_no']) || !empty($_REQUEST['id']))
		{
			
			if(!empty($_POST['en_no']))
				$str = 'stud_info.student_enroll_no='.$_POST['en_no'];
			if(!empty($_POST['roll_no']))
				$str = 'stud_info.student_roll_no='.$_POST['roll_no'];
			if(!empty($_REQUEST['id']))
				$str = 'stud_info.student_info_transaction_id ='.$_REQUEST['id'];
		

			$stud_trans= Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->where($str.' and stud.student_transaction_organization_id='.Yii::app()->user->getState('org_id'))
					->queryAll();
			if(empty($stud_trans))
			{
				Yii::app()->user->setFlash('no-student-found',"No Student Found.");
				$this->redirect(array('studenthistory'));
			}
			
			$transaction_id= $stud_trans[0]['student_transaction_id'];
		
			$stud_archive = StudentArchiveTable::model()->findAll(array('condition'=>'student_archive_stud_tran_id='.$transaction_id));
				
			$this->render('student_history_view',
					array(
						'stud_archive'=>$stud_archive,
						'stud_trans'=>$stud_trans,
					)
			);		
			
		}
		else
		$this->render('student_history');	
	}

	public function actionPostLabelStudent()
	{
	
	if(!empty($_POST['acdm_period']) || !empty($_POST['branch_name']) || !empty($_POST['enroll_no']) && !empty($_POST['stud_info']))
	{
		$this->layout='timetable_layout';
		$query=null;
		$selectedlist = null;
		$student_data = null;
		if(!empty($_POST['acdm_period']))
			{
			$query .="stud.student_academic_term_period_tran_id=".$_POST['acdm_period'];	
			}
		
		if(!empty($_POST['branch_name']))
		{
			if(!empty($_POST['div_name']))
			{
				if(!empty($_POST['acdm_period']))
				{
					if(!empty($_POST['acdm_name']))
					{
						$query .=" and stud.student_transaction_branch_id=".$_POST['branch_name']." and stud.student_transaction_division_id=".$_POST['div_name']." and stud.student_academic_term_name_id =".$_POST['acdm_name'];
					}
					else
					{
						$query .=" and stud.student_transaction_branch_id=".$_POST['branch_name']." and stud.student_transaction_division_id=".$_POST['div_name'];
					}
				}
				else
				{
				$query .="stud.student_transaction_branch_id=".$_POST['branch_name']." and stud.student_transaction_division_id=".$_POST['div_name'];
				}
			}
			else
			{
				if(!empty($_POST['acdm_period']))
				{
				$query .=" and stud.student_transaction_branch_id=".$_POST['branch_name'];
				}
				else
				{
				$query .="stud.student_transaction_branch_id=".$_POST['branch_name'];
				}
			}
		}
		if(!empty($_POST['enroll_no']))
			{
				if(!empty($_POST['acdm_period']) || !empty($_POST['branch_name']))
				{
				$query .=" and stud_info.student_enroll_no=".$_POST['enroll_no'];
				}
				else
				{
				$query .="stud_info.student_enroll_no=".$_POST['enroll_no'];
				}
			}
		if(!empty($_POST['stud_info']))
		{
			$selectedlist = $_POST['stud_info'];
		}
		$student_data =Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->leftJoin('student_address add', 'add.student_address_id = stud.student_transaction_student_address_id')
					->where($query.' and stud.student_transaction_organization_id='.Yii::app()->user->getState('org_id').' and stud.student_transaction_detain_student_flag=5')
					->queryAll();

		$this->render('postaladdress_layout',
					array(
						'student_data'=>$student_data,
						'selectedlist'=>$selectedlist,
					)
			);
	}
	
	else
	{
	$this->render('postaladdress',array());
	}
     }
     protected function performAjaxValidation($model)
     {
		if(isset($_POST['ajax']) && ($_POST['ajax']==='document-search' || $_POST['ajax']==='document-search-emp' || $_POST['ajax']==='emp-id-card' || $_POST['ajax']==='stu-id-card'))
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
    }
}
