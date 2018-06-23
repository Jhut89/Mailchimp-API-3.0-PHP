<?php

namespace MailchimpAPI\Automations\Emails;

/**
 * Class Queue
 * @package Mailchimp_API\Automations\Emails
 */
class Queue extends Emails
{

    /**
     * @var array
     */
    public $req_post_params = [
        'email_address'
    ];

    /**
     * Queue constructor.
     * @param $apikey
     * @param $parent_reference
     * @param $grandchild_resource
     * @param string $member An email address
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct($apikey, $parent_reference, $grandchild_resource, $member)
    {
        parent::__construct($apikey, $parent_reference, $grandchild_resource);
        if ($member) {
            $this->request->appendToEndpoint('/queue/' . md5(strtolower($member)));
        } else {
            $this->request->appendToEndpoint('/queue/');
        }
    }
}