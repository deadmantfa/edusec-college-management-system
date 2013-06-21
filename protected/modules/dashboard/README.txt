This module used to build a iGoole like dashboard page which let user drag/drop/add/remove portlets in.

INSTALL:
enable this module in main.php

'modules'=>array(
    'dashboard' => array(
      'debug' => true,
      'portlets' => array(
        'News' => array('class' => 'News', 'visible' => true, 'weight' => 0), 
        'Forums' => array('class' => 'Forums', 'visible' => true, 'weight' => 1), 
        'Videos' => array('class' => 'Videos', 'visible' => true, 'weight' => 2), 
        'Blogs' => array('class' => 'Blogs', 'visible' => true, 'weight' => 3), 
        'Friends' => array('class' => 'Friends', 'visible' => true, 'weight' => 4),
      ),
    ),
),

Ensure the "debug" property is true in first access.

USAGE:

Put your own portlets in /modules/dashboard/portlets directory and init your portlets in main.php 
then your own portlets will display in dashboard. There are some example portlets in this directory 
already. Follow this example.

Access your dashboard page by index.php/dashboard