<?php

namespace Mailchimp_API;

use Mailchimp_API\Conversations\Messages;

class Conversations extends Mailchimp
{

    public $subclass_resource;

    // SUBCLASS INSTANTIATIONS
    public $messages;

    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);

        if ($class_input) {
            $this->url .= '/conversations/' . $class_input;
        } else {
            $this->url .= '/conversations/';
        }
        
        $this->subclass_resource = $class_input;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function messages( $class_input = null )
    {
        $this->messages = new Messages(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->messages;
    }
    
}