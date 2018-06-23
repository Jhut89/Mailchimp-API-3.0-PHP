<?php

namespace MailchimpAPI\Conversations;

use MailchimpAPI\Conversations;

/**
 * Class Messages
 * @package MailchimpAPI\Conversations
 */
class Messages extends Conversations
{
    /**
     * @var array
     */
    public $req_post_params = [
        'from_email',
        'read'
    ];

    /**
     * Messages constructor.
     * @param $apikey
     * @param $parent_input
     * @param $class_input
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct($apikey, $parent_input, $class_input)
    {
        parent::__construct($apikey, $parent_input);

        if ($class_input) {
            $this->request->appendToEndpoint('/messages/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/messages/');
        }
    }
}

