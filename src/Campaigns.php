<?php

namespace MailchimpAPI;

use MailchimpAPI\Campaigns\Content;
use MailchimpAPI\Campaigns\Feedback;
use MailchimpAPI\Campaigns\SendChecklist;

/**
 * Class Campaigns
 * @package Mailchimp_API
 */
class Campaigns extends Mailchimp
{

    /**
     * @var
     */
    public $subclass_resource;

    //REQUIRED FIELDS DEFINITIONS
    /**
     * @var array
     */
    public $req_post_params = [
        'type',
        'settings'
    ];
    /**
     * @var array
     */
    public $req_patch_params = [
        'settings'
    ];

    //SUBCLASS INSTANTIATIONS
    /**
     * @var SendChecklist
     */
    public $checklist;
    /**
     * @var Feedback
     */
    public $feedback;
    /**
     * @var Content
     */
    public $content;

    /**
     * Campaigns constructor.
     * @param $apikey
     * @param $class_input
     * @throws Library_Exception
     */
    public function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);
        if ($class_input) {
            $this->request->appendToEndpoint('/campaigns/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/campaigns/');
        }
        
        $this->subclass_resource = $class_input;
    }

    /**
     * @return Utilities\MailchimpResponse
     * @throws Library_Exception
     */
    public function cancel()
    {
        if (!$this->subclass_resource) {
            throw new Library_Exception("You must provide a campaign ID to cancel");
        }
        return $this->postToActionEndpoint('/actions/cancel-send/');
    }

    /**
     * @return Utilities\MailchimpResponse
     * @throws Library_Exception
     */
    public function pause()
    {
        if (!$this->subclass_resource) {
            throw new Library_Exception("You must provide a campaign ID to pause");
        }
        return $this->postToActionEndpoint('/actions/pause');
    }

    /**
     * @return Utilities\MailchimpResponse
     * @throws Library_Exception
     */
    public function replicate()
    {
        if (!$this->subclass_resource) {
            throw new Library_Exception("You must provide a campaign ID to replicate");
        }
        return $this->postToActionEndpoint('/actions/replicate');
    }

    /**
     * @return Utilities\MailchimpResponse
     * @throws Library_Exception
     */
    public function resume()
    {
        if (!$this->subclass_resource) {
            throw new Library_Exception("You must provide a campaign ID to resume");
        }
        return $this->postToActionEndpoint('/actions/resume');
    }

    /**
     * @param $schedule_time
     * @param array $optional_parameters
     * @return Utilities\MailchimpResponse
     * @throws Library_Exception
     */
    public function schedule($schedule_time, $optional_parameters = [])
    {
        if (!$this->subclass_resource) {
            throw new Library_Exception("You must provide a campaign ID to schedule");
        }
        $params = ["schedule_time" => $schedule_time];
        $params = array_merge($params, $optional_parameters);

        return $this->postToActionEndpoint('/actions/schedule', $params);
    }

    /**
     * @return Utilities\MailchimpResponse
     * @throws Library_Exception
     */
    public function send()
    {
        if (!$this->subclass_resource) {
            throw new Library_Exception("You must provide a campaign ID to send");
        }
        return $this->postToActionEndpoint('/actions/send');
    }

    /**
     * @param array $test_addresses
     * @param $send_type
     * @return Utilities\MailchimpResponse
     * @throws Library_Exception
     */
    public function test($test_addresses, $send_type)
    {
        if (!$this->subclass_resource) {
            throw new Library_Exception("You must provide a campaign ID to test");
        }
        $params = ["test_emails" => $test_addresses, "send_type" => $send_type];

        return $this->postToActionEndpoint('/actions/test', $params);
    }

    /**
     * @return Utilities\MailchimpResponse
     * @throws Library_Exception
     */
    public function unschedule()
    {
        if (!$this->subclass_resource) {
            throw new Library_Exception("You must provide a campaign ID to unschedule");
        }
        return $this->postToActionEndpoint('/actions/unschedule');
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    /**
     * @return SendChecklist
     * @throws Library_Exception
     */
    public function checklist()
    {
        $this->checklist = new SendChecklist(
            $this->apikey,
            $this->subclass_resource
        );
        return $this->checklist;
    }

    /**
     * @param null $class_input
     * @return Feedback
     * @throws Library_Exception
     */
    public function feedback($class_input = null)
    {
        $this->feedback = new Feedback(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->feedback;
    }

    /**
     * @return Content
     * @throws Library_Exception
     */
    public function content()
    {
        $this->content = new Content(
            $this->apikey,
            $this->subclass_resource
        );
        return $this->content;
    }
}
