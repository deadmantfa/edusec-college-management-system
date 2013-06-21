<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	
	<div class="personal-profile-sidebar">
		<?php
			$this->renderPartial('/site/dashboard_sidebar');
		?>
	</div>
	<div class="dashboard-content">
		<?php
			$criteria = new CDbCriteria(array('condition' => ':active = t.message_of_day_active',
                    	'params' => array(
                           ':active' => 1,
		   	  ),
			'limit'=>1,
			'order'=>'id DESC',
                   	 ));
			
			$message = MessageOfDay::model()->findAll($criteria);

			if(!empty($message)) 
			{
		
				foreach($message as $list) {
				echo "<marquee width='93.7%' onmouseover=\"this.stop();\" onmouseout=\"this.start();\" height='25px' style='color:white;font-size:16px; padding:5px;border-radius:5px;background: url(\"../images/headerbox.png\") repeat-x scroll 0 0 #3D3D3D;'>".$list['message']."</marquee>";
				echo "</br></br>";
				}
		
			}
		?>
		<div id="content">
			<!-- Photo Gallery-->
		<div class="box">
		<div class="box-header">
		<h1>Photo Gallery</h1>
		</div>
		<?php	$this->Widget('application.extensions.gallery.EGallery',
			array(
				'path' => Yii::app()->baseUrl.'/images',
			    )
			);
		?>
		</div>
		<!--End  Photo Gallery-->
			<?php echo $content; ?>
		</div><!-- content -->
		

	</div>

</div>
<?php $this->endContent(); ?>
