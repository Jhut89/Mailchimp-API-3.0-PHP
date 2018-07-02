<?php

namespace MailchimpAPI\Lists;

use MailchimpAPI\Lists;

/**
 * Class GrowthHistory
 * @package MailchimpAPI\Lists
 */
class GrowthHistory extends Lists
{
    const URL_COMPONENT = '/growth-history/';

    /**
     * GrowthHistory constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $class_input
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint(self::URL_COMPONENT . $class_input);
        } else {
            $this->request->appendToEndpoint(self::URL_COMPONENT);
        }
    }
}
