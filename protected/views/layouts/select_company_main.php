<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div id="main-content">
	<div id="page">
		<div id="header">
		<div id="logo">
			<div id="site-logo"><?php //echo CHtml::image(Yii::app()->request->baseUrl."/images/rudraSoftech.png","ballpop"); ?>
			</div>
		<div id="site-name"><?php 
			echo CHtml::encode(Yii::app()->name).'<br>'; ?>
			<?php // echo $_REQUEST['organization_name']; ?>
		    <div id="company-name"><?php 
			if(isset($_REQUEST['organization_name']))
			{
				$company = Organization::model()->findByPk($_REQUEST['organization_name']);
				echo "Welcome to ".$company->organization_name;
			}
		
		?></div>
	      </div>
	  </div>

	</div><!-- header -->
		<div class="container">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
</div>
</div>
	<div id="footer">
<div class="powered-by"><span class="powered-text">© Copyright 2013 Rudra Softech. All Rights Reserved.
</span><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/rudraSoftech.png" /> </div>
	</div><!-- footer -->
	
</body>
</html>

