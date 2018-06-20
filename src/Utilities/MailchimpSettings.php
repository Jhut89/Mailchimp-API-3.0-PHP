<?php

namespace Mailchimp_API\Utilities;


class MailchimpSettings
{
    // Mailchimp Settings
    public $debug = false;
    public $log_file = null;
    public $verify_ssl = true;


    /*************************************
     * GETTERS
     *************************************/

    /**
     * @return bool
     */
    public function isDebug()
    {
        return $this->debug;
    }

    /**
     * @return null
     */
    public function getLogFile()
    {
        return $this->log_file;
    }

    /**
     * @return bool
     */
    public function shouldVerifySsl()
    {
        return $this->verify_ssl;
    }

    /**
     * @return bool
     */
    public function shouldReturnHeaders()
    {
        return $this->return_headers;
    }

    /*************************************
     * SETTERS
     *************************************/

    /**
     * @param bool $debug
     */
    public function setDebug($debug)
    {
        $this->debug = (bool) $debug;
    }

    /**
     * @param null $log_file
     */
    public function setLogFile($log_file)
    {
        $this->log_file = $log_file;
    }

    /**
     * @param bool $return_headers
     */
    public function setReturnHeaders($return_headers)
    {
        $this->return_headers = (bool) $return_headers;
    }

    /**
     * @param bool $verify_ssl
     */
    public function setVerifySsl($verify_ssl)
    {
        $this->verify_ssl = (bool) $verify_ssl;
    }
}