<?php

namespace MailchimpAPI;

use MailchimpAPI\Lists\AbuseReports;
use MailchimpAPI\Lists\Clients;
use MailchimpAPI\Lists\GrowthHistory;
use MailchimpAPI\Lists\InterestCategories;
use MailchimpAPI\Lists\MergeFields;
use MailchimpAPI\Lists\Segments;
use MailchimpAPI\Lists\SignupForms;
use MailchimpAPI\Lists\Webhooks;

/**
 * Class Lists
 * @package MailchimpAPI
 */
class Lists extends Mailchimp
{

    /**
     * @var string
     */
    protected $subclass_resource;


    /**
     * @var array
     */
    public $req_post_params = [
        'name',
        'contact',
        'permission_reminder',
        'campaign_defaults',
        'email_type_option'
    ];
    /**
     * @var array
     */
    public $req_patch_params = [
        'name',
        'contact',
        'permission_reminder',
        'campaign_defaults',
        'email_type_option'
    ];

    //SUBCLASS INSTANTIATIONS
    /**
     * @var Webhooks
     */
    private $webhooks;
    /**
     * @var SignupForms
     */
    private $signup_forms;
    /**
     * @var MergeFields
     */
    private $merge_fields;
    /**
     * @var GrowthHistory
     */
    private $growth_history;
    /**
     * @var Clients
     */
    private $clients;
    /**
     * @var \MailchimpAPI\Lists\Activity
     */
    private $activity;
    /**
     * @var AbuseReports
     */
    private $abuse;
    /**
     * @var Segments
     */
    private $segments;
    /**
     * @var \MailchimpAPI\Lists\Members
     */
    private $members;
    /**
     * @var InterestCategories
     */
    private $interest_categories;

    /**
     * The url component for this endpoint
     */
    const URL_COMPONENT = '/lists/';

    /**
     * Lists constructor.
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
     * @param $members
     * @param $update_existing
     * @return Utilities\MailchimpResponse
     * @throws MailchimpException
     */
    public function batchSubscribe($members, $update_existing)
    {

        $this->throwIfNot($this->subclass_resource);
        $params = [
            'members' => $members,
            'update_existing' => $update_existing
        ];

        return $this->postToActionEndpoint('', $params);
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    /**
     * @param null $class_input
     * @return Webhooks
     * @throws MailchimpException
     */
    public function webhooks($class_input = null)
    {
        $this->webhooks = new Webhooks(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->webhooks;
    }

    /**
     * @param null $class_input
     * @return SignupForms
     * @throws MailchimpException
     */
    public function signupForms($class_input = null)
    {
        $this->signup_forms = new SignupForms(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->signup_forms;
    }

    /**
     * @param null $class_input
     * @return MergeFields
     * @throws MailchimpException
     */
    public function mergeFields($class_input = null)
    {
        $this->merge_fields = new MergeFields(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->merge_fields;
    }

    /**
     * @param null $class_input
     * @return GrowthHistory
     * @throws MailchimpException
     */
    public function growthHistory($class_input = null)
    {
        $this->growth_history = new GrowthHistory(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->growth_history;
    }

    /**
     * @param null $class_input
     * @return Clients
     * @throws MailchimpException
     */
    public function clients($class_input = null)
    {
        $this->clients = new Clients(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->clients;
    }

    /**
     * @param null $class_input
     * @return \MailchimpAPI\Lists\Activity
     * @throws MailchimpException
     */
    public function activity($class_input = null)
    {
        $this->activity = new Lists\Activity(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->activity;
    }

    /**
     * @param null $class_input
     * @return AbuseReports
     * @throws MailchimpException
     */
    public function abuseReports($class_input = null)
    {
        $this->abuse = new AbuseReports(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->abuse;
    }

    /**
     * @param null $class_input
     * @return Segments
     * @throws MailchimpException
     */
    public function segments($class_input = null)
    {
        $this->segments =  new Segments(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->segments;
    }

    /**
     * @param null $class_input
     * @return \MailchimpAPI\Lists\Members
     * @throws MailchimpException
     */
    public function members($class_input = null)
    {
        $this->members = new Lists\Members(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->members;
    }

    /**
     * @param null $class_input
     * @return InterestCategories
     * @throws MailchimpException
     */
    public function interestCategories($class_input = null)
    {
        $this->interest_categories = new InterestCategories(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->interest_categories;
    }
}
