<?php

namespace MailchimpAPI\Automations;

use MailchimpAPI\Automations;
use MailchimpAPI\Utilities\MailchimpResponse;

/**
 * Class Emails
 * @package Mailchimp_API\Automations\Emails
 */
class Emails extends Automations
{

    /**
     * An email ID
     */
    protected $grandchild_resource;

    /**
     * @var Queue
     */
    private $queue;

    /**
     * Emails constructor.
     * @param $apikey
     * @param $parent_reference
     * @param $class_input
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct($apikey, $parent_reference, $class_input)
    {

        parent::__construct($apikey, $parent_reference);
        if ($class_input) {
            $this->request->appendToEndpoint('/emails/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/emails/');
        }
        $this->grandchild_resource = $class_input;
    }

    /**
     * @return MailchimpResponse
     * @throws \MailchimpAPI\MailchimpException
     */
    public function pause()
    {
        $this->throwIfNot($this->grandchild_resource);
        return $this->postToActionEndpoint('/actions/pause');
    }

    /**
     * @return MailchimpResponse
     * @throws \MailchimpAPI\MailchimpException
     */
    public function start()
    {
        $this->throwIfNot($this->grandchild_resource);
        return $this->postToActionEndpoint('/actions/start');
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    /**
     * @param null $member
     * @return Automations\Emails\Queue
     * @throws \MailchimpAPI\MailchimpException
     */
    public function queue($member = null)
    {
        $this->queue = new Automations\Emails\Queue(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $member
        );
        return $this->queue;
    }
}
