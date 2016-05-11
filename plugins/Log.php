<?php

class Log
{
    const LOG_PATH = '/home/azhe/log';
    private static $arrLogObj_ = array();

    private function __construct($app)
    {
        $this->app_ = $app;
        $this->logPath_ = self::LOG_PATH."/".$this->app_;
        $this->fileName_ = $this->logPath_."/".$this->app_.".log";
    }

    public static function getInstance($app = 'wp')
    {
        if (isset(self::$arrLogObj_[$app]) && null !== self::$arrLogObj_[$app]) {
            return self::$arrLogObj_[$app];
        }
        self::$arrLogObj_[$app] = new Log($app);
        return self::$arrLogObj_[$app];
    }

    /**
     * 打印trace日志
     */
    public static function trace($app, $str)
    {
        $logObj = Log::getInstance($app);
        $logObj->writeLog($str);
    }

    private function writeLog($str)
    {
        $date = date("YmdH", time());
        if (!is_dir($this->logPath_)) {
            mkdir($this->logPath_);
        }
        $preFix = 'TRACE: '.
            date('Y-m-d H:i:s').' ';
        $str = $preFix.$str;

        file_put_contents($this->fileName_.".$date", $str."\n", FILE_APPEND);
    }

    
}
?>
