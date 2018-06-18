<?php

namespace Mailchimp_API;

use Mailchimp_API\Automations\Emails\Emails;
use Mailchimp_API\Automations\Removed_Subscribers;
use Mailchimp_API\Utilities\CurlUtility;
use Mailchimp_API\Utilities\MailchimpRequest;

class Automations extends Mailchimp
{
    public $subclass_resource;

    //SUBCLASS INSTANTIATIONS
    public $removed_subs;
    public $emails;

    function __construct($apikey, $class_input = null)
    {
        parent::__construct($apikey);
        if ($class_input) {
            $this->request->appendToEndpoint('/automations/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/automations/');
        }
        $this->subclass_resource = $class_input;
    }

    public function PAUSE_ALL($exec = true)
    {
        $this->request->appendToEndpoint('/actions/pause-all-emails/');
        $this->request->setMethod(MailchimpRequest::POST);

        if ($exec) {
            CurlUtility::makeRequest($this->request, $this->settings);
            $response = $this->request->getResponse();
            $this->resetRequest();
            return $response;
        }
    }

    public function START_ALL($exec = true)
    {
        $this->request->appendToEndpoint('/actions/start-all-emails/');
        $this->request->setMethod(MailchimpRequest::POST);

        if ($exec) {
            CurlUtility::makeRequest($this->request, $this->settings);
            $response = $this->request->getResponse();
            $this->resetRequest();
            return $response;
        }
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function removedSubscribers()
    {
        $this->removed_subs = new Removed_Subscribers(
            $this->apikey,
            $this->subclass_resource
        );
        return $this->removed_subs;
    }

    public function emails( $class_input = null )
    {
        $this->emails = new Emails(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->emails;
    }

}