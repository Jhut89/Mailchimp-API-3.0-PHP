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
    protected $subclass_resource;


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

    /**
     * @var SendChecklist
     */
    private $checklist;
    /**
     * @var Feedback
     */
    private $feedback;
    /**
     * @var Content
     */
    private $content;

    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/campaigns/';

    const CANCEL_URL_COMPONENT = '/actions/cancel-send/';

    const PAUSE_URL_COMPONENT = '/actions/pause';

    const REPLICATE_URL_COMPONENT = '/actions/replicate';

    const RESUME_URL_COMPONENT = '/actions/resume';

    const SCHEDULE_URL_COMPONENT = '/actions/schedule';

    const SEND_URL_COMPONENT = '/actions/send';

    const TEST_URL_COMPONENT = '/actions/test';

    const UNSCHEDULE_URL_COMPONENT = '/actions/unschedule';

    /**
     * Campaigns constructor.
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

    /**
     * @return Utilities\MailchimpResponse
     * @throws MailchimpException
     */
    public function cancel()
    {
        $this->throwIfNot($this->subclass_resource);
        return $this->postToActionEndpoint(self::CANCEL_URL_COMPONENT);
    }

    /**
     * @return Utilities\MailchimpResponse
     * @throws MailchimpException
     */
    public function pause()
    {
        $this->throwIfNot($this->subclass_resource);
        return $this->postToActionEndpoint(self::PAUSE_URL_COMPONENT);
    }

    /**
     * @return Utilities\MailchimpResponse
     * @throws MailchimpException
     */
    public function replicate()
    {
        $this->throwIfNot($this->subclass_resource);
        return $this->postToActionEndpoint(self::REPLICATE_URL_COMPONENT);
    }

    /**
     * @return Utilities\MailchimpResponse
     * @throws MailchimpException
     */
    public function resume()
    {
        $this->throwIfNot($this->subclass_resource);
        return $this->postToActionEndpoint(self::RESUME_URL_COMPONENT);
    }

    /**
     * @param $schedule_time
     * @param array $optional_parameters
     * @return Utilities\MailchimpResponse
     * @throws MailchimpException
     */
    public function schedule($schedule_time, $optional_parameters = [])
    {
        $this->throwIfNot($this->subclass_resource);
        $params = ["schedule_time" => $schedule_time];
        $params = array_merge($params, $optional_parameters);

        return $this->postToActionEndpoint(self::SCHEDULE_URL_COMPONENT, $params);
    }

    /**
     * @return Utilities\MailchimpResponse
     * @throws MailchimpException
     */
    public function send()
    {
        $this->throwIfNot($this->subclass_resource);
        return $this->postToActionEndpoint(self::SEND_URL_COMPONENT);
    }

    /**
     * @param array $test_addresses
     * @param $send_type
     * @return Utilities\MailchimpResponse
     * @throws MailchimpException
     */
    public function test($test_addresses, $send_type)
    {
        $this->throwIfNot($this->subclass_resource);
        $params = ["test_emails" => $test_addresses, "send_type" => $send_type];

        return $this->postToActionEndpoint(self::TEST_URL_COMPONENT, $params);
    }

    /**
     * @return Utilities\MailchimpResponse
     * @throws MailchimpException
     */
    public function unschedule()
    {
        $this->throwIfNot($this->subclass_resource);
        return $this->postToActionEndpoint(self::UNSCHEDULE_URL_COMPONENT);
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    /**
     * @return SendChecklist
     * @throws MailchimpException
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
     * @throws MailchimpException
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
     * @throws MailchimpException
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
