<?php

namespace MailchimpAPI;

use MailchimpAPI\Automations\Emails;
use MailchimpAPI\Automations\RemovedSubscribers;

/**
 * Class Automations
 * @package Mailchimp_API
 */
class Automations extends Mailchimp
{
    /**
     * A workflow ID
     */
    protected $subclass_resource;

    /**
     * @var RemovedSubscribers
     */
    private $removed_subs;
    /**
     * @var Emails
     */
    private $emails;

    /**
     * Automations constructor.
     * @param $apikey
     * @param null $class_input
     * @throws MailchimpException
     */
    public function __construct($apikey, $class_input = null)
    {
        parent::__construct($apikey);
        if ($class_input) {
            $this->request->appendToEndpoint('/automations/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/automations/');
        }
        $this->subclass_resource = $class_input;
    }

    /**
     * @return Utilities\MailchimpResponse
     * @throws MailchimpException
     */
    public function pauseAll()
    {
        $this->throwIfNot($this->subclass_resource);
        return $this->postToActionEndpoint('/actions/pause-all-emails/');
    }

    /**
     * @return Utilities\MailchimpResponse
     * @throws MailchimpException
     */
    public function startAll()
    {
        $this->throwIfNot($this->subclass_resource);
        return $this->postToActionEndpoint('/actions/start-all-emails/');
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    /**
     * @return RemovedSubscribers
     * @throws MailchimpException
     */
    public function removedSubscribers()
    {
        $this->removed_subs = new RemovedSubscribers(
            $this->apikey,
            $this->subclass_resource
        );
        return $this->removed_subs;
    }

    /**
     * @param null $class_input
     * @return Emails
     * @throws MailchimpException
     */
    public function emails($class_input = null)
    {
        $this->emails = new Emails(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->emails;
    }
}
