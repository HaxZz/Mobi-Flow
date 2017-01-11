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
$GLOBALS['domain-name']   = 'localhost';
$GLOBALS['URL']           = 'http://'. $GLOBALS['domain-name'] .'/';
$GLOBALS['absolute-path'] = realpath(dirname(__FILE__)) .'/';


# To autoload - in fact include - a class that is not yet included
function ClassLoad($class)
{
	require_once($GLOBALS['absolute-path'] .'/'. $class .'.class.php');
}
spl_autoload_register('ClassLoad');
