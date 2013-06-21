<?php

class FeesPaymentTransactionController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','payfeescash','payfeescheque','update_payfeescash','update_payfeescheque'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','update_payfeescash','update_payfeescheque'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */

	public function actionPrint_cash_receipt()
	{
		$this->layout='receipt_layout';
		$fees_payment = FeesPaymentTransaction::model()->findByPk($_REQUEST['id']);
		$model = StudentTransaction::model()->findByPk($fees_payment->fees_student_id);
		$stud_id = $model->student_transaction_student_id;
		$stud_model = StudentInfo::model()->findByPk($model->student_transaction_student_id);
		$acd_term = AcademicTermPeriod::model()->findByPk($model->student_academic_term_period_tran_id);
		$sem_name = AcademicTerm::model()->findByPk($model->student_academic_term_name_id);

		$branch = Branch::model()->findByPk($model->student_transaction_branch_id);	
		$cash_amt = FeesPaymentCash::model()->findByPk($fees_payment->fees_payment_cash_cheque_id);

		$this->render('print_cash_receipt',array('model'=>$model,'stud_model'=>$stud_model,'acd_term'=>$acd_term,'branch'=>$branch,'fees_payment'=>$fees_payment,'cash_amt'=>$cash_amt,'sem_name'=>$sem_name));
	}

	public function actionPrint_cheque_receipt()
	{
		$this->layout='receipt_layout';
		$fees_payment = FeesPaymentTransaction::model()->findByPk($_REQUEST['id']);
		$model = StudentTransaction::model()->findByPk($fees_payment->fees_student_id);
		$stud_id = $model->student_transaction_student_id;
		$stud_model = StudentInfo::model()->findByPk($model->student_transaction_student_id);
		$acd_term = AcademicTermPeriod::model()->findByPk($model->student_academic_term_period_tran_id);
		$sem_name = AcademicTerm::model()->findByPk($model->student_academic_term_name_id);

		$branch = Branch::model()->findByPk($model->student_transaction_branch_id);	
		$cheque_amt = FeesPaymentCheque::model()->findByPk($fees_payment->fees_payment_cash_cheque_id);

		$this->render('print_cheque_receipt',array('model'=>$model,'stud_model'=>$stud_model,'acd_term'=>$acd_term,'branch'=>$branch,'fees_payment'=>$fees_payment,'cheque_amt'=>$cheque_amt,'sem_name'=>$sem_name));
	}



	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionAddfees()
	{
		$model = new StudentTransaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentTransaction']))
			$model->attributes=$_GET['StudentTransaction'];

		$this->render('add_fees_student_list',array(
			'stud_model'=>$model,
		));
	}

	

	public function actionTotal()
	{
		$model=new FeesPaymentTransaction;
		if(isset($_REQUEST['Totalexport'])) {
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');
		$model=new FeesPaymentTransaction;
		$html = $this->renderPartial('total_pdf', array(
			'model'=>$model,
			'branch_id' => $_REQUEST['branch_id'], 
			'acm_id' => $_REQUEST['acm_id'], 
			'acm_name_id' => $_REQUEST['acm_name_id'],
		), true);
		
		ob_clean();
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('Total MIS Student Report');
		$pdf->SetSubject('Total MIS Student Report');
		$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "Total MIS Student Report", '');
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
		$pdf->Output("Total_MIS_Student.pdf", "I");
		}
		if(isset($_REQUEST['totalexportexcel'])) {
			 Yii::app()->request->sendFile(date('YmdHis').'.xlsx',
			    $this->renderPartial('total_pdf', array(
				'model'=>$model,
				'branch_id' => $_REQUEST['branch_id'], 
				'acm_id' => $_REQUEST['acm_id'], 
				'acm_name_id' => $_REQUEST['acm_name_id'],
			    ), true)
			);
		}
		$this->render('total',array(
			'model'=>$model,
		));
	}

	public function actionReceipt_generate_print()
	{
		$model=new FeesPaymentTransaction;
		$model->scenario = 'receipt_generate_print';
		$this->performAjaxValidation($model);	

		if(!empty($_POST['FeesPaymentTransaction']['receipt_start_from']) && !empty( $_POST['FeesPaymentTransaction']['receipt_end_to']))
		{
		$arr = array();
                $receipt_rang = Yii::app()->db->createCommand()
                                ->select('fees_receipt_id')
                                ->from('fees_receipt')
                                ->where('fees_receipt_number >=:start AND fees_receipt_number <=:end AND  fees_receipt_org_id=:org_id ', array(':start'=>$_POST['FeesPaymentTransaction']['receipt_start_from'], ':end'=>$_POST['FeesPaymentTransaction']['receipt_end_to'],':org_id'=>Yii::app()->user->getState('org_id')))
                                ->queryAll();
		if(!empty($receipt_rang)) {

		foreach($receipt_rang as $data=>$list)
			$arr[] = $list['fees_receipt_id'];
		$list = implode(",",$arr);	


		$fees_info = Yii::app()->db->createCommand()
				->select('fees_payment.fees_receipt_id')
		                ->from('fees_payment_transaction fees_payment')
				->join('fees_payment_cheque fees_cheque', 'fees_payment.fees_payment_cash_cheque_id = fees_cheque.fees_payment_cheque_id ')
		                ->where('fees_payment.fees_receipt_id in('.$list.') AND fees_payment.fees_payment_method_id = 2 AND fees_cheque.fees_payment_cheque_status = 0')
				->queryAll();

                $fees_cash_info = Yii::app()->db->createCommand()
                                ->select('fees_receipt_id')
                                ->from('fees_payment_transaction')
		                ->where('fees_receipt_id in('.$list.') AND fees_payment_method_id = 1')
    				->queryAll();

		$new_arr = array_merge($fees_cash_info,$fees_info); 


 		if(!empty($new_arr)) {
		foreach($new_arr as $mylist=>$data)
			$final_list[] = $data['fees_receipt_id']; 
		asort($final_list);

			$this->layout='receipt_layout';	

			$this->render('receipt_generate_view',array('start'=>$_POST['FeesPaymentTransaction']['receipt_start_from'],'end'=>$_POST['FeesPaymentTransaction']['receipt_end_to'], 'fees_info'=>$final_list));
			}
		else {
			$this->render('error_no_range',array());

		}

		}

		else {
			$this->render('error_no_range',array());

		}
	    }
		
		else
		{
			
			$this->render('receipt_generate_print',array(
				'model'=>$model,
			));
		}
	}
	public function actionDate_report()
	{
		$model=new FeesPaymentTransaction;
		$cheque = new FeesPaymentCheque;

		$model->scenario = 'date_report';
		
		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		
			if( isset($_POST['FeesPaymentTransaction']) || (!empty($_REQUEST['start_date']) && !empty($_REQUEST['end_date'])))
		{

			$period = null;
			$sem=null;
			$branch=null;
	
			if(!empty($_POST['FeesPaymentTransaction']['start_date']))	
			$new_start = $_POST['FeesPaymentTransaction']['start_date'];
			if(!empty($_REQUEST['start_date']))
			$new_start = $_REQUEST['start_date'];

			if(!empty($_POST['FeesPaymentTransaction']['end_date']))
			$new_end = $_POST['FeesPaymentTransaction']['end_date'];

			if(!empty($_REQUEST['end_date']))
			$new_end = $_REQUEST['end_date'];
		
			$org_id=Yii::app()->user->getState('org_id');
			
			$start = date("Y-m-d", strtotime($new_start));
			$end = date("Y-m-d", strtotime($new_end));

			$query = "fees_payment_transaction_organization_id=".$org_id." and fees_received_date >='".$start."' AND fees_received_date <='".$end."'";
			$query1 = "select student_transaction_id from student_transaction";
		
			if(!empty($_POST['FeesPaymentTransaction']['fees_acdm_period']))
			{
				$period = $_POST['FeesPaymentTransaction']['fees_acdm_period'];
				$query .= " and fees_academic_period_id=".$period;
			}
			if(!empty($_POST['FeesPaymentTransaction']['fees_acdm']))
			{
				$sem = $_POST['FeesPaymentTransaction']['fees_acdm'];
				$query .= " and fees_academic_term_id=".$sem;
			}
			if(!empty($_POST['FeesPaymentTransaction']['fees_branch']))
			{
				$branch = $_POST['FeesPaymentTransaction']['fees_branch'];
				$query1 .= " where student_transaction_branch_id=".$branch;
			}

			if(!empty($_REQUEST['period']))
			{
				$period = $_REQUEST['period'];
				$query .= " and fees_academic_period_id=".$period;
			}
			if(!empty($_REQUEST['sem']))
			{
				$sem = $_REQUEST['sem'];
				$query .= " and fees_academic_term_id=".$sem;
			}
			if(!empty($_REQUEST['branch']))
			{
				$branch = $_REQUEST['branch'];
				$query1 .= " where student_transaction_branch_id=".$branch;
			}

			if($start > $end)
			{
				Yii::app()->user->setFlash('error', "start date must be less then end date");
				$this->redirect(array('date_report'));
			}
						
			else
			{
				$var1 = FeesPaymentTransaction::model()->findAllBySql("select * from fees_payment_transaction where  fees_student_id in (".$query1.") and  ".$query);
			}			
		


		if(isset($_REQUEST['export'])) {
			Yii::import('application.extensions.tcpdf.*');
			require_once('tcpdf/tcpdf.php');
			require_once('tcpdf/config/lang/eng.php');
			//$this->actiondate_report();
			$html = $this->renderPartial('date_report_generate_view_pdf', array('start'=>$_REQUEST['start_date'],'end'=>$_REQUEST['end_date'],'var'=>$var1), true);
		
			ob_clean();
			$pdf = new TCPDF();
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor(Yii::app()->name);
			$pdf->SetTitle('Date Report');
			$pdf->SetSubject('Date Report');
			$pdf->SetKeywords('example, text, report');
			$pdf->SetHeaderData('', 0, "Date Report", '');
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
			$pdf->Output("DateWiseReport.pdf", "I");
			 }			
			if(isset($_REQUEST['datereportexportexcel'])) {
				 Yii::app()->request->sendFile(date('YmdHis').'.xlsx',
				    $this->renderPartial('date_report_generate_view_pdf', array('start'=>$_REQUEST['start_date'],'end'=>$_REQUEST['end_date'],'var'=>$var1
				    ), true)
				);
			}
			$this->render('date_report_generate_view',array('start'=>$_POST['FeesPaymentTransaction']['start_date'],'end'=>$_POST['FeesPaymentTransaction']['end_date'],'var1'=>$var1,'period'=>$period,'sem'=>$sem,'branch'=>$branch));	
			
			
						
		}
		
		else
		{
		$this->render('date_report_create',array(
			'model'=>$model,
		));
		}
	}



