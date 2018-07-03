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
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/emails/';

    const PAUSE_URL_COMPONENT = '/actions/pause';

    const START_URL_COMPONENT = '/actions/start';

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
            $this->request->appendToEndpoint(self::URL_COMPONENT . $class_input);
        } else {
            $this->request->appendToEndpoint(self::URL_COMPONENT);
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
        return $this->postToActionEndpoint(self::PAUSE_URL_COMPONENT);
    }

    /**
     * @return MailchimpResponse
     * @throws \MailchimpAPI\MailchimpException
     */
    public function start()
    {
        $this->throwIfNot($this->grandchild_resource);
        return $this->postToActionEndpoint(self::START_URL_COMPONENT);
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
