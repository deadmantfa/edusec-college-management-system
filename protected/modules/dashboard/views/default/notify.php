 <?php if(Yii::app()->user->getState('emp_id'))
            {
               
                  $notifiche = EmployeeNotification::model()->getAllNotifications();?>
                <?php $notifications=array();?>
		<?php $lnotifications=array();?>
                <?php $count=0;?>
		<?php $count1=0;?>
                <?php foreach ($notifiche as $notifica)
			{ 
                     if($notifica->isNotReaded()) 
			{
			if($notifica->employee_notification_type=="Leave")
			{
 		                 $count1++;
                		 $lnotifications[$notifica->id]=$notifica->title;
			}
			 else { 
				$count++;	
			   $notifications[$notifica->id]=$notifica->title;
				}
			}
		}
	}	 if(Yii::app()->user->getState('stud_id'))
			{
				
		  		$notifiche = StudentNotification::model()->getAllNotifications();?>
				<?php $notifications=array();?>
			<?php $count=0;?>
			<?php foreach ($notifiche as $notifica): ?>
			    <?php if($notifica->isNotReaded()) : ?>
				<?php $count++;?>
				<?php $notifications[$notifica->student_notification_id]=$notifica->student_notification_title;?>
			    <?php endif; ?>
			<?php endforeach; 

			}

	$gnotifiche = GlobalNotification::model()->getAllNotifications();?>
        
	<?php $gnotifications=array();?>
	<?php $count2=0;?>
        <?php foreach ($gnotifiche as $notifica): ?>
            <?php if($notifica->isNotReaded()) : ?>
		<?php $count2++;?>
		<?php $gnotifications[$notifica->id]=$notifica->title;?>
                           <?php endif; ?>
        <?php endforeach; ?>

	

<div id="notify-menu">
<ul>
<?php if(Yii::app()->user->getState('emp_id') || Yii::app()->user->getState('stud_id'))
            {?>
  			<li>
		 	<a href="#" style="padding:10px 0;">
				<?php echo CHtml::image(Yii::app()->request->baseUrl."/images/images.png");?>
				<font color="red">
					<?php echo $count; ?>	
		                </font>
			</a>

			
	
		<ul class="notify-sub-menu">
	    
        <?php
	
	
            foreach($notifications as $id=>$p)
            {
                $notification=$p;
	           if(Yii::app()->user->getState('emp_id'))
                   {?>        
                <div class="comment_ui">
                    <a href="<?php echo Yii::app()->request->baseUrl;?>/notification/employeeNotification/Read?id=<?php echo $id?>">
		
                    <div style="position: relative;cursor:pointer;">
             	<font color="black"><?php echo $notification;?></font></div></a></div>   
                <?php }
                else if(Yii::app()->user->getState('stud_id'))
                      {?>        
                <div class="comment_ui">
                      <a href="<?php echo Yii::app()->request->baseUrl;?>/notification/studentNotification/Read?id=<?php echo $id?>">
                    <div style="position: relative;cursor:pointer;">
                 <font color="black"><?php echo $notification;?></font></div></a></div>  
                <?php }
       
                   else{ ?>
                    <div class="comment_ui">
                    <a href="<?php echo Yii::app()->request->baseUrl;?>/notification/GlobalNotification/view?id=<?php echo $id?>">
                    <div style="position: relative;cursor:pointer;">
             <font color="black"><?php echo $notification;?></font></div></a></div>   
                 <?php }       
             } ?> </ul>
	</li><?php }?> 
          
   <?php if(Yii::app()->user->getState('emp_id'))
            {?>

	<li>
	    <a href="#" style="padding:10px 0;">
                <?php echo CHtml::image(Yii::app()->request->baseUrl."/images/leave.png");?>
                <font color="red">
                    <?php echo $count1; ?>   
                        </font>
            </a>

        <ul class="notify-sub-menu" >

	<?php foreach($lnotifications as $id=>$p)
            {
                $notification=$p;
		   if(Yii::app()->user->getState('emp_id'))
                   {?>        
                <div class="comment_ui">
                    <a href="<?php echo Yii::app()->request->baseUrl;?>/notification/employeeNotification/Read?id=<?php echo $id?>">
			
                    <div style="position: relative;cursor:pointer;">
             	<font color="black"><?php echo $notification;?></font></div></a></div>   
                <?php }
                           
             }?> 
                                   
                       
  
           </ul><?php }?>
          <li>
  
        <a href="#" style="padding:10px 0;">
                <?php echo CHtml::image(Yii::app()->request->baseUrl."/images/earth.gif");?>
                <font color="red">
                    <?php echo $count2; ?>  
                        </font>
            </a>

        <ul class="notify-sub-menu" >
     
   <?php
     foreach($gnotifications as $id=>$p)
            {
                $notification=$p;?>
        	<div class="comment_ui">
                    <a href="<?php echo Yii::app()->request->baseUrl;?>/notification/globalNotification/read?id=<?php echo $id?>">
                    <div style="position: relative;cursor:pointer;">
                 <font color="black"><?php echo $notification;?></font></div></a></div>  
             <?php }?>
                                  
                      
 
           </ul>

   </li>
</div>
</div>

