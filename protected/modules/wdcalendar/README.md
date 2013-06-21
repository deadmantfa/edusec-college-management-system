WD Calendar for Yii
===================

This is a Yii framework module that implements WD Calendar (http://sourceforge.net/projects/jqeventcalendar/).

Requirements
------------

Yii 1.1.7 (tested)
MySQL DB Connection


Installation
------------

*Step 1)*

extract the content under _protected/modules_

*Step 2)*

Configure your configuration file _protected/config/main.php_

```
...
    'modules' => array(
        ...
        'wdcalendar'    => array( 'admin' => 'install' ),
        ...
    )
...
```

*Step 3)*
    
    Visit htpp://yoursite.com/wdcalendar (or http://yoursite.com/index.php?r=wdcalendar) and follow the installation steps.

*Step 4)*

    Enjoy Your **WD Calendar** :)


Features
--------

You can either `embed` the calendar in your own design, or leave it to display full screen (default)

```
...
    'modules' => array(
        ...
        'wdcalendar'    => array( 'embed' => true ),
        ...
    )
...
```

You can also set WD specific options
```
...
    'modules' => array(
        ...
        'wdcalendar'    => array( 
                                'wd_options' => array(  
                                    'view' => 'week',
                                    'readonly' => 'JS:true' // execute JS
                                ) 
                           ),
        ...
    )
...
```

Links
---------

http://yiiframework.com
http://sourceforge.net/projects/jqeventcalendar/
http://clevertech.biz/yii


Releases
--------

v.0.1 - 06/24/2011

- comes with the basic WD features, create/delete/update,
- drag-and-drop events,
- can be embedded into layout