/*==================================By Ravi Bhalodiya===================================================*/
	public function actionBranch_receipt_generate_print()
	{
		$model=new FeesPaymentTransaction;
		$model->scenario = 'Branch_receipt_generate_print';
		$this->performAjaxValidation($model);
		
		if(!empty($_POST['FeesPaymentTransaction']['fees_acdm_period']))
		{
			$this->layout='receipt_layout';
			$query = null;
			$branch = null;
			$div = null;
			//var_dump($_POST['FeesPaymentTransaction']['fees_acdm_period']); exit;
			if($_POST['FeesPaymentTransaction']['fees_acdm_period'])
				$query .=' AND fees_academic_period_id='.$_POST['FeesPaymentTransaction']['fees_acdm_period'];
			if(!empty($_POST['FeesPaymentTransaction']['fees_acdm_name']))
				$query .=' AND fees_academic_term_id='.$_POST['FeesPaymentTransaction']['fees_acdm_name'];
			if(!empty($_POST['FeesPaymentTransaction']['fees_branch']))
				$branch = $_POST['FeesPaymentTransaction']['fees_branch'];

			if(!empty($_POST['FeesPaymentTransaction']['fees_division']))
				$div = $_POST['FeesPaymentTransaction']['fees_division'];

				$this->render('branch_receipt_generate_view',array('query'=>$query,'branch1'=>$branch,'div'=>$div));
			

		}		
		else
		{
			$flag = 1;
			$this->render('branch_receipt_generate_form_view',array(
				'model'=>$model,'flag'=>$flag,
			));
			
		}		
	}



