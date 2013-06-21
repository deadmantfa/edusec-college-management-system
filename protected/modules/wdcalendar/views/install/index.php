<?php
$this->breadcrumbs=array(
	'Install',
);?>
<h1>Welcome to WDCalendar for Yii!</h1>
<hr>

<p>
	First and foremost, thank you for downloading <?php echo CHtml::link('WDCalendar for Yii', 'http://yiiframework.com/extensions/wdforyii' ); ?>. With this installation tool, we are trying to make the process as painless as possible, but if you have any questions please don't hesitate to contact us on the <?php echo CHtml::link('forum','http://www.yiiframework.com/forum/index.php?/forum/13-extensions/')?>.
</p>

<p>
    Before we start, please make sure that you have an available <strong>MySQL Database connection</strong>, because we need to create some tables. For an example please checkout the code below or for more information about DB connections <?php echo CHtml::link( 'click here', 'http://www.yiiframework.com/doc/guide/1.1/en/database.dao' ) ?>.
</p>


<pre>
<div class="code">
  // protected/main/config.php

  array(
        ......
        <span class="string">'components'</span>=>array(
            ......
            <span class="string">'db'</span>=>array(
                <span class="string">'class'</span>             => <span class="string">'CDbConnection'</span>,
                <span class="string">'connectionString'</span>  => <span class="string">'mysql:host=localhost;dbname=testdb'</span>,
                <span class="string">'username'</span>          => <span class="string">'root'</span>,
                <span class="string">'password'</span>          => <span class="string">'password'</span>,
                <span class="string">'emulatePrepare'</span>    => true,  // needed by some MySQL installations
                ),
            ),
     )
 </div>
</pre>

<div class="errorSummary">
<strong>WARNING:</strong> before you begin make sure you <strong>back up your database</strong>!
</div>

<p>
    If you think you are ready, please <?php echo CHtml::link('click here to start the installation process', Yii::app()->controller->createUrl( '/wdcalendar/install/step', array( 'n' => 1 ) )) ; ?>.
</p>

<div class="smiley">:)</div>
