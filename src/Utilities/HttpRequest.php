<?php

namespace Mailchimp_API\Utilities;


/**
 * An interface around HTTP methods
 *
 * This makes testing cURL dependencies easier
 *
 * Interface HttpRequest
 * @package Mailchimp_API\Utilities
 */
interface HttpRequest
{
    /**
     * @param $name
     * @param $value
     * @return mixed
     */
    public function setOption($name, $value);

    /**
     * @return mixed
     */
    public function executeCurl();

    /**
     * @param $name
     * @return mixed
     */
    public function getInfo($name);

    /**
     * @return mixed
     */
    public function close();
}