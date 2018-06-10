<?php

namespace Mailchimp_API\Conversations;

use Mailchimp_API\Conversations;

class Messages extends Conversations
{
    public $req_post_params = [
        'from_email',
        'read'
    ];

    function __construct($apikey, $parent_input, $class_input)
    {
        parent::__construct($apikey, $parent_input);

        if (isset($class_input)) {
            $this->url .= '/messages/' . $class_input;
        } else {
            $this->url .= '/messages/';
        }
    }
}

