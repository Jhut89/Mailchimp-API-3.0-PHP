<?php

namespace MailchimpAPI;

use MailchimpAPI\Automations\Emails\Emails;
use MailchimpAPI\Automations\RemovedSubscribers;
use MailchimpAPI\Utilities\MailchimpConnection;
use MailchimpAPI\Utilities\MailchimpRequest;

/**
 * Class Automations
 * @package Mailchimp_API
 */
class Automations extends Mailchimp
{
    /**
     * A workflow ID
     */
    public $subclass_resource;

    /**
     * @var RemovedSubscribers
     */
    public $removed_subs;
    /**
     * @var Emails
     */
    public $emails;

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
        if (!$this->subclass_resource) {
            throw new MailchimpException("You must provide a workflow ID to pause all emails");
        }
        return $this->postToActionEndpoint('/actions/pause-all-emails/');
    }

    /**
     * @return Utilities\MailchimpResponse
     * @throws MailchimpException
     */
    public function startAll()
    {
        if (!$this->subclass_resource) {
            throw new MailchimpException("You must provide a workflow ID to start all emails");
        }
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
