<?php

namespace MailchimpAPI\Conversations;

use MailchimpAPI\Conversations;

class Messages extends Conversations
{
    public $req_post_params = [
        'from_email',
        'read'
    ];

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

