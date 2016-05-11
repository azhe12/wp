<?php

if (!defined('ABS_DIR')) {
    define('ABS_DIR', dirname(__FILE__));
}
require_once(ABS_DIR."/Log.php");

class WpLog
{
    public static function trace($str)
    {
        $app = 'wp';
        Log::trace($app, $str);
    }
}

?>