/*	public function actionBranch_receipt_generate_print()
	{
		$model=new FeesPaymentTransaction;
		
		if(!empty($_POST['FeesPaymentTransaction']['fees_acdm_period']) || !empty( $_POST['FeesPaymentTransaction']['fees_branch']) || !empty($_POST['FeesPaymentTransaction']['fees_division']))
		{
			$this->layout='receipt_layout';
		
			if(!empty($_POST['FeesPaymentTransaction']['fees_acdm_period']) && !empty( $_POST['FeesPaymentTransaction']['fees_branch']) && empty($_POST['FeesPaymentTransaction']['fees_division']))
			{
				$this->render('branch_receipt_generate_view',array('acdm_period'=>$_POST['FeesPaymentTransaction']['fees_acdm_period'],'acdm_name'=>$_POST['FeesPaymentTransaction']['fees_acdm_name'],'branch'=>$_POST['FeesPaymentTransaction']['fees_branch']));
			}
			if(!empty($_POST['FeesPaymentTransaction']['fees_acdm_period']) && !empty( $_POST['FeesPaymentTransaction']['fees_branch']) && !empty($_POST['FeesPaymentTransaction']['fees_division']))
			{
				$this->render('branch_receipt_generate_view',array('acdm_period'=>$_POST['FeesPaymentTransaction']['fees_acdm_period'],'acdm_name'=>$_POST['FeesPaymentTransaction']['fees_acdm_name'],'branch'=>$_POST['FeesPaymentTransaction']['fees_branch'],'division'=>$_POST['FeesPaymentTransaction']['fees_division']));
			}
			if(empty($_POST['FeesPaymentTransaction']['fees_acdm_period']) || !empty( $_POST['FeesPaymentTransaction']['fees_branch']) || empty($_POST['FeesPaymentTransaction']['fees_division']))
			{
				$this->render('branch_receipt_generate_view',array('branch'=>$_POST['FeesPaymentTransaction']['fees_branch']));
			}
			if(!empty($_POST['FeesPaymentTransaction']['fees_acdm_period']) || empty( $_POST['FeesPaymentTransaction']['fees_branch']) || empty($_POST['FeesPaymentTransaction']['fees_division']))
			{
				$this->render('branch_receipt_generate_view',array('acdm_period'=>$_POST['FeesPaymentTransaction']['fees_acdm_period'],'acdm_name'=>$_POST['FeesPaymentTransaction']['fees_acdm_name']));
			}
			if(!empty($_POST['FeesPaymentTransaction']['fees_acdm_period']) || !empty( $_POST['FeesPaymentTransaction']['fees_branch']) || empty($_POST['FeesPaymentTransaction']['fees_division']) || empty($_POST['FeesPaymentTransaction']['fees_acdm_name']))
			{
				$this->render('branch_receipt_generate_view',array('acdm_period'=>$_POST['FeesPaymentTransaction']['fees_acdm_period'],'branch'=>$_POST['FeesPaymentTransaction']['fees_branch']));
			}

		}		
		else
		{
			$flag = 1;
			$this->render('branch_receipt_generate_form_view',array(
				'model'=>$model,'flag'=>$flag,
			));
			
		}		
	}*/
	public function actionStudentFeesReport()
	{
		$model = new FeesPaymentTransaction;
		if((!empty($_POST['roll_no'])||!empty($_POST['en_no'])) || (!empty($_REQUEST['roll_no']) || !empty($_REQUEST['en_no'])))
		{						
			if(!empty($_POST['en_no'])){
				$str = 'stud_info.student_enroll_no='.$_POST['en_no'];
			}
			
			if(!empty($_POST['roll_no'])){
				$str = 	'stud_info.student_roll_no="'.$_POST['roll_no'].'"';
			}
			if(!empty($_REQUEST['en_no'])){
			$str = 'stud_info.student_enroll_no='.$_REQUEST['en_no'];				
			}
			$model1=new StudentFeesMaster('student_details_fees');
		
		
			$info_model= Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->where($str.' and stud.student_transaction_organization_id='.Yii::app()->user->getState('org_id'))
					->queryAll();
				
			if(!empty($info_model))
			{
			
			if(!empty($_REQUEST['StudentFeesexport'])) {
			    Yii::import('application.extensions.tcpdf.*');
			require_once('tcpdf/tcpdf.php');
			require_once('tcpdf/config/lang/eng.php');
		
			$html = $this->renderPartial('student_fees_report_pdf',array('info_model'=>$info_model), true);
		
			ob_clean();
			$pdf = new TCPDF();
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor(Yii::app()->name);
			$pdf->SetTitle('Student Fees Report');
			$pdf->SetSubject('Student Fees Report');
			$pdf->SetKeywords('example, text, report');
			$pdf->SetHeaderData('', 0, "Student Fees Report", '');
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
			$pdf->Output("StudentFeesReport.pdf", "I");	
			}//pdf if end
			if(isset($_REQUEST['studentfeesexportexcel'])) {
				 Yii::app()->request->sendFile(date('YmdHis').'.xlsx',
				    $this->renderPartial('student_fees_report_pdf', array('info_model'=>$info_model,
				    ), true)
				);
			}
			$this->render('student_fees_report',array(
				'model'=>$model,'info_model'=>$info_model,'model1'=>$model1,
				));	
			}
			else
			{
				Yii::app()->user->setFlash('no-student-found', "No student found with this Roll No.");
				$this->redirect(array('StudentFeesReport'));	
			}
			
			
		}
		else
		{
			$this->render('student_fees_form',array(
					'model'=>$model,
				));
		}
	}
	public function actionStudentFeesReportwithoutform()
	{
		$model = new FeesPaymentTransaction;
		
		if(Yii::app()->user->getState('stud_id'))
		{	
			$info_model= Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->where('stud.student_transaction_id='.Yii::app()->user->getState('stud_id').' and stud.student_transaction_organization_id='.Yii::app()->user->getState('org_id'))
					->queryAll();
			$model1=new StudentFeesMaster('student_details_fees');
			if(!empty($info_model))
			{
				$this->render('student_fees_report',array(
				'model'=>$model,'info_model'=>$info_model,'model1'=>$model1,
				));
				
			}
			else
			{
				Yii::app()->user->setFlash('no-student-found', "No student found with this Roll No.");
				$this->redirect(array('StudentFeesReportwithoutform'));	
			}
		}
		else
		{
			$this->redirect(array('error','status'=>'login'));
		}
			
		
	}

	public function actionError($status)
	{
		
		
		$error_msgs = null;
		$link = null;
		switch($status)
		{
			case 'nofees':
			$error_msgs = "No fees available for this critaria.. Please create fees with this branch, academic year and semester of student.";
			$link = 'studentTransaction/admin';
			break;
			
			case 'login':
			$error_msgs = "No student Login.";
			$link = '/site/newdashboard';			
			break;
		
		}
		$this->render('error_page',array(
			'error_msgs'=>$error_msgs,'link'=>$link,
		));
		
		
	}

	public function actionPaid()
	{
		$model=new FeesPaymentTransaction;
		if(isset($_REQUEST['paidExport'])) {
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');
		$model=new FeesPaymentTransaction;
		$html = $this->renderPartial('paid_student_pdf', array(
			'model'=>$model,
			'branch_id' => $_REQUEST['branch_id'], 
			'acm_id' => $_REQUEST['acm_id'], 
			'acm_name_id' => $_REQUEST['acm_name_id'],
		), true);
		
		ob_clean();
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('Paid MIS Student Report');
		$pdf->SetSubject('Paid MIS Student Report');
		$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "Paid MIS Student Report", '');
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
		$pdf->Output("Paid_MIS_Student.pdf", "I");
		}
		if(isset($_REQUEST['paidexportexcel'])) {
			 Yii::app()->request->sendFile(date('YmdHis').'.xlsx',
			    $this->renderPartial('paid_student_pdf', array(
				'model'=>$model,
				'branch_id' => $_REQUEST['branch_id'], 
				'acm_id' => $_REQUEST['acm_id'], 
				'acm_name_id' => $_REQUEST['acm_name_id'],
			    ), true)
			);
		}
		$this->render('paid_student',array(
			'model'=>$model,
		));
	}

	public function actionUnPaid()
	{
		$model=new FeesPaymentTransaction;
		if(isset($_REQUEST['unpaidExport'])) {
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');
		$model=new FeesPaymentTransaction;
		$html = $this->renderPartial('unpaid_student_pdf', array(
			'model'=>$model,
			'branch_id' => $_REQUEST['branch_id'], 
			'acm_id' => $_REQUEST['acm_id'], 
			'acm_name_id' => $_REQUEST['acm_name_id'],
		), true);
		
		ob_clean();
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('UnPaid MIS Student Report');
		$pdf->SetSubject('UnPaid MIS Student Report');
		$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "UnPaid MIS Student Report", '');
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
		$pdf->Output("UnPaid_MIS_Student.pdf", "I");
		}
		if(isset($_REQUEST['unpaidexportexcel'])) {
			 Yii::app()->request->sendFile(date('YmdHis').'.xlsx',
			    $this->renderPartial('unpaid_student_pdf', array(
				'model'=>$model,
				'branch_id' => $_REQUEST['branch_id'], 
				'acm_id' => $_REQUEST['acm_id'], 
				'acm_name_id' => $_REQUEST['acm_name_id'],
			    ), true)
			);
		}
		$this->render('unpaid_student',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new FeesPaymentTransaction;
		$FeesMasterDetails=new FeesMaster;
		$total = 0;

		$result = $_REQUEST['id'];
		$fees_stru = Yii::app()->db->createCommand()
			    ->select('fees.fees_master_id , fees.fees_master_name , fees.fees_branch_id , stud.student_transaction_branch_id , stud.student_transaction_organization_id , fees.fees_organization_id , stud.student_transaction_quota_id , fees.fees_quota_id ,stud.student_academic_term_period_tran_id , fees.fees_academic_term_id, fees.fees_academic_term_name_id, fees.fees_master_total')
			    ->from('student_transaction stud')
			    ->join('fees_master fees','stud.student_transaction_branch_id = fees.fees_branch_id
		AND stud.student_academic_term_period_tran_id = fees.fees_academic_term_id
		AND stud.student_academic_term_name_id = fees.fees_academic_term_name_id 	
		AND stud.student_transaction_organization_id = fees.fees_organization_id
		AND stud.student_transaction_quota_id = fees.fees_quota_id')
			    ->where('stud.student_transaction_id=:id', array(':id'=>$result))
			    ->queryRow();

		$student_fees = StudentFeesMaster::model()->findAll('fees_master_table_id = :fees_master_id AND student_fees_master_student_transaction_id = :student_id', array(':fees_master_id'=>$fees_stru['fees_master_id'],':student_id'=>$result));
		
		//print_r($student_fees);  exit;
		foreach($student_fees as $fees_data)
			$total += $fees_data->fees_details_amount;

		if(!$fees_stru)
		{
			$ourscript = "alert('No fees available for this critaria.. Please create fees with this branch, academic year and semester of student. 	');";
    			Yii::app()->clientScript->registerScript('helloscript',$ourscript,CClientScript::POS_READY);
			
			$this->redirect(array('error','status'=>'nofees'));

		}
		else
		{

			$model->fees_payment_master_id = $fees_stru['fees_master_id'];
			$org = Organization::model()->findByPk($fees_stru['fees_organization_id']);
			$quota = Quota::model()->findByPk($fees_stru['fees_quota_id']);
			$branch = Branch::model()->findByPk($fees_stru['fees_branch_id']);
			$acmd = AcademicTermPeriod::model()->findByPk($fees_stru['fees_academic_term_id']);
			$acmd_name = AcademicTerm::model()->findByPk($fees_stru['fees_academic_term_name_id']);


			$FeesMasterDetails->fees_master_name = $fees_stru['fees_master_name'];
			$FeesMasterDetails->fees_organization_id = $org->organization_name;
			$FeesMasterDetails->fees_quota_id = $quota->quota_name;
			$FeesMasterDetails->fees_branch_id = $branch->branch_name;
			$FeesMasterDetails->fees_academic_term_id = $acmd->academic_term_period;
			$FeesMasterDetails->fees_academic_term_name_id = $acmd_name->academic_term_name;
			$FeesMasterDetails->fees_master_total = $total;

			$model->fees_payment_master_id = $fees_stru['fees_master_id'];

			$cash_model=new FeesPaymentTransaction('cashsearch');
			$cash_model->unsetAttributes();  // clear any default values
			if(isset($_GET['FeesPaymentTransaction']))
				$cash_model->attributes=$_GET['FeesPaymentTransaction'];

			$cheque_model=new FeesPaymentTransaction('chequesearch');
			$cheque_model->unsetAttributes();  // clear any default values
			if(isset($_GET['FeesPaymentTransaction']))
				$cheque_model->attributes=$_GET['FeesPaymentTransaction'];


			$this->render('create',array(
				'model'=>$model,'FeesMasterDetails'=>$FeesMasterDetails,'cash_model'=>$cash_model,'cheque_model'=>$cheque_model,
			));			
		}													
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */


	

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['FeesPaymentTransaction']))
		{
			$model->attributes=$_POST['FeesPaymentTransaction'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->fees_payment_transaction_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionPayfeescash()
	{

		$model=new FeesPaymentTransaction;
		$pay_cash=new FeesPaymentCash;
		$pay_trans=new FeesPaymentTransaction;
		$receipt = new FeesReceipt;
	
		if(isset($_POST['FeesPaymentTransaction']))
		{
			Yii::app()->user->setState('student_id',$_POST['FeesPaymentTransaction']['student_id']);	
			Yii::app()->user->setState('fees_master_id',$_POST['FeesPaymentTransaction']['fees_master_id']);	

		}		

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation_cash(array($model,$pay_cash));

		if(isset($_POST['FeesPaymentCash']))
		{
			$pay_cash->attributes = $_POST['FeesPaymentCash'];

			if($pay_cash->save())
			{	
			  $last_receipt_id = Yii::app()->db->createCommand()
				->select('MAX(fees_receipt_number) as lastid')
				->from('fees_receipt')
				->where('fees_receipt_org_id=:id', array(':id'=>Yii::app()->user->getState('org_id')))
				->queryRow();
			   	$receipt->fees_receipt_number = $last_receipt_id['lastid'] + 1; 
				$receipt->fees_receipt_org_id = Yii::app()->user->getState('org_id');
				$receipt->save();
				$pay_trans->fees_payment_master_id=Yii::app()->user->getState('fees_master_id');
				$pay_trans->fees_payment_method_id=1;
				$pay_trans->fees_payment_cash_cheque_id=$pay_cash->fees_payment_cash_id;
				$pay_trans->fees_receipt_id=$receipt->fees_receipt_id;
				$pay_trans->fees_payment=1;
				$pay_trans->fees_received_user_id=Yii::app()->user->id;
				$pay_trans->fees_full_part_payment_id=1;
				$pay_trans->fees_student_id=Yii::app()->user->getState('student_id');
				$pay_trans->fees_payment_transaction_organization_id = Yii::app()->user->getState('org_id');
				$pay_trans->fees_received_date= new CDbExpression('NOW()');
				 
				
				
				//$pay_trans->save();		

				$stud_trans = StudentTransaction::model()->findByAttributes(array('student_transaction_id'=>Yii::app()->user->getState('student_id')));

				$stud_add_id = $stud_trans->student_transaction_student_address_id;
				$stud_info_id = $stud_trans->student_transaction_student_id;
				$pay_trans->fees_academic_period_id = $stud_trans->student_academic_term_period_tran_id;

				$pay_trans->fees_academic_term_id = $stud_trans->student_academic_term_name_id;
				
				$pay_trans->save();		
				$stud_add_mobile = StudentInfo::model()->findByPk($stud_info_id)->student_mobile_no;

				$stud_email_id = StudentInfo::model()->findByPk($stud_info_id)->student_email_id_1;


				// SEND SMS TO LOGIN USER WITH RANDOM NUMBER
				/*
				$c = curl_init();
				curl_setopt($c, CURLOPT_URL, 'http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?');
				curl_setopt($c, CURLOPT_POST, true);
				curl_setopt($c, CURLOPT_POSTFIELDS,'username=barinder&password=988882665&sendername=DDIT&mobileno='.$stud_add_mobile.'&message=Succesfully recived your fees of amount: '.$pay_cash->fees_payment_cash_amount);
				curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
				if(curl_exec($c))
					echo 'sent';
				else
					var_dump(curl_error($c));
				curl_close ($c);
				

				// SEND AN EMAIL TO STUDENT AT THEIR PERSONAL EMAIL ID 1....

				
				require_once "Mail.php";
				 
				 $from = "<rudratestmail@gmail.com>";
				 $to = $stud_email_id;
				 $subject = "Notification for paid Fees";
				 $body = "Dear Student, Your fees recieved succesfully of amount :".$pay_cash->fees_payment_cash_amount;
				 
				 $host = "smtp.gmail.com";
				 $username = "rudratestmail@gmail.com";
				 $password = "rudra741";
				 
				 $headers = array ('From' => $from,
				   'To' => $to,
				   'Subject' => $subject);
				 $smtp = Mail::factory('smtp',
				   array ('host' => $host,
				     'auth' => true,
				     'username' => $username,
				     'password' => $password));
				 
				 $mail = $smtp->send($to, $headers, $body);
				 
				 if (PEAR::isError($mail)) {
				   echo("<p>" . $mail->getMessage() . "</p>");
				  } else {
				   echo("<p>Message successfully sent!</p>");
				  }
				*/
				
				$this->redirect(array('create','id'=>$pay_trans->fees_student_id));

			}

		}

		$this->render('payfeescash',array(
			'model'=>$model,'pay_cash'=>$pay_cash,
		));
	}

	public function actionUpdate_payfeescash()
	{
		$fees_id = $_REQUEST['id'];
		$student_id =  $_REQUEST['student_id'];

		$model=new FeesPaymentTransaction;
		$pay_cash=FeesPaymentCash::model()->findByPk($fees_id);

		
		//Yii::app()->user->setState('paid_student_id',$_REQUEST['feesid']);

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation_cash(array($model,$pay_cash));


		if(isset($_POST['FeesPaymentCash']))
		{
			$pay_cash->attributes=$_POST['FeesPaymentCash'];
			if($pay_cash->save())
				$this->redirect(array('create','id'=>$student_id));
		}

		$this->render('update_payfeescash',array(
			'model'=>$model,'pay_cash'=>$pay_cash,
		));
	}


	public function actionPayfeescheque()
	{

		$model=new FeesPaymentTransaction;
		$pay_cheque=new FeesPaymentCheque;
		$pay_trans=new FeesPaymentTransaction;
		$receipt = new FeesReceipt;
	
		if(isset($_POST['FeesPaymentTransaction']))
		{
			Yii::app()->user->setState('student_id',$_POST['FeesPaymentTransaction']['student_id']);	
			Yii::app()->user->setState('fees_master_id',$_POST['FeesPaymentTransaction']['fees_master_id']);	

		}		

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation_cheque(array($model,$pay_cheque));

		if(isset($_POST['FeesPaymentCheque']))
		{
			$pay_cheque->attributes = $_POST['FeesPaymentCheque'];
			$cheque_date = $_POST['FeesPaymentCheque']['fees_payment_cheque_date'];
			$chequedate = date("Y-m-d", strtotime($cheque_date));
			$pay_cheque->fees_payment_cheque_date = $chequedate;
			
			$pay_cheque->fees_payment_cheque_organization_id = Yii::app()->user->getState('org_id');

			if($pay_cheque->save())
			{	
			  $last_receipt_id = Yii::app()->db->createCommand()
				->select('MAX(fees_receipt_number) as lastid')
				->from('fees_receipt')
				->where('fees_receipt_org_id=:id', array(':id'=>Yii::app()->user->getState('org_id')))
				->queryRow();
			   	$receipt->fees_receipt_number = $last_receipt_id['lastid'] + 1; 
				$receipt->fees_receipt_org_id = Yii::app()->user->getState('org_id');		
				$receipt->save();
				$pay_trans->fees_payment_master_id=Yii::app()->user->getState('fees_master_id');
				$pay_trans->fees_payment_method_id=2;
				$pay_trans->fees_payment_cash_cheque_id=$pay_cheque->fees_payment_cheque_id;
				$pay_trans->fees_receipt_id=$receipt->fees_receipt_id;
				$pay_trans->fees_payment=1;
				$pay_trans->fees_received_user_id=Yii::app()->user->id;
				$pay_trans->fees_full_part_payment_id=1;
				$pay_trans->fees_student_id=Yii::app()->user->getState('student_id');
				$pay_trans->fees_payment_transaction_organization_id = Yii::app()->user->getState('org_id');
				$pay_trans->fees_received_date= new CDbExpression('NOW()');

				

				$stud_trans = StudentTransaction::model()->findByAttributes(array('student_transaction_id'=>Yii::app()->user->getState('student_id')));

				$pay_trans->fees_academic_period_id=$stud_trans->student_academic_term_period_tran_id;

				$pay_trans->fees_academic_term_id=$stud_trans->	student_academic_term_name_id;	
				$pay_trans->save();	
				$stud_add_id = $stud_trans->student_transaction_student_address_id;
				$stud_info_id = $stud_trans->student_transaction_student_id;
				
				$stud_add_mobile = StudentInfo::model()->findByPk($stud_info_id)->student_mobile_no;
				$stud_email_id = StudentInfo::model()->findByPk($stud_info_id)->student_email_id_1;


				// SEND SMS TO LOGIN USER WITH RANDOM NUMBER
				/*

				$c = curl_init();
				curl_setopt($c, CURLOPT_URL, 'http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?');
				curl_setopt($c, CURLOPT_POST, true);
				curl_setopt($c, CURLOPT_POSTFIELDS,'username=barinder&password=988882665&sendername=DDIT&mobileno='.$stud_add_mobile.'&message=Succesfully recived your fees of amount: '.$pay_cheque->fees_payment_cheque_amount);
				curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
				if(curl_exec($c))
					echo 'sent';
				else
					var_dump(curl_error($c));
				curl_close ($c);
				*/

				// SEND AN EMAIL TO STUDENT AT THEIR PERSONAL EMAIL ID 1....

				/*
				require_once "Mail.php";
				 
				 $from = "<rudratestmail@gmail.com>";
				 $to = $stud_email_id;
				 $subject = "Notification for paid Fees";
				 $body = "Dear Student, Your fees recieved succesfully of amount :".$pay_cheque->fees_payment_cheque_amount;
				 
				 $host = "smtp.gmail.com";
				 $username = "rudratestmail@gmail.com";
				 $password = "rudra741";
				 
				 $headers = array ('From' => $from,
				   'To' => $to,
				   'Subject' => $subject);
				 $smtp = Mail::factory('smtp',
				   array ('host' => $host,
				     'auth' => true,
				     'username' => $username,
				     'password' => $password));
				 
				 $mail = $smtp->send($to, $headers, $body);
				 
				 if (PEAR::isError($mail)) {
				   echo("<p>" . $mail->getMessage() . "</p>");
				  } else {
				   echo("<p>Message successfully sent!</p>");
				  }

				*/
				$this->redirect(array('create','id'=>$pay_trans->fees_student_id));

			}

		}

		$this->render('payfeescheque',array(
			'model'=>$model,'pay_cheque'=>$pay_cheque,
		));
	}
	
	public function actionUpdate_payfeescheque($id)
	{
		
		$pay_cheque=$this->loadModel($id);
		
		$fees_id = $_REQUEST['id'];
		$student_id =  $_REQUEST['student_id'];

		$model=new FeesPaymentTransaction;
		$pay_cheque=FeesPaymentCheque::model()->findByPk($fees_id);


		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation_cheque(array($model,$pay_cheque));
		$pay_cheque->fees_payment_cheque_date = date("d-m-Y", strtotime($pay_cheque->fees_payment_cheque_date));
		
		if(isset($_POST['FeesPaymentCheque']))
		{
			$pay_cheque->attributes=$_POST['FeesPaymentCheque'];
			$cheque_date = $_POST['FeesPaymentCheque']['fees_payment_cheque_date'];
			$chequedate = date("Y-m-d", strtotime($cheque_date));
			$pay_cheque->fees_payment_cheque_date = $chequedate;
			if($pay_cheque->save())
				$this->redirect(array('create','id'=>$student_id));
		}
		$this->render('update_payfeescheque',array(
			'model'=>$model,'pay_cheque'=>$pay_cheque,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */



	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id,$stud_id)
	{

		//if(Yii::app()->request->isPostRequest)
		//{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			//if(!isset($_GET['ajax']))
				$this->redirect(array('create','id'=>$stud_id));
		//}
		//else
		//	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
/*		$dataProvider=new CActiveDataProvider('FeesPaymentTransaction');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
		$model=new FeesPaymentTransaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FeesPaymentTransaction']))
			$model->attributes=$_GET['FeesPaymentTransaction'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new FeesPaymentTransaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FeesPaymentTransaction']))
			$model->attributes=$_GET['FeesPaymentTransaction'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=FeesPaymentTransaction::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='fees-payment-transaction-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	protected function performAjaxValidation_cash($models)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='fees-payment-cash-form')
		{
			echo CActiveForm::validate($models);
			Yii::app()->end();
		}
	}
	
	protected function performAjaxValidation_cheque($models)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='fees-payment-cheque-form')
		{
			echo CActiveForm::validate($models);
			Yii::app()->end();
		}
	}

	public function actionMis_report()
	{

		$model=new FeesPaymentTransaction;
		$current_aca_term = AcademicTerm::model()->findAll(array('condition'=>'current_sem=1 and academic_term_organization_id='.Yii::app()->user->getState('org_id')));
		
		if($current_aca_term){
		$aca_data = array();
		foreach($current_aca_term as $aca){
			$aca_data[] = $aca['academic_term_id'];
			$current_aca_term = $aca->academic_term_period_id;
		}
		$acam_data = implode(",",$aca_data);

		//$current_aca_term = $current_aca_term->academic_term_period_id;
		
		$fees_data = Yii::app()->db->createCommand()
			->selectDistinct('fees_master_id, fees_branch_id, fees_academic_term_id,fees_quota_id, fees_academic_term_name_id')
			->from('fees_master')
			->where('fees_academic_term_name_id in('.$acam_data.') AND fees_organization_id='.Yii::app()->user->getState('org_id').' order by fees_branch_id,fees_academic_term_name_id')
			->queryAll();
		//print count($fees_data); exit;
	if(!empty($fees_data))
	{
		foreach($fees_data as $list)
		{
			$ravi_paid=0;
			$ravi_total=0;
			$my_total = 0;
			$receive_amount = 0;
			if(!empty($list))
			{

				$sql = "SELECT COUNT(*) FROM student_transaction where student_transaction_quota_id=".$list['fees_quota_id']." and student_transaction_branch_id = ".$list['fees_branch_id']." AND student_academic_term_period_tran_id = ".$list['fees_academic_term_id']." AND student_academic_term_name_id = ".$list['fees_academic_term_name_id']." AND student_transaction_organization_id = ".Yii::app()->user->getState('org_id');
			


				$numStud[] = Yii::app()->db->createCommand($sql)->queryScalar();
				$ravi_total = Yii::app()->db->createCommand($sql)->queryScalar();

				 $paid_stud= Yii::app()->db->createCommand()
				->selectDistinct('fees.fees_student_id, stud.student_transaction_id,stud.student_transaction_student_id,stud.student_transaction_quota_id')
				->from('fees_payment_transaction fees')
				->join('student_transaction stud', 'fees.fees_student_id = stud.student_transaction_id')
				->where('stud.student_transaction_branch_id = :branch_id AND stud.student_transaction_quota_id=:quota AND stud.student_academic_term_period_tran_id = :acm_id AND fees.fees_academic_term_id = :acm_name_id AND stud.student_transaction_organization_id = :stud_org_id', array(
						':branch_id' => $list['fees_branch_id'], 
						':acm_id' => $list['fees_academic_term_id'], 
						':acm_name_id' => $list['fees_academic_term_name_id'], 
						':stud_org_id' => Yii::app()->user->getState('org_id'), 
						':quota'=>$list['fees_quota_id'],
					))
				->queryAll();
				
				$paid_stud_count[] = count($paid_stud);
				$ravi_paid = count($paid_stud);
				$cash_amount = 0;			
				$cheque_amount = 0;
				foreach($paid_stud as $stud_id) {				
					$amount_data = FeesPaymentTransaction::model()->findAll('fees_student_id='.$stud_id['student_transaction_id'].' and fees_academic_term_id='.$list['fees_academic_term_name_id']);
					foreach($amount_data as $cash_cheque_list) {
						if($cash_cheque_list['fees_payment_method_id'] == 1) {
							$cash_amount += FeesPaymentCash::model()->findByPk($cash_cheque_list['fees_payment_cash_cheque_id'])->fees_payment_cash_amount;
					}
					
					else {

						$amount = FeesPaymentCheque::model()->findByAttributes(array('fees_payment_cheque_status'=>0,'fees_payment_cheque_id'=>$cash_cheque_list->fees_payment_cash_cheque_id));
						$cheque_amount = $cheque_amount + $amount['fees_payment_cheque_amount'];
					}
				   }
				}
				$total_receive_amount[] = $cash_amount + $cheque_amount;

				 $unpaid_stud= Yii::app()->db->createCommand()
				->selectDistinct('stud.student_transaction_id,stud.student_transaction_student_id,stud.student_transaction_quota_id')
				->from('student_transaction stud')
				->where('stud.student_transaction_id NOT IN (SELECT fees_student_id FROM fees_payment_transaction)
				AND stud.student_transaction_branch_id = :branch_id AND stud.student_academic_term_period_tran_id = :acm_id AND stud.student_academic_term_name_id = :acm_name_id AND stud.student_transaction_organization_id = :stud_org_id', array(
						':branch_id' => $list['fees_branch_id'], 
						':acm_id' => $list['fees_academic_term_id'], 
						':acm_name_id' => $list['fees_academic_term_name_id'], 
						':stud_org_id' => Yii::app()->user->getState('org_id'),					))
				->queryAll();
				$unpaid_stud_count[] = $ravi_total - $ravi_paid; 
				//$unpaid_stud_count[] = count($unpaid_stud);

				$total_amount_data = FeesMaster::model()->findAll(
					  'fees_branch_id ='.$list['fees_branch_id'].' AND
					  fees_academic_term_id ='.$list['fees_academic_term_id'].' AND
					  fees_academic_term_name_id ='.$list['fees_academic_term_name_id']	  
				);

		$fees_stru = Yii::app()->db->createCommand()
			    ->select('fees.fees_master_id ,  stud.student_transaction_student_id, stud.student_academic_term_period_tran_id, stud.student_academic_term_name_id')
			    ->from('student_transaction stud')
			    ->join('fees_master fees','stud.student_transaction_branch_id = fees.fees_branch_id
		AND stud.student_academic_term_period_tran_id = fees.fees_academic_term_id
		AND stud.student_academic_term_name_id = fees.fees_academic_term_name_id 	
		AND stud.student_transaction_organization_id = fees.fees_organization_id
		AND stud.student_transaction_quota_id = fees.fees_quota_id')
			    ->where('stud.student_academic_term_period_tran_id = :term_p_id AND stud.student_academic_term_name_id = :term_name_id AND fees.fees_master_id = :fees_id', array(':fees_id'=>$list['fees_master_id'], ':term_p_id'=>$list['fees_academic_term_id'], ':term_name_id' =>$list['fees_academic_term_name_id']))
			    ->queryAll();
		//print_r($fees_stru); exit;
		$total = 0;
		foreach($fees_stru as $fees_data1) {

			$student_fees = StudentFeesMaster::model()->findAll('fees_master_table_id = :fees_master_id AND student_fees_master_student_transaction_id = :student_id', array(':fees_master_id'=>$fees_data1['fees_master_id'],':student_id'=>$fees_data1['student_transaction_student_id']));
			foreach($student_fees as $fees_data1)
				$total += $fees_data1->fees_details_amount;

			}
			//print $total; exit;
			$total_amount[] = $total;
		
//			$total += $fees_data['fees_details_amount'];

			/*if(count($total_amount_data) > 1 ) {
				foreach($total_amount_data as $fees_list) {

				$count_stud_sql = "SELECT COUNT(*) FROM student_transaction where student_transaction_branch_id = ".$fees_list->fees_branch_id." AND student_academic_term_period_tran_id = ".$fees_list->fees_academic_term_id." AND student_academic_term_name_id = ".$fees_list->fees_academic_term_name_id." AND student_transaction_quota_id = ".$fees_list->fees_quota_id." AND student_transaction_organization_id = ".Yii::app()->user->getState('org_id');		

				$numStud1 = Yii::app()->db->createCommand($count_stud_sql)->queryScalar();

				$my_total += $numStud1 * $fees_list->fees_master_total;

				}
				$total_amount[] = $my_total;	
			}	
			else {
				foreach($total_amount_data as $fees_list) {

				$count_stud_sql = "SELECT COUNT(*) FROM student_transaction where student_transaction_branch_id = ".$fees_list->fees_branch_id." AND student_academic_term_period_tran_id = ".$fees_list->fees_academic_term_id." AND student_academic_term_name_id = ".$fees_list->fees_academic_term_name_id."  AND student_transaction_organization_id = ".Yii::app()->user->getState('org_id');		
				$numStud2 = Yii::app()->db->createCommand($count_stud_sql)->queryScalar();
				$total_amount[] = $numStud2 * $fees_list->fees_master_total;
				
				}

			}*/	
		
		}

	
	}
		if(isset($_REQUEST['MISexport'])) {

		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');
		
		$html = $this->renderPartial('report_view_pdf', array(
			'numStud'=>$numStud, 
			'fees_data'=>$fees_data,
			'paid_stud_count'=>$paid_stud_count,
			'unpaid_stud_count'=>$unpaid_stud_count,
			'total_amount'=>$total_amount,
			'total_receive_amount'=>$total_receive_amount,
			
		), true);
		
		ob_clean();
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('MIS Report');
		$pdf->SetSubject('MIS Report');
		$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "Fees Summary", '');
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
		$pdf->Output("MIS.pdf", "I");
		}
		if(isset($_REQUEST['MISexportexcel'])) {
			 Yii::app()->request->sendFile(date('YmdHis').'.xlsx',
			    $this->renderPartial('report_view_pdf', array(
				'numStud'=>$numStud, 
				'fees_data'=>$fees_data,
				'paid_stud_count'=>$paid_stud_count,
				'unpaid_stud_count'=>$unpaid_stud_count,
				'total_amount'=>$total_amount,
				'total_receive_amount'=>$total_receive_amount,
			    ), true)
			);
		}
		$this->render('create_report',array('numStud'=>$numStud, 'fees_data'=>$fees_data,'paid_stud_count'=>$paid_stud_count,'unpaid_stud_count'=>$unpaid_stud_count,'total_amount'=>$total_amount,'total_receive_amount'=>$total_receive_amount,
			)); 
	}
else
	$this->render('error_msg',array()); 
}
else
{
	
	echo "<font color=\"red\"><center>Data Not Available</center></font>";

}
    }

}
