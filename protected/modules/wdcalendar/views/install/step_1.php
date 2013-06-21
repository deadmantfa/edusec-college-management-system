<h1>
    Step 1
</h1>
<hr>

<?php if( ! empty( $errors ) ) : ?>
    <div class="errorSummary">
            There seems to be a problem. Please try to address the issues below, and <?php echo CHtml::link( 'try again', Yii::app()->controller->createUrl( '/wdcalendar/install/step', array( 'n' => 1 ) ) ); ?>.
        <ul>
            <?php foreach( $errors as $err ) : ?>
                <li><?php echo $err; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    If you can not resolve the issues, you can always try to search for an alternate installation method in the <strong>Readme</strong>.
<?php else: ?>
    <p><strong>Great!</strong></p>
    <p>
        The necessery tables were succefully added to your database.
    </p>
    <p>
        Please <?php echo CHtml::link( 'click here', Yii::app()->controller->createUrl( '/wdcalendar/install/step', array( 'n' => 2 ) ) ); ?> to continue.
    </p>
<?php endif; ?>
<p class="smiley">.</p>
