<?php
/* Copyright 2017  Nicola Spanti <dev@nicola-spanti.info>
 * 
 * Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


mb_internal_encoding('UTF-8');


# Uncomment for PHP 7
# declare(strict_types=1);


# Some usefull variables
$GLOBALS['domain-name']   = '192.168.12.65';
$GLOBALS['URL']           = 'http://'. $GLOBALS['domain-name'] .'/';
$GLOBALS['bridgeURL'] = $GLOBALS['URL'].'/MOBIFLOW/back-end/src/travel/bridge.php';
$GLOBALS['dbuser'] = 'user';
$GLOBALS['dbpass'] = 'pass';
$GLOBALS['absolute-path'] = realpath(dirname(__FILE__)) .'/';


# To autoload - in fact include - a class that is not yet included
function ClassLoad($class)
{
    $class_paths = array('', 'api_communicator', 'carpark',
                         'route', 'travel', 'users');
    foreach($class_paths as $path)
    {
        if($path != '' && $path != '.')
        {
            $path .= '/';
        }
        $path = $GLOBALS['absolute-path'] .'/'. $path . $class .'.class.php';
        if(file_exists($path))
        {
            require_once($path);
        }
    }
}
spl_autoload_register('ClassLoad');
