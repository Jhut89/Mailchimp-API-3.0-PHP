<?php

namespace MailchimpAPI\Automations\Emails;

use MailchimpAPI\Automations;
use MailchimpAPI\Utilities\MailchimpConnection;
use MailchimpAPI\MailchimpException;
use MailchimpAPI\Utilities\MailchimpRequest;

/**
 * Class Emails
 * @package Mailchimp_API\Automations\Emails
 */
class Emails extends Automations
{

    /**
     * An email ID
     */
    public $grandchild_resource;

    /**
     * @var Queue
     */
    public $queue;

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
     * @return \MailchimpAPI\Utilities\MailchimpResponse
     * @throws \MailchimpAPI\MailchimpException
     */
    public function pause()
    {
        if (!$this->subclass_resource) {
            throw new MailchimpException("You must provide an email ID to pause an email");
        }
        $this->request->appendToEndpoint('/actions/pause');
        $this->request->setMethod(MailchimpRequest::POST);


        $connection = new MailchimpConnection($this->request, $this->settings);
        $response = $connection->execute();
        $this->resetRequest();
        return $response;
    }

    /**
     * @return \MailchimpAPI\Utilities\MailchimpResponse
     * @throws \MailchimpAPI\MailchimpException
     */
    public function start()
    {
        if (!$this->subclass_resource) {
            throw new MailchimpException("You must provide an email ID to start an email");
        }
        $this->request->appendToEndpoint('/actions/pause');
        $this->request->setMethod(MailchimpRequest::POST);


        $connection = new MailchimpConnection($this->request, $this->settings);
        $response = $connection->execute();
        $this->resetRequest();
        return $response;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    /**
     * @param null $member
     * @return Queue
     * @throws \MailchimpAPI\MailchimpException
     */
    public function queue($member = null)
    {
        $this->queue = new Queue(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $member
        );
        return $this->queue;
    }
}
