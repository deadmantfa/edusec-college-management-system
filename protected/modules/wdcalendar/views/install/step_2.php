<h1>
    Step 2
</h2>
<hr>

<p>
    So it wasn't that hard, was it? As a last step, please remove the installation parameter from your configuartion file. (see below)
</p>

<pre>
<div class="code">
    // protected/config/main.php

    array(
        ...
        <span class="string">'modules'</span>=>array(
            ...
            <span class="string">'wdcalendar'</span> => array(
                // 'admin'   => 'install' <===== comment this line, or remove
            ),
            ...
        ),
    );
</div>
</pre>

<p>
For additional parameters please find the <strong>README</strong> file or checkout the <?php echo CHtml::link( 'WDCalendar for Yii', 'http://yiiframework.com/extensions/wdforyii' ); ?> page.
</p>

<p>
<?php echo CHtml::link( 'Click here to see your calendar', Yii::app()->controller->createUrl( '/wdcalendar/' ) ); ?>
</p>

<p>
    Thanks again!
</p>

<p class="smiley">l8r</p>
