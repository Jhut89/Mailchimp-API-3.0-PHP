<?php

namespace MailchimpAPI;

use MailchimpAPI\Conversations\Messages;

/**
 * Class Conversations
 * @package Mailchimp_API
 */
class Conversations extends Mailchimp
{

    /**
     * @var
     */
    protected $subclass_resource;

    /**
     * @var Messages
     */
    private $messages;

    /**
     * the conversations endpoint url component
     */
    const URL_COMPONENT = '/conversations/';

    /**
     * Conversations constructor.
     * @param $apikey
     * @param $class_input
     * @throws MailchimpException
     */
    public function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);

        if ($class_input) {
            $this->request->appendToEndpoint(self::URL_COMPONENT . $class_input);
        } else {
            $this->request->appendToEndpoint(self::URL_COMPONENT);
        }
        
        $this->subclass_resource = $class_input;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    /**
     * @param null $class_input
     * @return Messages
     * @throws MailchimpException
     */
    public function messages($class_input = null)
    {
        $this->messages = new Messages(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->messages;
    }
}
