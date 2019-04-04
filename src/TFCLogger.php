<?php

namespace TFCLog;

use Monolog\Logger;
use Monolog\Handler\NativeMailerHandler;

class TFCLogger implements TFCLoggerInterface
{

    private $logger;

    public function __construct(string $loggerName)
    {
        $this->logger = new Logger($loggerName);
        $this->logger->pushHandler(
            new NativeMailerHandler(
                explode(',', getenv('TFCLOGGER.TO', 'sp@thefirstclub.com')), 
                getenv('TFCLOGGER.SUBJECT', 'ALERT!!!!!'), 
                getenv('TFCLOGGER.FROM', 'alert@thefirstclub.com'),
                Logger::CRITICAL
            )            
        );
    }

    public function __get(string $var)
    {
        return $this->$var;
    }


    /**
     * Log a successful action
     * @param  string  $content content to be logged
     * @param  string  $apiUser Api User requesting the log save
     * @return bool          True if log save was successful
     */
    public function logSuccess(string $content, string $apiUser) : bool
    {
        try {
            $this->logger->info(
                'SUCCESS', 
                [
                    'log_type'      => 'SUCCESS',
                    'log_err'       => 'E000',
                    'log_content'   => json_decode($content),
                    'log_user'      => $apiUser,
                    'log_time'      => date(DATE_ATOM)
                ]
            );            
            return true;
        } catch (Exception $e) {
            throw $e;
        }
        return false;
    }

    /**
     * Log an Error
     * @param  string  $err     Json Error data to be logged
     * @param  string  $content content to be logged
     * @param  string  $apiUser Api User requesting the log save
     * @return bool          True if log save was successful
     */
    public function logInfo(string $content, string $apiUser) : bool
    {
        try {
            $this->logger->info(
                'INFO', 
                [
                    'log_type'      => 'INFO',
                    'log_err'       => 'E000',
                    'log_content'   => json_decode($content),
                    'log_user'      => $apiUser,
                    'log_time'      => date(DATE_ATOM)
                ]
            );            
            return true;
        } catch (Exception $e) {
            throw $e;
        }
        return false;
    }

    /**
     * Log an Error
     * @param  string  $err     Json Error data to be logged
     * @param  string  $content content to be logged
     * @param  string  $apiUser Api User requesting the log save
     * @return bool          True if log save was successful
     */
    public function logNotice(string $content, string $apiUser) : bool
    {
        try {
            $this->logger->notice(
                'NOTICE', 
                [
                    'log_type'      => 'NOTICE',
                    'log_err'       => 'E000',
                    'log_content'   => json_decode($content),
                    'log_user'      => $apiUser,
                    'log_time'      => date(DATE_ATOM)
                ]
            );            
            return true;
        } catch (Exception $e) {
            throw $e;
        }
        return false;
    }

    /**
     * Log an Warning action
     * @param  string  $err     Json Error data to be logged
     * @param  string  $content content to be logged
     * @param  string  $apiUser Api User requesting the log save
     * @return bool          True if log save was successful
     */
    public function logWarning(string $err, string $content, string $apiUser) : bool
    {
        try {

            $this->logger->warning(
                'WARNING', 
                [
                    'log_type'      => 'WARNING',
                    'log_err'       => $err,
                    'log_content'   => json_decode($content),
                    'log_user'      => $apiUser,
                    'log_time'      => date(DATE_ATOM)
                ]
            );            
            return true;
        } catch (Exception $e) {
            throw $e;
        }

    }

    /**
     * Log an Alert action
     * @param  string  $err     Json Error data to be logged
     * @param  string  $content content to be logged
     * @param  string  $apiUser Api User requesting the log save
     * @return bool          True if log save was successful
     */
    public function logAlert(string $err, string $content, string $apiUser) : bool
    {
        try {

            $this->logger->alert(
                'ALERT', 
                [
                    'log_type'      => 'ALERT',
                    'log_err'       => $err,
                    'log_content'   => json_decode($content),
                    'log_user'      => $apiUser,
                    'log_time'      => date(DATE_ATOM)
                ]
            );            
            return true;
        } catch (Exception $e) {
            throw $e;
        }

    }

    /**
     * Log an Error action
     * @param  string  $err     Json Error data to be logged
     * @param  string  $content content to be logged
     * @param  string  $apiUser Api User requesting the log save
     * @return bool          True if log save was successful
     */
    public function logError(string $err, string $content, string $apiUser) : bool
    {
        try {

            $this->logger->error(
                'ERROR', 
                [
                    'log_type'      => 'ERROR',
                    'log_err'       => $err,
                    'log_content'   => json_decode($content),
                    'log_user'      => $apiUser,
                    'log_time'      => date(DATE_ATOM)
                ]
            );            
            return true;
        } catch (Exception $e) {
            throw $e;
        }

    }

    /**
     * Log an Critical action
     * @param  string  $err     Json Error data to be logged
     * @param  string  $content content to be logged
     * @param  string  $apiUser Api User requesting the log save
     * @return bool          True if log save was successful
     */
    public function logCritical(string $err, string $content, string $apiUser) : bool
    {
        try {

            $this->logger->critical(
                'CRITICAL', 
                [
                    'log_type'      => 'CRITICAL',
                    'log_err'       => $err,
                    'log_content'   => json_decode($content),
                    'log_user'      => $apiUser,
                    'log_time'      => date(DATE_ATOM)
                ]
            );            
            return true;
        } catch (Exception $e) {
            throw $e;
        }

    }

    /**
     * Log an Emergency action
     * @param  string  $err     Json Error data to be logged
     * @param  string  $content content to be logged
     * @param  string  $apiUser Api User requesting the log save
     * @return bool          True if log save was successful
     */
    public function logEmergency(string $err, string $content, string $apiUser) : bool
    {
        try {

            $this->logger->emergency(
                'EMERGENCY', 
                [
                    'log_type'      => 'EMERGENCY',
                    'log_err'       => $err,
                    'log_content'   => json_decode($content),
                    'log_user'      => $apiUser,
                    'log_time'      => date(DATE_ATOM)
                ]
            );            
            return true;
        } catch (Exception $e) {
            throw $e;
        }

    }

}