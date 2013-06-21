<!DOCTYPE html>
<html>
    <head>
        <title>
            WDCalendar - Install
        </title>
        <style>
            html
            {
                margin: 0;
                padding: 0;
            }

            body
            {
                font: 85% sans-serif;
                line-height: 1.88889;
                color: #555753; 
                background: #4f555c;
            }

            .content-wrapper
            {
                width: 940px;
                margin: 0 auto;
                background-color: #e8e8e8;
            }

            .content
            {
                margin:20px;
            }

            p
            {
                margin:20px;
            }

            a
            {
                color: #00f;
                padding: 1px;
            }

            a:hover
            {
                color: #fff;
                background-color: #00f;
            }

            .code
            {
                font: 120% monospace;
                background-color: #fff;
                padding: 10px;
                color: #68f;
            }

            .smiley
            {
                font-size: 8px;
                text-align:right;
            }

            .code .string
            {
                color: #f00;
            }

            .errorSummary {
                background-attachment:initial;
                background-clip:initial;
                background-color:#FFEEEE;
                background-image:initial;
                background-origin:initial;
                background-position:initial initial;
                background-repeat:initial initial;
                border-bottom-color:#CC0000;
                border-bottom-style:solid;
                border-bottom-width:2px;
                border-left-color:#CC0000;
                border-left-style:solid;
                border-left-width:2px;
                border-right-color:#CC0000;
                border-right-style:solid;
                border-right-width:2px;
                border-top-color:#CC0000;
                border-top-style:solid;
                border-top-width:2px;
                margin-bottom:20px;
                margin-left:0;
                margin-right:0;
                margin-top:0;
                padding-bottom:12px;
                padding-left:7px;
                padding-right:7px;
                padding-top:7px;
            }
        </style>
    </head>
    <body>
        <div class="content-wrapper">
            <div class="content">
                <?php echo $content; ?>
            </div>
        </div>
        <center><?php echo CHtml::link( CHtml::image( $this->module->getAssetsUrl() . '/css/images/ct.png'), 'http://clevertech.biz', array( 'target' => 'blank', 'title' => 'Visit Clevertech' ) ); ?></center>
    </body>
</html>
