<?php

$nav_array = array(
    
    array(
        'title' => 'System',
        'url' => 'settings/general-settings',
        'sub' => array(
            array(
                'title' => 'General Settings',
                'url' => 'settings/general-settings',
            ),
            array(
                'title' => 'Clear Cache',
                'url' => 'settings/clear-cache',
            ),
            array(
                'title' => 'Server Info',
                'url' => 'settings/server-info',
            ),
        ),
    ),
);

echo admin_nav($nav_array);
?>
