<?php

namespace MailchimpAPI\Campaigns;

use MailchimpAPI\Campaigns;

/**
 * Class Feedback
 * @package MailchimpAPI\Campaigns
 */
class Feedback extends Campaigns
{

    /**
     * @var array
     */
    public $req_post_params = [
        'message'
    ];
    /**
     * @var array
     */
    public $req_patch_params = [
        'message'
    ];

    const URL_COMPONENT = '/feedback/';

    /**
     * Feedback constructor.
     * @param $apikey
     * @param $parent_input
     * @param $class_input
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct($apikey, $parent_input, $class_input)
    {
        parent::__construct($apikey, $parent_input);
        if ($class_input) {
            $this->request->appendToEndpoint(self::URL_COMPONENT . $class_input);
        } else {
            $this->request->appendToEndpoint(self::URL_COMPONENT);
        }
    }
}
