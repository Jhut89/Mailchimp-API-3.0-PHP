<?php

namespace MailchimpAPI\Lists;

use MailchimpAPI\Lists;
use MailchimpAPI\Lists\Members\Notes;
use MailchimpAPI\Lists\Members\Goals;
use MailchimpAPI\Lists\Members\Activity;

/**
 * Class Members
 * @package MailchimpAPI\Lists
 */
class Members extends Lists
{

    /**
     * @var string
     */
    protected $grandchild_resource;

    /**
     * @var array
     */
    public $req_post_params = [
        'email_address',
        'status'
    ];
    /**
     * @var array
     */
    public $req_put_params = [
        'email_address',
        'status_if_new'
    ];

    /**
     * @var Notes
     */
    private $notes;
    /**
     * @var Goals
     */
    private $goals;
    /**
     * @var Activity
     */
    private $member_activity;

    const URL_COMPONENT = '/members/';

    /**
     * Members constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $class_input
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint(self::URL_COMPONENT . $class_input);
        } else {
            $this->request->appendToEndpoint(self::URL_COMPONENT);
        }
        $this->grandchild_resource = $class_input;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    /**
     * @param null $class_input
     * @return Notes
     * @throws \MailchimpAPI\MailchimpException
     */
    public function notes($class_input = null)
    {
        $this->notes = new Notes(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->notes;
    }

    /**
     * @param null $class_input
     * @return Goals
     * @throws \MailchimpAPI\MailchimpException
     */
    public function goals($class_input = null)
    {
        $this->goals = new Goals(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->goals;
    }

    /**
     * @param null $class_input
     * @return \MailchimpAPI\Lists\Activity|Activity
     * @throws \MailchimpAPI\MailchimpException
     */
    public function activity($class_input = null)
    {
        $this->member_activity = new Activity(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->member_activity;
    }
}
